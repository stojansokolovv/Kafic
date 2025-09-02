<?php
$host = "localhost";
$user = "root";
$sifra = "";
$baza = "kafic";
$konekcija = new mysqli($host, $user, $sifra,$baza) ;

if ($konekcija->connect_error){
    die("neuspesno povezivanje sa bazom : ".$conn->connect_error);
}
  
?>