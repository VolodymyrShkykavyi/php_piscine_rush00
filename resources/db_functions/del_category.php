<?php
require_once ("db_query.php");
require_once ("get_categories.php");

function del_category_by_name($name){
    $name = trim($name);
	$id = get_category_id_by_name($name);
	if (!$name || !$id)
        return (false);
    $conn = db_connect();
    $name = mysqli_real_escape_string($conn, $name);
    db_query($conn, "DELETE FROM `categories` WHERE `name` = '{$name}'");
	db_query(db_connect(), "DELETE FROM `product_categories` WHERE `categoryId` = {$id}");
	return(true);
}

function del_category_by_id($id){
    if (!$id || !get_category_name_by_id($id))
        return(false);
    db_query(db_connect(), "DELETE FROM `categories` WHERE `id` = '{$id}'");
	db_query(db_connect(), "DELETE FROM `product_categories` WHERE `categoryId` = {$id}");
    return (true);
}

//del_category_by_id(3);
//del_category_by_name('Phones');