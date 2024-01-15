<html>
    <head>
        <title>Membuat Buku Tamu</title>
    </head>
    <body>
        <?php
            require("koneksiDB.php");

            $sql = "SELECT tanggal, nama, email, url, komentar
                FROM bukutamu ORDER BY tanggal DESC";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num > 0) { ?>
                <table>
                    <tr bgColor="#ddcc45">
                        <td width="80">Tanggal</td>
                        <td width="140">Nama</td>
                        <td width="200">Email</td>
                        <td width="200">URL</td>
                        <td width="250">Komentar</td>
                    </tr>
                    <?php while(list($tanggal, $nama, $email, $url, $komentar) = 
                        mysqli_fetch_array($result)) {?>
                        <tr>
                            <td valign="top"><?= $tanggal ?></td>
                            <td valign="top"><?= $nama ?></td>
                            <td valign="top"><?= $email ?></td>
                            <td valign="top"><a href="<?= $url  ?>">
                                                                    <?= $url ?></a></td>
                            <td valign="top"><?= $komentar ?></td>
                        </tr>
                    <?php }?>
                </table>
            <?php } else {?>
                <i>belum ada komentar.</i>
            <?php }
        ?>

        <br><br>

        <div>
            [<a href="addentry.php">Isi Buku Tamu</a>]
        </div>
    </body>
</html>