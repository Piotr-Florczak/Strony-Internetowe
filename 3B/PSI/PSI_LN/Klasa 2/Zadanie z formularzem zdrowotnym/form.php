<html>
<head><title>Wprowadzanie danych:</title></head>

<body>
<?php
	//Ten plik nazywa sie form.php
	//Odbieram dane z formularza po polach name
	if (
		isset($_POST["imie"]) && 
		isset($_POST["wiek"])
	){
		$imieDoBD=$_POST["imie"];
		$wiekDoBD=$_POST["wiek"];
		//łączenie do bazy danych
		$dbhost="localhost";
		$dbname="zdrowie";
		$dbuser="root";
		$dbpass="";
		
		$conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn){
			mysqli_query($conn, "INSERT INTO informacje VALUES('', '$imieDoBD', $wiekDoBD)");
			echo "Dane zostaly wstawione";
		}else{
			echo "Blad laczenia do bazy";
		}
		
	}

?>

	<h2>Podaj dane do wyslania</h2>

	<form action="form.php" method="post">
		Podaj imie: <input type="text" name="imie"><br>
		Podaj wiek: <input type="text" name="wiek"><br>
		<input type="submit" value="Wyslij do bazy">
	</form>

</body>
</html>