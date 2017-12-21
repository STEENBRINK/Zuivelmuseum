<?php

//connect
require_once("reference/reference.php");
$admin = false;
$login = false;
$username = '';

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
        <title>Account</title>
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

        <?php

        if ($admin){
            userTable();
            uploadButton();
        }

        function uploadButton(){?>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <h1>Foto Upload</h1>
                <p>Select image to upload:</p>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form><?php
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
                    <td>
                        <form class="table" method="post" action="edit.php">
                            <input type="hidden" name="check" value="0">
                            <input type="hidden" name="ID" value=<?php echo "$row[0]" ?>>
                            <input type="submit" name="submit" value="Edit">
                        </form>
                    </td>
                </tr>
                <?php
            }?>
            </table>
            <a href="accountcreation.php"><input type="button" class ="account" value="Create new account" size="16"></a><br>
            <a href="logout.php"><input type="button" class ="account" value="Log Out" size="16"></a><br>
            <a href="info.php"><input type="button" class ="account" value="Info" size="16"></a><br>
            <?php
        }
        ?>
        </div>
    </body>
</html>

