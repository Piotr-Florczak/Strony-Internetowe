<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Klub wędkowania</title>
        <link rel="stylesheet" href="styl2.css">
    </head>
    <body>
        <header>
            <h2>Wędkuj z nami!</h2>
        </header>
        <section class="left">
            <img src="ryba2.jpg" alt="Szczupak">

        </section>
        <section class="right">
            <h3>Ryby spokojnego żeru(białe)</h3>
            <!-- skrypt -->
            <?php
                $conn = new mysqli('localhost','root','','wedkowanie');
                $sql = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 2;";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo $row['id'].". ".$row['nazwa']." "."występuje w: ".$row['wystepowanie'];
                    echo "</br>";
                }
            ?>
            <ol>
                <li><a href="https://wedkuje.pl/" target="_blank">Odwiedź także</a></li>
                <li><a href="http://www.pzw.org.pl/" target="_blank">Polski Związek Wędkarski</a></li>
            </ol>
        </section>
        <footer>
            <p>Stronę wykonał: PESEL</p>
        </footer>

    </body>
</html>