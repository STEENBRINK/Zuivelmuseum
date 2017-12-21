<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <title>Create account</title>
</head>

<?php
require_once("reference/reference.php");
if(isset($_SESSION['user_id'])){
    header('Location:redirectlogout.html');
}

// define variables and set to empty values
$nameErr = $emailErr = $pass1Err = $pass2Err = "";
$name = $email = $pass1 = $pass2 = $errorendpage = "";
$canPass = $booleanName = $booleanPass1 = $booleanPass2 = $booleanEmail = $match = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "<br>Name is required<br>";
    } else {
        $name = test_input($_POST["name"]);
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["pass1"])) {
            $pass1Err = "<br>Password is required<br>";
        } else {
            $pass1 = test_input($_POST["pass1"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9]*$/", $pass1)) {
                $pass1Err = "<br>Only letters and numbers allowed<br>";
            } if($pass1 == "password"){
                $pass1Err = "<br>Password can't be password<br>";
            }else {
                //pass1 correcly entered
                $booleanPass1 = true;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["pass2"])) {
                $pass2Err = "<br>Password validation is required<br>";
            } else {
                $pass2 = test_input($_POST["pass2"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9]*$/", $pass2)) {
                    $pass2Err = "<br>Only letters and numbers allowed<br>";
                } else {
                    //pass2 correcly entered
                    $booleanPass2 = true;
                }
            }
        }

        if ($pass1 != $pass2){
            $errorendpage = "<span class='error'><br>Your passwords do not match!<br></span>";
        }else {
            $match = true;
        }

    }

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
    if ($booleanName && $booleanPass1 && $booleanPass2 && $booleanEmail && $match) {
        addNewUser();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addNewUser()
{
    global $errorendpage;
    $username = $_POST['name'];
    $password = md5($_POST['pass1']);
    $e_mail = $_POST['email'];

    $sql = "INSERT INTO
    users(ID, username, password, email)
    VALUES(null,'$username','$password','$e_mail')";
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

function usernameinuse(){
    global $connection;
    $username = $_POST["name"];
    //if username exists in database return true
    $query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($connection, $query);
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        return true;
    }
}

function emailinuse(){
    global $connection;
    $email = $_POST["email"];
    //if username exists in database return true
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($connection, $query);
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        return true;
    }
}

$disconnect = mysqli_close($connection);

?>

<body>
<nav id="menu">
    <ul>
        <li><a href="index.php#wiezijnwij">Wie Zijn Wij</a></li>
        <li><a href="index.php#doelstelling">Doelstelling</a></li>
        <li><a href="index.php#fotos">Foto's</a></li>
        <li><a href="index.php#nieuws">Nieuws</a></li>
        <li><a href="index.php#links">Links</a></li>
        <li><a href="index.php#boeken">Boeken</a></li>
        <li id="login"><a href="login.php">Login</a></li>
    </ul>
</nav>
<div id="sections">
    <h1>Registration</h1>
    <form id="creation" method="post" action="<?php if($canPass){header('location:index.php');} ?>">
        <p>Username*:</p><input name="name" value="<?php echo $name;?>">
        <span class="error"> <?php echo  $nameErr;?></span>
        <p>Password*:</p><input type="password" name="pass1" value="<?php echo $pass1;?>">
        <span class="error"> <?php echo $pass1Err;?></span>
        <p>Repeat Password*:</p><input type="password" name="pass2" value="<?php echo $pass2;?>">
        <span class="error"> <?php echo $pass2Err;?></span>
        <p>E-mail*:</p><input type="email" name="email" value="<?php echo $email;?>">
        <span class="error"> <?php echo $emailErr;?></span>
        <input type="submit" name="submit" value="Submit">
        <p class="small">* Is required</p>
        <?php
        echo $errorendpage;
        ?>
    </form>

</div>
</body>
</html>