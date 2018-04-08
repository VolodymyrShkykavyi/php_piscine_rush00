<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
	<link rel="stylesheet" type="text/css" href="./styles/admin_page.css">
</head>
<body id="admBody">
	
	<?php include("./admin_change.php"); ?>

	<form id="toShop" action="../index.php" method="post">
		<input id="toShopButton" type="submit" name="submit" value="to Shop">
	</form>
	<br>
	<form id="viewForm" action="admin_page.php" method="post">
		<input id="viewCategories" type="submit" name="submit" value="View categories">
		<input id="viewArticles" type="submit" name="submit" value="View articles">
		<input id="viewUsers" type="submit" name="submit" value="View users">
		<br>
		<input id="" type="text" name="viewCatId" value="">
		<input id="viewUsers" type="submit" name="submit" value="View category (by ID)">
		<br>
		<input id="" type="text" name="viewCatName" value="">
		<input id="viewUsers" type="submit" name="submit" value="View category ID">
		<br>
		<input id="" type="text" name="viewArtiByCatName" value="">
		<input id="viewUsers" type="submit" name="submit" value="View articles (by category)">
		<br>
		<input id="" type="text" name="viewArtiByName" value="">
		<input id="viewUsers" type="submit" name="submit" value="View article (by name)">
	</form>
	<div id=viewField>
		<table id="viewTable">

			<?php include("./admin_view.php"); ?>

		</table>
	</div>
	<div class="admDivForms">
		<form class="admForms" action="admin_page.php" method="post">
			Category to add: <input id="" type="text" name="addCateg" value="">
			<input id="" type="submit" name="submit" value="Add category">
			<br>
			<br>
			Article Name to add article: <input style="margin-left:45px" id="" type="text" name="add_artName" value=""><br>
			Article Category ID to add article: <input style="margin-left:4px" id="" type="text" name="add_artCat" value=""><br>
			Article Image URL to add article: <input style="margin-left:8px" id="" type="text" name="add_artUrl" value=""><br>
			Article Description to add article: <input style="margin-left:9px" id="" type="text" name="add_artDescr" value=""><br>
			Article Price to add article: <input style="margin-left:51px" id="" type="text" name="add_artPrice" value=""><br>
			Article SKU to add article: <input style="margin-left:52px" id="" type="text" name="add_artSku" value="">
			<input id="" type="submit" name="submit" value="Add article">
			<br>
			<br>
			Name of category to change: <input style="margin-left:5px" id="" type="text" name="changeCatNameOld" value=""><br>
			New name of category: <input style="margin-left:40px" id="" type="text" name="changeCatNameNew" value="">
			<input id="" type="submit" name="submit" value="Change category (by name)">
			<br>
			<br>
			ID of category to change: <input style="margin-left:5px" id="" type="text" name="changeCatId" value=""><br>
			New name of category: <input style="margin-left:18px" id="" type="text" name="changeCatIdNew" value="">
			<input id="" type="submit" name="submit" value="Change category (by ID)">
			<br>
			<br>
			Name of category to delete: <input id="" type="text" name="delCatName" value="">
			<input id="" type="submit" name="submit" value="Delete category (by name)">
			<br>
			<br>
			ID of category to delete: <input id="" type="text" name="delCatId" value="">
			<input id="" type="submit" name="submit" value="Delete category (by ID)">
		</form>
	</div>
</body>
</html>