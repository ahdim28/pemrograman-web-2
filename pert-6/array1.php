<html>
    <head>
    <title>Membuat dan Mengakses Elemen Array</title>
    </head>
<body>

<?php

    function judul() {
        echo "<h2>Demo ke-1 membuat dan mengakses elemen array</h2>";
    }

    judul();

    $suku[0] = "Jawa";
    $suku[1] = "Sunda";
    $suku[2] = "Batak";
    $suku[3] = "Minang";
    $suku[4] = "Dayak";

    echo "Beberapa suku di Indonesia: <br />";
    echo $suku[0] . "<br />";
    echo $suku[1] . "<br />";
    echo $suku[2] . "<br />";
    echo $suku[3] . "<br />";
    echo $suku[4] . "<br />";

?>
</body>
</html>