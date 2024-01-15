<?php

function bukaKoneksiDb() 
{
    $dbHost = 'localhost';
    $dbName = 'kuliah_pw2_pendidikan';
    $dbUsername = 'root';
    $dbPassword = '';

    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($mysqli->connect_error) {
        die("Database gagal terhubung. ERROR : " . $mysqli->connect_error);
    }

    return $mysqli;
}

function tutupKoneksiDb($mysqli) 
{
    $mysqli->close();
}