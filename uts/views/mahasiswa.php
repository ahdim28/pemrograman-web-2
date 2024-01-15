<?php 
    require_once '../proccess/mahasiswa.php';

    if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
        $_SESSION['warning'] = 'Anda harus login untuk mengakses halaman tersebut';
        header("Location: login.php");
        ob_end_flush();
        exit;
    }

    // cek jika proses tambah
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
        if (createMahasiswa($_POST)) {
            $_SESSION['success'] = 'Mahasiswa berhasil ditambahkan';
        } else {
            $_SESSION['failed'] = 'Mahasiswa gagal ditambahkan, coba lagi';
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pemrograman Web II UTS - Mahasiswa</title>

    <?php include 'includes/styles.php'; ?>

    <link rel="stylesheet" href="../../uts/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css" />

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
                       
                        <div class="page-header">
                            <h2 class="header-title">Mahasiswa</h2>
                            <div class="header-sub-title">
                                <nav class="breadcrumb breadcrumb-dash">
                                    <a href="../views/welcome.php" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                                    <a class="breadcrumb-item" href="#">Mahasiswa</a>
                                    <span class="breadcrumb-item active">List</span>
                                </nav>
                            </div>
                        </div>

                        <?php include 'includes/alert.php'; ?>

                        <div class="card">
                            <div class="card-header border bottom">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">List Mahasiswa</h4>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal-form-add" title="Tambah Mahasiswa Baru">
                                            <i class="fa fa-plus mr-1"></i>
                                            Mahasiswa
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-overflow">
                                    <table id="dt-opt" class="table table-striped">
                                        <thead class="text-center">
                                            <tr>
                                                <th style="width: 15px;" rowspan="2">NO</th>
                                                <th rowspan="2">NAMA</th>
                                                <th rowspan="2">PROGRAM STUDI</th>
                                                <th rowspan="2">EMAIL</th>
                                                <th colspan="6">NILAI</th>
                                            </tr>
                                            <tr>
                                                <th>ABSEN</th>
                                                <th>TUGAS</th>
                                                <th>UTS</th>
                                                <th>UAS</th>
                                                <th>NILAI AKHIR</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; foreach (listMahasiswa() as $key => $value) {?>
                                                <tr>
                                                    <td><?= $no++?></td>
                                                    <td>
                                                        <?= $value['nama']?> <br>
                                                        <b>NPM : </b><?= $value['npm']?>
                                                    </td>
                                                    <td>
                                                        <?= $value['prodi']?> <br>
                                                        <b>Fakultas : </b><?= $value['fakultas']?>
                                                    </td>
                                                    <td><?= $value['email']?></td>
                                                    <!-- nilai -->
                                                    <td class="text-center"><?= $value['absen']?></td>
                                                    <td class="text-center"><?= $value['tugas']?></td>
                                                    <td class="text-center"><?= $value['uts']?></td>
                                                    <td class="text-center"><?= $value['uas']?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            $nilai = $value['totalnilai'];
                                                            if ($nilai >= 80) {
                                                                $mutu = 'A';
                                                                $info = 'LULUS';
                                                                $color = 'success';
                                                            } elseif ($nilai >= 70) {
                                                                $mutu = 'B';
                                                                $info = 'LULUS';
                                                                $color = 'info';
                                                            } elseif ($nilai >= 60) {
                                                                $mutu = 'C';
                                                                $info = 'LULUS';
                                                                $color = 'warning';
                                                            } elseif ($nilai >= 50) {
                                                                $mutu = 'D';
                                                                $color = 'danger';
                                                                $info = 'TIDAK LULUS';
                                                            } else {
                                                                $mutu = 'E';
                                                                $info = 'TIDAK LULUS';
                                                                $color = 'danger';
                                                            }
                                                        ?>
                                                        <h5 class="text-<?= $color?>"><?= $nilai?> / <?= $mutu?></h5>
                                                    </td>
                                                    <td class="text-center"><?= $info?></td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>       
                        </div>   

                    </div>
                </div>

                <!-- form add -->
                <div class="modal fade" id="modal-form-add">
                    <div class="modal-dialog" role="document">
                        <form class="modal-content" action="mahasiswa.php" method="POST">
                            <input type="hidden" name="create">
                            <div class="modal-header">
                                <h4>Tambah Mahasiswa baru</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" class="form-control <?= isset($_SESSION['nama_required']) ? 'error' : '' ?>"
                                        name="nama" placeholder="Masukan nama...">
                                    <?php if (isset($_SESSION['nama_required'])) { ?>
                                    <label class="error" for="nama"><?= $_SESSION['nama_required']?></label>
                                    <?php unset($_SESSION['nama_required']); }?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">NPM</label>
                                    <input type="number" class="form-control <?= isset($_SESSION['npm_required']) ? 'error' : '' ?>"
                                        name="npm" placeholder="Masukan NPM...">
                                    <?php if (isset($_SESSION['npm_required'])) { ?>
                                    <label class="error" for="npm"><?= $_SESSION['npm_required']?></label>
                                    <?php unset($_SESSION['npm_required']); }?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Fakultas</label>
                                        <select class="form-control" name="fakultas">
                                            <option value="">--- Pilih ---</option>
                                            <option value="Teknologi dan Informatika">Teknologi dan Informatika</option>
                                            <option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
                                            <option value="Komunikasi dan Desain">Komunikasi dan Desain</option>
                                            <option value="Psikologi">Psikologi</option>
                                        </select>
                                    <?php if (isset($_SESSION['fakultas_required'])) { ?>
                                    <label class="error" for="fakultas"><?= $_SESSION['fakultas_required']?></label>
                                    <?php unset($_SESSION['fakultas_required']); }?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Program Studi</label>
                                        <select class="form-control" name="prodi">
                                            <option value="">--- Pilih ---</option>
                                            <option value="Informatika">Informatika</option>
                                            <option value="Sistem Informatika">Sistem Informatika</option>
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Akuntansi">Akuntansi</option>
                                            <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                            <option value="Psikologi">Psikologi</option>
                                        </select>
                                    <?php if (isset($_SESSION['prodi_required'])) { ?>
                                    <label class="error" for="prodi"><?= $_SESSION['prodi_required']?></label>
                                    <?php unset($_SESSION['prodi_required']); }?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control <?= isset($_SESSION['email_required']) ? 'error' : '' ?>"
                                        name="email" placeholder="Masukan email...">
                                    <?php if (isset($_SESSION['email_required'])) { ?>
                                    <label class="error" for="email"><?= $_SESSION['email_required']?></label>
                                    <?php unset($_SESSION['email_required']); }?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nilai Absen</label>
                                    <input type="number" class="form-control <?= isset($_SESSION['absen_required']) ? 'error' : '' ?>"
                                        name="absen" min="0" max="100" placeholder="Masukan absen...">
                                    <?php if (isset($_SESSION['absen_required'])) { ?>
                                    <label class="error" for="absen"><?= $_SESSION['absen_required']?></label>
                                    <?php unset($_SESSION['absen_required']); }?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nilai Tugas</label>
                                    <input type="number" class="form-control <?= isset($_SESSION['tugas_required']) ? 'error' : '' ?>"
                                        name="tugas" min="0" max="100" placeholder="Masukan tugas...">
                                    <?php if (isset($_SESSION['tugas_required'])) { ?>
                                    <label class="error" for="tugas"><?= $_SESSION['tugas_required']?></label>
                                    <?php unset($_SESSION['tugas_required']); }?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nilai UTS</label>
                                    <input type="number" class="form-control <?= isset($_SESSION['uts_required']) ? 'error' : '' ?>"
                                        name="uts" min="0" max="100" placeholder="Masukan uts...">
                                    <?php if (isset($_SESSION['uts_required'])) { ?>
                                    <label class="error" for="uts"><?= $_SESSION['uts_required']?></label>
                                    <?php unset($_SESSION['uts_required']); }?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nilai UAS</label>
                                    <input type="number" class="form-control <?= isset($_SESSION['uas_required']) ? 'error' : '' ?>"
                                        name="uas" min="0" max="100" placeholder="Masukan uas...">
                                    <?php if (isset($_SESSION['uas_required'])) { ?>
                                    <label class="error" for="uas"><?= $_SESSION['uas_required']?></label>
                                    <?php unset($_SESSION['uas_required']); }?>
                                </div>
                            </div>
                            <div class="modal-footer no-border">
                                <div class="text-right">
                                    <button class="btn btn-default" data-dismiss="modal" title="Tutup">Tutup</button>
                                    <button type="submit" class="btn btn-success" title="Simpan">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php'; ?>

    <script src="../../uts/assets/vendor/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../../uts/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../uts/assets/js/tables/data-table.js"></script>
    
</body>

</html>