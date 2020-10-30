<?php

class Account
{


    public function Exists(object $conn, string $email)
    {

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

    public function CreateAccount(string $name, string $psswd, string $email, object $conn)
    {
        $stmt = $conn->prepare("INSERT INTO `login`(`ID`, `Admin`, `Username`, `Password`, `Email`) VALUES (DEFAULT, 0, ?,?,?);");
//        echo $conn -> error;die;
        $stmt->bind_param('sss', $name, $psswd, $email);

        $stmt->execute();
        $stmt->close();


    }


}

?>