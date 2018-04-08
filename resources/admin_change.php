<?php

require_once ("./db_functions/add_category.php");
require_once ("./db_functions/add_product.php");
require_once ("./db_functions/change_category.php");
require_once ("./db_functions/del_category.php");
if (isset($_POST['submit']) && $_POST['submit'] == "Add category") {
	add_category($_POST['addCateg']);
	echo $_POST['addCateg'];
}

if (isset($_POST['add_artName']) && isset($_POST['add_artUrl']) && isset($_POST['add_artDescr']) && isset($_POST['add_artPrice']) && isset($_POST['add_artSku']) && $_POST['submit'] == "Add article") {
	$arr = create_product_arr($_POST['add_artName'], $_POST['add_artUrl'], $_POST['add_artDescr'], $_POST['add_artPrice'], $_POST['add_artSku']);
	add_product($arr);
}
if (isset($_POST['submit']) && $_POST['submit'] == "Change category (by name)") {
	change_category_by_name($_POST['changeCatNameOld'], $_POST['changeCatNameNew']);
}
if (isset($_POST['submit']) && $_POST['submit'] == "Change category (by ID)") {
	change_category_by_id($_POST['changeCatId'], $_POST['changeCatIdNew']);
}
if (isset($_POST['submit']) && $_POST['submit'] == "Delete category (by name)") {
	del_category_by_name($_POST['delCatName']);
}
if (isset($_POST['submit']) && $_POST['submit'] == "Delete category (by ID)") {
	del_category_by_id($_POST['delCatId']);
}

?>