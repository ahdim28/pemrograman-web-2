<html>
    <head>
        <title>Membuat Buku Tamu</title>
    </head>
    <body>
        <h2>Form Pencatatan Buku Tamu</h2>
        Silahkan masukan komentar anda untuk website kami <br><br>
        <form action="do_addentry.php" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="text" name="nama" maxlength="25" size="50">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" maxlength="50" size="50">
                    </td>
                </tr>
                <tr>
                    <td>URL</td>
                    <td>
                        <input type="text" name="url" maxlength="100" size="50">
                    </td>
                </tr>
                <tr>
                    <td>Komentar</td>
                    <td>
                        <textarea name="komentar" cols="50" rows="6"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="kirim" maxlength="25" size="50">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>