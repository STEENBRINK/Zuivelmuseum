<?php

//connect
require_once("reference/reference.php");
$admin = false;
$login = false;
$username = '';

// define variables and set to empty values
$editID = -1;
$admin = $editAdmin = 0;
$nameErr = $emailErr = $editName = $editEmail = "";
$name = $email = $errorendpage = "";
$canPass = $booleanName = $booleanEmail = $giveErr = false;

//if not logged in redirect
//else get the user to be eddited from db
if(!isset($_SESSION['user_id'])){
    header('Location:redirectlogin.php');
}else{
    $login = true;
    $username = getUsername();
    if(isAdmin()){
        $admin = true;
        $q = "SELECT * FROM `users` WHERE `ID` = '$_POST[ID]'";
        $result = mysqli_query(getConnection(), $q);
        $resultrow = mysqli_fetch_row($result);
        $editID = $resultrow[0];
        $editName = $resultrow[1];
        $editEmail = $resultrow[3];
        $editAdmin = $resultrow[4];
    }
}

//check if username is according to standards
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['check'] == '1'){
        $giveErr = true;
    }

    if (empty($_POST["username"])) {
        $nameErr = "<br>Name is required<br>";
    } else {
        $name = test_input($_POST["username"]);
        // check if name only contains letters and whitespace and numbers
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {
            $nameErr = "<br>Only letters, numbers and white space allowed<br>";
        } if(usernameinuse()){
            $nameErr = "<br>Username allready in use<br>";
        } else {
            //name correcly entered
            $booleanName = true;
        }
    }

//check if email is according to standards
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "<br>Invalid e-mail format<br>";
        } if(emailinuse()) {
            $emailErr = "<br>E-mail allready in use<br>";
        }else {
            //email correcly entered
            $booleanEmail = true;
        }
    }

    //check if data in form is correctly entered
    if ($booleanName && $booleanEmail) {
        $canPass = true;
        updateUser();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//updates the user with the new data
function updateUser()
{
    global $errorendpage;
    $ID = $_POST['ID'];
    $username = $_POST['username'];
    $e_mail = $_POST['email'];
    if(isset($_POST['admin'])){
        $admin = 1;
    }else{
        $admin = 0;
    }

    $sql = "UPDATE users
    SET username = '$username', email = '$e_mail', admin = '$admin' 
    WHERE ID = '$ID'";
    $result = mysqli_query(getConnection(), $sql);
    if($result) {
        //go back to the main page if the user is added correctly
        $errorendpage = '
        <span><br>Account creation succesfull! You will be redirected to the main page.<br></span>
        <script type="text/javascript">
            <!--
            setTimeout(function () {
                window.location = "index.php"
            }, 5000);
            //-->
        </script>
        ';
    }
}

//check if username in use
function usernameinuse(){
    global $connection;
    $username = $_POST["username"];
    //if username exists in database return true
    $query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($connection, $query);
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        $row = mysqli_fetch_row($result);
            if($row[0] != $_POST['ID']){
                return true;
            }
    }
}

//check if email in use
function emailinuse(){
    global $connection;
    $email = $_POST["email"];
    //if username exists in database return true
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($connection, $query);
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        $row = mysqli_fetch_row($result);
        if($row[0] != $_POST['ID']){
            return true;
        }
    }
}

$disconnect = mysqli_close($connection);

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <title>Edit</title>
        <link rel="icon" href="Icon.png">
    </head>
    <body>
        <nav id="menu">
            <ul>
                <li><a href="index.php#wiezijnwij">Wie Zijn Wij</a></li>
                <li><a href="index.php#doelstelling">Doelstelling</a></li>
                <li><a href="index.php#fotos">Foto's</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <li id="login">
                    <a href="<?php if($login){ echo "account.php"; }else{echo "login.php";} ?>">
                        <?php if($login){ echo $username; }else{echo "Login";} ?>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="account" class="notfilled">
            <form name="edit" method="post" action="<?php if($canPass){header('location:account.php');} ?>" id="edit">
                <input type="hidden" name="check" value="1">
                <input type="hidden" name="ID" value="<?php echo $editID; ?>">
                <input value= "<?php echo $editName ?>" size=8 name="username"><br>
                <span class="error"> <?php if($giveErr){ echo  $nameErr;} ?></span>
                <input type="email" value="<?php echo $editEmail ?>" size="8" name="email"><br>
                <span class="error"> <?php if($giveErr){ echo $emailErr; }?></span>
                <p>Admin: </p><input type="checkbox" value="Admin" name="admin"<?php if($editAdmin == 1){ echo "checked";} ?>>
                <input type="submit" class="index" id="search" size="8" value="Edit"><br><br><br>
            </form>
            <form action="delete.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $editID; ?>">
                <input type="submit" class="delete" id="search" value="Delete account" size="16">
            </form>
            <form action="account.php">
                <input type="submit" value="Cancel" size="16">
            </form>
        </div>
    </body>
</html>
