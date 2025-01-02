<?php


    if ( !isset($_GET["id"]) || empty($_GET["id"]) ) {
        die("fali id proizvod");
    }

    require_once "modeli/baza.php";

    $idProizvod = mysqli_real_escape_string( $baza, $_GET["id"] );

    $resultat = $baza->query("SELECT * from proizvodi WHERE id = $idProizvod ");


    if( $resultat->num_rows == 0 ) {
        die("ovaj proizvod ne postoji");
    }
    else {
        $proizvod = $resultat->fetch_assoc();
    }


    var_dump($proizvod);


?>

<!doctype html>
<html lang="en">

    <head>
        <title>php lesson/16</title>
    </head>

    <body>
    <h2><?= $proizvod["ime"] ?></h2>
    <p><?= $proizvod["opis"] ?></p>
    <p>cena:<?= $proizvod["cena"] ?>&euro;</p>
    </body>
</html>
