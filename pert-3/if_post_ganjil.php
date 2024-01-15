<?php

$angka = $_POST['angka'];
$redirectBack = "<a href='if_form.php'>Kembali</a>";

$cekGanjil = ($angka % 2);
if ($cekGanjil != 1 || $angka > 20) {
    echo "Anda memasukan bilangan : <b>$angka</b><br>";
    echo "<b style='color:red;'>ERROR</b> : <i>Bilangan yang anda masukan bukan bilangan ganjil / lebih dari 20</i><br><br>";
    echo $redirectBack;
    exit();
}

echo "Bilangan yang anda masukan adalah bilangan <b style='color:green;'>GANJIL</b> : <b>$angka</b><br><br>";
echo $redirectBack;