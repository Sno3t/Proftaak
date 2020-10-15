<!doctype html>
<html>
<head>
    <title>Account maken</title>
    <meta charset="utf-8">
</head>
<body>


<?php

$conn = new mysqli("localhost", "php_user", "123", "login");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//$result = $conn->query($select);
//$row = $result->fetch_assoc()


?>

<h1> Make an account</h1>
<form action="" method="post">
    Voornaam:
    <input type="text" value=""  name="user"> <br>
    Wachtwoord:
    <input type="password" value="" name="ww"> <br>
    Email
    <input type="text" value="" name="email" <br> <br>
    <input type="submit" value="Create account">
</form>




<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $stmt = $conn->prepare("INSERT INTO `login`(`Username`, `Password`, `Email`) VALUES (?,?,?);");
    $stmt->bind_param('sss',  $name, $psswd, $email);

    $email = $_POST["email"];
    $psswd = PASSWORD_HASH($_POST["ww"], PASSWORD_DEFAULT);
    $name = $_POST["user"];

    $stmt->execute();

    $stmt->close();

}


//if () {
//    echo "Query executed.";
//} else{
//    echo "Query error.";
//}

//$pass2 = password_hash($_POST["ww"], PASSWORD_DEFAULT);
//$sql = "INSERT INTO `login`(`ID`,`Username`, `Password`, `Email`) VALUES (AUTO_INCREMENT,'$name','$pass2','$mail');";

//if ($conn->query($sql) === TRUE) {
//    echo 'AA';
//
//}
//else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

$conn->close();
?>

</body>
</html>

