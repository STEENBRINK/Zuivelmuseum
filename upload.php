<?php

var_dump($_FILES);

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "<br>Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 250000000) {
    echo "<br>Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if image file is a actual image or fake image
if(isset($_POST["fileToUpload"]) && $uploadOk == 1) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<br>File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<br>File is not an image.";
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<br>Sorry, your file was not uploaded.<br>
    <a href="account.php"><input type="button" class ="account" value="Go Back" size="16"></a>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo '<br>The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded!
        <span><br>Photo uploaded! You will be redirected to the account page.<br></span>
        <script type="text/javascript">
            <!--
        setTimeout(function () {
            window.location = "account.php"
            }, 5000);
            //-->
        </script>';
    } else {
        echo '<br>Sorry, there was an error uploading your file.<br>
               <a href="account.php"><input type="button" class ="account" value="Go Back" size="16"></a>
            
            ';
    }
}