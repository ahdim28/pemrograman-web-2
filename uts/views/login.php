<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pemrograman Web II UTS - Login</title>

    <?php include 'includes/styles.php'; ?>
</head>

<body>
    
    <div class="app">
        <div class="layout bg-gradient-info">
            <div class="container">
                <div class="row full-height align-items-center">
                    <div class="col-md-7 d-none d-md-block">
                        <img class="img-fluid" src="assets/images/logo/logo-white.png" alt="">
                        <div class="m-t-15 m-l-20">
                            <h1 class="font-weight-light font-size-35 text-white">UNIBI</h1>
                            <p class="text-white width-70 text-opacity m-t-25 font-size-16">
                            Universitas Informatika dan Bisnis Indonesia (UNIBI) merupakan penggabungan dari Politeknik 
                            Ganesha Bandung dengan Sekolah Tinggi Ilmu Ekonomi (STIE) Pelita Nusantara, berdasarkan Surat 
                            Keputusan Menteri Pendidikan Nasional Republik Indonesia Nomor 70/D/O/2007 tanggal 24 Mei 2007.
                            </p>
                            <div class="m-t-60">
                                <b class="text-white text-link m-r-15">Ahmad Dimyati</b>
                                <i class="text-white text-link">9882405222111010</i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <div class="p-h-15 p-v-40">
                                    <h2>Login</h2>
                                    <p class="m-b-15 font-size-13">Masuk dengan akun anda.</p>


                                    <?php include 'includes/alert.php'; ?>

                                    <form action="../proccess/login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" 
                                                class="form-control <?= isset($_SESSION['username_required']) ? 'error' : '' ?>" 
                                                name="username" placeholder="Masukan username...">
                                            <?php if (isset($_SESSION['username_required'])) { ?>
                                            <label class="error" for="username"><?= $_SESSION['username_required']?></label>
                                            <?php unset($_SESSION['username_required']); }?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control <?= isset($_SESSION['password_required']) ? 'error' : '' ?>" 
                                            name="password" placeholder="Masukan password">
                                            <?php if (isset($_SESSION['password_required'])) { ?>
                                            <label class="error" for="password"><?= $_SESSION['password_required']?></label>
                                            <?php unset($_SESSION['password_required']); }?>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-lg btn-gradient-success" title="Login">
                                            Login
                                        </button>
                                        <div class="text-center m-t-30">
                                            <a href="register.php" class="text-gray text-link text-opacity">Registrasi</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php'; ?>
    
</body>

</html>