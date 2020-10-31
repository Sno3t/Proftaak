<?php

//$sql = "SELECT Naam, nederlands.Cijfer AS \"NL Cijfer\", engels.Cijfer AS \"EN Cijfer\"
//FROM (( studenten
//INNER JOIN engels ON studenten.ID = engels.Studenten_ID)
//INNER JOIN nederlands ON studenten.ID = nederlands.Studenten_ID);";


$sql = "SELECT studenten.ID, Naam, AVG(nederlands.Cijfer), AVG(engels.Cijfer)
        FROM studenten
        INNER JOIN nederlands
        ON studenten.ID = nederlands.Studenten_ID
        INNER JOIN engels
        ON studenten.ID = engels.Studenten_ID
        GROUP BY studenten.ID;";

$Conn = new mysqli("localhost", "php_user", "123", "cijfers"); // Om een of andere reden werkt de mysql connection class niet op deze file specifiek. "MYSQL server has gone away"
//$sql = "SELECT naam FROM studenten";
$stmt = $Conn->prepare($sql);

//$stmt->bind_result($naam, $nlcijfer, $encijfer);
$stmt->bind_result($ID, $naam, $nlcijfer, $encijfer);

$stmt->execute();


echo "   <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px;

        }
    </style>";

echo "
            <table>
                <thead>
                <tr>
                    <td>Naam</td>
                    <td>Gemiddeld nl cijfer</td>
                    <td>Gemiddeld en cijfer</td>
                </tr>
                </thead>
                <tbody>";

while ($stmt->fetch()) {
    echo "  
       <tr>
            <td> " . $naam . "</td>
            <td>" . round($nlcijfer,2) . "</td>
            <td>" . round($encijfer,2) . "</td>
            <td><td colspan='3'><a href='StudentCijferAdd.php?id=" . $ID."'>Nieuw cijfer invoeren?</a></td></td>
       </tr>

       ";
}

echo "
                </tbody>
            </table>";

