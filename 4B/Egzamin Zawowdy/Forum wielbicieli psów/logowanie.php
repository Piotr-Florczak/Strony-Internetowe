<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title> Forum o psach </title>
        <link rel="stylesheet" href="styl4.css">

    </head>
    <body>
        <header><h1>Forum wielbicieli psów</h1></header>
        <aside><img src="obraz.jpg" alt="foksterier"></aside>
        <main>
            <div class="top">
                <h2>Zapisz się</h2>
                <form action="logowanie.php" method="post">
                    <label>login</label>
                    </br>
                    <input type="text" name="login">
                    </br>
                    <label>hasło</label>
                    </br>
                    <input type="password" name="password">
                    </br>
                    <label>powtóz hasło</label>
                    </br>
                    <input type="password" name="retypePassword">
                    </br>
                    <button name="submit">Zapisz</button>
                </form>
                
                <?php

                     $servername = "localhost";
                     $username = "root";
                     $password = "";
                     $dbname = "psy";
                     $conn = new mysqli($servername,$username,$password,$dbname);

                     $sql = '';
                    if (isset($_POST['submit']))
                    {
                        if (!empty($_POST['login']) || !empty($_POST['password']) || !empty($_POST['retypePassword']))
                        {
                            $login = $_POST['login'];
                            $password = $_POST["password"];
                            $retypePassword = $_POST['retypePassword'];
                            
                            $result = mysqli_query($conn,"SELECT login FROM uzytkownicy WHERE login = '$login'");
                            if (mysqli_num_rows($result) > 0)
                            {
                                echo "<p>login występuje w bazie danych,</p>";
                            }
                            else
                            {
                                if ($password != $retypePassword)
                                {
                                    echo "<p>hasła nie są takie same</p>";
                                }
                                else
                                {
                                    $hashPassword = sha1($password);
                                    mysqli_query($conn,"INSERT INTO `uzytkownicy`(`id`, `login`, `haslo`) VALUES ('NULL','$login','$hashPassword)');");
                                    echo "<p>Konto zostało dodane</p>";
                                }
                            }
                        }
                        else
                        {
                            echo "<p>wypełnij wszystkie pola</p>";
                            
                        }
                    }

                ?>
                
            </div>
            <div class="bottom">
                <h2>Zapraszamy wszystkich</h2>
                <ol>
                    <li>właścicieli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co chcą kupić psa</li>
                    <li>tych, co lubią psy</li>
                </ol>
                <a href="regulamin.html">Przeczytaj regulamin forum</a>
            </div>
        </main>
        <footer>
            Stronę wykonał: PESEL
        </footer>
    </body>
</html>
