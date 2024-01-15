<html>
<head>
    <meta charset="UTF-8">
    <title>Penanganan Form</title>
</head>
<body>

    <form action="" method="POST">
        Nama Anda : <input type="text" name="nama"><br>
        <input type="submit" name="input" value="input">
    </form>

</body>
</html>

<?php
    if (isset($_POST['input'])) {
        $nama = $_POST['nama'];
        // $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
        echo "Nama anda : <b>$nama</b>";
    }
?>