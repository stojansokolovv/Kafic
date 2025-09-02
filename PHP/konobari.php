<?php
include "conection.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/stil.css" rel="stylesheet" >
    <title>Document</title>
</head>
<body>
    <?php 
        include "meni.php";

        $upit=
        "SELECT 
        k.ime,
        k.prezime,
        count(distinct n.zauzet_sto_id) as stolovaUsluzeno
        FROM konobar as k
        INNER JOIN narudzbina as n on n.konobar_id=k.id
        GROUP BY k.ime,k.prezime
        ;";
        $rezultat=$konekcija->query($upit);

    ?>
    <div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Ime </th>
            <th>Prezime </th>
            <th>Ukupno usluzeno stolova </th>
        </tr>
        </thead>
        <?php
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['ime']."</td>
                            <td>".$red['prezime']."</td>
                            <td>".$red['stolovaUsluzeno']."</td>
                      </tr>";

            }
        ?>
    </table>
    </div>
</body>
</html>