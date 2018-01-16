<?php
$picktures = [];
$counter = 0;
$login = false;
$username = '';

//connect
require_once("reference/reference.php");

//if logged in get username
if(isset($_SESSION['user_id'])){
    $login = true;
    $username = getUsername();
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Het Zuivelmuseum</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script src="scripts/scroll.js"></script>
    <link rel="icon" href="Icon.png">
</head>
<body>
<nav id="menu">
    <ul>
        <li><a href="index.php#wiezijnwij">Wie Zijn Wij</a></li>
        <li><a href="index.php#doelstelling">Doelstelling</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="photos.php" class="active">Foto's</a></li>
        <li id="login">
            <a href="<?php if($login){ echo "account.php"; }else{echo "login.php";} ?>">
                <?php if($login){ echo $username; }else{echo "Login";} ?>
            </a>
        </li>
    </ul>
</nav>
<div class="sections">
        <section id="fotos" class="notfilled">
            <h1>Foto's</h1>
            <?php

            //get all photo's from /images/ and put list them on the page
            $handle = opendir(dirname(realpath(__FILE__)).'/images/');
            while($file = readdir($handle)) {
                if ($file !== '.' && $file !== '..') {
                    echo '<img id="'. $file .'" src="images/' . $file . '" alt="' . substr($file, 0, -4) .'" class = "mini"/>';
                    $picktures[$counter] = $file;
                    $counter++;
                }
            }
            ?>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
            <?php
            foreach ($picktures as $image)
                echo '
        <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("' . $image . '");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        
        modalImg.onclick = function () {
            modal.style.display = "none";
        }
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
        </script>
        '
            ?>
        </section>