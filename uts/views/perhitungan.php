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
    <title>Pemrograman Web II UTS - Perhitungan</title>

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
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header border bottom">
                                        <h4 class="card-title">Mengitung Luas dan Keliling Lingkaran</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label">Jari - Jari Lingkaran</label>
                                            <input type="number" min="0" class="form-control" name="radius" id="radius" placeholder="Masukan jari jari lingkaran...">
                                        </div>
                                        <div class="form-group" id="hasil-lingkaran">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">HASIL</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 50%;">LUAS KELILING</th>
                                                        <th>KELILING LINGKARAN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h4 id="luas"></h4></td>
                                                        <td><h4 id="keliling"></h4></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="button" class="btn btn-info" onclick="hitungLingkaran()" title="Hitung">HITUNG</button>
                                        <a href="../../uts/views/perhitungan.php" class="btn btn-default" title="Clear">CLEAR</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header border bottom">
                                        <h4 class="card-title">Menghitung Luas Segitiga dan Sisi Miring Segitiga Siku-siku</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label">Panjang Alas</label>
                                            <input type="number" min="0" class="form-control" name="alas" id="alas" placeholder="Masukan panjang alas...">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tinggi Alas</label>
                                            <input type="number" min="0" class="form-control" name="tinggi" id="tinggi" placeholder="Masukan tinggi alas...">
                                        </div>
                                        <div class="form-group" id="hasil-segitiga">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">HASIL</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 50%;">LUAS SEGITIGA</th>
                                                        <th>SISI MIRING</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h4 id="luas2"></h4></td>
                                                        <td><h4 id="sisiMiring"></h4></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="button" class="btn btn-info" onclick="hitungSegitiga()" title="Hitung">HITUNG</button>
                                        <a href="../../uts/views/perhitungan.php" class="btn btn-default" title="Clear">CLEAR</a>
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

    <script>
        $('#hasil-lingkaran').hide();
        function hitungLingkaran() {

            var radius = document.getElementById('radius').value;
            if (!radius) {
                alert('Jari - jari lingkaran harus diisi');
                $('#hasil-lingkaran').hide();
            } else {
                
                $('#hasil-lingkaran').show();

                var luas = Math.PI * Math.pow(radius, 2);
                var keliling = 2 * Math.PI * radius;

                // Menampilkan hasil
                document.getElementById('luas').innerHTML = luas.toFixed(2);
                document.getElementById('keliling').innerHTML = keliling.toFixed(2);

            }
        }

        $('#hasil-segitiga').hide();
        function hitungSegitiga() {
            var alas = document.getElementById('alas').value;
            var tinggi = document.getElementById('tinggi').value;

            if (!alas || !tinggi) {
                alert('Panjang dan Tinggi alas harus diisi');
                $('#hasil-segitiga').hide();
            } else {

                $('#hasil-segitiga').show();

                var luas = 0.5 * alas * tinggi;
                var sisiMiring = Math.sqrt(Math.pow(alas, 2) + Math.pow(tinggi, 2));
    
                document.getElementById('luas2').innerHTML = luas.toFixed(2);
                document.getElementById('sisiMiring').innerHTML = sisiMiring.toFixed(2);
            }
            }
    </script>
    
</body>

</html>