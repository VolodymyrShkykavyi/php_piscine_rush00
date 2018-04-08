<div id=content>
	<div id="categ">
		<form action="index.php" method="post">
			<input class="selectCateg" name="submit" type="submit" value="All">
			<?php
				$res = get_categories_all();
				foreach ($res as $val) {
				    echo '<input class="selectCateg" name="submit" type="submit" value="' . $val['name'] . '">';
				}
			?>
		</form>
	</div>
	<div id="items">
		<form action="index.php" method="post">

		<?php include("./resources/content_fill.php"); ?>

		</form>
	</div>
	<div id="bucket">
		<img id="bucketImg" src="./resources/images/cart-12.png" alt="Bucket" title="Bucket">
		<p id="bucketName"> Bucket </p>
		<p class="bucketItem"> 1234 </p>
		<p class="bucketItem"> 1234 </p>
		<p class="bucketItem"> 1234 </p>
		<p class="bucketItem"> 1234 </p>
		<input id="orderButton" type="submit" name="submit" value="Order">
	</div>
</div>