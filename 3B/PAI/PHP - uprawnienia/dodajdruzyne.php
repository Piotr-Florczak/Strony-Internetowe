<?php include("polaczzbaza.php"); ?>
<?php include("uprawnienia.php"); ?>
<html>
    <head>
    <meta charset="utf-8">
        <title>Dodaj drużynę</title>
        <link rel="Stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Ranking</h1>
        </header>
        <main>
            <h2>Dodaj drużynę</h2>
            <?php 
                if (isset($uprawnienia['DODAJ_DRUZYNE'])) {
            ?>
            <form action="dodajdruzyne.php" method="post">
                <input type="text" name="nazwa" placeholder="Nazwa drużyny...">
                <input type="submit" value="Dodaj">
            </form>
            <?php
                if (isset($_POST["nazwa"])) {
                    $nazwaDruzyny = filter_var($_POST["nazwa"], FILTER_SANITIZE_STRING);
                    $kwerenda = "INSERT INTO `druzyny` VALUES ('','" . $nazwaDruzyny . ")";
                    mysqli_query($polaczenie, $kwerenda);
                    echo "<b>Dodano drużynę</b>";
                }
            ?>
            <?php
                } else {
                    echo "<h2 class='error'>Nie masz uprawnień, spadaj!</h2>";
                }
            ?>
            <h3><a href="index.php">Powrót</a></h3>
        </main>
        
    </body>
</html>
<?php mysqli_close($polaczenie); ?>