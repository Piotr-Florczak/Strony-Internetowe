<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Forum o psach</title>
        <link rel="stylesheet" href="styl.css">

    </head>
    <body>
        <header>
            <h1>Forum miłośników psów</h1>
        </header>
        <section class="lewy">
            <img src="Avatar.png" alt="Użytkonwik Forum">
            <!-- skrypt 1  -->
            <?php
                $conn = mysqli_connect('localhost','root','','forumpsy');
                $sql = "SELECT konta.nick, konta.postow, pytania.pytanie FROM konta JOIN pytania ON konta.id = pytania.konta_id WHERE pytania.id = 1";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<h4>Użytkonik".$row['nick']."</h4>";
                    echo "<p>".$row['postow']." postów na forum</p>";
                    echo "<p>".$row['pytanie']."</p>";
                }
            ?>
            <video src="video.mp4" controls loop></video>
        </section>
        <section class="prawy">
            <form action="index.php" method="post">
                <textarea rows="4" cols="40" name="text"></textarea>
            </br>
                <button type="submit" name="submit">Dodaj odpowiedź</button>
                <!-- skrytpt 2  -->
                <?php
                    if (isset($_POST['text']) && isset($_POST['submit']))
                    {
                        $text = $_POST['text'];
                        $sql2 = "INSERT INTO `odpowiedzi`(`id`, `Pytania_id`, `konta_id`, `odpowiedz`) VALUES (NULL,1,5,'$text');";
                        mysqli_query($conn,$sql2);
                    }
                ?>
                <h2>odpowiedźi na pytanie</h2>
                <ol>
                    <!-- skrypt 3 -->
                    <?php
                        $sql3 = "SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi JOIN konta ON konta.id = odpowiedzi.konta_id JOIN pytania ON pytania.id = odpowiedzi.Pytania_id WHERE pytania.id = 1";
                        $result = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<li>".$row['odpowiedz']."</li>";
                            echo "<hr>";
                        }
                    ?>
                </ol>
            </form>
        </section>
        <footer>
            Autor: PESEL
            <a href=" http://mojestrony.pl/">Zobacz nasze realizacje</a>
        </footer>
    </body>
</html>