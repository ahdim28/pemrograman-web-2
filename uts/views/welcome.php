<?php 
    session_start(); 

    if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
        $_SESSION['warning'] = 'Anda harus login untuk mengakses halaman tersebut';
        header("Location: login.php");
        ob_end_flush();
        exit;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pemrograman Web II UTS - Dashboard</title>

    <?php include 'includes/styles.php'; ?>
</head>

<body>
    <div class="app header-default side-nav-dark">
        <div class="layout">
            <?php include 'includes/header.php'; ?>
            <?php include 'includes/sidebar.php'; ?>

            <!-- Page Container START -->
            <div class="page-container">
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="alert alert-success-gradient">
                            <div class="d-flex align-items-center justify-content-start">
                                <span class="alert-icon">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                                <span>
                                    <strong>Selamat Datang!</strong>
                                    <?= $_SESSION['user']['nama']?> di <b>UTS</b> Pemrograman web II
                                </span>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row m-v-30">
                                    <div class="col-sm-3">
                                        <img class="img-fluid rounded-circle d-block mx-auto m-b-30" src="../../uts/assets/images/avatars/thumb-14.jpg" alt="">
                                    </div>
                                    <div class="col-sm-4 text-center text-sm-left">
                                        <h2 class="m-b-5">Ahmad Dimyati</h2>
                                        <p class="text-opacity m-b-20 font-size-13">
                                            <b>NPM : </b>9882405222111010
                                        </p>
                                        <p class="text-dark"><b>INFORMATIKA</b> - Fakultas Teknologi dan Informatika</p>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <p class="m-t-30 lh-2-2">
                                                    <b>VISI :</b><br>
                                                    Menjadi Fakultas mandiri, terbaik, dan pusat unggulan di bidang  Teknologi 
                                                    Informasi yang terintegrasi dengan iklim technopreneurship tahun 2030.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php'; ?>
    
</body>

</html>