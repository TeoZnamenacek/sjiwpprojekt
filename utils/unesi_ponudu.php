<?php
include("../db__connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $cijena = $_POST['cijena'];
    $kolicinaproizvoda = $_POST['kolicinaproizvoda'];
    $popust = $_POST['popust'];
}


    $sql = "INSERT INTO ponuda (Cijena, KolicinaProizvoda, Popust) VALUES(?,?,?)";
    $stmt = $db ->prepare($sql);

    if($stmt){
        $stmt->bind_param("iis", $cijena, $kolicinaproizvoda, $popust);

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

    