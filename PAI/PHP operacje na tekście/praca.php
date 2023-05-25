<?php
    $sciezka="new-zealand-resident-arrivals-by-area-of-residence-csv.csv";
    $uchwyt=fopen($sciezka, "r");
    //print_r($linijka);
    echo "<br><br>";
    $licznik=0;
    $mapa = array(
    "2014" => "0",
    "2015" => "0",
    "2016" => "0",
    "2017" => "0",
    "2018" => "0",
    "2019" => "0",);

    $regiony =array();
    while($linijka=fgets($uchwyt))
    {
        $tablica=explode("," , $linijka);
        $data=explode("-" , $tablica[0]);
        if ($data[0]=="2014") 
        {
            $mapa["2014"] += $tablica[3];
        }
        if ($data[0]=="2015") 
        {
            $mapa["2015"] += $tablica[3];
        }
        if ($data[0]=="2016") 
        {
            $mapa["2016"] += $tablica[3];
        }
        if ($data[0]=="2017") 
        {
            $mapa["2017"] += $tablica[3];
        }
        if ($data[0]=="2018") 
        {
            $mapa["2018"] += $tablica[3];
        }
        if ($data[0]=="2019") 
        {
            $mapa["2019"] += $tablica[3];
        }
    }
    $maxValue = max($mapa);

    $maxKeys = array_keys($mapa, $maxValue);

    echo '<pre>';
    echo print_r($mapa);
    echo '</pre>';

    foreach ($maxKeys as $key) 
    {
        echo "w: ".$key." roku liczba wynosciła: ".$maxValue;
    }

    $uchwyt=fopen($sciezka, "r");
    while($linijka=fgets($uchwyt))
    {
        $tablica=explode("," , $linijka);
        if ($tablica[4]=="Territorial authority areas")
        {
            if (!array_key_exists($tablica[2], $regiony)) 
            {
                $regiony[$tablica[2]] = null;
            }
        }
        
    }
    $uchwyt=fopen($sciezka, "r");
    while($linijka=fgets($uchwyt))
    {
        $tablica=explode("," , $linijka);
        if ($tablica[4]=="Territorial authority areas") 
        {
            $regiony[$tablica[2]] += $tablica[3]; 
        }
    }    
    echo '<pre>';
    print_r($regiony);
    echo '</pre>';
    echo 'ilość rejonów na poziomie Territorial authority areas: ' . count($regiony);
 ?>