<?php
    $sciezka="new-zealand-resident-arrivals-by-area-of-residence-csv.csv";
    $uchwyt=fopen($sciezka, "r");
    $linijka=fgets($uchwyt);
    print_r($linijka);
    echo "<br><br>";
    $licznik=0;
    while($linijka=fgets($uchwyt)) {
        $tablica=explode("," , $linijka);
        $data=explode("-" , $tablica[0]);
        if ($data[1]=="06" && $data[0]=="2016") {
            print_r($linijka);
            echo "<br>";
            $licznik++;
        }
    }
v
    echo "<h1>".$licznik."</h1>";

    fclose($uchwyt);
?>