<html>
    <head>
        <title>Membuat Pagination</title>
    </head>
    <body>
        <h2>Form Entry Data Buku</h2>
        <form action="do_addbuku.php" method="POST">
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul" maxlength="60" size="60"></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td><input type="text" name="pengarang" maxlength="25" size="50"></td>
                </tr>
                <tr>
                    <td>Jumlah Halaman</td>
                    <td><input type="text" name="jmlhalaman" maxlength="4" size="10"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" maxlength="6" size="20"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type="text" name="penerbit" maxlength="35" size="50"></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="hidden" name="MAX_FILE_SIZE" value="500000"></td>
                    <td><input type="file" name="gambar" size="50"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="btnSubmit" value="simpan"></td>
                </tr>
            </table>
        </form>
    </body>
</html>