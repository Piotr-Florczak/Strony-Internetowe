<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Twoje BMI</title>
        <link rel="stylesheet" href="styl3.css">
    </head>
    <body>
        <section class="logo">
            <img src="wzor.png" alt="wzór BMI">
        </section>
        <header>
            <h1>Oblicz swoje BMI</h1>
        </header>
        <main>
            <table>
                <tr>
                    <th>Interpretacja BMI</th>
                    <th>Wartość minimalna</th>
                    <th>Wartość maksymalnaI</th>
                </tr>
                <!-- skrypt 1 -->
                <?php
                    $conn = mysqli_connect('localhost','root','','egzamin');
                    $result = mysqli_query($conn,"SELECT informacja,wart_min,wart_max FROM bmi");
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo"
                        <tr>
                            <td>".$row['informacja']."</td>
                            <td>".$row['wart_min']."</td>
                            <td>".$row['wart_max']."</td>
                        </tr>
                        ";
                    }
                ?>
            </table>
        </main>
        <section class="lewy">
            <h2>Podaj wagę i wzrost</h2>
            <form action="bmi.php" method="post">
                <label>Waga</label>
                <input type="number" min="1" name="wag">
            </br>
                <label>Wzrost w cm:</label>
                <input type="number" min="1" name="wys">
            </br>
                <button type="submit">Oblicz i zapamiętej wynik</button>
            </form>
            <!-- skrypt 2 -->
            <?php
                if (!empty($_POST['wag']) && !empty($_POST['wys']))
                {
                    $masa = $_POST['wag'];
                    $wzrost = $_POST['wys'];
                    $BMI = ($masa / ($wzrost * $wzrost)) * 10000;
                    echo"Twoja waga:".$masa."; Twój wzrost: ".$wzrost;
                    echo"</br>";
                    echo"Bmi wynosi".$BMI;
                }
            ?>
        </section>
        <section class="prway">
            <img src="rys1.png" alt="ćwiczenia">
        </section>
        <footer>
            Autor: PESEL <a href="kwerendy.txt">Zobacz kwerendy</a>
        </footer>
    </body>
</html>