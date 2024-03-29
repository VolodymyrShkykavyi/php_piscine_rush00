<?php

require_once ("db_query.php");
require_once ("get_products.php");
require_once ("users_func.php");

function add_order($userId, $products_arr, $price){
    $userId = trim($userId);
    $price = trim($price);
    if (!$userId || !get_user_by_id($userId) || empty($products_arr) ||
        !$price || $price < 0 || !is_numeric($price))
        return(false);
    foreach ($products_arr as &$value){
        $id = trim($value['id']);
        $count = trim($value['count']);
        if (!is_numeric($id) || !get_product_by_id($id) || !is_numeric($count) || $count < 1){
            return(false);
        }
    }

    $conn = db_connect();
    $data = mysqli_real_escape_string($conn, serialize($products_arr));
    db_query($conn, "INSERT INTO `orders` (`userID`, `products`, `price`) VALUES ('{$userId}', '{$data}', {$price});");
    return(true);
}

function get_order_by_id($id){
    $id = trim($id);
    if (!$id || $id < 0 || !is_numeric($id))
        return(false);
    $res = db_query(db_connect(), "SELECT * FROM `orders` WHERE `id` = '{$id}' LIMIT 1;");
    if (empty($res))
        return(false);
    return($res[0]);
}

function get_orders_by_user_id($id){
    $id = trim($id);
    if (!$id || $id < 0 || !is_numeric($id) || !get_user_by_id($id))
        return(false);
    $res = db_query(db_connect(), "SELECT * FROM `orders` WHERE `userID` = '{$id}'");
    return($res);
}

function del_order_by_id($id){
    if (!$id || empty(get_order_by_id($id)))
        return(false);
    db_query(db_connect(), "DELETE FROM `orders` WHERE `id` = '{$id}'");
    return (true);
}

function get_orders_all(){
    return (db_query(db_connect(), "SELECT * FROM `orders`"));
}

//var_dump(add_order(1, [1, 2, 4]));

//var_dump(get_order_by_id(1));

//var_dump(get_orders_by_user_id(1));

//var_dump(del_order_by_id(3));

//var_dump(get_orders_all());