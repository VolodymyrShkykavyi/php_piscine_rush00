<?php
function del_product_by_id($id){
	if (!$id || empty(get_product_by_id($id)))
		return(false);
	db_query(db_connect(), "DELETE FROM `products` WHERE `id` = '{$id}'");
	db_query(db_connect(), "DELETE FROM `product_categories` WHERE `productId` = {$id}");
	return (true);
}

function del_product_category($product_id, $category_id){
	$product_id = trim($product_id);
	$category_id = trim($category_id);
	if (!is_numeric($product_id) || !is_numeric($category_id) || $product_id < 1 || $category_id < 1)
		return(false);
	if (!get_product_by_id($product_id) || !get_category_name_by_id($category_id))
		return(false);
	db_query(db_connect(),
		"DELETE FROM `product_categories` WHERE `productId` = '{$product_id}' AND `categoryId` = '{$category_id}';");
	return(true);
}