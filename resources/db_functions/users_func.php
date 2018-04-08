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

function add_user($login, $email, $passw, $is_admin=0, $firstname="", $lastname="", $addres="", $img=""){
    $login = trim($login);
    $email = trim($email);
    $passw = trim($passw);
    if (!$login || !$email || !$passw)
        return(false);
    if ($is_admin != 1)
        $is_admin = 0;
    $conn = db_connect();
    $login = mysqli_real_escape_string($conn, $login);
    $email = mysqli_real_escape_string($conn, $email);
    $passw = mysqli_real_escape_string($conn, $passw);
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $addres = mysqli_real_escape_string($conn, $addres);
    $img = mysqli_real_escape_string($conn, $img);
    $res = db_query($conn, "SELECT * FROM `users` WHERE `login` = '{$login}' OR `email` = '{$email}'");
    if (!empty($res))
        return(false);
    db_query(db_connect(), "INSERT INTO `users` (`login`, `email`, `password`, `is_admin`, `firstname`, `lastname`, `address`, `img`)
 VALUES ('{$login}', '{$email}', '{$passw}', '{$is_admin}', '{$firstname}', '$lastname', '{$addres}', '{$img}');");
    return(true);
}

//var_dump(add_user('user33', 'adm2@adm.uaw', 'pass'));