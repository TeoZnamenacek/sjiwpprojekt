<?php
include("../db__connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $skladisteid = $_POST['skladisteid'];
    $cijena = $_POST['cijena'];
}


    $sql = "INSERT INTO skladiste (SkladisteID, Cijena) VALUES(?,?)";
    $stmt = $db ->prepare($sql);

    if($stmt){
        $stmt->bind_param("ii", $skladisteid, $cijena);

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

    