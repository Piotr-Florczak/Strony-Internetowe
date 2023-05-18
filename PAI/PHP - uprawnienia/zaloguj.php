<?php
    include("polaczzbaza.php");

    $bledy=array();
    $sukcesy=array();

    if (isset($_POST['zaloguj'])) {
        $poprawneDane=true;
        
        $login=filter_var($_POST['nazwaUzytkownika'], FILTER_SANITIZE_STRING);
        $haslo=filter_var($_POST['haslo'], FILTER_SANITIZE_STRING);

        if ($login=="") {
            $poprawneDane=false;
            array_push($bledy, "Podaj login");
        }

        if ($haslo=="") {
            $poprawneDane=false;
            array_push($bledy, "Podaj hasło");
        }

        if ($poprawneDane) {
            $haslo=crypt($haslo, "Najfajniejszasólnaświecie");
            $kwerenda = "SELECT `id` FROM `uzytkownicy` WHERE
                (`login`='".$login."' OR `email`='".$login."') AND
                `haslo`='".$haslo."'";
            $wynik=mysqli_query($polaczenie, $kwerenda);
            
            if ($wynik->num_rows>0) {
                $rekord=mysqli_fetch_assoc($wynik);
                $_SESSION['id']=$rekord['id'];
                $_SESSION['zalogowany']=true;
                array_push($sukcesy, "Pomyślnie zalogowano!");
                $zalogowany=true;
            } else {
                array_push($bledy, "Nie ma takiego użytkownika :(");
            }

            
        }


    }
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Zawodnicy - Rejestracja</title>
    <link rel="Stylesheet" href="styl.css">
</head>

    <body>
        <header>
            <h1>Ranking</h1>
        </header>
        <main>
            <h1>Logowanie</h1>
            <?php
                if (!$zalogowany) {
            ?>
            <form method="POST" action="zaloguj.php">
                <input type="text" name="nazwaUzytkownika" placeholder="Nazwa użytkownika lub adres e-mail...">
                <input type="password" name="haslo" placeholder="Haslo...">
                <input type="submit" name="zaloguj" value="Zaloguj się">
            </form>
            <?php
                }
            ?>

            <?php
                for ($i=0; $i<sizeof($bledy); $i++) {
                    echo "<h2 class='error'>".$bledy[$i]."</h2>";
                }

                for ($i=0; $i<sizeof($sukcesy); $i++) {
                    echo "<h2 class='success'>".$sukcesy[$i]."</h2>";
                }
            ?>

            <h2><a href="index.php">Powrót</a></h2>
        </main>
    </body>

</html>

<?php
mysqli_close($polaczenie);
?>