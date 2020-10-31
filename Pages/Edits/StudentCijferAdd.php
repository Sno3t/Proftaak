<!doctype html>
<html lang="nl">
<head>
    <title>Cijfer Invoeren</title>
</head>
<body>
<form action="" method="post">
    <table>
        <tr>
            <td>Vak:</td>
            <td><select name="Vak" id="Vak">
                    <option name="Engels">Engels</option>
                    <option name="Nederlands">Nederlands</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Cijfer:</td>
            <td><input type="text" name="Cijfer"></td>
        </tr>
        <tr>
            <td>Datum:</td>
            <td><input type="text" name="Datum"></td>
        </tr>
        <tr>
            <td>Toetsnaam</td>
            <td><input type="text" name="Toetsnaam"></td>
        </tr>
        <tr>
            <td>LerarenID</td>
            <td><input type="text" name="LerarenID"> <br></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cijfer Toevoegen"></td>
        </tr>
    </table>
</form>

<?php
session_start();
if($_SESSION['loggedin'] == false){
    header("location: ../LoginPage/newlogin1.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        try {
            $id = $_GET['id'];
            $Vak = $_POST['Vak'];
            $Cijfer = $_POST['Cijfer'];
            $Datum = $_POST['Datum'];
            $Toetsnaam = $_POST['Toetsnaam'];
            $lerarenID = $_POST['LerarenID'];

            require_once("../../Classes/MysqlConnection.php");
            $mysql = new MysqlConnection();

            require_once("../../Classes/Cijfers/CijferAdd.php");
            $eng = new Grades\NieuweCijfers();
            $eng->NewGradeStudent($mysql->connectCijfer(), $id, $Cijfer, $Datum, $Toetsnaam, $lerarenID, $Vak);

            echo "Cijfer is succesvol toegevoegt";
            header('Refresh: 5; Index.php');
        } catch (Exception $e) {
            echo $e->getMessage();

        }


    }
}
?>

</body>
</html>