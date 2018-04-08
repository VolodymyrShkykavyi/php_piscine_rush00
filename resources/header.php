<header>
<div id="headerImage">
	<a href="./index.php">
		<img id="headImage" src="./resources/images/game-controller-2.png" alt="HomePage" title="HomePage">
	</a>
</div>

<div id="headerTwoButtons">
	<form id="admForm" action="./resources/admin_page.php" method="post">
		<input id="admButton" type="submit" name="submit" value="Administration">
	</form>
	<div class="createAccButton" onclick="document.getElementById('headerCreateAccHidden').style.display='block'">
		Create account
	</div>
</div>

<div id=headerLogin>
	<form id="headForm" action="" method="post">
		<div id="loginOrCreation">
			User login
		</div>
		Username: <input id="login" type="text" name="login" value="">
		<br>
		Password: <input id="password" type="password" name="passwd" value="">
		<input id="button" type="submit" name="submit" value="OK">
	</form>
</div>
	

<div id="headerCreateAccHidden">
	<div id="headerCreateAcc" onclick="document.getElementById('hidden01').style.display='none'">
	</div>
</div>
</header>