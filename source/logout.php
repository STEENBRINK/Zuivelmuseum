<?php

require_once("reference/reference.php");

unset($_SESSION['user_id']);
header("Location: index.php");