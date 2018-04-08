<?php
session_start();
require_once ("db_functions/orders_func.php");
require_once ("db_functions/get_products.php");

if ($_SESSION['id'] && $_SESSION['login']){
    echo "Order status: ";
    $product_arr = array();
    $error = "";
    foreach ($_SESSION['bucket'] as $value){
        if (!get_product_by_id($value['id']))
            $error = $error . ", {$value['name']}";
        $product_arr[] = $value['id'];
    }
    $error = trim($error, ", ");
    if (strlen($error)){
        echo "FAIL<br/>We aren't sell this products: {$error}<br/>";
    }else {
        if(!add_order($_SESSION['id'], $product_arr)) {
            echo "FAIL<br/>Something going wrong. Please try again later.";
        } else{
            echo "SUCCESS";
        }
    }
}
else {
    echo "<h2 style='color: #BE0000; text-align: center;'>Please login first</h2>";
}