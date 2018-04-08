<?php
session_start();
require_once ("db_functions/get_products.php");
function get_bucket()
{
    if (!isset($_SESSION['bucket'])) {
        $_SESSION['bucket'] = array();
    }
    foreach ($_SESSION['bucket'] as $value) {
        ?>
        <div style="height: 70px; width: 100%;">
            <img style="height: 60px; width:60px; margin: 0 10px; float: left;" src="<?= $value['img']; ?>"/> <?= $value['name']; ?>
            <br/>
            <span>Count:</span> <?=$value['count'];?>
            <br/>
            <span>Price: $<?=$value['count'] * $value['price']; ?></span>
        </div>
        <?php
    }
}

function add_tobucket($id){
    if (!$id){
        return;
    }
    if (!isset($_SESSION['bucket'])) {
        $_SESSION['bucket'] = array();
    }
    $product = get_product_by_id($id);
    if (!$product)
        return;
    $count = 1;
    foreach ($_SESSION['bucket'] as &$value){
        if ($value['id'] == $id){
            $value['count']++;
            return;
        }
    }
    $_SESSION['bucket'][] = array('id' => $id, 'name' => $product['name'], 'img' => $product['img'], 'price' => $product['price'], 'count' => $count);
}

function bucket_total_price(){
    $total = 0;
    foreach ($_SESSION['bucket'] as $value){
        $total += $value['price'] * $value['count'];
        }
        echo "<br/>Total price: \${$total}<br/><br/>";
}

function clear_bucket(){
    $_SESSION['bucket'] = array();
}