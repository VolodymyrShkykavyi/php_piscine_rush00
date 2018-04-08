<?php
// session_start();
require_once ("db_functions/get_products.php");

if (isset($_POST['bucket_del_item'])){
    clear_bucket_item($_POST['bucket_del_item']);
    $_POST['bucket_del_item'] = NULL;
}
if (isset($_POST['bucket_delete'])){
    clear_bucket();
}

function get_bucket()
{
    if (!isset($_SESSION['bucket'])) {
        if ($_COOKIE['bucket']){
            $_SESSION['bucket'] = unserialize($_COOKIE['bucket']);
        }
        else {
            $_SESSION['bucket'] = array();
        }
    }
    @setcookie('bucket', serialize( $_SESSION['bucket']), time() + 86400);
    foreach ($_SESSION['bucket'] as $value) {
        ?>
        <div style="height: 70px; width: 100%;">
            <img style="height: 60px; width:60px; margin: 0 10px; float: left;" src="<?= $value['img']; ?>"/> <?= $value['name']; ?>
            <br/>
            <span>Count:</span> <?=$value['count'];?>
            <span style="float: right; padding-right: 30px;">
                <button type="submit" name="bucket_del_item" value="<?=$value['id'];?>">X</button>
                <input type="hidden" name="submit" value="<?=$value['id'];?>">
            </span>
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
        if (!isset($value['count']))
            continue;
        $total += $value['price'] * $value['count'];
        }
        echo "<br/>Total price: \${$total}<br/><br/>";
}

function clear_bucket_item($id){
    if (!$id)
        return;
    foreach ($_SESSION['bucket'] as $key => $value) {
        if ($value['id'] == $id) {
            echo "in";
            unset($_SESSION['bucket'][$key]);
            return;
        }
    }
}
function clear_bucket(){
    $_SESSION['bucket'] = array();
}