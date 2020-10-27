<?php

class Nederlands
{

    private $conn;

    public function __construct($Conn)
    {
        $this->conn = $Conn;

    }

    public function Results()
    {

        $sql = "SELECT studenten.ID,studenten.Naam, nederlands.Cijfer, nederlands.Datum FROM (nederlands INNER JOIN studenten ON nederlands.Studenten_ID = studenten.ID);";

        if ($stmt = $this->conn->prepare($sql)) {
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
    }
}
