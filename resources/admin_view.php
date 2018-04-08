<?php

require_once("./db_functions/get_categories.php");
require_once("./db_functions/get_products.php");
require_once("./db_functions/users_func.php");

if (isset($_POST['submit']) && $_POST["submit"] == "View categories") {
	echo '<tr>';
	echo '<th>Id</th>';
	echo '<th>Name</th>';
	echo '</tr>';

 	$res = get_categories_all();
	foreach ($res as $val) {
		echo '<tr>';
    	echo '<td>' . $val['id'] . '</td>';
    	echo '<td>' . $val['name'] . '</td>';
		echo '</tr>';
	}
}
if (isset($_POST['submit']) && $_POST['submit'] == "View articles") {
	echo '<tr>';
	echo '<th>Id</th>';
	echo '<th>Name</th>';
	echo '<th>Image URL</th>';
	echo '<th>Description</th>';
	echo '<th>Price</th>';
	echo '<th>SKU</th>';
	echo '</tr>';

 	$res = get_products_all();
	foreach ($res as $val) {
		echo '<tr>';
    	echo '<td>' . $val['id'] . '</td>';
    	echo '<td>' . $val['name'] . '</td>';
    	echo '<td>' . $val['img'] . '</td>';
    	echo '<td>' . $val['description'] . '</td>';
    	echo '<td>' . $val['price'] . '</td>';
    	echo '<td>' . $val['SKU'] . '</td>';
		echo '</tr>';
	}
}
if (isset($_POST['submit']) && $_POST['submit'] == "View users") {
	echo '<tr>';
	echo '<th>Id</th>';
	echo '<th>Login</th>';
	echo '<th>e-mail</th>';
	echo '<th>Hashed password</th>';
	echo '<th>Is admin</th>';
	echo '</tr>';

 	$res = get_users_all();
	foreach ($res as $val) {
		echo '<tr>';
    	echo '<td>' . $val['id'] . '</td>';
    	echo '<td>' . $val['login'] . '</td>';
    	echo '<td>' . $val['email'] . '</td>';
    	echo '<td>' . $val['password'] . '</td>';
    	echo '<td>' . $val['is_admin'] . '</td>';
		echo '</tr>';
	}
}
if (isset($_POST['submit']) && $_POST['submit'] == "View category (by ID)") {
	echo get_category_name_by_id($_POST['viewCatId']);
}
if (isset($_POST['submit']) && $_POST['submit'] == "View category ID") {
	echo get_category_id_by_name($_POST['viewCatName']);
}
if (isset($_POST['submit']) && $_POST['submit'] == "View articles (by category)") {
	echo '<tr>';
	echo '<th>Id</th>';
	echo '<th>Name</th>';
	echo '<th>Image URL</th>';
	echo '<th>Description</th>';
	echo '<th>Price</th>';
	echo '<th>SKU</th>';
	echo '</tr>';

 	if ($res = get_products_by_category_name($_POST['viewArtiByCatName'])) {
	foreach ($res as $val) {
		echo '<tr>';
    	echo '<td>' . $val['id'] . '</td>';
    	echo '<td>' . $val['name'] . '</td>';
    	echo '<td>' . $val['img'] . '</td>';
    	echo '<td>' . $val['description'] . '</td>';
    	echo '<td>' . $val['price'] . '</td>';
    	echo '<td>' . $val['SKU'] . '</td>';
		echo '</tr>';
	}
	}
}
if (isset($_POST['submit']) && $_POST['submit'] == "View article (by name)") {
	echo '<tr>';
	echo '<th>Id</th>';
	echo '<th>Name</th>';
	echo '<th>Image URL</th>';
	echo '<th>Description</th>';
	echo '<th>Price</th>';
	echo '<th>SKU</th>';
	echo '</tr>';

 	if ($res = get_product_by_name($_POST['viewArtiByName'])) {
	foreach ($res as $val) {
		echo '<tr>';
    	echo '<td>' . $val['id'] . '</td>';
    	echo '<td>' . $val['name'] . '</td>';
    	echo '<td>' . $val['img'] . '</td>';
    	echo '<td>' . $val['description'] . '</td>';
    	echo '<td>' . $val['price'] . '</td>';
    	echo '<td>' . $val['SKU'] . '</td>';
		echo '</tr>';
	}
	}
}
if (isset($_POST['viewUseriById']) && isset($_POST['submit']) && $_POST['submit'] == "View user (by ID)") {
	echo '<tr>';
	echo '<th>Id</th>';
	echo '<th>Login</th>';
	echo '<th>e-mail</th>';
	echo '<th>Hashed password</th>';
	echo '<th>Is admin</th>';
	echo '</tr>';

 	$res = get_user_by_id($_POST['viewUseriById']);
 	if ($res && isset($res['id']) && isset($res['login']) && isset($res['email']) && isset($res['password']) && isset($res['is_admin'])) {
		echo '<tr>';
    	echo '<td>' . $res['id'] . '</td>';
    	echo '<td>' . $res['login'] . '</td>';
    	echo '<td>' . $res['email'] . '</td>';
    	echo '<td>' . $res['password'] . '</td>';
    	echo '<td>' . $res["is_admin"] . '</td>';
		echo '</tr>';
	}
}
if (isset($_POST['viewUseriByLogin']) && isset($_POST['submit']) && $_POST['submit'] == "View user (by login)") {
	echo '<tr>';
	echo '<th>Id</th>';
	echo '<th>Login</th>';
	echo '<th>e-mail</th>';
	echo '<th>Hashed password</th>';
	echo '<th>Is admin</th>';
	echo '</tr>';

 	$res = get_user_by_login($_POST['viewUseriByLogin']);
 	if ($res && isset($res['id']) && isset($res['login']) && isset($res['email']) && isset($res['password']) && isset($res['is_admin'])) {
		echo '<tr>';
    	echo '<td>' . $res['id'] . '</td>';
    	echo '<td>' . $res['login'] . '</td>';
    	echo '<td>' . $res['email'] . '</td>';
    	echo '<td>' . $res['password'] . '</td>';
    	echo '<td>' . $res["is_admin"] . '</td>';
		echo '</tr>';
	}
}

?>




