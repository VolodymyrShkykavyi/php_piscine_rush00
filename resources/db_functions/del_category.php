<?php
require_once ("db_query.php");

function del_category_by_name($name){
    $name = trim($name);
    if (!$name || !get_category_id_by_name($name))
        return (false);
    $conn = db_connect();
    $name = mysqli_real_escape_string($conn, $name);
    db_query($conn, "DELETE FROM `product_categories` WHERE `name` = '{$name}'");
    return(true);
}

function del_category_by_id($id){
    if (!$id || !get_category_name_by_id($id))
        return(false);
    db_query(db_connect(), "DELETE FROM `product_categories` WHERE `id` = '{$id}'");
    return (true);
}