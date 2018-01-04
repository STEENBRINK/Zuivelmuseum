<?php

// define variables and set to empty values
$nameErr = $passErr = $subErr = "";

//connect
require_once("reference/reference.php");

if(isset($_SESSION['user_id'])){
    header('Location:redirectlogout.html');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $nameErr = "Name is required";
    }else if (empty($_POST["password"])) {
        $passErr = "Password is required";
    }else {
        $subErr = checkUserPass();
    }
}
function checkUserPass(){
    $username = str_replace("'","''",$_POST["username"]);
    $password = md5($_POST["password"]);

// Verify that user is in database
    $q = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query(getConnection(), $q);
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        $resultrow = mysqli_fetch_row($result);
        var_dump($resultrow);
        $_SESSION['user_id'] = $resultrow[0];
        header("location: index.php");
    }else{
        $subErr = "One of the fields is not filled in correctly";
        return $subErr;
    }
}
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
        <li><a href="index.php#nieuws">Nieuws</a></li>
        <li><a href="index.php#links">Links</a></li>
        <li><a href="index.php#boeken">Boeken</a></li>
        <li><a href="photos.php">Foto's</a></li>
        <li id="login"><a href="login.php" class="active">Login</a></li>
    </ul>
</nav>
<div class="sections">
    <h1>Log In</h1>
    <form name="login" method="post" action="">
        <input id="search" value="Username" onfocus="if (this.value === 'Username') {this.value = '';}" onblur="if (this.value === '') {this.value = 'Username';}" data-rel="active" size=8 name="username"><br />
        <input type="password" class="index" id="search" value="Password" onfocus="if (this.value === 'Password') this.value = '';" onblur="if (this.value === '') {this.value = 'Password';}" data-rel="active" size="8" name="password"><br />
        <input type="submit" id="search" size="8" value="submit"><br />
        <a href="accountcreation.php"><input type="button" class="boo" id="search" value="Create new account!" size="16"></a>
    </form>
</div>
</body>
</html>
