<?php
$id = $_GET["edytuj"];
include("templates/header.php");
include("templates/elementy.php");
?>
<html>
<head>
  <?php setStyle('styleDodaj.css')?>
</head>
<body>
<?php 
 echo "<form action='edytuj.php?edytuj=$id' method='post'  enctype='multipart/form-data' id='usersAdd'>";
?>
Imie<input type='text' name='imie' >
Punkty<input type='number' name='pkt'>
<input type='submit' value='zmien'>
</form>
<a href='wyniki.php'>tabela</a>

<?php
echo $id;
if($_POST["imie"]!="")
{
  $imie = $_POST["imie"];
  mysqli_query($link,"Update zawodnicy set imie='$imie' where id=$id");
}
if(isset($_POST["pkt"]))
{
  $pkt = $_POST["pkt"];
  mysqli_query($link,"Update zawodnicy set pkt=$pkt where id=$id");

}
include("templates/footer.php");
?>
</body>
</html>
