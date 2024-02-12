<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Wędkowanie</title>
        <link rel="stylesheet" href="styl_1.css">
    </head>
    <body>
            <header>

                <h1>Portal dla wedkarzy</h1> 

            </header>

            <main>
                <section class="left_top">

                <h3>Ryby zamieszkujące rzeki</h3>

                <?php
                
                    $servername = "localhost";
                    $dbname = "wedkowanie";
                    $username = "root";
                    $password = "";

                    $conn = new mysqli($servername,$username,$password,$dbname);

                    $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby JOIN lowisko on ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;";
                    $result = mysqli_query($conn,$sql);
                    echo "<ol>";
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<li>" . $row["nazwa"] . "  pływa w rzece " . $row["akwen"] .", ". $row["wojewodztwo"] . "</li>";
                    }
                    echo "</ol>"   
                ?>   

                </section>
                <section class="left_bottom">

                    <h3>Ryby drapieżne naszych wód</h3>,
                    <table>
                        <tr>
                            <th>L.P.</th>
                            <th>Gatunek</th>
                            <th>Występowanie</th>
                        </tr>
                        <?php
                
                        $servername = "localhost";
                        $dbname = "wedkowanie";
                        $username = "root";
                        $password = "";

                        $conn = new mysqli($servername,$username,$password,$dbname);

                        $sql = "SELECT id, nazwa, wystepowanie from ryby WHERE styl_zycia = 1";
                        $result = mysqli_query($conn,$sql);
                        
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nazwa"] . "</td>";
                            echo "<td>" . $row["wystepowanie"] . "</td>";
                            echo "</tr>";
                        }
                           
                ?>
                    </table>

                </section>
            </main>
            <aside>
                <img src="ryba1.jpg" alt="Sum">
                </br>
                <a href="https://google.com"> Pobierz Kwerendy</a>
            </aside>
            <footer>
                <p>Strone wykonał: 2137</p>
            </footer>
    </body>
</html>

