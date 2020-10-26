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
    Email:
    <input type="text" value="" name="Email"> <br>


    <input type="submit" value="Inloggen">
</form>
<!--<a href="make%20account.php">No account?</a>-->

<?php
// $conn = new mysqli(, $this->host, $this->pass, $this->db);

//if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST["user"];
$pass = $_POST["ww"];
$email = $_POST["Email"];

try {
    require_once("MysqlConnection.php");
    $mysql = new MysqlConnection();


    require_once("newlogin3_email.php");
    $login = new Login2($name, $pass, $email, $mysql->connect());

    $login->Login( $login->ChecksUsername(), $login->ChecksPassword(), $login->ChecksEmail());


} catch (Exception $e) {
    echo  $e->getMessage();
}



?>


</body>
</html>

