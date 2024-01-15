<?php

session_start();

if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    $_SESSION['warning'] = 'Anda harus login untuk mengakses halaman tersebut';
    header("Location: ../views/login.php");
    ob_end_flush();
    exit;
} else {
    header("Location: ../views/admin.php");
    ob_end_flush();
    exit;
}