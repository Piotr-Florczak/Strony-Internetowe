<?php include("polaczzbaza.php"); ?>
<?php include("uprawnienia.php"); ?>
<html>

    <head>
        <meta charset="utf-8">
        <title>Dodaj zawodnika</title>
        <link rel="Stylesheet" href="styl.css">
    </head>

    <body>
        <header>
            <h1>Ranking</h1>
        </header>
        <main>
            <h2>Dodaj zawodnika</h2>
            <?php 
                if (isset($uprawnienia['DODAJ_UZYTKOWNIKA'])) {
            ?>
            <form action="dodajzawodnika.php" method="post" enctype="multipart/form-data">
                <input type="text" name="imie" placeholder="Imię...">
                <select name="druzyna">
                    <?php
                    $kwerenda = "SELECT * FROM `druzyny`";
                    $wynikZapytania = mysqli_query($polaczenie, $kwerenda);
                    while ($rekord = mysqli_fetch_assoc($wynikZapytania)) {
                        echo "<option value='" . $rekord['id'] . "'>" . $rekord['nazwa'] . "</option>\n";
                    }
                    ?>
                </select>
                <input type="number" name="punkty" value="0">
                <input type="file" name="zdjecie" id="zdjecie">
                <input type="submit" value="Dodaj">
            </form>
            <?php
                } else {
                    echo "<h2 class='error'>Nie masz uprawnień, spadaj!</h2>";
                }
            ?>
               
            <?php                    
            if (isset($_POST["imie"])) {
                $imie = filter_var($_POST["imie"], FILTER_SANITIZE_STRING);
                $punkty = filter_var($_POST["punkty"], FILTER_SANITIZE_NUMBER_INT);
                $druzyna = filter_var($_POST["druzyna"], FILTER_SANITIZE_NUMBER_INT);

                if ($imie != '' && $punkty != NULL && $druzyna != NULL) {
                   
                    $kwerenda = "INSERT INTO `zawodnicy` VALUES
                                        ('',
                                            '" . $_POST["imie"] . "',
                                            " . $druzyna . ",
                                            " . $punkty . ",
                                            '".$_FILES['zdjecie']['name']."'
                                        )";
                    $prawidloweZdjecie=true;
                    include("obslugazdjecia.php");

                    if ($prawidloweZdjecie) {
                        $wynik = mysqli_query($polaczenie, $kwerenda);
                        echo "<h2 class='success'>Dodano zawodnika: ".$imie."</h2>";
                    }
                    
                }


            }
            ?>

            <h3><a href="index.php">Powrót</a></h3>
        </main>

    </body>

</html>

<?php mysqli_close($polaczenie); ?>