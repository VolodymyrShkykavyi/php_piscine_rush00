<div id=content>
	<div id="categ">
		<?php
			$res = get_categories_all();
			foreach ($res as $val) {
			    echo '<div class="categ">' . $val['name'] . '</div>';
			}
		?>
	</div>
	<div id="items">
		<?php
			$res = get_products_all();
			foreach ($res as $val){
    			echo '<div class="item">';
    			echo '<img class="itemImg" src="' . $val['img'] . '" alt="img_alt">';
				echo '<p class="itemName">' . $val['name'] . '</p>';
				echo '<p class="itemPrice"> $' . $val['price'] . '</p>';
				echo '</div>';
			}
		?>
		<?php
			$res = get_products_all();
			foreach ($res as $val){
    			echo '<div class="item">';
    			echo '<img class="itemImg" src="resources/images/game-controller-4.png" alt="img_alt">';
				echo '<p class="itemName">' . $val['name'] . '</p>';
				echo '<p class="itemPrice"> $' . $val['price'] . '</p>';
				echo '</div>';
			}
		?><?php
			$res = get_products_all();
			foreach ($res as $val){
    			echo '<div class="item">';
    			echo '<img class="itemImg" src="resources/images/game-controller-4.png" alt="img_alt">';
				echo '<p class="itemName">' . $val['name'] . '</p>';
				echo '<p class="itemPrice"> $' . $val['price'] . '</p>';
				echo '</div>';
			}
		?><?php
			$res = get_products_all();
			foreach ($res as $val){
    			echo '<div class="item">';
    			echo '<img class="itemImg" src="resources/images/game-controller-4.png" alt="img_alt">';
				echo '<p class="itemName">' . $val['name'] . '</p>';
				echo '<p class="itemPrice"> $' . $val['price'] . '</p>';
				echo '</div>';
			}
		?>
<!-- 		<div class="item">
			<img class="itemImg" src="resources/images/game-controller-4.png" alt="img_alt">
			<span class="itemName">item_1</span>
		</div> -->
	</div>
	<div id="bucket">
		<img id="bucketImg" src="./resources/images/typewriter.png" alt="Bucket" title="Bucket">
		<p> 1234 </p>
		<p> 1234 </p>
		<p> 1234 </p>
		<p> 1234 </p>
		<input id="orderButton" type="submit" name="submit" value="Order">
	</div>
</div>