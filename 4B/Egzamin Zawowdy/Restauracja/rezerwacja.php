<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "baza";

    $conn = new mysqli($servername,$username,$password,$dbname);
     if(isset($_POST['rezerwuj']))
     {
        $date = $_POST['date'];
        $number = $_POST['number'];
        $tel = $_POST['tel'];
        $sql = "INSERT INTO rezerwacje VALUES (NULL, NULL, '$date', $number, '$tel');";
        mysqli_query($conn, $sql);
        echo "Dodano rezerwcje do bazy";
        
     }
     mysqli_close($conn);
?>