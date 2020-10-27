<html>
    <head>
        <title></title>
    </head>
<body>
    <form action="" method="post">

        Cijfer:
        <input name="Cijfer"> <br>
        Datum:
        <input name="Datum"> <br>
        Toets naam:
        <input name="Toetsnaam"> <br>
        Studenten ID:
        <input name="$studentenID"> <br>
        Leraren ID:
        <input name="$LerarenID"> <br>
        <input type="submit">
    </form>

</body>

</html>

<?php
require_once("../../Classes/MysqlConnection.php");
$mysql = new MysqlConnection();

if (isset($_GET['Engels'])) {

    try {
        $stmt = $mysql->prepare("INSERT INTO `engels`(`ID`, `Cijfer`, `Datum`, `toetsNaam`, `Studenten_ID`, `Leraren_ID`) VALUES (,?,?,?,?,?);");
        $stmt->bind_param('sssss', $Cijfer, $Datum, $Toetsnaam, $studentenID, $LerarenID);


        $Cijfer = $_POST['Cijfer'];
        $Datum = $_POST['Datum'];
        $Toetsnaam = $_POST['Toetsnaam'];
        $studentenID = $_POST['StudentenID'];
        $LerarenID = $_POST['LerarenID'];

        $stmt->execute();
        $stmt->close();

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}