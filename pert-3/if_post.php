<?php

$angka = $_POST['angka'];
$redirectBack = "<a href='if_form.php'>Kembali</a>";

if ($angka < 1 || $angka > 10) {
    echo "Anda memasukan bilangan : <b>$angka</b><br>";
    echo "<b style='color:red;'>ERROR</b> : <i>Bilangan harus dalam rentang 1 sampai 10</i><br><br>";
    echo $redirectBack;
    exit();
}

echo "Bilangan yang anda masukan adalah <b>$angka</b><br><br>";
echo $redirectBack;