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