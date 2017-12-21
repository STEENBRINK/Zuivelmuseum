<?php

//connect
require_once("reference/reference.php");
$admin = false;
$login = false;
$username = '';

if(!isset($_SESSION['user_id'])){
    header('Location:redirectlogin.html');
}else{
    $login = true;
    $username = getUsername();
    if(isAdmin()){
        $admin = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <title>Edit</title>
    </head>
    <body>
        <nav id="menu">
            <ul>
                <li><a href="index.php#wiezijnwij">Wie Zijn Wij</a></li>
                <li><a href="index.php#doelstelling">Doelstelling</a></li>
                <li><a href="index.php#fotos">Foto's</a></li>
                <li><a href="index.php#nieuws">Nieuws</a></li>
                <li><a href="index.php#links">Links</a></li>
                <li><a href="index.php#boeken">Boeken</a></li>
                <li id="login">
                    <a href="<?php if($login){ echo "account.php"; }else{echo "login.php";} ?>">
                        <?php if($login){ echo $username; }else{echo "Login";} ?>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="sections">

        </div>
    </body>
</html>
