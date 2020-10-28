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
            <td><input name="Cijfer"></td>
        </tr>
        <tr>
            <td>Datum:</td>
            <td><input name="Datum"></td>
        </tr>
        <tr>
            <td>Toetsnaam</td>
            <td><input name="Toetsnaam2"></td>
        </tr>
        <tr>
            <td>StudentenID</td>
            <td><input name="LeerlingID"></td>
        </tr>
        <tr>
            <td>LerarenID</td>
            <td><input name="LerarenID"> <br></td>
        </tr>
        <tr>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


if(!empty($_POST['Cijfer']) && !empty($_POST['Datum'] && !empty($_POST['Toetsnaam'] && !empty($_POST['LeerlingID'] && !empty($_POST['LerarenID']))))) {
    $Cijfer = $_POST['Cijfer'];
    $Datum = $_POST['Datum'];
    $Toetsnaam = $_POST['Toetsnaam'];
    $leerlingID = $_POST['LeerlingID'];
    $LerarenID = $_POST['LerarenID'];
} else{
    throw new Exception("Variabelen is leeg");
}

    if (isset($_GET['Engels'])) {


        try {

            require_once("../../Classes/MysqlConnection.php");
            $mysql = new MysqlConnection();

            require_once("EngelsCijferAdd.php");
            $eng = new NieuwEngelsCijfer();
            $eng->Newgrade($Cijfer, $Datum, $Toetsnaam, $leerlingID, $LerarenID);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>

</body>
</html>