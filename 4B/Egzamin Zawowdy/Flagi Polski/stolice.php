<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Piotr Florczak</title>
    <link rel="icon" href="flagi/polska.png">
    <link rel="stylesheet" href="stolice.css">

</head>

<body>
    <section>
        <header class="baner">baner</header>
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

            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                $url = $row["panstwo"];
                echo "<li><a href='?panstwo=$url'>" . $row["panstwo"] . "</a></li>";
            }
            echo "</ul>";
            mysqli_close($conn);
            ?>

        </nav>
        <footer class="stopka">stopka</footer>
    </section>



</body>

</html>