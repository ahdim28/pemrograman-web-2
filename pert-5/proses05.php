<?php

if (isset($_POST['input'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username == 'ahmad' && $password == '123') {
        echo "<h2>Login Berhasil</h2>";
    } else {
        echo "<h2>Login Gagal</h2>";
    }
}