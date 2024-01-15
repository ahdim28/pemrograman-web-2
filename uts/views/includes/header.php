<!-- Header START -->
<div class="header navbar">
    <div class="header-container">
        <div class="nav-logo">
            <a href="../views/welcome.php">
                <div class="logo logo-dark" style="background-image: url('../../uts/assets/images/logo/logo.png')"></div>
                <div class="logo logo-white" style="background-image: url('../../uts/assets/images/logo/logo-white.png')"></div>
            </a>
        </div>
        <ul class="nav-left">
            <li>
                <a class="sidenav-fold-toggler" href="javascript:void(0);">
                    <i class="mdi mdi-menu"></i>
                </a>
                <a class="sidenav-expand-toggler" href="javascript:void(0);">
                    <i class="mdi mdi-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="user-profile dropdown dropdown-animated scale-left">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-img img-fluid" src="../../uts/assets/images/avatars/thumb-14.jpg" alt="">
                </a>
                <ul class="dropdown-menu dropdown-md p-v-0">
                    <li>
                        <ul class="list-media">
                            <li class="list-item p-15">
                                <div class="media-img">
                                    <img src="../../uts/assets/images/avatars/thumb-14.jpg" alt="">
                                </div>
                                <div class="info">
                                    <span class="title text-semibold"><?= $_SESSION['user']['nama']?></span>
                                    <span class="sub-title"><?= $_SESSION['user']['email']?></span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="../../uts/proccess/logout.php" title="Logout">
                            <i class="ti-power-off p-r-10"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Header END -->