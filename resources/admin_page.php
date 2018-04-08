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

	</div>
	<div class="onclickButton">

	</div>
	<div class="onclickButton">

	</div>

	<div id=hidden01 class="outDivDispNone">
		<div class="formDispNone"
		onclick="document.getElementById('hidden01').style.display='none'">

		</div>
	</div>

	<div style="clear: left;"></div>	<!-- empty -->

	<div class="admDivForms">
		<form class="admForms" action="admin_page.php" method="post">
			Category to add: <input id="" type="text" name="addCateg" value="">
			<input id="" type="submit" name="submit" value="Add category">
			<br>
			<br>
			Article Name to add article: <input style="margin-left:45px" id="" type="text" name="add_artName" value=""><br>
			Article Category to add article: <input style="margin-left:25px" id="" type="text" name="add_artCat" value=""><br>
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
			<br>
			<br>
			User Login to add user: <input style="margin-left:30px" id="" type="text" name="add_userName" value=""><br>
			User E-mail to add user: <input style="margin-left:25px" id="" type="text" name="add_userEmail" value=""><br>
			User Password to add user: <input style="margin-left:7px" id="" type="text" name="add_userPass" value=""><br>
			Is user admin (1/0): <input style="margin-left:55px" id="" type="text" name="add_isAdmin" value="">
			<input id="" type="submit" name="submit" value="Add user">
			<br>
			<br>
			User ID to delete user: <input id="" type="text" name="delUserID" value="">
			<input id="" type="submit" name="submit" value="Delete user">
			<br>
			<br>
			Article ID to change article: <input style="margin-left:12px" id="" type="text" name="modifArtId" value=""><br>
			New article Name: <input style="margin-left:70px" id="" type="text" name="modifArtName" value=""><br>
			New article Image: <input style="margin-left:68px" id="" type="text" name="modifArtImage" value=""><br>
			New article Description: <input style="margin-left:34px" id="" type="text" name="modifArtDescr" value=""><br>
			New article Price: <input style="margin-left:75px" id="" type="text" name="modifArtPrice" value=""><br>
			New article SKU: <input style="margin-left:76px" id="" type="text" name="modifArtSku" value="">
			<input id="" type="submit" name="submit" value="Modify article">
			<br>
			<br>
			Article ID to delete article: <input id="" type="text" name="delArtID" value="">
			<input id="" type="submit" name="submit" value="Delete article">
			<br>
			<br>
			User ID to change user information: <input style="margin-left:12px" id="" type="text" name="modifUserId" value=""><br>
			New Userame: <input style="margin-left:147px" id="" type="text" name="modifUserName" value=""><br>
			New user Email: <input style="margin-left:135px" id="" type="text" name="modifUserEmail" value=""><br>
			New user Password: <input style="margin-left:112px" id="" type="text" name="modifUserPass" value=""><br>
			Is user admin (1/0): <input style="margin-left:117px" id="" type="text" name="modifUserAdm" value="">
			<input id="" type="submit" name="submit" value="Change user information">
		</form>
	</div>

<!-- 	<script>
		function
	</script> -->

</body>
</html>