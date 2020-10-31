<!doctype html>
<html>
<head>
    <title>Account maken</title>
    <meta charset="utf-8">
</head>
<body>

<h1>Account maken</h1>
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
            <td><input type="text" value="" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Account aanmaken"></td>
        </tr>
    </table>
</form>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $email = $_POST["email"];
    $psswd = PASSWORD_HASH($_POST["ww"], PASSWORD_DEFAULT);
    $name = $_POST["user"];


    try {
        require_once("../../Classes/MysqlConnection.php");
        $mysql = new MysqlConnection();

        require_once("../../Classes/LoginFunctions/Makeaccount.php");
        $account = new AccountCreation\Account();


         if ($account->Exists($mysql->connect(),$email) == false) {
             $account->CreateAccount($name, $psswd, $email, $mysql->connect());

         }
         else {

             throw new Exception("Email adress bestaat al");
         }
    }catch (Exception $e) {
        echo $e->getMessage();
    }





//    $stmt = $conn->prepare("INSERT INTO `login`(`Username`, `Password`, `Email`) VALUES (?,?,?);");
//    $stmt->bind_param('sss', $name, $psswd, $email);
//
//    $email = $_POST["email"];
//    $psswd = PASSWORD_HASH($_POST["ww"], PASSWORD_DEFAULT);
//    $name = $_POST["user"];
//
//    if (mysqli_stmt_num_rows($stmt) == 1) {
//        $stmt->execute();
//        $stmt->close();
//
//    }


}


// $conn->close();
?>

</body>
</html>

