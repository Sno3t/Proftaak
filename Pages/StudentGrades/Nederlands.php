<!doctype html>
<html>
<head>
    <title>Kras Hosting</title>
    <meta charset="utf-8">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px;

        }
    </style>
</head>
<body>


<?php


function Results()
{

    $sql = "SELECT studenten.ID,studenten.Naam, nederlands.Cijfer, nederlands.Datum FROM ( nederlands INNER JOIN studenten ON nederlands.Studenten_ID = studenten.ID);";

    $mysqli = new mysqli("localhost", "php_user", "123", "cijfers");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->execute();


        $stmt->bind_result($ID, $naam, $cijfer, $datum);


        while ($stmt->fetch()) {

            echo "  
       <tr>
        <td>" . $ID . "</td>
        <td>" . $naam . "</td>
        <td>" . $cijfer . "</td>
        <td>" . $datum . "</td>
        <td><a href=''>Wijzigen?</a></td>
       </tr>";

        }
        $stmt->close();

    }
    $mysqli->close();

}


?>


<table>
    <thead>
    <tr>
        <td>Studenten ID</td>
        <td>Naam</td>
        <td>Cijfer</td>
        <td>Datum</td>
    </tr>
    </thead>
    <tbody>
        <?= Results() ?>
    </tbody>
</table>

</body>
</html>

