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

    </table>
</form>

<?php
    require_once("../../Classes/MysqlConnection.php");
    $mysql = new MysqlConnection();

    $Cijfer = $_POST['Cijfer'];
    $ID = $_GET['id'];

    $stmt = $mysql->prepare("UPDATE engels SET Cijfer=? WHERE ID =" . $ID . ";");

    if (false === $stmt) {
        throw new Exception($mysql->error);
    }

    $bind = $stmt->bind_param('s', $Cijfer);
    if (false === $bind) {
        throw new Exception($stmt->error);
    }

    $bind = $stmt->execute();

    if (false === $bind) {
        throw new Exception($stmt->error);
    }
    $stmt->close();


?>

</body>
</html>