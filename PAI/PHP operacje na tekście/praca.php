<?php
    $sciezka="new-zealand-resident-arrivals-by-area-of-residence-csv.csv";
    $uchwyt=fopen($sciezka, "r");
    //print_r($linijka);
    echo "<br><br>";
    $licznik=0;
    while($linijka=fgets($uchwyt))
    {
        $tablica=explode("," , $linijka);
        $data=explode("-" , $tablica[0]);
        if ($data[0]=="2016") 
        {
           $licznik += $tablica[3];
        }
    }
    echo " dla 2016 tyle: <h1>".$licznik."</h1>";






 ?>