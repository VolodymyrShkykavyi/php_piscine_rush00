<?php
require_once ("db_query.php");
require_once ("get_products.php");
require_once ("get_categories.php");

function add_product($arr){
    if (empty($arr) || empty($arr['name']) || empty($arr['categoryID']) || empty($arr['img']) ||
        empty($arr['description']) || empty($arr['price']) || empty($arr['SKU']) ||
        !is_numeric($arr['price']) || !is_numeric($arr['SKU']) || !is_numeric($arr['categoryID']))
        return (false);
    $conn = db_connect();
    $arr['name'] = mysqli_real_escape_string($conn, trim($arr['name']));
    $arr['categoryID'] = mysqli_real_escape_string($conn, trim($arr['categoryID']));
    $arr['img'] = mysqli_real_escape_string($conn, trim($arr['img']));
    $arr['description'] = mysqli_real_escape_string($conn, trim($arr['description']));
    $arr['price'] = mysqli_real_escape_string($conn, trim($arr['price']));
    $arr['SKU'] = mysqli_real_escape_string($conn, trim($arr['SKU']));

    $sql = "INSERT INTO `products`
(`name`, `categoryID`, `img`, `description`, `price`, `SKU`) VALUES 
('{$arr['name']}', '{$arr['categoryID']}', '{$arr['img']}', '{$arr['description']}', '{$arr['price']}', '{$arr['SKU']}');
";
    db_query($conn, $sql);
    return (true);
}

function create_product_arr($name, $category_name, $img_url, $decr, $price, $sku){
    if (!$name || !$category_name || !$img_url || !$decr || !$price || !$sku ||
        !is_numeric($price) || !is_numeric($sku)){
        return(null);
    }
    $category_id = get_category_id_by_name($category_name);
    if (!$category_id || get_product_by_name($name))
        return(null);
    $arr = array('name' => $name, 'categoryID' => $category_id, 'img' => $img_url, 'description' => $decr,
        'price' => $price, 'SKU' => $sku);
    return($arr);
}
