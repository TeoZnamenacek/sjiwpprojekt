<?php
include("../db__connection.php");

$query = "SELECT Ime, Prezime FROM kupac";

$result = mysqli_query($db, $query) or die ("Greska u SQLu");
while($row = mysqli_fetch_array($result))
{
	echo $row["ime"]." ".$row["prezime"];
	echo '<br />';
}
?>


