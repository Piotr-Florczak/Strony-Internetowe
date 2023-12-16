<html>
<head>
</head>
<body>
	
		
	<?php
		$dbhost="localhost";
		$dbuser="root";
		$dbpass="";
		$dbname="zdrowie";
		$link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		if ($link){
			echo "imie i wiek poszczegolnych osob<br>";
			$result=mysqli_query($link, "SELECT imie, wiek from informacje");
			if (mysqli_num_rows($result)>0){//ile wierszy z odpowiedzia
				while( $row= mysqli_fetch_assoc($result)){//czytasz wiersz po wierszu do zmiennej $row
					
					$imieZBazy=$row["imie"];//=$row["imie"]; oznacza, ze w zapytaniu szukales pola imie
					$wiekZBazy=$row["wiek"];
					
					echo "<div>$imieZBazy $wiekZBazy</div>";
				}
			}
			mysqli_free_result($result);
			echo "<br><br> srednia wieku wedle miast<br>";
			$result=mysqli_query($link, "SELECT miasto, avg(wiek) as srednia 
												from informacje 
												group by miasto");
			if (mysqli_num_rows($result)>0){
				while( $row= mysqli_fetch_assoc($result)){
					
					$nazwaMiasta=$row["miasto"];
					$srednia=$row["srednia"];
					
					echo "<div>$nazwaMiasta $srednia</div>";
				}
			}
			mysqli_free_result($result);
			
			mysqli_close($link);
		}	
	
	?>
	
</body>
</html>