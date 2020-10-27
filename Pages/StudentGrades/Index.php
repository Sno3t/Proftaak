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

Van welk Vak wil je de Punten zien?
<a href="Nederlands.php">Nederlands</a>
<a href="">Engels</a>


<?php

try{
    require_once("../../Classes/MysqlConnection.php");
    $mysql = new MysqlConnection();

    require_once("Nederlands.php");
    $neder = new Nederlands($mysql->connectCijfer());
    $neder->Results();

} catch (Exception $e) {
    echo $e->getMessage();
}

?>

</body>
</html>

