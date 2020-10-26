<?php
class MakeAccount {


   public function Exists($conn, $email)
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
}


// $conn->close();
?>