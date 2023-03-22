<?php
$name = $_POST['name'];


$con= mysqli_connect('localhost','root','','test');
echo "INSERT INTO testowa VALUES($name)";
mysqli_query($con, "INSERT INTO testowa VALUES($name)");

?>