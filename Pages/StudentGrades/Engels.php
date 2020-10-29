<?php
class Engels{

    public function EngelsResultaten($mysqli)
    {

        $sql = "SELECT studenten.ID,studenten.Naam, engels.Cijfer, engels.toetsNaam, engels.Datum FROM ( engels INNER JOIN studenten ON engels.Studenten_ID = studenten.ID);";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();

            $stmt->bind_result($ID, $naam, $cijfer, $testname, $datum);



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
        <td>" . $naam . "</td>
        <td>" . $cijfer . "</td>
         <td>" . $testname . "</td>
        <td>" . $datum . "</td>
        <td><a href='../Edits/Wijzigen.php?id=" . $ID . "&Cijfer=" . $cijfer. " '>Wijzigen?</a></td>
       </tr>";

            }
            echo "
              <tr>
                <td></td>
                <td colspan='3'><a href='../Edits/toevoegen.php?engels=true'>Nieuw cijfer invoeren?</a></td>
            </tr>
                </tbody>
            </table>";
            $stmt->close();

        }
        $mysqli->close();
    }

}

