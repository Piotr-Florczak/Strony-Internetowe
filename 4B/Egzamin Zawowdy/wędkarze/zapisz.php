<?php
    $conn = new mysqli('localhost','root','','wedkowanie1');
    if (isset($_POST['btn']))
    {
        $name = $_POST['name'];
        $surrname = $_POST['surrname'];
        $adress = $_POST['adress'];
        $sql = "INSERT INTO `karty_wedkarskie`(`id`, `imie`, `nazwisko`, `adres`, `data_zezwolenia`, `punkty`) VALUES (NULL,'$name','$surrname','$adress',NULL,NULL);";
        mysqli_query($conn,$sql);
    }
?>