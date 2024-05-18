<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Video On Demand</title>
        <link rel="stylesheet" href="styl3.css">
    </head>
    <body>
        <header>
            <section class="lewyBaner">
                <h1>Internetowa wypożyczalnia filmów</h1>
            </section>
            <section class="prawyBaner">
                <table>
                    <tr>
                        <td>Kryminał</td>
                        <td>Horror</td>
                        <td>Przygodowy</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>30</td>
                        <td>20</td>
                    </tr>
                </table>
            </section>
            <section class="polecamy">
                <h3>Polecamy</h3>
                <!-- skrypt 1  -->
                <?php
                    $conn = mysqli_connect('localhost','root','','dane3');
                    $res = mysqli_query($conn,"SELECT id, nazwa,opis,zdjecie FROM produkty WHERE id IN(18,22,23,25)");
                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo "
                            <div class='film'>
                                <h4>".$row['id'].". ".$row['nazwa']."</h4>
                                <img src='".$row['zdjecie']."' alt='film'>
                                <p>".$row['opis']."</p>
                            </div>
                        ";
                    }
                ?>
            </section>
            <section class="fantastyczne">
                <h3>Filmy fantastyczne</h3>
                <!-- skrypt 2 -->
                <?php
                    $conn = mysqli_connect('localhost','root','','dane3');
                    $res = mysqli_query($conn,"SELECT id, nazwa,opis,zdjecie FROM produkty WHERE Rodzaje_id = 12");
                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo "
                            <div class='film'>
                                <h4>".$row['id'].". ".$row['nazwa']."</h4>
                                <img src='".$row['zdjecie']."' alt='film'>
                                <p>".$row['opis']."</p>
                            </div>
                        ";
                    }
                ?>
            </section>
            <footer>
                <form action="video.html" method="post">
                    <label>Usuń film nr.:</label>
                    <input type="number">
                    <button type="submit">Usuń film</button>
                </form>
                Strone wykonał: <a href="ja@poczta.com">PESEL</a>
            </footer>
        </header>
    </body>
</html>