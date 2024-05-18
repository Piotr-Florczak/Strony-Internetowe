<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Prognoza pogody Poznań</title>
        <link rel="stylesheet" href="styl4.css">
    </head>
    <body>
        <header>
            <section class="lewy-baner">
                <p>maj, 2019 r.</p>
            </section>
            <section class="srodkowy-baner">
                <h2>Prognoza dla Poznania</h2>
            </section>
            <section class="prawy-baner">
                <img src="logo.png" alt="prognoza">
            </section>
        </header>
        <section class="lewy">
            <a href="kwerendy.txt">Kwerendy</a>
        </section>
        <section class="prawy">
            <img src="obraz.jpg" alt="Polska,Poznań">
        </section>
        <main>  
            <table>
                <tr>
                    <th>Lp.</th>
                    <th>DATA</th>
                    <th>Noc - TEMPERATURA</th>
                    <th>DZIEŃ - TEMPERATURA</th>
                    <th>OPADY [mm/h]</th>
                    <th>CIŚNIENIE [hPa]</th>
                </tr>
                    <!-- skrypt 1 -->
                    <?php
                        $conn = mysqli_connect("localhost","root","","prognoza");
                        $sql = "SELECT * FROM pogoda WHERE miasta_id = 2 ORDER BY data_prognozy DESC";
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['data_prognozy']."</td>";
                            echo "<td>".$row['temperatura_noc']."</td>";
                            echo "<td>".$row['temperatura_dzien']."</td>";
                            echo "<td>".$row['opady']."</td>";
                            echo "<td>".$row['cisnienie']."</td>";
                            echo "</tr>";
                        }
                    ?>     
            </table>
        </main>
        <footer>
            <p>Stronę wykonał:PESEL</p>
        </footer>
    </body>
</html>