<?php
include '../db__connection.php';

$id = $_GET['IDProizvod'];
$sql = "DELETE FROM proizvod WHERE IDProizvod = $id";
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
    <title>Brisanje proizvoda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Brisanje proizvoda</h2>
        <div class="alert alert-info"><?php echo $message; ?></div>
        <a href="proizvod.php" class="btn btn-primary">Povratak na popis proizvoda</a>
    </div>
</body>
</html>