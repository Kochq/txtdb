<?php

$db = new SQLite3('movil.db');

$query = 'CREATE TABLE IF NOT EXISTS Movil (
    id INTEGER PRIMARY KEY,
    nombre TEXT,
    latitud TEXT,
    longitud TEXT,
    fecha TEXT,
    hora TEXT
)';

$db->exec($query);

$file = file("./movil.txt");

foreach($file as $data) {
    $data = explode(",", $data);
    $nombre = $data[0];
    $lat = $data[1];
    $lng = $data[3];
    $dia = $data[7];
    $hora = $data[8];

    $stmt = $db->prepare('INSERT INTO Movil (
        nombre, latitud, longitud, fecha, hora
        ) VALUES (
        :nombre, :latitud, :longitud, :fecha, :hora
        )');

    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':latitud', $lat);
    $stmt->bindValue(':longitud', $lng);
    $stmt->bindValue(':fecha', $dia);
    $stmt->bindValue(':hora', $hora);

    $stmt->execute();
}
