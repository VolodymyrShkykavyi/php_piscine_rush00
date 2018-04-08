<header>
	<a href="./index.php">
		<img id="headImage" src="./resources/images/game-controller-2.png" alt="HomePage" title="HomePage">
	</a>
	<form id="headForm" action="" method="post">
		<div id="loginOrCreation">
			User login / account creation
		</div>
		Username: <input id="login" type="text" name="login" value="">
		<br>
		Password: <input id="password" type="password" name="passwd" value="">
		<input id="button" type="submit" name="submit" value="OK">
	</form>
	<form id="admForm" action="./resources/admin_page.php" method="post">
		<input id="admButton" type="submit" name="submit" value="Administration">
	</form>
</header>