<?php

class NieuwEngelsCijfer
{

    public function NewGradeEn(int $Cijfer, string $Datum, string $Toetsnaam, int $studentenID, int $LerarenID, object $mysql)
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

        echo "Cijfer succesvol toegevoegt!";

    }

    public function NewGradeNl(int $Cijfer, $Datum, string $Toetsnaam, int $studentenID, int $LerarenID, object $mysql)
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

        echo "Cijfer succesvol toegevoegt!";
    }

    public function NewGradeStudent(object $mysql, int $studentID, int $Cijfer, int $Datum, string $Toetsnaam, int $IdLeraar, string $vak)
    {

        if ($vak == "Engels") {
            $stmt = $mysql->prepare("INSERT INTO `engels`(`ID`, `Cijfer`, `Datum`, `toetsNaam`, `Studenten_ID`, `Leraren_ID`) VALUES (DEFAULT,?,?,?,?,?);");

        } elseif ($vak == "Nederlands") {
            $stmt = $mysql->prepare("INSERT INTO `nederlands`(`ID`, `Cijfer`, `Datum`, `toetsNaam`, `Studenten_ID`, `Leraren_ID`) VALUES (DEFAULT,?,?,?,?,?);");

        }

        if (false === $stmt) {
            throw new Exception($mysql->error);
        }

        $bind = $stmt->bind_param('sssss', $Cijfer, $Datum, $Toetsnaam, $studentID, $IdLeraar,);
        if (false === $bind) {
            throw new Exception($stmt->error);
        }

        $bind = $stmt->execute();

        if (false === $bind) {
            throw new Exception($stmt->error);
        }
        $stmt->close();

        echo "Cijfer succesvol toegevoegt!";

    }

    public function ChangeGrade(object $mysql, int $Cijfer, int $ID, string $vak)
    {

        if ($vak == "Engels") {
            $stmt = $mysql->prepare("UPDATE engels SET Cijfer=? WHERE ID =?;");

        } elseif ($vak == "Nederlands") {
            $stmt = $mysql->prepare("UPDATE nederlands SET Cijfer=? WHERE ID =?;");
        }

        $stmt->bind_param('ss', $Cijfer, $ID);

        $stmt->execute();

        echo "Cijfer succesvol veranderd!";

    }

}