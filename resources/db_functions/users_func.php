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
    $passw = mysqli_real_escape_string($conn,  hash('whirlpool', $passw));
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

function get_user_by_id($id){
    $id = trim($id);
    if (!$id || !is_numeric($id) || $id < 0)
        return(false);
    $res = db_query(db_connect(), "SELECT * FROM `users` WHERE `id` = '{$id}' LIMIT 1");
    if (empty($res))
        return(false);
    return($res[0]);
}

function get_user_by_login($login){
    $login = trim($login);
    if (!$login)
        return(false);
    $conn = db_connect();
    $login = mysqli_real_escape_string($conn, $login);
    $res = db_query($conn, "SELECT * FROM `users` WHERE `login` = '{$login}' LIMIT 1");
    if (empty($res))
        return(false);
    return($res[0]);
}

function del_user_by_id($id){
    if (!is_numeric($id))
        return(false);
    if (!get_user_by_id($id))
        return(false);
    db_query(db_connect(), "DELETE FROM `users` WHERE `id` = '{$id}';");
    return(true);
}

function change_user_by_id($id, $arr){
    $id = trim($id);
    if (!$id || !get_user_by_id($id))
        return(false);
    $conn = db_connect();
    $res_arr = array();
    if (trim($arr['login']))
        $res_arr['login'] = mysqli_real_escape_string($conn, trim($arr['login']));
    if (trim($arr['email']))
        $res_arr['email'] = mysqli_real_escape_string($conn, trim($arr['email']));
    if (trim($arr['password']))
        $res_arr['password'] = mysqli_real_escape_string($conn,  hash('whirlpool',trim($arr['password'])));
    if (trim($arr['is_admin']))
        $res_arr['is_admin'] = mysqli_real_escape_string($conn, trim($arr['is_admin']));
    if (trim($arr['firstname']))
        $res_arr['firstname'] = mysqli_real_escape_string($conn, trim($arr['firstname']));
    if (trim($arr['lastname']))
        $res_arr['lastname'] = mysqli_real_escape_string($conn, trim($arr['lastname']));
    if (trim($arr['address']))
        $res_arr['address'] = mysqli_real_escape_string($conn, trim($arr['address']));
    if (trim($arr['img']))
        $res_arr['img'] = mysqli_real_escape_string($conn, trim($arr['img']));
    if (empty($res_arr))
        return(false);

    $sql = "UPDATE `users` SET ";
    foreach ($res_arr as $key => $value){
        $sql = $sql . " `{$key}`='{$value}', ";
    }
    $sql = trim($sql, ", ");
    $sql = $sql . " WHERE `id` = '{$id}';";
    db_query($conn, $sql);
    return(true);
}

function get_users_all(){
    $conn = db_connect();
    $res = db_query($conn, "SELECT * FROM `users`;");
    return($res);
}

//var_dump(add_user('user33', 'adm2@adm.uaw', 'pass'));

//var_dump(get_user_by_id(3));

//var_dump(get_user_by_login('admin23'));

//var_dump(del_user_by_id(14));

//var_dump(change_user_by_id(3, ['login' => 'best_user', 'password' => 'new']));