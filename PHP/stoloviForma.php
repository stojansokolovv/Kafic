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
?>
<div class="form-wrapper">
<form method='GET' action='stolovi.php'>
<input type="date" name="datum" class="input"> <br>
<input type="submit" class="submit-button"> 
</form>
</div>
</body>
</html>