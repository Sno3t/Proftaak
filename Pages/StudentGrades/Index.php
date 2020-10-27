<!doctype html>
<html>
<head>
    <title>Kras Hosting</title>
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

<h>Welcome to the homepage!</h> <br>

Van welk Vak wil je de Punten zien? <br>
<a href='index.php?Nederlands=true'>Nederlands</a>
<a href='index.php?Engels=true'>Engels</a>





<?php
require_once("../../Classes/MysqlConnection.php");
$mysql = new MysqlConnection();

if (isset($_GET['Engels'])) {

    try {
        require_once("Engels.php");
        $eng = new Engels();
        $eng->EngelsResultaten($mysql->connect());

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

if (isset($_GET['Nederlands'])) {

    try {
    require_once("Nederlands.php");
    $nl = new Nederlands();
    $nl->NederlandsResultaten($mysql->connect());

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}




?>

</body>
</html>

