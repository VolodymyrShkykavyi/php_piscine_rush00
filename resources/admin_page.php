<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
	<link rel="stylesheet" type="text/css" href="./styles/admin_page.css">
</head>
<body id="admBody">
	
	<?php include("./admin_change.php");?>

	<form id="toShop" action="../index.php" method="post">
		<input id="toShopButton" type="submit" name="submit" value="to Shop">
	</form>

	<img id="adminImage" src="./images/database.png" alt="Database" title="Database">

	<br>
	<form id="viewForm" action="admin_page.php" method="post">
		<input id="viewCategories" type="submit" name="submit" value="View categories">
		<input id="viewArticles" type="submit" name="submit" value="View articles">
		<input id="viewUsers" type="submit" name="submit" value="View users">
		<input id="viewOrders" type="submit" name="submit" value="View orders">
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
		<br>
		<input id="" type="text" name="viewUseriById" value="">
		<input id="viewUsers" type="submit" name="submit" value="View user (by ID)">
		<br>
		<input id="" type="text" name="viewUseriByLogin" value="">
		<input id="viewUsers" type="submit" name="submit" value="View user (by login)">
	</form>
	<div id=viewField>
		<table id="viewTable">

			<?php include("./admin_view.php"); ?>

		</table>
	</div>
	<div class="onclickButton"
		onclick="document.getElementById('hidden01').style.display='block'">
		Add article
	</div>
	<div class="onclickButton"
		onclick="document.getElementById('hidden02').style.display='block'">
		Add user
	</div>
	<div class="onclickButton"
		onclick="document.getElementById('hidden03').style.display='block'">
		Modify article
	</div>
	<div class="onclickButton"
		onclick="document.getElementById('hidden04').style.display='block'">
		Change user
	</div>

	<div id=hidden01 class="outDivDispNone">
		<div class="formDispNone">
			<div class="adminCloseButton">
				<img class="adminCloseImage" src="./images/error.png" alt="Close" title="Close"
								onclick="document.getElementById('hidden01').style.display='none'">
			</div>
			<div class="admDivHiddenForms">
			<form action="admin_page.php" method="post">
				Article Name to add article: <br>
				<input id="" type="text" name="add_artName" value=""><br>
				Article Category to add article: <br>
				<input id="" type="text" name="add_artCat" value=""><br>
				Article Image URL to add article: <br>
				<input id="" type="text" name="add_artUrl" value=""><br>
				Article Description to add article: <br>
				<input id="" type="text" name="add_artDescr" value=""><br>
				Article Price to add article: <br>
				<input id="" type="text" name="add_artPrice" value=""><br>
				Article SKU to add article: <br>
				<input id="" type="text" name="add_artSku" value=""><br>
				<input id="" type="submit" name="submit" value="Add article">
			</form>
			</div>
		</div>
	</div>
	<div id=hidden02 class="outDivDispNone">
		<div class="formDispNone">
			<div class="adminCloseButton">
				<img class="adminCloseImage" src="./images/error.png" alt="Close" title="Close"
								onclick="document.getElementById('hidden02').style.display='none'">
			</div>
			<div class="admDivHiddenForms">
			<form action="admin_page.php" method="post">
				User Login to add user: <br>
				<input id="" type="text" name="add_userName" value=""><br>
				User E-mail to add user: <br>
				<input id="" type="text" name="add_userEmail" value=""><br>
				User Password to add user: <br>
				<input d="" type="text" name="add_userPass" value=""><br>
				Is user admin (1/0): <br>
				<input id="" type="text" name="add_isAdmin" value=""><br>
				<input id="" type="submit" name="submit" value="Add user">
			</form>
			</div>
		</div>
	</div>
	<div id=hidden03 class="outDivDispNone">
		<div class="formDispNone">
			<div class="adminCloseButton">
				<img class="adminCloseImage" src="./images/error.png" alt="Close" title="Close"
								onclick="document.getElementById('hidden03').style.display='none'">
			</div>
			<div class="admDivHiddenForms">
			<form action="admin_page.php" method="post">
				Article ID to change article: <br>
				<input id="" type="text" name="modifArtId" value=""><br>
				New article Name: <br>
				<input id="" type="text" name="modifArtName" value=""><br>
				New article Image: <br>
				<input id="" type="text" name="modifArtImage" value=""><br>
				New article Description: <br>
				<input id="" type="text" name="modifArtDescr" value=""><br>
				New article Price: <br>
				<input id="" type="text" name="modifArtPrice" value=""><br>
				New article SKU: <br>
				<input id="" type="text" name="modifArtSku" value=""><br>
			<input id="" type="submit" name="submit" value="Modify article">
			</form>
			</div>
		</div>
	</div>
	<div id=hidden04 class="outDivDispNone">
		<div class="formDispNone">
			<div class="adminCloseButton">
				<img class="adminCloseImage" src="./images/error.png" alt="Close" title="Close"
								onclick="document.getElementById('hidden04').style.display='none'">
			</div>
			<div class="admDivHiddenForms">
			<form action="admin_page.php" method="post">
				User ID to change user information: <br>
				<input id="" type="text" name="modifUserId" value=""><br>
				New Userame: <br>
				<input id="" type="text" name="modifUserName" value=""><br>
				New user Email: <br>
				<input id="" type="text" name="modifUserEmail" value=""><br>
				New user Password: <br>
				<input  id="" type="text" name="modifUserPass" value=""><br>
				Is user admin (1/0): <br>
				<input id="" type="text" name="modifUserAdm" value=""><br>
				<input id="" type="submit" name="submit" value="Change user information">
			</form>
			</div>
		</div>
	</div>

	<div style="clear: left;"></div>	<!-- empty -->

	<div class="admDivForms">
		<form class="admForms" action="admin_page.php" method="post">
			<br>
			Category to add: <input style="margin-left:83px" id="" type="text" name="addCateg" value="">
			<input id="" type="submit" name="submit" value="Add category">
			<br>
			<br>
			Name of category to change: <input style="margin-left:5px" id="" type="text" name="changeCatNameOld" value=""><br>
			New name of category: <input style="margin-left:40px" id="" type="text" name="changeCatNameNew" value="">
			<input id="" type="submit" name="submit" value="Change category (by name)">
			<br>
			<br>
			ID of category to change: <input style="margin-left:27px" id="" type="text" name="changeCatId" value=""><br>
			New name of category: <input style="margin-left:40px" id="" type="text" name="changeCatIdNew" value="">
			<input id="" type="submit" name="submit" value="Change category (by ID)">
			<br>
			<br>
			Name of category to delete: <input style="margin-left:12px" id="" type="text" name="delCatName" value="">
			<input id="" type="submit" name="submit" value="Delete category (by name)">
			<br>
			<br>
			ID of category to delete: <input style="margin-left:34px" id="" type="text" name="delCatId" value="">
			<input id="" type="submit" name="submit" value="Delete category (by ID)">
			<br>
			<br>
			User ID to delete user: <input style="margin-left:45px" id="" type="text" name="delUserID" value="">
			<input id="" type="submit" name="submit" value="Delete user">
			<br>
			<br>
			Article ID to delete article: <input style="margin-left:18px" id="" type="text" name="delArtID" value="">
			<input id="" type="submit" name="submit" value="Delete article">
		</form>
	</div>

<!-- 	<script>
		function
	</script> -->

</body>
</html>