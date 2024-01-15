<?php

session_start();

include 'dbConnection.php';
$dbCon = connectToDb();

if (isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: ../views/welcome.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // validasi input
    if (!$_POST['username'])
        $_SESSION['username_required'] = 'Username harus diisi';
    if (!$_POST['password'])
        $_SESSION['password_required'] = 'Password harus diisi';
    
    if (!$_POST['username'] || !$_POST['password']) {
        header('Location: ../views/login.php');
        exit();
    }

    // set parameter
    $username = $dbCon->real_escape_string($_POST['username']);
    $password = $dbCon->real_escape_string(hash('sha256', $_POST['password']));

    // jalankan query
    $query = $dbCon->query("SELECT * FROM tbl_login WHERE username = '$username' AND password = '$password'");
    $result = $query->fetch_assoc();

    // cek apakah ada data dengan username & password yang dimasukan
    if ($query->num_rows > 0) {

        $_SESSION['success'] = 'Login Berhasil';
        $_SESSION['is_login'] = true;
        $_SESSION['user'] = $result;
        header('Location: ../views/welcome.php');
        exit();

    } else {

        $_SESSION['failed'] = 'Username / password salah, silahkan coba lagi';
        header('Location: ../views/login.php');
        exit();
    }
}