<?php

session_start();

if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    $_SESSION['warning'] = 'Anda harus login untuk mengakses halaman tersebut';
    header("Location: ../views/login.php");
    ob_end_flush();
    exit;
}

$_SESSION = [
    'is_login',
    'user'
];

session_destroy();

$_SESSION['success'] = 'Berhasil keluar';
header('Location: ../views/login.php');
exit();