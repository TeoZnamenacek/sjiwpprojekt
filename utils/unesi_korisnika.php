<?php
include("../includes/db__connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $oib = $_POST['oib'];
    $brojtelefona = $_POST['brojtelefona'];
}


    $sql = "INSERT INTO kupac (Ime, Prezime, OIB, BrojTelefona) VALUES(?,?,?,?)";
    $stmt = $db ->prepare($sql);

    if($stmt){
        $stmt->bind_param("ssii", $ime, $prezime, $oib, $brojtelefona);

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

    