<?php
    $uprawnienia = array();
    if ($zalogowany) {
        $kwerenda="SELECT * FROM `uprawnienia` WHERE `user`=". $_SESSION['id'];
        $wynik = mysqli_query($polaczenie, $kwerenda);
        while ($rekord = mysqli_fetch_assoc($wynik)) {
            $uprawnienia[$rekord['uprawnienie']]=true;
        }
    }
?>