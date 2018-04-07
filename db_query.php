<?php
require_once ("db_config.php");

function db_query($sql){
    global $servername, $username, $password;

    //connect to DB
    $conn = mysqli_connect($servername, $username, $password);

    //check connection
    if (!$conn) {
        die("Can't connect to Database: " . mysqli_connect_error());
    }

    //select database
    if (!mysqli_query($conn, "USE `minishop_db`")){
        die("Can't select Database: " . mysqli_error($conn));
    }
    if (!$sql)
        return ("empty SQL query");
    if (!mysqli_query($conn, $sql)){
        return(mysqli_error($conn));
    }
    mysqli_close($conn);
    return(0);
}