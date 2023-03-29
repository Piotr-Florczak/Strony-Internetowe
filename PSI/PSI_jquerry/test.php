<?php
$dataa = $_POST['dataa'];
$godzina = $_POST['godzina'];
$waga = $_POST['waga'];
$puls = $_POST['puls'];
$stres = $_POST['stres'];
$woda = $_POST['woda'];
$kroki = $_POST['kroki'];

$con= mysqli_connect('localhost','root','','test');
echo "INSERT INTO testowa VALUES($waga,$puls,$stres,$woda,$kroki)";
mysqli_query($con, "INSERT INTO testowa VALUES($waga,$puls,$stres,$woda,$kroki)");

$response.="aaaaa";

?>