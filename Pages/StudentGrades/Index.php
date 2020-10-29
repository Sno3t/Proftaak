<!doctype html>
<html>
<head>
    <title>Punten overzicht</title>
    <meta charset="utf-8">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px;

        }
    </style>
</head>
<body>
<a href="">Log out</a> <br>

<!--<h>Hello --><?//= $_SESSION['username']?><!--!</h> <br>-->

Van welk Vak wil je de Punten zien? <br>
<a href='index.php?Nederlands=true'>Nederlands</a>
<a href='index.php?Engels=true'>Engels</a>





<?php
//if(isset($_SESSION['loggedin'])){
//    header("location: ../LoginPage/newlogin1.php");
//}


require_once("../../Classes/MysqlConnection.php");
$mysql = new MysqlConnection();

if (isset($_GET['Engels'])) {

    try {
        require_once("Engels.php");
        $eng = new Engels();
        $eng->EngelsResultaten($mysql->connectCijfer());

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

if (isset($_GET['Nederlands'])) {

    try {
    require_once("Nederlands.php");
    $nl = new Nederlands();
    $nl->NederlandsResultaten($mysql->connectCijfer());

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}




?>

</body>
</html>

