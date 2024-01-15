<?php session_start()?>
<html>
    <head>
        <title>Gambar Captcha</title>
    </head>
    <body>
        <h2>Validasi Captcha</h2>

        <?php
            if (isset($_POST['submit'])) {
                $captcha = $_POST['captcha'];
                if ($captcha == $_SESSION['bilangan']) {
                    echo "Captcha benar...";

                // proses lain yang ajan dilakukan jika false
                } else {
                    echo "Captcha salah...";
                }
                
            }
        ?>
    </body>
</html>