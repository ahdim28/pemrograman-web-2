<html>
<head>
   <title>Membuat dan Mengakses Elemen Array</title>
</head>
<body>

<?php

function judul() {
  echo "<h2>Demo ke-2 membuat " .
       "dan mengakses elemen array</h2>";
}

judul();

$pegawai = array("dirut" => "Fredi", 
                 "manager" => "Santoso", 
                 "marketing" => "Shinta");

echo "Pegawai perusahaan XYZ: <br />";
echo "<strong>Dirut:</strong> " . 
        $pegawai["dirut"] . "<br />";
echo "<strong>Manager:</strong> " . 
        $pegawai["manager"] . "<br />";
echo "<strong>Marketing:</strong> " . 
        $pegawai["marketing"] . "<br />";

?>
</body>
</html>