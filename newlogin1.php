<!doctype html>
<html>
<head>
    <title>Login pagina</title>
    <meta charset="utf-8">
</head>
<body>


<h1> Login</h1>
<form action="" method="post">
    Voornaam:
    <input type="text" value="" name="user"> <br>
    Wachtwoord:
    <input type="password" value="" name="ww"> <br>

    <input type="submit" value="Inloggen">
</form>
<!--<a href="make%20account.php">No account?</a>-->

<?php
// $conn = new mysqli(, $this->host, $this->pass, $this->db);

//if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST["user"];
$pass = $_POST["ww"];

try {
    require_once("Login/MysqlConnection.php");
    $mysql = new MysqlConnection();


    require_once("phpfile.php");
    $login = new Login($name, $pass, $mysql->getConnection());
    $login->ChecksUsername();
    $login->ChecksPassword();

    var_dump($login->ChecksUsername());
    echo "<br>";
    var_dump($login->ChecksPassword());
    echo "<br>";

    $login->Login( $login->ChecksUsername(), $login->ChecksPassword());


} catch (Exception $e) {
    echo  $e->getMessage();
}



?>


</body>
</html>

