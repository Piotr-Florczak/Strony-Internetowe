<?php
session_start();
include("templates/header.php");
include("templates/elementy.php");
setStyle("style.css");
setStyle("styleTabela.css");
//echo "<link rel='stylesheet' href='style.css'>";

//echo "<link rel='stylesheet' href='styleTabela.css'>";
if($_SESSION["zalogowany"])
{
 createTable();
/*
$query=mysqli_query($link,"select pic, zawodnicy.id,imie,pkt,nazwa from zawodnicy join druzyny on
                           druzyny.id=zawodnicy.druzyna order by pkt desc;");
 
 echo "<table border=1>
	 <tr><th>Profilowe</th><th>Id</th><th>Imie</th><th>Punkty</th><th>Druzyna</th><th>Usun</th><th>Edytuj</th></tr>";
 
 while($row=mysqli_fetch_assoc($query))
 {
  $pic = $row["pic"];  
  $id=$row["id"];
  $imie=$row["imie"];
  $pkt=$row["pkt"];
  $druzyna=$row["nazwa"];
  echo "<tr><td><img src='$pic' alt='profile'></td><td>$id</td><td>$imie</td><td>$pkt</td><td>$druzyna</td>
	<td><a href='usun.php?usun=$id'>Usun</a></td><td><a href='edytuj.php?edytuj=$id'>Edytuj</a></td></tr>";
	  
 }
 echo "</table>";
*/

 echo "<a href='wyloguj.php'>Wyloguj</a>";

}else
{
 echo "Musisz sie zalogowac by miec dostep do tej strony.";
 echo "<a href='zaloguj.php'>Zaloguj sie</a>";
}
include("templates/footer.php");
?>
