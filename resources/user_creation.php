<?php

require_once ("./db_functions/users_func.php");

if (isset($_POST['newLogin']) && isset($_POST['newPasswd']) && isset($_POST['newEmail']) && isset($_POST['submit']) && $_POST['submit'] == "Create user") {

	if (add_user($_POST['newLogin'], $_POST['newEmail'], $_POST['newPasswd'])) {

		header("Location: ../index.php");
	} else {

		header("Location: http://www.google.com/");
	}
}

?>