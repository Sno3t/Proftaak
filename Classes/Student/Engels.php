<?php

class Engels
{
    public function EngelsResultaten($mysqli)
    {
        $sql = "SELECT studenten.ID,studenten.Naam, engels.Cijfer, engels.toetsNaam, engels.Datum, engels.ID FROM ( engels INNER JOIN studenten ON engels.Studenten_ID = studenten.ID);";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();

            $stmt->bind_result($ID, $naam, $cijfer, $testname, $datum, $engelsID);

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
        <td><a href='../Pages/Edits/Wijzigen.php?id=" . $engelsID . "&Vak=Engels '>Wijzigen?</a></td>
       </tr>";

            }
            echo "
              <tr>
                <td></td>
                <td colspan='3'><a href='../Pages/Edits/toevoegen.php?engels=true'>Nieuw cijfer invoeren?</a></td>
            </tr>
                </tbody>
            </table>";
            $stmt->close();

        }
        $mysqli->close();
    }

}

