<?php
require_once ("db_config.php");

function db_connect(){
    global $servername, $username, $password;

    //connect to DB
    $conn = mysqli_connect($servername, $username, $password);

    //check connection
    if (!$conn) {
        die(mysqli_connect_error());
    }

    //select database
    if (!mysqli_query($conn, "USE `minishop_db`")){
        die("Can't select Database: " . mysqli_error($conn));
    }
    return ($conn);
}

function db_query($conn, $sql){
    if (!$sql || !$conn)
        return (false);
    if (!($data = mysqli_query($conn, $sql))){
        return(false);
    }
    mysqli_close($conn);
    $res = array();
    while (($row = mysqli_fetch_array($data, MYSQLI_ASSOC))){
        $res[] = $row;
    }
    return($res);
}

