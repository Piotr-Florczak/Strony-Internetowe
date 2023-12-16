<?php
    $adresBazyDanych="localhost";
    $nazwaBazyDanych="zawody";
    $nazwaUzytkownika="root";
    $hasloUzytkownika="usbw";
    $polaczenie=mysqli_connect( $adresBazyDanych, $nazwaUzytkownika, $hasloUzytkownika, $nazwaBazyDanych);
    session_start();
    if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==true) {
        $zalogowany=true;
    } else {
        $zalogowany=false;
    }
?>