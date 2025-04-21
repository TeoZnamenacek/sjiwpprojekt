<?php

include '../db__connection.php';

$id = $_GET['IDPonuda'];
$sql = "DELETE FROM ponuda WHERE IDPonuda = $id";
$result = mysqli_query($db, $sql);
if ($result) {
    echo "Zapis je obrisan";
} else {
    echo "Došlo je do pogreške <br>";
	
	echo mysqli_errno($db) . ":" . mysqli_error($db) . "\n";
}

mysqli_close($db);
?>
<html>
<head>
    <title>Brisanje ponude</title>
</head>
<body>
    <h2>Brisanje ponude</h2>
    <p><?php echo $message; ?></p>
    <a href="Zadatakphp.php" style="margin-left: 100px;">Pregled ponuda</a>
</body>
</html>