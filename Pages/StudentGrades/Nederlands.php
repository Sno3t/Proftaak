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
$sql = "SELECT studenten.ID,studenten.Naam, nederlands.Cijfer, nederlands.Datum FROM ( nederlands INNER JOIN studenten ON nederlands.Studenten_ID = studenten.ID);";

if ($stmt = mysqli_prepare($this->conn, $sql)) {

    mysqli_stmt_bind_param($stmt, "ssss", $ID, $naam, $cijfer, $datum);


    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_store_result($stmt);


            mysqli_stmt_bind_result($stmt, $id, $ID, $naam, $cijfer, $datum);

            if (mysqli_stmt_fetch($stmt)) {

        }
    }
    throw new Exception("Er gaat iets fout");
}

?>

</body>
</html>

