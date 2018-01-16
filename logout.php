<?php

require_once("reference/reference.php");

//delete session
unset($_SESSION['user_id']);
header("Location: index.php");