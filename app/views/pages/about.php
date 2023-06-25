<?php
    require APPROOT . '/views/inc/header.php';
?>
    <h1><?= $data['title'] ?></h1>
    <p><?= $data['desc'] ?></p>
    <p><strong><?= APPVERSION ?></strong></p>
<?php
    require APPROOT . '/views/inc/footer.php';
?>