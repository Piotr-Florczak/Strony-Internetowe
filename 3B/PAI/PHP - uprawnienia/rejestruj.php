<?php
    include("polaczzbaza.php");

    $bledy=array();
    $sukcesy=array();

    if (isset($_POST['zarejestruj'])) {
        $poprawneDane=true;
        
        $login=filter_var($_POST['nazwaUzytkownika'], FILTER_SANITIZE_STRING);
        $haslo=filter_var($_POST['haslo'], FILTER_SANITIZE_STRING);
        $powtorzoneHaslo=filter_var($_POST['potwierdzHaslo'], FILTER_SANITIZE_STRING);
        $email=filter_var($_POST['adresEmail'], FILTER_SANITIZE_EMAIL);

        if ($login=="") {
            $poprawneDane=false;
            array_push($bledy, "Podaj login");
        }

        if ($haslo=="") {
            $poprawneDane=false;
            array_push($bledy, "Podaj hasło");
        }

        if (strlen($haslo)<10) {
            $poprawneDane=false;
            array_push($bledy, "Hasło za krótkie");
        }

        if ($powtorzoneHaslo=="") {
            $poprawneDane=false;
            array_push($bledy, "Potwierdź hasło");
        }

        if ($email=="") {
            $poprawneDane=false;
            array_push($bledy, "Podaj adres email");
        }

        if ($haslo!=$powtorzoneHaslo) {
            $poprawneDane=false;
            array_push($bledy, "Hasła się nie zgadzają");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $poprawneDane=false;
            array_push($bledy, "Niepoprawny adres e-mail");
        }

        if ($poprawneDane) {
            $haslo=crypt($haslo, "Najfajniejszasólnaświecie");
            $kwerenda = "INSERT INTO `uzytkownicy` VALUES
                ('',
                    '".$login."',
                    '".$haslo."',
                    '".$email."'
                )";
            $wynik=mysqli_query($polaczenie, $kwerenda);
            array_push($sukcesy, "Dodano użytkownika!");
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
            <h1>Rejestracja</h1>
            <form method="POST" action="rejestruj.php">
                <input type="text" name="nazwaUzytkownika" placeholder="Nazwa użytkownika...">
                <input type="password" name="haslo" placeholder="Haslo...">
                <input type="password" name="potwierdzHaslo" placeholder="Potwierdź haslo...">
                <input type="email" name="adresEmail" placeholder="Adres e-mail...">
                <input type="submit" name="zarejestruj" value="Załóż konto">
            </form>

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