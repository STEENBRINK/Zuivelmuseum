<?php
require_once("reference/reference.php");

//if not logged in redirect
//else
//if admin: delete user in post
//if user: delete current user
if(!isset($_SESSION['user_id'])) {
    header('Location:redirectlogin.html');
}else {
    if(isAdmin()) {
        $q = "DELETE FROM users WHERE ID = '$_POST[ID]'";
        $result = mysqli_query(getConnection(), $q);
        header('location:account.php');
    }else if ($_POST["delacc"] == "user"){
        $id = $_SESSION["user_id"];
        unset($_SESSION['user_id']);
        $q = 'DELETE FROM users WHERE ID = ' . $id;
        $result = mysqli_query(getConnection(), $q);
        header('location:index.php');
    }
    $disconnect = mysqli_close(getConnection());
}