<?php
session_start();
require_once ("db_functions/users_func.php");

if(isset($_POST['log_in']) && $_POST['log_in'] == "Login"){
    if (auth($_POST['login'], $_POST['passwd'])){
        if (($user = get_user_by_login($_POST['login']))){
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];
        }
    }
}
if (isset($_POST['unLogin']) && $_POST['unLogin'] == "Logout") {
	$_SESSION['id'] = null;
    $_SESSION['login'] = null;
    $_POST['unLogin'] = null;
}
?>
<header>
<div id="headerImage">
	<a href="./index.php">
		<img id="headImage" src="./resources/images/game-controller-2.png" alt="HomePage" title="HomePage">
	</a>
</div>

<div id="headerTwoButtons">
<?php
	if (isset($_SESSION['login']) &&  is_admin($_SESSION['login'])) {
?>
	<form id="admForm" action="./resources/admin_page.php" method="post">
		<input id="admButton" type="submit" name="submit" value="Administration">
	</form>
	<?php } ?>
	<div class="createAccButton" onclick="document.getElementById('headerCreateAccHidden').style.display='block'">
		Create account
	</div>
	<form id="admUnloginForm" action="./index.php" method="post">
		<input id="admUnloginButton" type="submit" name="unLogin" value="Logout">
	</form>
</div>
    <?php
    if (!isset($_SESSION['id']) && !isset($_SESSION['login'])) {
        ?>
        <div id=headerLogin>
            <form id="headForm" action="index.php" method="post">
                <div id="loginOrCreation">
                    User login
                </div>
                Username: <input id="login" type="text" name="login" value="">
                <br>
                Password: <input id="password" type="password" name="passwd" value="">
                <input id="button" type="submit" name="log_in" value="Login">
            </form>
        </div>
        <?php
    } else {
        ?>
        <div>
            Username: <?=$_SESSION['login'];?>
        </div>
    <?php
    }
    ?>
<div id="headerCreateAccHidden">
	<div id="headerCreateAccCloser">

	</div>
	<div id="headerCreateAcc">
		<div id="headerCreateAccCloser" class="someClass" onclick="document.getElementById('headerCreateAccHidden').style.display='none'">
			<img src="./resources/images/joystick.png" style="width: 50px;" alt="Closer">
		</div>
		<form id="formCreateAcc" action="./resources/user_creation.php" method="post">
			<div id="userCreation" style="margin-left: 100px">
				User creation
			</div>
			Username: <input id="newLogin" style="margin-left: 10px" type="text" name="newLogin" value="">
			<br>
			Password: <input id="newPassword" style="margin-left: 13px" type="password" name="newPasswd" value="">
			<br>
			Email: <input id="newEmail" style="margin-left: 36px" type="text" name="newEmail" value="">
			<input id="button" type="submit" name="submit" value="Create user">
		</form>
	</div>
</div>
</header>