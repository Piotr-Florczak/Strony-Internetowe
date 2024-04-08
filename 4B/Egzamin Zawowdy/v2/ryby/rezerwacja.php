<?php
    $conn = mysqli_connect('localhost','root','','baza');
    
    if (isset($_POST['submit']))
    {
        $date = $_POST['date'];
        $number = $_POST['number'];
        $phone = $_POST['phone'];
        mysqli_query($conn,"INSERT INTO `rezerwacje`(`id`, `nr_stolika`, `data_rez`, `liczba_osob`, `telefon`) VALUES (NULL,NULL,'$date',$number,$phone);");
        mysqli_close($conn);
    }
?>