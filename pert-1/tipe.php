<?php

$nim = "9882405222111010";
$nama = "Ahmad Dimyati";
$umur = 23;
$nilai = 3.68;
$status = true;

echo "NIM : ".$nim."<br>";
echo "NAMA : ".$nama."<br>";
print "UMUR : ".$umur; 
print "<br>";
printf("NILAI : %.3f<br>", $nilai);
echo "STATUS : ".($status ? "AKTIF" : "TIDA AKTIF");