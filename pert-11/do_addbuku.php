<html>
    <head>
        <title>Membuat Pagination</title>
    </head>
    <body>
        <?php
            if (isset($_POST['btnSubmit'])) {
                $judul = $_POST["judul"];
                $pengarang = $_POST["pengarang"];
                $jmlhalaman = $_POST["jmlhalaman"];
                $harga = $_POST["harga"];
                $penerbit = $_POST["penerbit"];

                require("koneksiDB.php");

                // proses upload
                $tempfile = isset($_FILES["gambar"]) ? $_FILES["gambar"]["tmp_name"] : '';
                $filename = isset($_FILES["gambar"]) ? $_FILES["gambar"]["name"] : '';

                $targetDir = getcwd() . "\\" . $filename;
                if ($tempfile) {
                    copy($tempfile, $targetDir);
                }

                $targetDir = str_replace("\\", ":/:", $targetDir);

                $sql = "INSERT INTO buku (judul, pengarang, jmlhalaman, harga, penerbit, gambar)
                    VALUES ('$judul', '$pengarang', '$jmlhalaman', '$harga', '$penerbit', 'load_file($targetDir)')";

                mysqli_query($conn, $sql);
                $num  = mysqli_affected_rows($conn);

                if ($num > 0) { ?>
                    <p><strong>Data telah disimpan</strong></p>
                    <p><a href="listbuku.php">Lihat Daftar Buku</a></p>
                <?php } else {?>
                    <h2>Error</h2>
                    Proses penyimpanan data gagal. Silahkan ulangi
                    <br/>
                    <a href="addbuku.php">
                    Kembali ke form Entry Buku
                <?php }
            }
        ?>
    </body>
</html>