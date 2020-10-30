<?php

class Nederlands
{
    public function NederlandsResultaten(object $mysqli)
    {
        $sql = "SELECT studenten.ID,studenten.Naam, nederlands.Cijfer, nederlands.toetsNaam, nederlands.Datum, nederlands.ID FROM ( nederlands INNER JOIN studenten ON nederlands.Studenten_ID = studenten.ID);";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();

            $stmt->bind_result($ID, $naam, $cijfer, $testname, $datum, $nederlandsID);

            echo "
            <table>
                <thead>
                <tr>
                    <td>Naam</td>
                    <td>Cijfer</td>
                    <td>Toets naam</td>
                    <td>Datum</td>
                </tr>
                </thead>
                <tbody>";

            while ($stmt->fetch()) {
                echo "  
       <tr>
        <td><a href='../../Classes/Student/Student.php?name=" . $ID . "'> " . $naam . "</a></td>
        <td>" . $cijfer . "</td>
        <td>" . $testname . "</td>
        <td>" . $datum . "</td>
        <td><a href='../Edits/Wijzigen.php?id=" . $nederlandsID . "&Vak=Nederlands '>Wijzigen?</a></td>
       </tr>";

            }
            echo "
            <tr>
                <td></td>
                <td colspan='3'><a href='../Edits/toevoegen.php?nederlands=true'>Nieuw cijfer invoeren?</a></td>
            </tr>
                </tbody>
            </table>";
            $stmt->close();

        }
        $mysqli->close();
    }

}

