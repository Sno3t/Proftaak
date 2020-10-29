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
        require_once("../../Classes/MysqlConnection.php");
        $mysql = new MysqlConnection();
        $mysql->connectCijfer();

        $Cijfer = $_POST['Cijfer'];
        echo $ID = $_GET['id'];

        $stmt = $mysql->connectCijfer()->prepare("UPDATE engels SET Cijfer=? WHERE ID =" . $ID . ";");

        $bind = $stmt->bind_param('s', $Cijfer);

        $bind = $stmt->execute();

        $stmt->close();

    }
}
?>

</body>
</html>