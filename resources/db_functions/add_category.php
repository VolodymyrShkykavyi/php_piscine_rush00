<?php
require_once ("db_query.php");
require_once ("get_categories.php");

function add_category($name){
    $name = trim($name);
    if (!get_category_id_by_name($name) || !$name)
        return (false);
    $conn = db_connect();
    $name = mysqli_real_escape_string($conn, $name);
    db_query($conn, "INSERT INTO `categories` (`name`) VALUES ('{$name}');");
    return (true);
}



//
//$res = add_category("cat2");
//echo nl2br(print_r($res, 1));
//var_dump($res);