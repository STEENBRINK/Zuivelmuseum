<?php
if(!isset($_SESSION['user_id'])){
    header('Location:redirectlogin.html');
}else{
    if(isAdmin()){
        phpinfo();
    }else{
        header('Location:index.php');
    }
}