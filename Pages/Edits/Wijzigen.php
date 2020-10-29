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


//        require_once("../../Classes/MysqlConnection.php");
//        $mysql = new MysqlConnection();
        $da = new mysqli("localhost", "php_user", "123", "cijfers"); // Om een of andere reden werkt de mysql connection class niet op deze file specifiek. "MYSQL server has gone away"

        $Cijfer = $_POST['Cijfer'];
        $ID = $_GET['id'];

        $stmt = $da->prepare("UPDATE engels SET Cijfer=? WHERE ID =?;");

        $stmt->bind_param('ss',  $Cijfer, $ID);

        $stmt->execute();

    }
}
?>

</body>
</html>