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



//    if ($conn->connect_error) {
//        throw new Exception("Er is iets mis gegaan met de pagina laden.");
//    }

try{

    echo"a";
}catch{

};


    function Exists()
    {

        $conn = new mysqli("localhost", "php_user", "123", "login");
        $email = $_POST["email"];


        $sql = "SELECT count(1) FROM login WHERE Email = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s', $email);

        $stmt->execute();

        $exists = "";
        $stmt->bind_result($exists);

        $stmt->fetch();
        $stmt->close();
        if ($exists) {
            return true;

        } else {
            return false;
        }


    }

    if (exists() == false) {
        echo "a";

    } else {
        echo "Email adress bestaat al";
        throw new Exception("Email adress bestaat al");
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

