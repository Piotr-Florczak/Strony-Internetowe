<?php
	$value=$_GET["value"];
	$innaWartosc=$_GET["innaLiczba"]; //specjalnie zmienilem nazwe zmiennej, aby bylo widoczne, ze to w GET przychodzi informacja Ajaxem
	$response="<span style='color: blue;'>";
	$response.="Otrzymalem z JSa wartosc: $value";
	$response.="</span>";
	
	//polecenie echo w tym miejscu przesle dane do pliku ajax.html
	echo $response;
	
?>
