<?php
$startTime = microtime(true);

$db = new SQLite3('movil.db');

$res = $db->query('SELECT * FROM Movil');

while($row = $res->fetchArray()) {
    $obj = (object) array();

    $obj->nombre = $row["nombre"];
    $obj->lat = $row["latitud"];
    $obj->lng = $row["longitud"];
    $obj->dia = $row["fecha"];
    $obj->hora = $row["hora"];
}

$endTime = microtime(true);
$exTime = ($endTime - $startTime);

echo $exTime;
