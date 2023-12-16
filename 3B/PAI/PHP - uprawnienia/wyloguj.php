<?php
    include("polaczzbaza.php");
    $_SESSION['zalogowany']=false;
    $_SESSION['id']=0;
    header("Location: index.php");
    mysqli_close($polaczenie);
?>