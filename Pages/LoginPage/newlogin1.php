<!doctype html>
<html>
<head>
    <title>Login pagina</title>
    <meta charset="utf-8">
</head>
<body>


<h1> Login</h1>

<form action="" method="post">

    <table>
        <tr>
            <td>Voornaam</td>
            <td><input type="text" value="" name="user"></td>
        </tr>
        <tr>
            <td>Wachtwoord</td>
            <td><input type="password" value="" name="ww"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" value="" name="Email"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Inloggen"></td>
            <td><a href="Pages/LoginPage/make account.php">No account?</a></td>
        </tr>
    </table>
</form>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["user"];
    $pass = $_POST["ww"];
    $email = $_POST["Email"];

    try {
        require_once("../../Classes/MysqlConnection.php");
        $mysql = new MysqlConnection();

        require_once("../../Classes/newlogin3_email.php");
        $login = new Login2($name, $pass, $email, $mysql->connect());

        $login->Login($login->ChecksUsername(), $login->ChecksPassword(), $login->ChecksEmail());

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}
?>

</body>
</html>

