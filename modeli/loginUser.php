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



    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email' ");

    if($rezultat->num_rows == 1) {

        $korisnik = $rezultat->fetch_assoc();

        if( password_verify( $sifra, $korisnik["sifra"] ) ) {
            echo "dobrodosli";
        } else {
            echo "pogresna lozinka";
        }

    }
    else {
        echo "korisnik ne postoji";
    }

