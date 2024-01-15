<?php

function connectToDb() 
{
    $dbHost = 'localhost';
    $dbName = 'kuliah_pw2_uts';
    $dbUsername = 'root';
    $dbPassword = '';

    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($mysqli->connect_error) {
        die("Database gagal terhubung. ERROR : " . $mysqli->connect_error);
    }

    return $mysqli;
}

function closeDb($mysqli) 
{
    $mysqli->close();
}