<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Модель работы с событиями СКУД
 */
class Model_Events extends Model
{
    /** @var Database Connection */
    private $db;
    
    /** @var int Максимальное количество событий за запрос */
    const MAX_EVENTS_LIMIT = 100;
    
    public function __construct()
    {
        parent::__construct();
        $this->db = Database::instance('fb');
    }
    
    /**
     * Получение нового ID события
     */
    public function getCurrentEventId(): int
    {
        $sql = 'SELECT GEN_ID(gen_event_id, 0) AS current_id FROM RDB$DATABASE';
        
        $result = $this->executeQuery($sql);
        return (int) ($result['current_id'] ?? 0);
    }
    
    /**
     * Получение новых событий (ID > lastId)
     */
    public function getNewEvents(int $lastId, bool $withPhoto = false, int $limit = 30): array
    {
        $limit = min(self::MAX_EVENTS_LIMIT, max(1, $limit));
        
        $sql = $this->buildEventsQuery($withPhoto, true);
        $sql .= ' WHERE e.id_event > :lastId ORDER BY e.id_event ASC';
        
        return $this->executeQuery($sql, [':lastId' => $lastId], $limit);
    }
    
    /**
     * Получение диапазона событий
     */
    public function getEventsRange(int $fromId, int $toId, int $limit = 50, bool $withPhoto = false): array
    {
        $limit = min(self::MAX_EVENTS_LIMIT, max(1, $limit));
        
        $sql = $this->buildEventsQuery($withPhoto, false);
        $sql .= ' WHERE e.id_event BETWEEN :fromId AND :toId 
                  ORDER BY e.id_event DESC';
        
        return $this->executeQuery($sql, [
            ':fromId' => $fromId,
            ':toId' => $toId
        ], $limit);
    }
    
    /**
     * Построение SQL запроса событий
     */
    private function buildEventsQuery(bool $withPhoto, bool $withFirstOnly): string
    {
        $photoField = $withPhoto ? 'p.photo, ' : '';
        $limitClause = $withFirstOnly ? 'FIRST :limit ' : '';
        
        return sprintf("
            SELECT {$limitClause}
                e.id_event,
                e.id_eventtype,
                e.datetime,
                et.color,
                et.name AS eventtype_name,
                d.name AS device_name,
                p.surname,
                TRIM(CONCAT_WS(' ', p.surname, p.name, p.patronymic)) AS people_name,
                {$photoField}
                p.post,
                o.name AS organization_name
            FROM events e
            INNER JOIN eventtype et ON et.id_eventtype = e.id_eventtype
            INNER JOIN device d ON d.id_dev = e.id_dev
            LEFT JOIN people p ON p.id_pep = e.ess1
            LEFT JOIN organization o ON o.id_org = e.ess2
        ");
    }
    
    /**
     * Выполнение запроса с параметрами
     */
    private function executeQuery(string $sql, array $params = [], ?int $limit = null): array
    {
        try {
            $query = DB::query(Database::SELECT, $sql);
            
            foreach ($params as $key => $value) {
                $query->param($key, $value);
            }
            
            if ($limit !== null) {
                $query->param(':limit', $limit);
            }
            
            Log::instance()->add(Log::DEBUG, 'Executing query: ' . $sql);
            Log::instance()->add(Log::DEBUG, 'Params: ' . print_r($params, true));
            
            $result = $query->execute($this->db);
            
            return $this->normalizeEventData($result->as_array());
            
        } catch (Database_Exception $e) {
            Log::instance()->add(Log::ERROR, 'Database error: ' . $e->getMessage());
            throw new Exception('Failed to fetch events: ' . $e->getMessage());
        }
    }
    
    /**
     * Нормализация данных событий
     */
    private function normalizeEventData(array $events): array
    {
        return array_map(function($event) {
            // Приводим ключи к camelCase для JSON
            return [
                'id_event' => (int) ($event['ID_EVENT'] ?? 0),
                'id_eventtype' => (int) ($event['ID_EVENTTYPE'] ?? 0),
                'datetime' => $event['DATETIME'] ?? '',
                'color' => (int) ($event['COLOR'] ?? 0),
                'eventtype_name' => $this->decodeString($event['EVENTTYPE_NAME'] ?? ''),
                'device_name' => $this->decodeString($event['DEVICE_NAME'] ?? ''),
                'people_name' => $this->decodeString($event['PEOPLE_NAME'] ?? ''),
                'organization_name' => $this->decodeString($event['ORGANIZATION_NAME'] ?? ''),
                'post' => $this->decodeString($event['POST'] ?? ''),
                'surname' => $this->decodeString($event['SURNAME'] ?? ''),
                'photo' => $event['PHOTO'] ?? null
            ];
        }, $events);
    }
    
    /**
     * Декодирование из CP1251 в UTF-8
     */
    private function decodeString(?string $string): string
    {
        if (empty($string)) {
            return '';
        }
        
        $decoded = @iconv('CP1251', 'UTF-8//IGNORE//TRANSLIT', $string);
        return $decoded !== false ? $decoded : $string;
    }
}