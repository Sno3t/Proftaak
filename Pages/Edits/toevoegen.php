<!doctype html>
<html lang="nl">
<head>
    <title>Cijfer Invoeren</title>
</head>
<body>
<form action="" method="post">
    <table>
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
            <td>StudentenID</td>
            <td><input type="text" name="LeerlingID"></td>
        </tr>
        <tr>
            <td>LerarenID</td>
            <td><input type="text" name="LerarenID"> <br></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit"></td>
        </tr>
    </table>
</form>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {

        if ($_GET['engels'] == true) {
            try {
                if (!empty($_POST['Cijfer']) && !empty($_POST['Datum'] && !empty($_POST['Toetsnaam'] && !empty($_POST['LeerlingID'] && !empty($_POST['LerarenID']))))) {
                    $Cijfer = $_POST['Cijfer'];
                    $Datum = $_POST['Datum'];
                    $Toetsnaam = $_POST['Toetsnaam'];
                    $leerlingID = $_POST['LeerlingID'];
                    $LerarenID = $_POST['LerarenID'];

                } else {
                    throw new Exception("Een van de variabelen is leeg.");
                }


                require_once("../../Classes/MysqlConnection.php");
                $mysql = new MysqlConnection();

                require_once("CijferAdd.php");
                $eng = new NieuwEngelsCijfer();

                $eng->NewGradeEn($Cijfer, $Datum, $Toetsnaam, $leerlingID, $LerarenID, $mysql->connectCijfer());

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }


        if ($_GET['nederlands'] == true) {
            try {
                if (!empty($_POST['Cijfer']) && !empty($_POST['Datum'] && !empty($_POST['Toetsnaam'] && !empty($_POST['LeerlingID'] && !empty($_POST['LerarenID']))))) {
                    $Cijfer = trim($_POST['Cijfer']);
                    $Datum = trim($_POST['Datum']);
                    $Toetsnaam = trim($_POST['Toetsnaam']);
                    $leerlingID = trim($_POST['LeerlingID']);
                    $LerarenID = trim($_POST['LerarenID']);

                } else {
                    throw new Exception("Een van de variabelen is leeg.");
                }


                require_once("../../Classes/MysqlConnection.php");
                $mysql = new MysqlConnection();

                require_once("CijferAdd.php");
                $eng = new NieuwEngelsCijfer();

                $eng->NewGradeNl($Cijfer, $Datum, $Toetsnaam, $leerlingID, $LerarenID, $mysql->connectCijfer());

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
?>

</body>
</html>