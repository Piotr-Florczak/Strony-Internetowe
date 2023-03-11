<html>
<head>
</head>
<body>

	<script>
		var czas=new Date();
	
	</script>
	<table border='1'>
		<tr><th>imie</th><th>wiek</th>
		
	<?php
		$dbhost="localhost";
		$dbuser="root";
		$dbpass="";
		$dbname="zdrowie";
		//polacz do bazy danyc
		$link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		if ($link){//jezeli polaczenie jest aktywne
			
			//mysqli_query wydaje zapytanie do bazy, baza zwroci do zmiennej result
			$result=mysqli_query($link, "SELECT imie, wiek from informacje");
			if (mysqli_num_rows($result)>0){ //funkcja sprawdza ile w bazie jest wierszy sprawdzajacych dane zapytanie, do IFA wejde, gdy tych wierszy jest wiecej niz zero
			
			//while nizej czyta funkcja mysqli_fetch_assoc wiersz po wierszu
			//w kazdym wierszu jest kilka danych, tutaj imie i wiek
				while( $row= mysqli_fetch_assoc($result)){
					//czytam sobie te dane do zmiennych
					$imieZBazy=$row["imie"];
					$wiekZBazy=$row["wiek"];
					//wyswietlam w tabeli jako nowe wiersze TR i komórki TD
					echo "<tr>
							<td>$imieZBazy</td><td>$wiekZBazy</td>
						</tr>";
				}
			}
			//czyszcze pamiec po danych i zamykam polaczenie
			mysqli_free_result($result);
			mysqli_close($link);
		}	
	
	?>
	</table>
</body>
</html>