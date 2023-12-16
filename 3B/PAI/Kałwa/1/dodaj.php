<?php
session_start();
include("templates/header.php");
include("templates/elementy.php");
?>

<!doctype html>
<html>
<head>
  <?php setStyle('styleDodaj.css')?>
</head>
<body>

<?php
if($_SESSION["zalogowany"])
{

if (isset($_POST["imie"]) && isset($_POST["pkt"]) && isset($_POST["druzynaa"]))
{
	$dir = 'imgs/';
        $Myfile = $dir . basename($_FILES["pic"]["name"]);
              
	
	if(move_uploaded_file($_FILES["pic"]["tmp_name"], $Myfile))
	       echo "AAAAAAAAAAAAAA";
       else
	       echo "BBBBBBBBBBBBB";
	
	$imie=filter_var($_POST["imie"],FILTER_SANITIZE_STRING);
	$pkt=$_POST["pkt"];
	$druzyna=$_POST["druzynaa"];
	var_dump($druzyna);
        mysqli_query($link, "INSERT INTO zawodnicy(imie,pkt,druzyna,pic)  VALUES('$imie',$pkt,$druzyna,'$Myfile');");

}
echo "
<form action='dodaj.php' method='post' id='usersAdd' enctype='multipart/form-data'>
 <input type='text' name='imie' placeholder='imie'>
 <input type='number' name='pkt' placeholder='punkty'>
 <input type='file' name='pic' id='pic'>
 <select id='druzyna' name='druzynaa'>";
  
     $query=mysqli_query($link,"select id,nazwa from druzyny");
     
     while($row=mysqli_fetch_assoc($query))
     {
      $id=$row["id"];	     
      $nazwa=$row["nazwa"];
      echo "<option value='$id'>$nazwa</option>";
     }
  echo "
 </select>
 <input type='submit' value='zapisz' class='submit'>
</form>
<br>
<form action='dodaj.php' method='post' id='teamsAdd'>
<input type='text' name='nazwa' placeholder='nazwa druzyny'>
<input type='submit' value='dodaj' class='submit'> 
</form>
";
     echo "<a href='wyloguj.php'>WYLOGUJ</a>";
     echo "<a href='wyniki.php'>Zobacz wyniki</a>";

if (isset($_POST["nazwa"]))
{
	$nazwa=filter_var($_POST["nazwa"],FILTER_SANITIZE_STRING);
	mysqli_query($link, "INSERT INTO druzyny(nazwa)  VALUES('$nazwa');");
}
include("templates/footer.php");
}else
{
 echo "Musisz sie zalogowac by miec dostep do tej strony.";
 echo "<a href='zaloguj.php'>Zaloguj sie</a>";
}
?>

</body>
</html>
