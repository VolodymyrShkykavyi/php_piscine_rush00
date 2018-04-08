<?php

require_once ("db_query.php");
require_once ("get_products.php");
require_once ("users_func.php");

function add_order($userId, $products_id_arr){
    $userId = trim($userId);
    if (!$userId || !get_user_by_id($userId) || empty($products_id_arr))
        return(false);
    foreach ($products_id_arr as &$value){
        $value = trim($value);
        if (!is_numeric($value) || !get_product_by_id($value)){
            return(false);
        }
    }
    $conn = db_connect();
    $data = mysqli_real_escape_string($conn, serialize($products_id_arr));
    db_query($conn, "INSERT INTO `orders` (`userID`, `products`) VALUES ('{$userId}', '{$data}');");
    return(true);
}

//var_dump(add_order(3, [1, 2, 3]));