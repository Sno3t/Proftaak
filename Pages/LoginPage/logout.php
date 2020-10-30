<?php

session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION ['id']);
unset($_SESSION ['admin']);
session_destroy();
header("location: ../../Index.php");