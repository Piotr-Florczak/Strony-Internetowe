<?php
    if ($_FILES['zdjecie']['name']!="") {
        $sciezka="zdjecia/";
        $sciezka.=$_FILES['zdjecie']['name'];
        $maksymalnyRozmiar=1.2*1024*1024;

        $prawidlowyPlik=true;

        $czyObrazek=getimagesize($_FILES['zdjecie']['tmp_name']);
        $czyPlikIstnieje=file_exists($sciezka);
        $czyDobryRozmiar = $_FILES['zdjecie']['size']<$maksymalnyRozmiar;

        if (!$czyObrazek) {
            $prawidlowyPlik=false;
            echo "<h2 class='error'>To nie jest obrazek</h2>";
        }

        if ($czyPlikIstnieje) {
            $prawidlowyPlik=false;
            echo "<h2 class='error'>Plik już istnieje</h2>";
        }

        if (!$czyDobryRozmiar) {
            $prawidlowyPlik=false;
            echo "<h2 class='error'>Plik za duży</h2>"; 
        } 

        if ($prawidlowyPlik) {   
            move_uploaded_file($_FILES['zdjecie']['tmp_name'], $sciezka);
        } else {
            $prawidloweZdjecie=false;
        }
    }
    
?>