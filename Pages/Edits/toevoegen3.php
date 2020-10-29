<?php
class CijferToevoegen

b


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {

        function Engels()
        {
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

                echo "Cijfer succesfull toegevoegt";
                sleep("2");
                header("location: ../StudentGrades/Index.php");

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        function Nederlands()
        {
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

                echo "Cijfer succesfull toegevoegt";
                sleep("2");
                header("location: ../StudentGrades/Index.php");

            } catch (Exception $e) {
                echo $e->getMessage();

            }
        }

        if (isset($_GET['engels'])) {
            engels();


        } elseif (isset($_GET['nederlands'])) {
            Nederlands();
        }
    }
}
?>

</body>
</html>