<?php 
$startTime = microtime(true);

$file = file("./movil.txt");

foreach($file as $data) {
    $obj = (object) array();
    $data = explode(",", $data);

    $obj->nombre = $data[0];
    $obj->lat = $data[1];
    $obj->lng = $data[3];
    $obj->dia = $data[7];
    $obj->hora = $data[8];
}

$endTime = microtime(true);
$exTime = ($endTime - $startTime);

echo $exTime;
