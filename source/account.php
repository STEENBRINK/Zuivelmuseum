<?php

//connect
require_once("reference/reference.php");

if(!isset($_SESSION['user_id'])){
    header('Location:redirectlogin.html');
}

?>
<a href="logout.php"><button class="logout">Logout</button></a>