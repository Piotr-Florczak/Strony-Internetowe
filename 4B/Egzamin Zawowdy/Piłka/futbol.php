<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Rozgrywki futbolowe</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h2>Światowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">
        </header>
        <section class="mecze">
            <!-- skrypt 1  -->
            <?php
                $conn = new mysqli("localhost","root","","egzamin");
                $sql = "SELECT zespol1, zespol2, wynik,data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG';";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo "
                    <div class='blok'>
                        <h3>$row[zespol1]-$row[zespol2]</h3>
                        <h4>$row[wynik]</h4>
                        <p>w dniu: $row[data_rozgrywki]</p>
                    </div>
                    ";
                }
            ?>
        </section>
        <main>
            <h2>Reprezentacja Polski</h2>
        </main>
        <section class="lewy">
            <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy,4-napastnicy):</p>
            <form action="futbol.php" method="post">
                <input type="number" name="number">
                <button type="submit" name="submit">Sprawdź</button>
            </form>
            <ul>           
            <?php
            $conn = new mysqli("localhost","root","","egzamin");
            if (isset($_POST["submit"]))
            {
                if (isset($_POST["number"]) && is_numeric($_POST["number"]))
                {
                    $number = $_POST["number"];
                    $sql = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $number;";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "
                            <li><p>$row[imie] $row[nazwisko]</p></li>
                        ";
                    }
                    
                }
            }
        ?>
        </ul>
        </section>
        <section class="prawy">
            <img src="zad1.png" alt="piłkarz">
            <p>Autor: PESEL</p>
        </section>

    </body> 
</html>