<?php if (isset($_SESSION['success'])) {?>
<div class="alert alert-success alert-dismissible fade show">
    <?= $_SESSION['success'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<?php
    unset($_SESSION['success']);
}?>

<?php if (isset($_SESSION['failed'])) {?>
<div class="alert alert-danger alert-dismissible fade show">
    <?= $_SESSION['failed'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<?php
    unset($_SESSION['failed']);
}?>

<?php if (isset($_SESSION['warning'])) {?>
<div class="alert alert-warning alert-dismissible fade show">
    <?= $_SESSION['warning'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<?php
    unset($_SESSION['warning']);
}?>

<?php if (isset($_SESSION['info'])) {?>
<div class="alert alert-info alert-dismissible fade show">
    <?= $_SESSION['info'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<?php
    unset($_SESSION['info']);
}?>