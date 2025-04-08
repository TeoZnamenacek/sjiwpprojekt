<?php
$server='localhost';
$username='root';
$password='';
$database='namjestaj';

$db = mysqli_connect($server, $username, $password);
if($db)
{
$db_selected = mysqli_select_db($db, $database);
if(!$db_selected)
 echo 'Doslo je do pogreske kod odabira baze';
}
else
echo 'Doslo je do pogreske prilikom spajanja';
?>




