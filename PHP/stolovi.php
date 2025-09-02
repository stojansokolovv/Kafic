<?php
include "conection.php";
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
        WHERE z.vreme_dolaska BETWEEN '".$_GET['datum']."' AND '".$_GET['datum']." 23:59:59';";
        $rezultat=$konekcija->query($upit);

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
                    <th></th>
                </tr>
            </thead>
            <?php
            if($rezultat->num_rows==0){
                echo"<tr>
                 <td colspan='6'>Ovog dana nije bilo poseta</td>
                </tr>";
            }
            else{
                while($red=$rezultat->fetch_assoc()){
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
                                <td><a href='zauzetStoDetalji.php?zauzet_sto_id=".$red['id']."'> prikazi vise</a></td>
                        </tr>";

                }
            }
            ?>
        </table>
    </div>
    
</body>
</html>