<?php
if (!isset($_POST['submit']) || $_POST['submit'] == "All" || $_POST['submit'] == "to Shop") {
	$res = get_products_all();
	foreach ($res as $val){
		echo '<button class="item" name="submit" type="submit" value="' . $val['id'] . '">';
		echo '<img class="itemImg" src="' . $val['img'] . '" alt="img_alt">';
		echo '<p class="itemName">' . $val['name'] . '</p>';
		echo '<p class="itemPrice"> $' . $val['price'] . '</p>';
		echo '</button>';
	}
} elseif (!is_numeric($_POST['submit'])) {
	$res = get_products_by_category_name($_POST['submit']);
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

//			<button class="selectCateg" name="submit" type="submit" value="Phones">Click Me!</button>
?>