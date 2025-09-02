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
        naziv,
        cena,
        cena+cena*0.1 as vipCena
        FROM artikal;";
        $rezultat=$konekcija->query($upit);

    ?>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Artikal </th>
                    <th>Cena </th>
                    <th>Vip cena </th>
                </tr>
            </thead>
            <?php
                while($red=$rezultat->fetch_assoc()){
                    echo "<tr>
                                <td>".$red['naziv']."</td>
                                <td>".$red['cena']."</td>
                                <td>".$red['vipCena']."</td>
                        </tr>";

                }
            ?>
        </table>
    </div>
</body>
</html>