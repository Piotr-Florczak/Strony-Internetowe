<html>
<head>
</head>

<body>
	<?php
		if (isset($_POST["kolorek"]))
		{
			$kolorDIVa="black";
			if (!empty($_POST["kolorek"])){
				$kolorDIVa=$_POST["kolorek"];
			}
			
			////zakladam, ze mam bazę o nazwie strona, tabela w niej to style
			//style(idStylu INT auto_increment, nazwaStylu TEXT, wartoscStylu TEXT)
			//1, background-color, blak
			//2, color, red
			
			$dbhost="localhost"; //adresSerwera
			$dbuser="root"; //uzytkownik domyslny to root bez hasla
			$dbpass="";
			$dbname="strona";
			$dbtable="style";
			
			$link =  mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			
			if ($link){
				mysqli_query($link, "INSERT INTO $dbtable VALUES('', 'background-color', '$kolorDIVa');");
				mysqli_close($link);
				
			}else{
				echo "Blad polaczenia z baza danych";
			}
			
			
			echo "<div style='background-color: $kolorDIVa'>JAKIS TAM TEKST</div>";
			
		}
	?>
	
	<form action="plik.php" method="post">
		Podaj KOLOR: <input type="text" name="kolorek" required><br>
		<input type="submit" value="wyslij">
	
	</form>
	
	

</body>
</html>