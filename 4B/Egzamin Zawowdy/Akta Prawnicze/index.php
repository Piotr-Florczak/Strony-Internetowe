<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Sekretariat</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <section class="left">
            <h1>Akta Pracownicze</h1>
            <!-- skrypt 1 -->
            <?php
                $conn = new mysqli("localhost", "root" , "", "firma");
                $sql = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id = 2;";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result))
                {
                    if ($row["czyRODO"] == 1)
                    {$rodoStatus = "podpisano";}
                    else
                    {$rodoStatus = "niepodpisano";}
                    
                    if ($row["czyBadania"] == 1)
                    {$badaniaStatus = "aktualne";}
                    else
                    {$badaniaStatus = "nieaktualne";}
                    
                    echo "
                        <h3>dane</h3>
                        <p>".$row["imie"]." ".$row["nazwisko"]."</p>
                        <hr>
                        <h3>adres</h3>
                        <p>".$row["adres"]."</p>
                        <p>".$row["miasto"]."</p>
                        <hr>
                            <p> RODO: ".$rodoStatus."</p>
                            <p> Badania: ".$badaniaStatus."</p>
                        <hr>
                    ";
                }
                $conn->close();
            ?>
            <h3>Dokumenty pracownika</h3>
            <a href="cv.txt">Pobierz</a>
            <h1>Liczba zatrudnionych pracowników</h1>
            <?php
                  $conn = new mysqli("localhost", "root" , "", "firma");
                  $sql = "SELECT * FROM pracownicy";
                  $result = mysqli_query($conn,$sql);
                  $num = mysqli_num_rows($result);
                  echo "<p>".$num."</p>";
                  $conn->close();

            ?>
        </section>
        <section class="right">
            <?php
                 $conn = new mysqli("localhost", "root" , "", "firma");
                 $sql = "SELECT id, imie, nazwisko FROM pracownicy WHERE id = 2";
                 $result = mysqli_query($conn,$sql);
                 while ($row = mysqli_fetch_array($result))
                 {  
                    echo "<img src=".$row["id"].".jpg alt=pracownik>";
                 }
                 $conn->close();
            ?>
            
        </section>
        <footer>
            Autorem aplikacji jest: numer zdającego
            <ul>
                <li>skontaktuj się</li>
                <li>poznaj naszą firme</li>
            </ul>
        </footer>
    </body>
</html>