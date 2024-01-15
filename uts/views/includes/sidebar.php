<?php

$currentUrl = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($currentUrl, '/'));
$segment = end($segments);

?>
<!-- Side Nav START -->
<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="side-nav-header">
                <span>Navigation</span>
            </li>
            <li class="<?= $segment == 'welcome.php' ? 'active' : ''?>">
                <a href="../views/welcome.php">
                    <span class="icon-holder">
                        <i class="fa fa-tachometer"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="<?= $segment == 'mahasiswa.php' ? 'active' : ''?>">
                <a href="../views/mahasiswa.php">
                    <span class="icon-holder">
                        <i class="fa fa-users"></i>
                    </span>
                    <span class="title">Mahasiswa</span>
                </a>
            </li>
            <li class="<?= $segment == 'perhitungan.php' ? 'active' : ''?>">
                <a href="../views/perhitungan.php">
                    <span class="icon-holder">
                        <i class="fa fa-calculator"></i>
                    </span>
                    <span class="title">Perhitungan</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->