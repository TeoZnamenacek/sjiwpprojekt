<?php

include '../db__connection.php';

$id=$_GET['IDProizvod'];
$sql="DELETE  FROM proizvod WHERE IDProizvod = $id";
$result=mysqli_query($db,$sql);
if($result)
{
	echo "Zapis je obrisan";
	
}
else {
	echo "Doslo je do pogreske <br>";
	
	echo mysqli_errno($db).":".mysqli_error($db)."\n";
}

	mysqli_close($db);
	?>