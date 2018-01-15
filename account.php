<?php
$picktures = [];
$counter = 0;

//connect
require_once("reference/reference.php");
$admin = $login = $canPass = false;
$username = $photoErr = '';


if(!isset($_SESSION['user_id'])){
    header('Location:redirectlogin.html');
}else{
    $login = true;
    $username = getUsername();
    if(isAdmin()){
        $admin = true;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unlink('images/' . $_POST("file"));
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <title>Account</title>
    </head>
    <body>
        <nav id="menu">
            <ul>
                <li><a href="index.php#wiezijnwij">Wie Zijn Wij</a></li>
                <li><a href="index.php#doelstelling">Doelstelling</a></li>
                <li><a href="index.php#nieuws">Nieuws</a></li>
                <li><a href="index.php#links">Links</a></li>
                <li><a href="index.php#boeken">Boeken</a></li>
                <li><a href="photos.php">Foto's</a></li>
                <li id="login">
                    <a href="<?php if($login){ echo "account.php"; }else{echo "login.php";} ?>" class="active">
                        <?php if($login){ echo $username; }else{echo "Login";} ?>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="account">

        <?php

        if ($admin){
            userTable();
            ?>
                <form  method="post" action="upload.php" enctype="multipart/form-data">
                <h1>Foto Upload</h1>
                <p>Select image to upload:</p>
                <span class="error"> <?php echo $photoErr ?> </span>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>

            <?php
            getPhotos();
        }

        function userTable(){?>
            <h1>Registered Accounts</h1>
            <table>
                <tr class="title">
                    <th width="150px">Username</th>
                    <th width="100%">Email</th>
                    <th width="50px">Admin</th>
                    <th width="50px">Edit</th>
                </tr>
            <?php
            $query = "SELECT * FROM `users`";
            $result = mysqli_query(getConnection(), $query);
            while ($row = mysqli_fetch_array($result)){
                ?>
                <tr class="row">
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[3];?></td>
                    <td><?php 
                        if ($row[4] == 0){
                            echo 'No';
                        }
                        if ($row[4] == 1){
                            echo 'Yes';
                        }
                        ;?>
                    </td>
                    <?php
                    if (!($_SESSION['user_id'] == $row[0])) {
                        ?>
                        <td>
                            <form class="table" method="post" action="edit.php">
                                <input type="hidden" name="check" value="0">
                                <input type="hidden" name="ID" value=<?php echo "$row[0]" ?>>
                                <input type="submit" name="submit" value="Edit">
                            </form>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }?>
            </table>
            <a href="accountcreationadmin.php"><input type="button" class ="account" value="Create new account" size="16"></a><br>
            <?php
        }

        function getPhotos() { ?>
            <h1>Photos</h1>
            <table>
                <tr class="title">
                    <th width="150px">Beschrijving</th>
                    <th width="100%">Grootte</th>
                    <th width="50px">Edit</th>
                </tr><?php

            $handle = opendir(dirname(realpath(__FILE__)) . '/images/');
            while ($file = readdir($handle)) {
                if ($file !== '.' && $file !== '..') {?>
                    <tr class="row">
                    <td><?php echo substr($file, 0 , -4);?></td>
                    <td><?php echo filesize('images/'. $file)/1000;?>kb</td>
                    <td>
                        <form class="edit" method="post" action="">
                            <input type="hidden" name="file" value=<?php echo "$file" ?>>
                            <input type="submit" class="delete" name="submit" value="  Delete  ">
                        </form>
                    </td> <?php } ?>
                </tr> <?php } ?>
            </table>
            <a href="accountcreationadmin.php"><input type="button" class ="account" value="Create new account" size="16"></a><br>
            <?php
        }
        ?>
            <h1>Log Out</h1>
            <a href="logout.php"><input type="button" class ="account" value="Log Out" size="16"></a>
        </div>
    </body>
</html>

