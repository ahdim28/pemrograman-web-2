<html>
    <head>
        <title>Membuat Buku Tamu</title>
    </head>
    <body>
        <?php
            if (isset($_POST['kirim'])) {
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $url = $_POST['url'];
                $komentar = $_POST['komentar'];

                require("koneksiDB.php");
                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date('Y/m/d');

                $sql = "INSERT INTO bukutamu (tanggal, nama, email, url, komentar)
                    VALUES ('$tanggal', '$nama', '$email', '$url', '$komentar')";

                mysqli_query($conn, $sql);
                $num = mysqli_affected_rows($conn);

                if ($num > 0) { ?>
                    <h2>Terima Kasih</h2>
                    <strong><?= $nama ?></strong>,
                    Komentar anda telah terkirim ke server kami. <br>
                    [<a href="listentry.php">Lihat Daftar Komentar</a>]
                    <br><br>
                <?php } else { ?>
                    <h2>Error</h2>
                    Proses pencatatan buku gagal. Silahkan ulangi ! <br>
                    [<a href="addentry.php">Kembali ke form pencatatan buku</a>]
                <?php }
            }
        ?>
    </body>
</html>