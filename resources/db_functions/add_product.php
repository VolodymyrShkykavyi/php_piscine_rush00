<?php
require_once ("db_query.php");
require_once ("get_products.php");
require_once ("get_categories.php");

function add_product($arr){
    if (empty($arr) || empty($arr['name']) || empty($arr['categoriesId']) || empty($arr['img']) ||
        empty($arr['description']) || empty($arr['price']) ||
        !is_numeric($arr['price']))
        return (false);
    foreach ($arr['categoriesId'] as &$id){
    	$id = trim($id);
    	if (!$id || !is_numeric($id) || $id < 0 ||
			!get_category_name_by_id($id))
    		return(false);
	}
    $conn = db_connect();
    $arr['name'] = mysqli_real_escape_string($conn, trim($arr['name']));
    $arr['img'] = mysqli_real_escape_string($conn, trim($arr['img']));
    $arr['description'] = mysqli_real_escape_string($conn, trim($arr['description']));
    $arr['price'] = mysqli_real_escape_string($conn, trim($arr['price']));
    $arr['SKU'] = mysqli_real_escape_string($conn, trim($arr['SKU']));

    $sql = "INSERT INTO `products`
(`name`, `img`, `description`, `price`, `SKU`) VALUES 
('{$arr['name']}', '{$arr['img']}', '{$arr['description']}', '{$arr['price']}', '{$arr['SKU']}');
";
    db_query($conn, $sql);
    $productId = db_query(db_connect(), "SELECT `id` FROM `products` WHERE `name` = '{$arr['name']}' LIMIT 1;")[0]['id'];
    $sql = "INSERT INTO `product_categories` (`productId`, `categoryId`) VALUES ";
	foreach ($arr['categoriesId'] as $value){
		$sql = $sql . " ('{$productId}', '{$value}'), ";
	}
	$sql = trim($sql, " ,");
	db_query(db_connect(), $sql);
    return (true);
}

function add_product_category($product_id, $category_id){
	$product_id = trim($product_id);
	$category_id = trim($category_id);
	if (!is_numeric($product_id) || !is_numeric($category_id) || $product_id < 1 || $category_id < 1)
		return(false);
	if (!get_product_by_id($product_id) || !get_category_name_by_id($category_id))
		return(false);
	db_query(db_connect(), "INSERT INTO `product_categories` (`productId`, `categoryId`) VALUES ('{$product_id}', '{$category_id}');");
	return(true);
}

function create_product_arr($name, $categories_arr, $img_url, $decr, $price, $sku=0){
    if (!$name || empty($categories_arr) || !$img_url || !$decr || !$price ||
        !is_numeric($price) || !is_numeric($sku)){
        return(null);
    }
    $categories_id = array();
    foreach ($categories_arr as &$value){
    	$value = trim($value);
    	if (!is_numeric($value)) {
    	    if (!empty($cat_id = get_category_id_by_name($value)))
			    $categories_id[] = $cat_id;
		}
		elseif($value){
    	    if (get_category_name_by_id($value))
    		    $categories_id[] = $value;
		}
	}
    if (empty($categories_id) || get_product_by_name($name))
        return(null);
    $arr = array('name' => $name, 'categoriesId' => $categories_id, 'img' => $img_url, 'description' => $decr,
        'price' => $price, 'SKU' => $sku);
    return($arr);
}

//add_product(create_product_arr("myproduct008", ['1', 'Dogs'], "url", "descr", "123", 1));