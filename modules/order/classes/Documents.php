<?php defined('SYSPATH') OR die('No direct access allowed.');

class Documents
{
    private static $docs = [
        1 => [
            'id_doc' => 1,
            'docname' => 'паспорт'
        ],
        2 => [
            'id_doc'=> 2,
            'docname' => 'военный билет'
        ],
        3=> [
            'id_doc'=> 3,
            'docname' => 'водительское удостоверение'
        ],
        4 => [
            'id_doc'=> 4,
            'docname' => 'социальная карта москвича'
        ],
        5=> [
            'id_doc'=>5,
            'docname' => 'загран. паспорт'
        ]
    ];

    public static function getDoc()
    {
        return self::$docs;
    }
    public static function getDocById($id){
        return self::$docs[$id];
    }
    public static function isDocumentUnique($numdoc, $exclude_id_pep = null)
    {
        $numdoc = trim($numdoc);
        // Пустые паспортные данные не считаем документом:
        // - полностью пустая строка
        // - строка "#@"
        // - строка вида "#@X" (серия и номер пустые, указан только тип документа)
        if ($numdoc === '' || $numdoc === '#@' || strpos($numdoc, '#@') === 0) {
            return true; // пустые — не проверяем на уникальность
        }

        $numdoc_encoded = iconv('UTF-8', 'CP1251', $numdoc);
        if ($numdoc_encoded === false) {
            $numdoc_encoded = $numdoc;
        }

       // echo Debug::vars('48', $numdoc_encoded);exit;

        try {
            $sql = 'SELECT COUNT(*) AS cnt FROM PEOPLE WHERE NUMDOC = \'' . addslashes($numdoc_encoded) . '\'';
            if ($exclude_id_pep !== null && (int) $exclude_id_pep > 0) {
                $sql .= ' AND "ID_PEP" != ' . (int) $exclude_id_pep;
            }
            //echo Debug::vars('55',$sql);exit;
            $query = DB::query(Database::SELECT, $sql)
                ->execute(Database::instance('fb'))
                ->current();
            // Firebird может вернуть ключ в верхнем регистре (CNT), берём первое значение строки
            $count = is_array($query) ? (int) reset($query) : 0;
            // уникален, если записей 0 или 1; больше 1 — не уникален
            if ($count > 1) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            Log::instance()->add(Log::ERROR, 'Documents::isDocumentUnique: ' . $e->getMessage());
            return true; // при ошибке БД не блокируем сохранение
        }
    }
}