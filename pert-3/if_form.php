<html>
<head>
    <title>Pengkondisian IF</title>
</head>
<body>

    <h4>Pengkondisian IF ELSE</h4>
    <hr>
    
    <form action="if_post.php" method="POST">
        <label for="angka">Masukan bilangan bulat antra 1 sampai 10 :</label><br>
        <input type="number" name="angka" placeholder="Masukan bilangan..." required> <br><br>
        <button type="submit">Submit</button>
    </form>
    <br>
    <hr>

    <form action="if_post_ganjil.php" method="POST">
        <label for="angka">Masukan bilangan ganjil dari 1 sampai 20 :</label><br>
        <input type="number" name="angka" placeholder="Masukan bilangan ganjil..." required> <br><br>
        <button type="submit">Submit</button>
    </form>

    <br>
    <hr>

    <form action="if_else_post.php" method="POST">
        <label for="angka">Masukan bilangan :</label><br>
        <input type="number" name="bilangan" placeholder="Masukan bilangan..." required> <br><br>
        <button type="submit">Submit</button>
    </form>

</body>
</html>