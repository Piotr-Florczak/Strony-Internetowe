<!DOCTYPE html>
<html>
    <head lang="pl">
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="index.php" method="post">

        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bd15');

            $res = mysqli_query($conn,"SELECT nazwa_kontynent FROM kontynenty;");
            echo "<select name='kontynent'>";
            while($row=mysqli_fetch_assoc($res))
            {
               echo" <option>".$row['nazwa_kontynent']."</option>";
            }
            echo "/<select>";

            $res = mysqli_query($conn,"SELECT nazwa_panstwa FROM panstwa;");
            echo "<select name='panstwo'>";
            while($row=mysqli_fetch_assoc($res))
            {
               echo" <option>".$row['nazwa_panstwa']."</option>";
            }
            echo "/<select>";

            $res = mysqli_query($conn,"SELECT nazwa_miasta FROM miasta;");
            echo "<select name='miasto'>";
            while($row=mysqli_fetch_assoc($res))
            {
               echo" <option>".$row['nazwa_miasta']."</option>";
            }
            echo "/<select>";

            echo"<button type='submit' name='submit'>wybierz</button>";

            if (isset($_POST['submit']))
            {            

                $sql_join = '
                SELECT miasta.nazwa_miasta, miasta.ludnosc, miasta.obszar, panstwa.nazwa_panstwa, kontynenty.nazwa_kontynent FROM miasta
                JOIN panstwa ON miasta.id_panstwa = panstwa.id_panstwa
                JOIN kontynenty ON panstwa.id_kontynentu = kontynenty.id_kontynent
                WHERE 
                kontynenty.nazwa_kontynent = "'.$_POST['kontynent'].'" AND
                panstwa.nazwa_panstwa = "'.$_POST['panstwo'].'" AND
                miasta.nazwa_miasta = "'.$_POST['miasto'].'"
                ';
                $res=mysqli_query($conn,$sql_join);
                if(mysqli_num_rows($res)==0)
                {
                    echo "</br>";
                    echo "nie ma takich danych";
                }
                while($row=mysqli_fetch_assoc($res))
                {
                    
                    echo "</br>";
                    echo $row['nazwa_miasta'];
                    echo "</br>";
                    echo $row['ludnosc'];
                    echo "</br>";
                    echo $row['obszar'];
                    echo "</br>";
                    echo $row['nazwa_panstwa'];
                    echo "</br>";
                    echo $row['nazwa_kontynent'];
                }
            }
        ?>
            </form>
    </body>
</html>