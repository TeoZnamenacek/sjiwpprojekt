<?php
include("../db__connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $adresa = $_POST['adresa'];
    $kucnibroj = $_POST['kucnibroj'];
    $brojtelefona = $_POST['brojtelefona'];
    $ponuda = $_POST['ponudaid'];
    $raspolozivostproizvoda = $_POST['raspolozivostproizvoda'];
}


    $sql = "INSERT INTO skladiste (Adresa, KucniBroj, BrojTelefona, PonudaID, RaspolozivostProizvoda) VALUES(?,?,?,?,?)";
    $stmt = $db ->prepare($sql);

    if($stmt){
        $stmt->bind_param("siiis", $adresa, $kucnibroj, $brojtelefona, $ponuda, $raspolozivostproizvoda);

        if($stmt->execute()){
            echo 'Podaci uspješno uneseni';
        }
        else{
            echo 'Greška u unosu podakata: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        echo 'Error preparing statement: ' . $db->error; 
    }

    $db->close();


    ?>

    