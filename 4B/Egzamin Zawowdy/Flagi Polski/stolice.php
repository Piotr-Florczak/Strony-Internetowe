<?php
$styl = 'stolice.css';

if (isset($_GET['ciemny'])) {
    $styl = 'stolice_ciemne.css';
} elseif (isset($_GET['jasny'])) {
    $styl = 'stolice.css';
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Piotr Florczak</title>
    <link rel="icon" href="flagi/polska.png">
    <link rel="stylesheet" href="<?php echo $styl; ?>">
</head>

<body>
    <section>
        <header class="baner">
            <img src="baner.gif">

        </header>
        <main class="tresc">
            <?php
            include 'wyświetl.php';
            ?>
        </main>
        <nav class="menu">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bd11";
            $conn = new mysqli($servername, $username, $password, $dbname);

            $sql = "SELECT panstwo FROM panstwa_txt";
            $result = mysqli_query($conn, $sql);

            $motyw = '';
            if (isset($_GET['ciemny'])) {
                $motyw = '&ciemny';
            } elseif (isset($_GET['jasny'])) {
                $motyw = '&jasny';
            }

            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                $url = $row["panstwo"];
                echo "<li><a href='stolice.php?panstwo=$url$motyw'>" . $row["panstwo"] . "</a></li>";
            }
            echo "</ul>";
            mysqli_close($conn);
            ?>

        </nav>
        <footer class="stopka">
            <form action="stolice.php" method="get">
                <?php if (isset($_GET['panstwo'])): ?>
                    <input type="hidden" name="panstwo" value="<?= htmlspecialchars($_GET['panstwo']) ?>">
                <?php endif; ?>
                <button name="ciemny" class="ciemny"></button>
                <button name="jasny" class="jasny"></button>
            </form>
            <img src="100px.png" id="font100" style="cursor: pointer;">
            <img src="75px.png" id="font75" style="cursor: pointer;">
            <img src="50px.png" id="font50" style="cursor: pointer;">
        </footer>
    </section>
</body>

</html>

<script>
    function zmienRozmiarCzcionki(rozmiar) {
        document.body.style.fontSize = rozmiar + 'px';
    }

    document.getElementById('font100').addEventListener('click', function () { zmienRozmiarCzcionki(25); });
    document.getElementById('font75').addEventListener('click', function () { zmienRozmiarCzcionki(20); });
    document.getElementById('font50').addEventListener('click', function () { zmienRozmiarCzcionki(18); });
</script>