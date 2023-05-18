<?php
    include("polaczzbaza.php");
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Zawodnicy</title>
        <link rel="Stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Ranking</h1>
        </header>
        <main>
            <h1>Zawodnicy:</h1>
            <table>
                <thead>
                    <tr>
                        <th>Gracz</th>
                        <th>Drużyna</th>
                        <th>Punkty</th>
                        <?php if ($zalogowany) echo "<th>Usuń</th>"; ?>
                    </tr>
                </thead>
                <?php
                    $kwerenda = "
                        SELECT
                            `zawodnicy`.`id`,
                            `zawodnicy`.`imie`,
                            `zawodnicy`.`punkty`,
                            `zawodnicy`.`zdjecie`,
                            `druzyny`.`nazwa`
                        FROM 
                            `zawodnicy` 
                            JOIN `druzyny`
                                ON `druzyny`.`id`=`zawodnicy`.`druzyna`

                        ORDER BY `zawodnicy`.`punkty` DESC
                    ";
                    $wynikZapytania = mysqli_query($polaczenie, $kwerenda);
                    while ($rekord=mysqli_fetch_assoc($wynikZapytania)) {
                        echo "<tr>\n";
                            if ($rekord['zdjecie']=="") $sciezkaZdjecia="zdjecia/default.png";
                            else  $sciezkaZdjecia="zdjecia/".$rekord['zdjecie'];
                            echo "<td>
                                <img src='".$sciezkaZdjecia."' alt='Zdjecie gracza ".$rekord['nazwa']."'>
                                ".$rekord['imie']."
                            </td>\n";
                            echo "<td>".$rekord['nazwa']."</td>\n";
                            echo "<td>".$rekord['punkty']."</td>\n";
                            if ($zalogowany) {   
                                echo "<td>";
                                echo "<a href='usungracza.php?usun=".$rekord['id']."'>X</a>";
                                echo "</td>\n";
                            }
                            
                        echo "</tr>\n";
                    }
                ?>
            </table>
            <?php
                if ($zalogowany) {
            ?>
            <h2><a href="dodajzawodnika.php">Dodaj zawodnika</a></h2>
            <h2><a href="dodajdruzyne.php">Dodaj drużynę</a></h2>
            <h2><a href="wyloguj.php">Wyloguj się</a></h2>
            <?php
                } else {
            ?>
            <h2><a href="rejestruj.php">Zarejestruj się</a></h2>
            <h2><a href="zaloguj.php">Zaloguj się</a></h2>
            <?php
                }
            ?>

        </main>
    </body>
</html>

<?php
    mysqli_close($polaczenie);
?>

