<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Lista Przyjaciół</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
    <header><h1>Portal Społecznościowy - moje konto</h1> </header>
        <main>
            <h2>Moje zainteresowania</h2>
            <ul>
                <li>muzyka</li>
                <li>film</li>
                <li>komputery</li>
            </ul>
            <h2>Moi znajomi</h2>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "dane";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT imie, nazwisko, opis, zdjecie, Hobby_id FROM osoby WHERE Hobby_id IN(1,2,6);";
                $result = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result))
                {
                  echo'  <div class="zdjecie"><img src='.$row["zdjecie"].' alt="przyjaciel"></div>
                    <div class="opis"><h3>'. $row["imie"]." ".$row["nazwisko"]."</h3>"."ostatni wpis: ". $row["opis"] .'</div>
                    <div class="linia"><hr></div>';
                }
        

            ?>
        </main>
        <footer>Strone wykonał: PESEL</footer>
        <footer><a href="ja@portal.pl">napisz do mnie</a></footer>
    </body>
</html>