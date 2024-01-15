<?php

session_start();

if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    $_SESSION['warning'] = 'Anda harus login untuk mengakses halaman tersebut';
    header("Location: login.php");
    ob_end_flush();
    exit;
}

include 'dbConnection.php';

function listMahasiswa()
{
    $dbCon = connectToDb();

    $query = $dbCon->query("SELECT * FROM tbl_mahasiswa");

    $rows = [];
    while ($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }

    closeDB($dbCon);

    return $rows;
}

function createMahasiswa(array $input = [])
{
    $dbCon = connectToDb();

    // validasi input
    if (!$input['npm'])
        $_SESSION['npm_required'] = 'NPm harus diisi';
    if (!$input['nama'])
        $_SESSION['nama_required'] = 'Nama harus diisi';
    if (!$input['fakultas'])
        $_SESSION['fakultas_required'] = 'Fakultas harus diisi';
    if (!$input['prodi'])
        $_SESSION['prodi_required'] = 'Prodi harus dipilih';
    if (!$input['email'])
        $_SESSION['email_required'] = 'Email harus diisi';
    if (!$input['absen'])
        $_SESSION['absen_required'] = 'Absen harus diisi';
    if (!$input['tugas'])
        $_SESSION['tugas_required'] = 'Nilai Tugas harus diisi';
    if (!$input['uts'])
        $_SESSION['uts_required'] = 'Nilai UTS harus diisi';
    if (!$input['uas'])
        $_SESSION['uas_required'] = 'Nilai UAS harus diisi';

    if (!$input['npm'] || !$input['nama'] || !$input['fakultas'] || !$input['prodi'] ||
        !$input['email'] || !$input['absen'] || !$input['tugas'] || !$input['uts'] ||
        !$input['uas']) {
        header('Location: ../views/mahasiswa.php');
        exit();
    }

    // query select
    $select = "SELECT * FROM tbl_mahasiswa WHERE";

    // cek npm
    $cekNPM = $dbCon->query($select." npm = '$input[npm]'")->num_rows;
    if ($cekNPM > 0) {
        $_SESSION['warning'] = 'NPM sudah digunakan, silahkan gunakan yang lain';
        header('Location: ../views/mahasiswa.php');
        exit();
    }

    // cek email
    $cekEmail = $dbCon->query($select." email = '$input[email]'")->num_rows;
    if ($cekEmail > 0) {
        $_SESSION['warning'] = 'Email sudah digunakan, silahkan gunakan yang lain';
        header('Location: ../views/mahasiswa.php');
        exit();
    }

    $totalNilai = ($input['absen'] + $input['tugas'] + $input['uts'] + $input['uas']) / 4;

    $create = $dbCon->query("INSERT INTO tbl_mahasiswa (npm, nama, prodi, fakultas, email, absen, tugas, uts, uas, totalnilai)
        VALUES ('$input[npm]', '$input[nama]', '$input[prodi]', '$input[fakultas]', '$input[email]', '$input[absen]', '$input[tugas]', 
            '$input[uts]', '$input[uas]', '$totalNilai')");

    closeDB($dbCon);

    return $create;
}