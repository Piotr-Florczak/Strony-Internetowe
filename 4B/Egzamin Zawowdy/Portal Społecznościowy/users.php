<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Panel administratora</title>
        <link rel="stylesheet" href="styl4.css">

    </head>
    <body>
        <header>
            <h3>Portal Społecznościowy - panel administratora</h3>
        </header>
        <section class="lewy">
            <h4>Użytkownicy</h4>
            <!-- skrypt 1  -->
            <?php
                $conn = mysqli_connect('localhost','root','','dane4');
                $sql =" SELECT id,imie,nazwisko,rok_urodzenia,zdjecie FROM osoby LIMIT 30";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo $row['id'].". ";
                    echo $row['imie']." ";
                    echo $row['nazwisko'].", ";
                    echo $row['nazwisko'].", ";
                    echo date("Y") - $row["rok_urodzenia"]." lat";
                    echo "</br>";
        
                }
                

            ?>
            <a href="settings.html">Inne ustawienia</a>
        </section>
        <section class="prawy">
            <h4>Podaj id użytkownika</h4>
            <form action="users.php" method="post">
                <input type="number" name="number">
                <button type="submit" name="submit">ZOBACZ</button>
            </form>
            <hr>
            <!-- skrypt 2 -->
            <?php
                if (isset($_POST['submit']))
                {
                    $number = $_POST['number'];
                    $sql2 = "SELECT osoby.imie,osoby.nazwisko,osoby.rok_urodzenia,osoby.opis,zdjecie,hobby.nazwa FROM osoby JOIN hobby ON hobby.id = osoby.Hobby_id WHERE osoby.id = '$number'";
                    $result2 = mysqli_query($conn,$sql2);
                    while ($row = mysqli_fetch_assoc($result2))
                    {
                        echo "<h2>".$number.". ".$row['imie']." ".$row['nazwisko']."</h2>";
                        echo "<img src=".$row['zdjecie'].">";
                        echo "<p>"."Rok urodzenia: ".$row['rok_urodzenia']."</p>";
                        echo "<p>"."Opis: ".$row['opis']."</p>";
                        echo "<p>"."Hobby: ".$row['nazwa']."</p>";
                    }

                }
            ?>
        </section>
        <footer>
            Strone wykonał: PESEL
        </footer>
    </body>
</html>