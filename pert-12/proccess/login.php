<?php

include '../helper/koneksi.php';
$dbCon = bukaKoneksiDb();

if (isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: ../views/admin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // validasi input
    if (!$_POST['userid'])
        $_SESSION['userid_required'] = 'User ID harus diisi';
    if (!$_POST['password'])
        $_SESSION['password_required'] = 'Password harus diisi';
    
    if (!$_POST['userid'] || !$_POST['password']) {
        header('Location: ../views/login.php');
        exit();
    }

    // set parameter
    $userid = $dbCon->real_escape_string($_POST['userid']);
    $password = $dbCon->real_escape_string(hash('sha256', $_POST['password']));

    // jalankan query
    $query = $dbCon->query("SELECT * FROM admin WHERE userid = '$userid' AND password = '$password'");
    $result = $query->fetch_assoc();

    // cek apakah ada data dengan userid & password yang dimasukan
    if ($query->num_rows > 0) {

        $_SESSION['success'] = 'Login Berhasil';
        $_SESSION['is_login'] = true;
        $_SESSION['user'] = $result;
        header('Location: ../views/admin.php');
        exit();

    } else {

        $_SESSION['failed'] = 'userid / password salah, silahkan coba lagi';
        header('Location: ../views/login.php');
        exit();
    }
}