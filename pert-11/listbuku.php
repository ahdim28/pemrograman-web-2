<html>
    <head>
        <title>Membuat Pagination</title>
    </head>
    <body>
        <?php
            require("koneksiDB.php");

            $sql = "SELECT judul, pengarang, jmlhalaman, harga, penerbit FROM buku ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num > 0) { ?>
                <table>
                    <tr bgColor="#ddcc45">
                        <td width="80">Judul</td>
                        <td width="140">Pengarang</td>
                        <td width="200">Jumlah Halaman</td>
                        <td width="200">Harga</td>
                        <td width="250">Penerbit</td>
                    </tr>
                    <?php while(list($judul, $pengarang, $jmlhalaman, $harga, $penerbit) = 
                        mysqli_fetch_array($result)) {?>
                        <tr>
                            <td valign="top"><?= $judul ?></td>
                            <td valign="top"><?= $pengarang ?></td>
                            <td valign="top"><?= $jmlhalaman ?></td>
                            <td valign="top"><?= $harga ?></td>
                            <td valign="top"><?= $penerbit ?></td>
                        </tr>
                    <?php }?>
                </table>
            <?php } else {?>
                <i>belum ada buku.</i>
            <?php }
        ?>

        <br><br>

        <div>
            [<a href="addbuku.php">Isi Data Buku</a>]
        </div>
    </body>
</html>