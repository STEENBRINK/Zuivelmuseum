<?php
/**
 * Created by PhpStorm.
 * User: STEENBRINK
 * Date: 23-11-2015
 * Time: 10:12
 */

require_once("connect.php");

function checkLoggedIn(){
// if logged in:
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {

        $user = array(
            "username" => getUsername()
        );

    }else{
    // not logged in:
        $user = null;
    }
    return $user;
}

function getUsername(){
    $q = "SELECT * FROM `users` WHERE `ID` = '$_SESSION[user_id]'";
    $result = mysqli_query(getConnection(), $q);
    $resultrow = mysqli_fetch_row($result);
    return $resultrow[1];
}

$user = checkLoggedIn();
