<?php
if (isset($_POST['make_order']) || isset($_POST['My orders'])){
    require_once ("order.php");
}
elseif (!isset($_POST['submit']) || $_POST['submit'] == "All" || $_POST['submit'] == "to Shop") {
	$res = get_products_all();
	foreach ($res as $val){
		echo '<button class="item" name="submit" type="submit" value="' . $val['id'] . '">';
		echo '<img class="itemImg" src="' . $val['img'] . '" alt="img_alt">';
		echo '<p class="itemName">' . $val['name'] . '</p>';
		echo '<p class="itemPrice"> $' . $val['price'] . '</p>';
		echo '</button>';
	}
} elseif (!is_numeric($_POST['submit'])) {
	if ($res = get_products_by_category_name($_POST['submit'])) {
	foreach ($res as $val){
		echo '<button class="item" name="submit" type="submit" value="' . $val['id'] . '">';
		echo '<img class="itemImg" src="' . $val['img'] . '" alt="img_alt">';
		echo '<p class="itemName">' . $val['name'] . '</p>';
		echo '<p class="itemPrice"> $' . $val['price'] . '</p>';
		echo '</button>';
		// echo '<div class="item">';
		// echo '<img class="itemImg" src="' . $val['img'] . '" alt="img_alt">';
		// echo '<p class="itemName">' . $val['name'] . '</p>';
		// echo '<p class="itemPrice"> $' . $val['price'] . '</p>';
		// echo '</div>';
	}
	}
}
elseif (is_numeric($_POST['submit'])){
    include_once("view_product.php");
}


//			<button class="selectCateg" name="submit" type="submit" value="Phones">Click Me!</button>
?>