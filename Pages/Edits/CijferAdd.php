<?php

class NieuwEngelsCijfer
{

    public function NewGradeEn($Cijfer, $Datum, $Toetsnaam, $studentenID, $LerarenID, $mysql)
    {


        $stmt = $mysql->prepare("INSERT INTO `engels`(`ID`, `Cijfer`, `Datum`, `toetsNaam`, `Studenten_ID`, `Leraren_ID`) VALUES (DEFAULT,?,?,?,?,?);");

        if (false === $stmt) {
            throw new Exception($mysql->error);
        }

        $bind = $stmt->bind_param('sssss', $Cijfer, $Datum, $Toetsnaam, $studentenID, $LerarenID);
        if (false === $bind) {
            throw new Exception($stmt->error);
        }

        $bind = $stmt->execute();

        if (false === $bind) {
            throw new Exception($stmt->error);
        }
        $stmt->close();

    }

    public function NewGradeNl($Cijfer, $Datum, $Toetsnaam, $studentenID, $LerarenID, $mysql)
    {


        $stmt = $mysql->prepare("INSERT INTO `nederlands`(`ID`, `Cijfer`, `Datum`, `toetsNaam`, `Studenten_ID`, `Leraren_ID`) VALUES (DEFAULT,?,?,?,?,?);");

        if (false === $stmt) {
            throw new Exception($mysql->error);
        }

        $bind = $stmt->bind_param('sssss', $Cijfer, $Datum, $Toetsnaam, $studentenID, $LerarenID);
        if (false === $bind) {
            throw new Exception($stmt->error);
        }

        $bind = $stmt->execute();

        if (false === $bind) {
            throw new Exception($stmt->error);
        }
        $stmt->close();

    }


}