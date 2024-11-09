
<?php
    require_once "modeli/baza.php";


    $rezultat =  $baza->query("SELECT * FROM proizvodi");

    $proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);

    var_dump($proizvodi);

?>




<!doctype html>
<html lang="en">
    <head>
        <title>php lesson/16</title>
    </head>
    <body>
      <?php foreach ( $proizvodi as $proizvod ): ?>
        <div>
            <h1> <?= $proizvod["ime"] ?> </h1>
            <p> <?= $proizvod["opis"] ?> </p>
            <p>cena proizvoda: <?= $proizvod["cena"] ?> &euro; </p>
            <p>
                <?php
                    echo $proizvod["kolicina"] > 0 ? "ima na stanje" : "nema na stanju";
                ?>
            </p>
            <a href="proizvod.php?id=<?= $proizvod["id"] ?>">pogledaj proizvod</a>
        </div>
      <?php endforeach; ?>
    </body>
</html>


