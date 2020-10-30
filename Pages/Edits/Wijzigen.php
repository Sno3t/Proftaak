<!doctype html>
<html>
<head>

</head>
<body>

<form action="" method="post">

    <table>
        <tr>
            <td>Nieuwe cijfer</td>
            <td><input type="text" value="" name="Cijfer"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Wijzig" name="submit"></td>
        </tr>

    </table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {


        try {
            require_once("../../Classes/MysqlConnection.php");
            $mysql = new MysqlConnection();

            require_once("../../Classes/Cijfers/CijferAdd.php");
            $change = new NieuwEngelsCijfer();

            $Cijfer = $_POST['Cijfer'];
            $ID = $_GET['id'];
            $Vak = $_GET['Vak'];

            $change->ChangeGrade($mysql->connectCijfer(),$Cijfer, $ID, $Vak );




        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}
?>

</body>
</html>