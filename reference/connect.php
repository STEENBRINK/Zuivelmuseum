<?php
/**
 * Created by PhpStorm.
 * User: STEENBRINK
 * Date: 23-11-2015
 * Time: 11:55
 */

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "zuivelmuseum");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or die("Unable to connect: " . $connection->connect_error );
mysqli_select_db($connection, DB_NAME) or die("Database selection failed: " . $connection->error);

session_start();

function getConnection(){
    global $connection;
    return $connection;
}