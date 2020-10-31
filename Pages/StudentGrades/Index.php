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
        .logout{
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body>
<div class="logout"><a href="../LoginPage/logout.php">Log out</a></div> <br>

<p>Van welk Vak wil je de Punten zien?</p>
<a href='index.php?Nederlands=true'>Nederlands</a>
<a href='index.php?Engels=true'>Engels</a>


<?php
session_start();
if($_SESSION['loggedin'] == false){
    header("location: ../LoginPage/newlogin1.php");
}

if (isset($_GET['Engels'])) {
    try {
        require_once("../../Classes/MysqlConnection.php");
        $mysql = new MysqlConnection();

        require_once("../../Classes/Student/Engels.php");
        $eng = new EngelseTabel\Engels();
        $eng->EngelsResultaten($mysql->connectCijfer());

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

if (isset($_GET['Nederlands'])) {

    try {
        require_once("../../Classes/MysqlConnection.php");
        $mysql = new MysqlConnection();

        require_once("../../Classes/Student/Nederlands.php");
        $nl = new  NederlandsTabel\Nederlands();
        $nl->NederlandsResultaten($mysql->connectCijfer());

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

?>

</body>
</html>

