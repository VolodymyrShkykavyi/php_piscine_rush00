<?php
require_once ("db_query.php");
require_once ("get_categories.php");

function get_products_all(){
    $data = db_query(db_connect(), "SELECT * FROM `products`");
    return ($data);
}

function get_products_by_category_id($id){
    if (!is_numeric($id)) {
        return (null);
    }
    $conn = db_connect();
    $id = mysqli_real_escape_string($conn, $id);
    $data = db_query($conn, "SELECT * FROM `products` WHERE `categoryID` = '{$id}'");
    return ($data);
}

function get_products_by_category_name($name){
    $name = trim($name);
    if (!$name)
        return(null);
    $conn = db_connect();
    $category_id = get_category_id_by_name($name);
    if ($category_id == null)
        return(null);
    $data = db_query($conn, "SELECT * FROM `products` WHERE `categoryID` = '{$category_id}'");
    return($data);
}

function get_product_by_name($name){
    $name = trim($name);
    if (!$name)
        return(false);
    $conn = db_connect();
    $name = mysqli_real_escape_string($conn, $name);
    $data = db_query($conn, "SELECT * FROM `products` WHERE `name` = '{$name}'");
    return($data);
}


//echo "by id:<br>";
//$res = get_products_by_category_id("1");
//foreach ($res as $val){
//    echo nl2br(print_r($val, 1));
//}
//
//echo "by name:<br>";
//$res = get_product_by_name("Barsik");
//foreach ($res as $val){
//    echo nl2br(print_r($val, 1));
//}
////
//echo "all:<br>";
//$res = get_products_all();
//foreach ($res as $val){
//    echo nl2br(print_r($val, 1));
//}