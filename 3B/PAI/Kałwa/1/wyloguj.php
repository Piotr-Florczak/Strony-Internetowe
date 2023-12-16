<?php
session_start();
session_unset();
session_destroy();
include("templates/elementy.php");
setStyle('style.css');
echo "Wylogowales sie<br>";
echo "<a href='zaloguj.php'>Zaloguj sie</a>"
?>
