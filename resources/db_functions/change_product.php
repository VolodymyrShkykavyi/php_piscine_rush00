<?php

require_once ("db_query.php");
require_once ("get_products.php");
require_once ("add_product.php");
require_once ("del_product.php");

//TODO: categories change
function change_product_by_id($id, $arr){
	if (!is_numeric($id) || $id < 1 || empty($arr) || !get_product_by_id($id))
		return(false);
	$conn = db_connect();
	$res_arr = array();
	if (trim($arr['name']))
		$res_arr['name'] = mysqli_real_escape_string($conn, trim($arr['name']));
	if (trim($arr['img']))
		$res_arr['img'] = mysqli_real_escape_string($conn, trim($arr['img']));
	if (trim($arr['description']))
		$res_arr['description'] = mysqli_real_escape_string($conn, trim($arr['description']));
	if (trim($arr['price']))
		$res_arr['price'] = mysqli_real_escape_string($conn, trim($arr['price']));
	if (trim($arr['SKU']))
		$res_arr['SKU'] = mysqli_real_escape_string($conn, trim($arr['SKU']));
	$sql = "UPDATE `products` SET ";
	if (empty($res_arr))
		return(false);
	foreach ($res_arr as $key => $value){
		$sql = $sql . " `{$key}`='{$value}', ";
	}
	$sql = trim($sql, ", ");
	$sql = $sql . " WHERE `id` = '{$id}';";
	db_query($conn, $sql);
	return(true);
}

//var_dump(change_product_by_id(4, ['name' => 'dooogisdfi', 'SKU' => '12']));