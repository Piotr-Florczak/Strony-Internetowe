<?php
$dataa = $_POST['nowaData'];
$godzina = $_POST['godzina'];
$waga = $_POST['waga'];
$puls = $_POST['puls'];
$stres = $_POST['stres'];
$woda = $_POST['woda'];
$kroki = $_POST['kroki'];
$inne = $_POST['inne'];

$con= mysqli_connect('localhost','root','','test');
//echo "INSERT INTO testowa VALUES('$dataa',$waga,$puls,$stres,$woda,$kroki,'$inne')";
mysqli_query($con, "INSERT INTO testowa VALUES('$dataa',$waga,$puls,$stres,$woda,$kroki,'$inne')");

$response = $inne;

$res=mysqli_query($con, "SELECT Dataa, waga, puls, stres, woda, kroki, inne FROM testowa");

echo "<table>";
	echo "<tr>";
		echo "<th>Dataa</th>";
		echo "<th>waga</th>";
		echo "<th>puls</th>";
		echo "<th>stres</th>";
        echo "<th>woda</th>";
        echo "<th>kroki</th>";
        echo "<th>inne</th>";
		echo "</tr>";
	while($row=mysqli_fetch_assoc($res))
	{
		echo "<tr>\n";
			echo "<td>".$row['Dataa']."</td>\n";
			echo "<td>".$row['waga']."</td>\n";
			echo "<td>".$row['puls']."</td>\n";
            echo "<td>".$row['stres']."</td>\n";
            echo "<td>".$row['woda']."</td>\n";
            echo "<td>".$row['kroki']."</td>\n";
            echo "<td>".$row['inne']."</td>\n";
		echo "</tr>\n";
	}
	echo "</table>";

?>