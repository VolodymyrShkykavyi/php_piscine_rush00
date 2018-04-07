<?php
require_once ("db_query.php");

function get_categories_all(){
    $data = db_query(db_connect(), "SELECT * FROM `product_categories`");
    return ($data);
}

function get_category_id_by_name($name){
    if (!$name)
        return(null);
    $conn = db_connect();
    $name = mysqli_real_escape_string($conn, $name);
    $data = db_query($conn, "SELECT `id` FROM `product_categories` WHERE `name` = '{$name}'");
    return($data[0]['id']);
}

function get_category_name_by_id($id){
    if (!is_numeric($id)) {
        return (null);
    }
    $conn = db_connect();
    $id = mysqli_real_escape_string($conn, $id);
    $data = db_query($conn, "SELECT `name` FROM `product_categories` WHERE `id` = {$id}");
    return ($data[0]['name']);
}

/*
$res = get_categories_all();
foreach ($res as $val) {
    echo nl2br(print_r($val, 1));
}

echo "<br/>id by name<br/>";
$res = get_category_id_by_name("Dogs");
echo nl2br(print_r($res, 1));

echo "<br/>name by id<br/>";
$res = get_category_name_by_id(4);
echo nl2br(print_r($res, 1));*/
