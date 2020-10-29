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
            <td>LerarenID</td>
            <td><input type="text" name="LerarenID"> <br></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cijfer Toevoegen"></td>
        </tr>
    </table>
</form>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
    try{
        $id = $_GET['ID'];

    echo "a";
    } catch (Exception $e) {
        echo $e->getMessage();

    }


}
?>

</body>
</html>