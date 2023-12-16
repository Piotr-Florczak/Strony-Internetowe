<!DOCTYPE html>
<html>
<head>
<title>Dziwne? U mnie działa!</title>
<link rel="icon" type="image/x-icon" href="https://localhost/favicon.ico">
</head>
<body>
<h1>Dziwne! U mnie działa?</h1>
<p>Jeżeli widzisz ten dokument to znaczy, że udało Ci się uruchomić XAMPP'a z serwera szkolnego.</p>
<p>Twoje pliki znajdują się w Twoim profilu w katalogu <b>www</b></p>
<p><b>H:\www</b> jest ustawione jako domyślny katalog dla Apache'a - skopiuj więc tu swoje pliki.</p>
<p>W katalogu <b>www</b> posiadasz ukryte:</p>

<ul>
<li>katalog <b>.logs</b> błędy, ostrzeżenia, informacje generowane przez Twoją uruchomioną instancję Apache i PHP</li>
<li>katalog <b>.tmp</b> - tymczasowy min. na pliki sesji, przesłane pliki</li>
<li>katalog <b>.mysql</b> - pliki Twojej bazy danych MySQL - NIE KASUJ tego katalogu!</li>
<li>plik <b>.gitignore</b> - tak na szelki, wypadek gdyby zechciało Ci się współpracować z jakimś git'em</li>
</ul>
<p>Powyższe pliki i katalogi tworzą się jeśli nie istnieją podczas startu Apache.</p>

<h2>Twoje MySQL</h2>
<p>Jeśli uruchomisz MySQL to masz też: <a href="https://localhost/phpmyadmin">phpMyAdmin</a> oraz: <a href="https://localhost/indoDB.php">test bazy MySQL</a></p>

<h2>Twoje PHP</h2>
<?php
phpinfo();
?>
</body>
</html>