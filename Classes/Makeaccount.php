<?php
class Account
{


    public function Exists($conn, string $email)
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

    public function CreateAccount($name, $psswd, $email, $conn)
    {
        $stmt = $conn->prepare("INSERT INTO `login`(`Username`, `Password`, `Email`) VALUES (?,?,?);");
        $stmt->bind_param('sss', $name, $psswd, $email);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            $stmt->execute();
            $stmt->close();

        }



    }




}
?>