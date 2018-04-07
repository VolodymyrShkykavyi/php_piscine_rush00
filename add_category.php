<?php
require_once ("db_query.php");
require_once ("get_categories.php");

function add_category($name){
    $name = trim($name);
    if (get_category_id_by_name($name) || !$name)
        return (false);
    $conn = db_connect();
    $name = mysqli_real_escape_string($conn, $name);
    $res = db_query($conn, "INSERT INTO `product_categories` (`name`) VALUES ('{$name}');");
    return ($res);
}

function change_category_by_name($name){
    $name = trim($name);
}


//
//$res = add_category(" q");
//echo nl2br(print_r($res, 1));
//var_dump($res);