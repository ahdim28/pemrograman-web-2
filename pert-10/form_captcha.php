<html>
    <head>
        <title>Membuat Gambar Captcha</title>
    </head>
    <body>
        <form action="validasi_captcha.php" method="POST">
            Masukan bilangan yang tampil pada gambar dibawah ini : <br><br>
            <!-- menampilkan gambar captcha -->
            <img src="captcha.php" alt=""><br><br>
            <input type="text" name="captcha"><br><br>
            <input type="submit" name="submit" value="Kirim">
        </form>
    </body>
</html>