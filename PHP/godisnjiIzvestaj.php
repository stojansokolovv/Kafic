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
        month(z.vreme_dolaska) as mesec,
        year(z.vreme_dolaska) as godina,
        a.naziv,
        sum(n.kolicina) as kolicina,
        sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
        FROM
        zauzet_sto AS z
        INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
        INNER JOIN artikal AS a ON a.id=n.artikal_id
        INNER JOIN sto as s on z.sto_id=s.id
        where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=1
        GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
        ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
        
        ;";
        $rezultat=$konekcija->query($upit);

    ?>
    <div class="table wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th colspan="3">JANUAR </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
      $ukupnaKolicina=0;
      $ukupno=0;
        
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=2
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?>
            <thead>
        <tr>
            <th colspan="3">FEBRUAR </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=3
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?>
        
        <thead>
        <tr>
            <th colspan="3">MART </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=4
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?>
        <thead>
        <tr>
            <th colspan="3">APRIL </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=5
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?><thead>
        <tr>
            <th colspan="3">MAJ </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=6
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?><thead>
        <tr>
            <th colspan="3">JUN </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=7
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?><thead>
        <tr>
            <th colspan="3">JUL </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=8
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?><thead>
        <tr>
            <th colspan="3">AVGUST </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=9
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?><thead>
        <tr>
            <th colspan="3">SEPTEMBAR </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=10
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?><thead>
        <tr>
            <th colspan="3">OKTOBAR </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=11
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?><thead>
        <tr>
            <th colspan="3">NOVEMBAR </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
                $ukupnaKolicina=0;
                $ukupno=0;
                
            $upit=
            "SELECT
            month(z.vreme_dolaska) as mesec,
            year(z.vreme_dolaska) as godina,
            a.naziv,
            sum(n.kolicina) as kolicina,
            sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
            FROM
            zauzet_sto AS z
            INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
            INNER JOIN artikal AS a ON a.id=n.artikal_id
            INNER JOIN sto as s on z.sto_id=s.id
            where year(z.vreme_dolaska)=".$_GET['godina']." and month(z.vreme_dolaska)=12
            GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
            ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc
            
            ;";
            $rezultat=$konekcija->query($upit);
    
        ?><thead>
        <tr>
            <th colspan="3">DECEMBAR </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th>Artikl </th>
            <th>Kolicina </th>
            <th>Prihod po artiklu </th>
        </tr>
        </thead>
        <?php
        $ukupno=0;
        $ukupnaKolicina=0;
            while($red=$rezultat->fetch_assoc()){
                echo "<tr>
                            <td>".$red['naziv']."</td>
                            <td>".$red['kolicina']."</td>
                            <td>".$red['total']."</td>
                      </tr>";
                $ukupnaKolicina+=$red['kolicina'];
                $ukupno+=$red['total'];

            }
            echo "<thead>
            <tr>
                <th colspan='3'>UKUPNO </th>
            </tr>
            </thead>
            <thead>
             <tr>
                 <th>Ukupna kolicina</th>
                <th colspan='2'>Ukupan prihod</th>
             </tr>
             </thead>
            <tr>
            <td>".$ukupnaKolicina."</td>
            <td colspan='2'>".$ukupno."</td>
      </tr>";
             

            ?>



    </table>
    </div>
</body>
</html>