<?php

class Login
{

    private $username;
    private $password;
    private $conn;


    public function __construct($Username, $Password, $Conn)
    {
        $this->username = $Username;
        $this->password = $Password;
        $this->conn = $Conn;


    }


    function ChecksUsername()
    {

        if (empty ($this->username)) {
//            echo "Please enter username.";
//            die;
            throw new Exception("No username inserted");
        } else {
            return mysqli_real_escape_string($this->conn, $this->username);
        }
    }


    function ChecksPassword()
    {
        if (empty($this->password)) {
//            echo "Please enter your password.";
//            die;
            throw new Exception("No password inserted");
        } else {

             return mysqli_real_escape_string($this->conn, $this->password);

        }


    }



    function Login($username,$password)
    {

        $sql = "SELECT ID, Username, Password, Admin FROM login WHERE BINARY Username = ?";

        if ($stmt = mysqli_prepare($this->conn, $sql)) {

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

                           echo "aaa";
                            exit;

                        } else {
                            // Verkeerd wachtwoord
//                            echo "Verkeerd wachtwoord of username";
//                            header('refresh:2;url=login.php');
                            throw new Exception("Verkeerd wachtwoord of username1");

                        }
                    }
                } else {
                    // Username bestaat niet
//                    echo "Verkeerd wachtwoord of username";
//                    header('refresh:2;url=login.php');
                    throw new Exception("Verkeerd wachtwoord of username2");

                }
            } else {
                // statement gaat fout
//                echo "Dit hoort niet te gebeuren, go back.";
                throw new Exception("Dit hoort niet te gebeuren, ga terug");

            }


            mysqli_stmt_close($stmt);
        }

        mysqli_close($this->conn);


    }


}