<?php

$y = date('Y');
$m = date('m');
$d = date('d');

$bln = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
];

$bulan = $bln[$m+1];
$tahun = $y;
$jam = date('H:i:s');
$hari_ini = "$d $bulan $y";