<?php
require_once("reference/reference.php");

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
}