<?php
/**
 * Created by PhpStorm.
 * User: STEENBRINK
 * Date: 23-11-2015
 * Time: 11:54
 */

//connect
include("reference/connect.php");

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <title>Chantdante Log In</title>
</head>
<body style="overflow: hidden">
<nav id="menu">
    <ul>
        <li><a href="index.php#wiezijnwij">Wie Zijn Wij</a></li>
        <li><a href="index.php#doelstelling">Doelstelling</a></li>
        <li><a href="index.php#fotos">Foto's</a></li>
        <li><a href="index.php#nieuws">Nieuws</a></li>
        <li><a href="index.php#links">Links</a></li>
        <li><a href="index.php#boeken">Boeken</a></li>
        <li id="login"><a href="login.php" class="active">Login</a></li>
    </ul>
</nav>
<div class="sections">
    <h1>Log In</h1>
    <form name="login" method="post" action="login.php">
        <input class="index" id="search" value="Username" onfocus="if (this.value === 'Username') {this.value = '';}" data-rel="active" size="8" name="username"><br />
        <input type="password" class="index" id="search" value="Password" onfocus="if (this.value === 'Password') this.value = '';" data-rel="active" size="8" name="password"><br />
        <input type="submit" class="index" id="search" size="8" value="submit"><br />
        <a href="accountcreation.php"><input type="button" class="boo" id="search" value="Create new account!" size="16"></a>
    </form>
</div>
</body>
</html>
