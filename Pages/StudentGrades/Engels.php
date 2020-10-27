<?php


function Results()
{

    $mysqli = new mysqli("localhost", "php_user", "123", "cijfers");


    $sql = "SELECT studenten.ID,studenten.Naam, engels.Cijfer, engels.Datum FROM ( engels INNER JOIN studenten ON engels.Studenten_ID = studenten.ID);";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->execute();

        $stmt->bind_result($ID, $naam, $cijfer, $datum);

        echo "
            <table>
                <thead>
                <tr>
                    <td>Studenten ID</td>
                    <td>Naam</td>
                    <td>Cijfer</td>
                    <td>Datum</td>
                </tr>
                </thead>
                <tbody>";

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
        echo "
                </tbody>
            </table>";
        $stmt->close();

    }
    $mysqli->close();

}

