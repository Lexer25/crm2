<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Events extends Controller {
    
    public function before()
    {
        parent::before();
        // Устанавливаем JSON для API методов
        if ($this->request->action() === 'getEvent') {
            $this->response->headers('Content-Type', 'application/json');
        }
    }
    
    /**
     * Получение новых событий
     */
    public function action_getEvent()
    {
        try {
            // Получаем параметры
            $photo = filter_var($this->request->query('photo', false), FILTER_VALIDATE_BOOLEAN);
            $format = $this->request->query('format', 'html');
            $limit = min(100, max(1, (int) $this->request->query('limit', 30)));
            
            // Получаем последний ID из куки
            $lastId = $this->getLastEventId();
            
            // Получаем новые события
            $events = $this->getNewEvents($lastId, $photo, $limit);
            
            // Формируем ответ
            $response = array(
                'success' => true,
                'hasNew' => !empty($events),
                'count' => count($events),
                'lastId' => $lastId
            );
            
            if (!empty($events)) {
                // Обновляем максимальный ID
                $maxId = $lastId;
                foreach ($events as $event) {
                    if ($event['id_event'] > $maxId) {
                        $maxId = $event['id_event'];
                    }
                }
                if ($maxId > $lastId) {
                    Cookie::set('event_last_id', $maxId, Date::WEEK);
                    $response['lastId'] = $maxId;
                }
                
                if ($format === 'html') {
                    $response['html'] = $this->renderEventsHtml($events, $photo);
                } else {
                    $response['events'] = $events;
                }
            }
            
            $this->response->body(json_encode($response, JSON_UNESCAPED_UNICODE));
            
        } catch (Exception $e) {
            Log::instance()->add(Log::ERROR, 'Event error: ' . $e->getMessage());
            $this->response->body(json_encode(array(
                'success' => false,
                'error' => $e->getMessage()
            )));
        }
    }
    
    /**
     * Получение последнего ID события из куки
     */
    private function getLastEventId()
    {
        $lastId = Cookie::get('event_last_id');
        
        if ($lastId === null || !is_numeric($lastId)) {
            $lastId = $this->getCurrentEventId();
            Cookie::set('event_last_id', $lastId, Date::WEEK);
        }
        
        return (int) $lastId;
    }
    
    /**
     * Получение текущего ID события
     */
    private function getCurrentEventId()
    {
        try {
            $sql = 'SELECT GEN_ID(gen_event_id, 0) as current_id FROM RDB$DATABASE';
            $query = DB::query(Database::SELECT, $sql)
                ->execute(Database::instance('fb'))
                ->current();
            
            // Заменяем ?? на isset()
            $currentId = isset($query['CURRENT_ID']) ? $query['CURRENT_ID'] : 0;
            return (int) $currentId;
            
        } catch (Exception $e) {
            Log::instance()->add(Log::ERROR, 'Failed to get current event ID: ' . $e->getMessage());
            return 0;
        }
    }
    
    /**
     * Получение новых событий
     */
    private function getNewEvents($lastId, $withPhoto, $limit)
    {
        $photoField = $withPhoto ? 'p.photo, ' : '';
        
        $sql = "SELECT FIRST :limit 
                    e.id_event,
                    e.id_eventtype,
                    e.datetime,
                    et.color,
                    et.name as eventtype_name,
                    d.name as device_name,
                    p.surname,
                    p.surname || ' ' || p.name || ' ' || p.patronymic as people_name,
                    {$photoField}
                    p.post,
                    o.name as organization_name
                FROM events e
                INNER JOIN eventtype et ON et.id_eventtype = e.id_eventtype
                INNER JOIN device d ON d.id_dev = e.id_dev
                LEFT JOIN people p ON p.id_pep = e.ess1
                LEFT JOIN organization o ON o.id_org = e.ess2
                WHERE e.id_event > :lastId
                ORDER BY e.id_event ASC";
        
        try {
            $query = DB::query(Database::SELECT, $sql)
                ->param(':limit', $limit)
                ->param(':lastId', $lastId)
                ->execute(Database::instance('fb'))
                ->as_array();
            
            return $this->normalizeEvents($query, $withPhoto);
            
        } catch (Exception $e) {
            Log::instance()->add(Log::ERROR, 'Query error: ' . $e->getMessage());
            return array();
        }
    }
    
    /**
     * Нормализация данных событий
     */
    private function normalizeEvents($events, $withPhoto)
    {
        $result = array();
        foreach ($events as $event) {
            $item = array(
                'id_event' => (int) (isset($event['ID_EVENT']) ? $event['ID_EVENT'] : 0),
                'id_eventtype' => (int) (isset($event['ID_EVENTTYPE']) ? $event['ID_EVENTTYPE'] : 0),
                'datetime' => isset($event['DATETIME']) ? $event['DATETIME'] : '',
                'color' => (int) (isset($event['COLOR']) ? $event['COLOR'] : 0),
                'eventtype_name' => $this->decodeCp1251(isset($event['EVENTTYPE_NAME']) ? $event['EVENTTYPE_NAME'] : ''),
                'device_name' => $this->decodeCp1251(isset($event['DEVICE_NAME']) ? $event['DEVICE_NAME'] : ''),
                'people_name' => $this->decodeCp1251(isset($event['PEOPLE_NAME']) ? $event['PEOPLE_NAME'] : ''),
                'organization_name' => $this->decodeCp1251(isset($event['ORGANIZATION_NAME']) ? $event['ORGANIZATION_NAME'] : ''),
                'post' => $this->decodeCp1251(isset($event['POST']) ? $event['POST'] : '')
            );
            
            if ($withPhoto && isset($event['PHOTO'])) {
                $item['photo'] = $event['PHOTO'];
            }
            
            $result[] = $item;
        }
        return $result;
    }
    
    /**
     * Декодирование из CP1251 в UTF-8
     */
    private function decodeCp1251($string)
    {
        if (empty($string)) {
            return '';
        }
        $decoded = iconv('CP1251', 'UTF-8//IGNORE', $string);
        return $decoded !== false ? $decoded : $string;
    }
    
    /**
     * Рендеринг HTML для совместимости со старым JS
     */
    private function renderEventsHtml($events, $withPhoto)
    {
        $html = '';
        foreach ($events as $event) {
            $colorHex = dechex($event['color']);
            $style = 'color: black;background-color: #' . $colorHex . ';';
            
            $photoCell = '';
            if ($withPhoto && !empty($event['photo'])) {
                $cleanPhoto = str_replace("\0", "", $event['photo']);
                $photoData = base64_encode(pack("H*", $cleanPhoto));
                $photoCell = '<td id="photo" style="' . $style . 'display:none;">' . $photoData . '</td>';
            }
            
            $post = isset($event['post']) ? $event['post'] : '';
            $idEvent = isset($event['id_event']) ? $event['id_event'] : '';
            $idEventtype = isset($event['id_eventtype']) ? $event['id_eventtype'] : '';
            $datetime = isset($event['datetime']) ? $event['datetime'] : '';
            $eventtypeName = isset($event['eventtype_name']) ? $event['eventtype_name'] : '';
            $deviceName = isset($event['device_name']) ? $event['device_name'] : '';
            $peopleName = isset($event['people_name']) ? $event['people_name'] : '';
            $orgName = isset($event['organization_name']) ? $event['organization_name'] : '';
            
            $html .= '<tr>
                ' . $photoCell . '
                <td id="people_post" style="' . $style . 'display:none;">' . htmlspecialchars($post) . '</td>
                <td style="' . $style . '">' . htmlspecialchars($idEvent) . '</td>
                <td id="event_type" style="' . $style . '">' . htmlspecialchars($idEventtype) . '</td>
                <td style="' . $style . '">' . htmlspecialchars($datetime) . '</td>
                <td id="even_name" style="' . $style . '">' . htmlspecialchars($eventtypeName) . '</td>
                <td id="device_name" style="' . $style . '">' . htmlspecialchars($deviceName) . '</td>
                <td id="people_name" style="' . $style . '">' . htmlspecialchars($peopleName) . '</td>
                <td id="org_name" style="' . $style . '">' . htmlspecialchars($orgName) . '</td>
            </tr>';
        }
        return $html;
    }
}