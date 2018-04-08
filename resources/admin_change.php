<?php

require_once ("./db_functions/add_category.php");
require_once ("./db_functions/add_product.php");
require_once ("./db_functions/change_category.php");
require_once ("./db_functions/del_category.php");
require_once ("./db_functions/users_func.php");
require_once ("./db_functions/change_product.php");

session_start();
if (isset($_SESSION['login']) && is_admin($_SESSION['login'])) {


    if (isset($_POST['submit']) && $_POST['submit'] == "Add category") {
        add_category($_POST['addCateg']);
        echo $_POST['addCateg'];
    }

    if (isset($_POST['add_artName']) && isset($_POST['add_artUrl']) && isset($_POST['add_artDescr']) &&
        isset($_POST['add_artPrice']) && isset($_POST['add_artSku']) && $_POST['submit'] == "Add article" &&
        isset($_POST['add_artCat'])) {
        $categories = explode(',', $_POST['add_artCat']);
        $arr = create_product_arr($_POST['add_artName'], $categories, $_POST['add_artUrl'], $_POST['add_artDescr'], $_POST['add_artPrice'], $_POST['add_artSku']);
        add_product($arr);
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "Change category (by name)") {
        change_category_by_name($_POST['changeCatNameOld'], $_POST['changeCatNameNew']);
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "Change category (by ID)") {
        change_category_by_id($_POST['changeCatId'], $_POST['changeCatIdNew']);
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "Delete category (by name)") {
        del_category_by_name($_POST['delCatName']);
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "Delete category (by ID)") {
        del_category_by_id($_POST['delCatId']);
    }

    if (isset($_POST['add_userName']) && isset($_POST['add_userEmail']) && isset($_POST['add_userPass']) &&
        isset($_POST['add_isAdmin']) && isset($_POST['submit']) && $_POST['submit'] == "Add user") {
        add_user($_POST['add_userName'], $_POST['add_userEmail'], $_POST['add_userPass'], $_POST['add_isAdmin']);
    }

    if (isset($_POST['delUserID']) && isset($_POST['submit']) && $_POST['submit'] == "Delete user") {
        del_user_by_id($_POST['delUserID']);
    }

    if (isset($_POST['modifArtId']) && isset($_POST['modifArtName']) && isset($_POST['modifArtImage']) &&
        isset($_POST['modifArtDescr']) && isset($_POST['modifArtPrice']) && isset($_POST['modifArtSku']) && isset($_POST['submit']) && $_POST['submit'] == "Modify article") {
        $modifArtArray = array(	'name' => $_POST['modifArtName'],
        						'img' => $_POST['modifArtImage'],
        						'description' => $_POST['modifArtDescr'],
      			  				'price' => $_POST['modifArtPrice'],
        						'SKU' => $_POST['modifArtSku'], );
        change_product_by_id($_POST['modifArtId'], $modifArtArray);
    }

    if (isset($_POST['delArtID']) && isset($_POST['submit']) && $_POST['submit'] == "Delete article") {
        del_product_by_id($_POST['delArtID']);
    }

    if (isset($_POST['modifUserId']) && isset($_POST['modifUserName']) && isset($_POST['modifUserEmail']) &&
        isset($_POST['modifUserPass']) && isset($_POST['modifUserAdm']) && isset($_POST['submit']) && $_POST['submit'] == "Change user information") {
        $modifUsrInfo = array(	'login' => $_POST['modifUserName'],
        						'email' => $_POST['modifUserEmail'],
        						'password' => $_POST['modifUserPass'],
        						'is_admin' => $_POST['modifUserAdm'],
        						'firstname' => " ",
        						'lastname' => " ",
        						'address' => " ",
        						'img' => " ", );
    	change_user_by_id($_POST['modifUserId'], $modifUsrInfo);
    }


}
?>