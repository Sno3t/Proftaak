<!doctype html>
<html>
    <head>
        <title>Login pagina</title>
        <meta charset="utf-8">
    </head>
    <body>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "php_user", "123", "login");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (empty ($_POST["user"])) {
        echo "Please enter username.";
        die;
    } else {
        $username = mysqli_real_escape_string($conn, ($_POST["user"]));
    }


    if (empty($_POST["ww"])) {
        echo "Please enter your password.";
        die;
    } else {
        $password = mysqli_real_escape_string($conn, ($_POST["ww"]));
    }

    $sql = "SELECT ID, Username, Password, Admin FROM login WHERE BINARY Username = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $param_username);


        $param_username = $username;

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_store_result($stmt);

            // Kijk of naam bestaat
            if (mysqli_stmt_num_rows($stmt) == 1) {

                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $admin);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        session_start();
                        if ($admin === 1) { //default in mijn database = 0
                            $_SESSION['loggedin'] = true;
                            $_SESSION ['username'] = $username;
                            $_SESSION ['id'] = $id;
                            $_SESSION ['admin'] = true;

                        } else {
                            $_SESSION['loggedin'] = true;
                            $_SESSION ['username'] = $username;
                            $_SESSION ['id'] = $id;

                        }

                        header("location: ../Index.php");
                        exit;


                    } else {
                        // Verkeerd wachtwoord
                        echo "Verkeerd wachtwoord of username";
                        header('refresh:2;url=login.php');
                        // throw new Exception("Verkeerd wachtwoord of username");

                    }
                }
            } else {
                // Username bestaat niet
                echo "Verkeerd wachtwoord of username";
                header('refresh:2;url=login.php');
                // throw new Exception("Verkeerd wachtwoord of username");

            }
        } else {
            // statement gaat fout
            echo "Dit hoort niet te gebeuren, go back.";
            // throw new Exception("Stmnt gaat fout");

        }


        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);


}


?>


    </body>
</html>

