<?php
$picktures = [];
$counter = 0;

//connect
require_once("reference/reference.php");
$admin = $login = $canPass = $dateCheck = $timeCheck = false;
$username = $photoErr = $resErr = $succes = '';

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
    if($_POST["reservation"] == 1) {
        if(empty($_POST["date"])){
            $resErr = "Please enter a date";
        }else{
            $dateCheck = true;
        }

        if(empty($_POST["time"])){
            $resErr = "Please enter a time";
        }else{
            $timeCheck = true;
        }

        if(!$dateCheck && !$timeCheck){
            $resErr = "Please enter a date and time";
        }

        if($dateCheck && $timeCheck){
            makeReservation();
        }
    }else {
        if (!empty($_POST["file"])) {
            unlink('images/' . $_POST["file"]);
        }
    }
}

function makeReservation() {
        global $succes;
        $date = mysqli_real_escape_string(getConnection(), $_POST['date']);
        $time = mysqli_real_escape_string(getConnection(), $_POST['time']);

        $sql = "INSERT INTO
                reservations(ID, date, time)
                VALUES(null,'$date','$time')";
        $result_a = mysqli_query(getConnection(), $sql);

        $id = getConnection()->insert_id;

        $querry = 'INSERT INTO
                   koppel(user_id, reservation_id)
                   VALUES(' . $_SESSION['user_id'] . ', ' . $id . ')';

        $result_b = mysqli_query(getConnection(), $querry);

        if($result_a && $result_b) {
            $succes = 'Reservation Succesfull!';
        }
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
                            <input type="hidden" name="reservation" value=0>
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

function reservationTable(){?>
    <h1>Reservations</h1>
    <table>
        <tr class="title">
            <th width="50%">E-mail</th>
            <th width="40%">Date</th>
            <th width="100px">Time</th>
        </tr>
        <?php
        $user_querry = "SELECT * FROM `users`";
        $user_result = mysqli_query(getConnection(), $user_querry);
        $usercount = 0;
        while ($user = mysqli_fetch_array($user_result)){
            $users[$usercount] = $user;
            $usercount++;
        }

        $koppel_querry = "SELECT * FROM `koppel`";
        $koppel_result = mysqli_query(getConnection(), $koppel_querry);
        $koppelcount = 0;
        while ($koppel = mysqli_fetch_array($koppel_result)){
            $koppels[$koppelcount] = $koppel[0];
            $koppelcount++;
        }

        $res_query = "SELECT * FROM `reservations`";
        $res_result = mysqli_query(getConnection(), $res_query);
        while ($row = mysqli_fetch_array($res_result)){
            $year = substr($row[1], -4);
            $month = substr($row[1], 0, -8);
            ltrim($month, '0');
            if(!(date('Y') > (int) $year))
                if(!(date('n') > (int) $month)) {
                    $email = $users[array_search($row[0], $koppels)];
                    ?>
                    <tr class="row">
                        <td><?php echo $email[3]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                    </tr>
                    <?php
                }
        }?>
    </table>
    <?php
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css">
        <!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">-->
        <meta charset="UTF-8">
        <title>Account</title>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker({
                    showButtonPanel: true,
                    changeMonth: true,
                    changeYear: true
                });
                $('.timepicker').timepicker({
                    timeFormat: 'H:mm',
                    interval: 15,
                    minTime: '9',
                    maxTime: '4:30pm',
                    defaultTime: 'now',
                    startTime: '9:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true
                });
            } );
        </script>
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
        <h1>Make a reservation!</h1>
                <form method="post" action="">
                    <span class="error"> <?php echo  $resErr;?></span>
            <input name="date" id="datepicker">
            <input name="time" class="timepicker">
            <input type="hidden" name="reservation" value=1>
            <input type="submit" name="submit" value="Make Reservation">
            </form><?php
        if ($admin){
            reservationTable();
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
        }?>
            <h1>Log Out</h1>
            <a href="logout.php"><input type="button" class ="account" value="Log Out" size="16"></a><br><br>
        </div>
    </body>
</html>

