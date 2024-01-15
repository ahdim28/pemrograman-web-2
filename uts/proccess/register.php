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
    if (!$_POST['nama'])
        $_SESSION['nama_required'] = 'Nama harus diisi';
    if (!$_POST['email'])
        $_SESSION['email_required'] = 'Email harus diisi';
    if (!$_POST['username'])
        $_SESSION['username_required'] = 'Username harus diisi';
    if (!$_POST['password'])
        $_SESSION['password_required'] = 'Password harus diisi';
    if (strlen($_POST['password']) < 6)
        $_SESSION['password_required'] = 'Password minimal harus 6 karakter diisi';
    if (!$_POST['password_confirm'])
        $_SESSION['password_confirm_required'] = 'Konfirmasi Password harus diisi';
    
    if (!$_POST['nama'] || !$_POST['email'] || !$_POST['username'] || 
        !$_POST['password'] || !$_POST['password_confirm']) {
        header('Location: ../views/register.php');
        exit();
    }

    if (!$_POST['password'] != !$_POST['password_confirm']) {
        $_SESSION['warning'] = 'Password konfirmasi tidak cocok dengan password';
        header('Location: ../views/register.php');
        exit();
    }

    // query select
    $select = "SELECT * FROM tbl_login WHERE";

    $queryEmail = $dbCon->query($select." email = '$_POST[email]' ");
    $checkEmail = $queryEmail->num_rows;
    if ($checkEmail > 0) {
        $_SESSION['warning'] = 'Email sudah terdaftar, silahkan gunakan yang lain';
        header('Location: ../views/register.php');
        exit();
    }

    $queryUsername = $dbCon->query($select." username = '$_POST[username]' ");
    $checkUsername = $queryUsername->num_rows;
    if ($checkUsername > 0) {
        $_SESSION['warning'] = 'Username sudah terdaftar, silahkan gunakan yang lain';
        header('Location: ../views/register.php');
        exit();
    }

    $password = $dbCon->real_escape_string(hash('sha256', $_POST['password']));
    $insertData = $dbCon->query("INSERT INTO tbl_login (nama, email, username, password) VALUES (
        '$_POST[nama]', '$_POST[email]', '$_POST[username]', '$password'
    )");

    if ($insertData === true) {
        $_SESSION['success'] = 'Registrasi berhasil, silahkan login';
        header('Location: ../views/login.php');
        exit();
    } else {
        $_SESSION['failed'] = 'Registrasi gagal, coba lagi';
        header('Location: ../views/register.php');
        exit();
    }
}