<?php



    if( !isset($_POST["email"] ) || empty($_POST["email"]) )
    {
        die("niste prosledili email");
    }

    if( !isset($_POST["sifra"] ) || empty($_POST["sifra"]) )
    {
        die("niste prosledili sifru");
    }

    require_once "baza.php";

    $email = $_POST["email"];
    $sifra = $_POST["sifra"];

    var_dump($email, $sifra);

    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email' ");

    if($rezultat->num_rows == 1) {
        $korisnik = $rezultat->fetch_assoc();
        var_dump($korisnik);
    }
    else {
        echo "korisnik ne postoji";
    }