<?php

const ORIG_DB = '/var/www/viber.db';
const WORK_DB = '/tmp/viber.db';

class ViberDB extends SQLite3 {
    function __construct() {
        $this->open(WORK_DB, SQLITE3_OPEN_READONLY);
    }
}

copy(ORIG_DB, WORK_DB);

$db = new ViberDB();
$sql =<<<EOL
    SELECT
        MessageInfo.TimeStamp,
        ClientName,
        Body
    FROM MessageInfo
    INNER JOIN ChatInfo USING (ChatID)
    LEFT JOIN Contact USING (ContactID)
    WHERE ChatInfo.Name LIKE 'ОСМД Мариинский 9 дом'
        AND body NOT LIKE ''
    ORDER BY Seq DESC
    LIMIT 10;
EOL;
$result = $db->query($sql);
$response = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $response[] = $row;
}

echo json_encode($response, JSON_PRETTY_PRINT);
