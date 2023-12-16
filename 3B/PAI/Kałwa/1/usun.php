<?php
include("templates/header.php");
if(isset($_GET["usun"]))
{
  $usun=$_GET["usun"];
  mysqli_query($link,"delete from zawodnicy where id=$usun;");
}
include("templates/footer.php");
echo "<a href='wyniki.php'>tabela</a>";
?>
