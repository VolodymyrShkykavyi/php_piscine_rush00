<?php
session_start();

function get_bucket()
{
    if (!isset($_SESSION['bucket'])) {
        $_SESSION['bucket'] = array();
    }
    foreach ($_SESSION['bucket'] as $value) {
        ?>
        <div style="max-height: 70px; text-align: center">
            <img style="height: 60px;" src="<?= $value['img']; ?>"/> <?= $value['name']; ?>
        </div>
        <?php
    }
}

function add_tobucket($name, $img, $price){
    if (!$name || !$img || !$price){
        return;
    }
    if (!isset($_SESSION['bucket'])) {
        $_SESSION['bucket'] = array();
    }
    $_SESSION['bucket'][] = array('name' => $name, 'img' => $img, 'price' => $price);
}