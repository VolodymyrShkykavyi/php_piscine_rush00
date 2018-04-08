<?php
require_once ("db_query.php");

function auth($login, $passw){
    $login = trim($login);
    $passw = trim($passw);
    if (!$login || !$passw)
        return (false);
    $conn = db_connect();
    $login = mysqli_real_escape_string($conn, $login);
    $passw = hash('whirlpool', mysqli_real_escape_string($conn, $passw));
    $res = db_query($conn, "SELECT * FROM `users` WHERE `login` = '{$login}' AND `password` = '{$passw}';");
    return(!empty($res));
}

function is_admin($login){
    $login = trim($login);
    if (!$login)
        return(false);
    $conn = db_connect();
    $login = mysqli_real_escape_string($conn, $login);
    $res = db_query($conn, "SELECT * FROM `users` WHERE `login` = '{$login}' AND `is_admin` = '1';");
    return(!empty($res));
}

var_dump(is_admin('admin'));