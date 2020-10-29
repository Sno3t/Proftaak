<?php

//$sql = "SELECT Naam, nederlands.Cijfer AS \"NL Cijfer\", engels.Cijfer AS \"EN Cijfer\"
//FROM (( studenten
//INNER JOIN engels ON studenten.ID = engels.Studenten_ID)
//INNER JOIN nederlands ON studenten.ID = nederlands.Studenten_ID);";

$sql = "SELECT studenten.ID, Naam, AVG(nederlands.Cijfer) AS `NL Cijfer`, AVG(engels.Cijfer) AS `EN Cijfer`
FROM (( studenten
INNER JOIN engels ON studenten.ID = engels.Studenten_ID)
INNER JOIN nederlands ON studenten.ID = nederlands.Studenten_ID);";

$da = new mysqli("localhost", "php_user", "123", "cijfers"); // Om een of andere reden werkt de mysql connection class niet op deze file specifiek. "MYSQL server has gone away"
//$sql = "SELECT naam FROM studenten";
$stmt = $da->prepare($sql);

//$stmt->bind_result($naam, $nlcijfer, $encijfer);
$stmt->bind_result($ID, $naam, $nlcijfer, $encijfer);

$stmt->execute();

//while ($stmt->fetch()) {
//    echo $naam . "<br>Gemiddeld NL " . $nlcijfer . "<br>Gemiddeld EN " . $encijfer;
//}

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
                    <td>Average NL</td>
                    <td>Average En</td>
                </tr>
                </thead>
                <tbody>";

while ($stmt->fetch()) {
    echo "  
       <tr>
            <td> " . $naam . "</td>
            <td>" . round($nlcijfer,2) . "</td>
            <td>" . round($encijfer,2) . "</td>
    
            <td><td colspan='3'><a href='../Edits/toevoegen2.php.php?id=" . $ID."'>Nieuw cijfer invoeren?</a></td></td>
       </tr>

       ";
}

echo "
                </tbody>
            </table>";

