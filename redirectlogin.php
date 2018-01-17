<?php
$username = '';
$login=false;

//connect
require_once("reference/reference.php");

//if a user is detected get username
if(isset($_SESSION['user_id'])){
$login = true;
$username = getUsername();
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Zuivelmuseum</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="Icon.png">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script src="scripts/scroll.js"></script>
</head>
<body id="photo">
<nav id="menu">
    <ul>
        <li><a href="index.php#wiezijnwij">Wie Zijn Wij</a></li>
        <li><a href="index.php#doelstelling">Doelstelling</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="photos.php">Foto's</a></li>
        <li id="login">
            <a href="<?php if($login){ echo "account.php"; }else{echo "login.php";} ?>" class="active">
            <?php if($login){ echo $username; }else{echo "Login";} ?>
            </a>
        </li>
        </li>
    </ul>
</nav>
<div id="account">
<p class ="index">U are not logged in! <br />Please log in first with the button inthe top right corner or go back to the main page:</p>
<div class="indexcontainer">
    <a href="index.php"><button class="index" size=15>Go to main page</button></a><br />
    <a href="login.php"><button class="logout">Login</button></a>
</div>
</div>
</body>
</html>