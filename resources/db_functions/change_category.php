<?php
require_once ("db_query.php");
require_once ("get_categories.php");

function change_category_by_name($old_name, $new_name){
    $old_name = trim($old_name);
    $new_name = trim($new_name);
    if (!$old_name || !$new_name || !get_category_id_by_name($old_name))
        return(false);
    $conn = db_connect();
    $old_name = mysqli_real_escape_string($conn, $old_name);
    $new_name = mysqli_real_escape_string($conn, $new_name);
    $res = db_query($conn,"UPDATE `categories` SET `name`  = '{$new_name}' WHERE `name` = '{$old_name}'");
    return ($res);
}

function change_category_by_id($id, $new_name){
    $new_name = trim($new_name);
    if (!is_numeric($id) || !$new_name || !get_category_name_by_id($id))
        return(false);
    $conn = db_connect();
    $new_name = mysqli_real_escape_string($conn, $new_name);
    $res = db_query($conn,"UPDATE `categories` SET `name`  = '{$new_name}' WHERE `name` = '{$id}'");
    return ($res);
}

//var_dump(change_category_by_name("cat1", "cat2"));