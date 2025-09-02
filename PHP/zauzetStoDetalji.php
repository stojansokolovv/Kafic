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
        z.id,
        z.vreme_dolaska,
        z.vreme_odlaska,
        CONCAT(z.broj_osoba,'/',s.broj_mesta) AS popunjenost,
        if(s.vip_sto=1,'VIP','Obican sto') as tip_stola
        FROM zauzet_sto AS z
        INNER JOIN sto AS s ON z.sto_id=s.id
        WHERE z.id=".$_GET['zauzet_sto_id'].";";
        $rezultat=$konekcija->query($upit);
        $red=$rezultat->fetch_assoc();
    ?>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>Vreme dolaska </th>
                <th>Vreme odlaska </th>
                <th>Popunjenost </th>
                <th>Tip stola </th>
                <th>Ukupan racun </th>
            </tr>
            </thead>
            <?php
                $upit2=
                "SELECT
                SUM(n.kolicina*(a.cena+a.cena*0.1*s.vip_sto)) AS trosak
                FROM narudzbina AS n 
                    INNER JOIN artikal AS a on a.id=n.artikal_id
                    INNER JOIN zauzet_sto AS z on n.zauzet_sto_id=z.id
                    INNER JOIN sto AS s ON z.sto_id=s.id
                WHERE zauzet_sto_id=".$red['id'].";
            ";
                $rezultat2=$konekcija->query($upit2);
                $red2=$rezultat2->fetch_assoc();
                $racun=$red2['trosak'];
                    echo "<tr>
                                <td>".$red['vreme_dolaska']."</td>
                                <td>".$red['vreme_odlaska']."</td>
                                <td>".$red['popunjenost']."</td>
                                <td>".$red['tip_stola']."</td>
                                <td>".$racun."</td>
                        </tr>";

                
            ?>
        </table>
    </div>

<?php
$upit=
"SELECT 
a.naziv AS artikal,
a.cena,
n.kolicina,
 (a.cena+s.vip_sto*0.1*a.cena)*n.kolicina AS ukupna_cena,
CONCAT (k.ime, ' ',k.prezime) AS konobar
From narudzbina  as n
INNER JOIN artikal as a on n.artikal_id=a.id
INNER JOIN konobar as k on n.konobar_id=k.id
INNER JOIN zauzet_sto AS z ON z.id=n.zauzet_sto_id
INNER JOIN sto AS s ON s.id=z.sto_id
WHERE n.zauzet_sto_id=".$_GET['zauzet_sto_id']."
;";
$rezultat=$konekcija->query($upit);
?>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Artikal</th>
            <th>Cena</th>
            <th>Kolicina</th>
            <th>Ukupna cena</th>
            <th>Konobar</th>
        </tr>
        </thead>
    <?php
        while($red=$rezultat->fetch_assoc()){
            echo "<tr>
                        <td>".$red['artikal']."</td>
                        <td>".$red['cena']."</td>
                        <td>".$red['kolicina']."</td>
                        <td>".$red['ukupna_cena']."</td>
                        <td>".$red['konobar']."</td>
                </tr>";

        }
    ?>
</table>
</div>
</body>
</html>