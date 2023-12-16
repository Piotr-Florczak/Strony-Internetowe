
<!DOCTYPE html>
<html lang="pl">
    <head>

    </head>
    <body>
    <form action="" method="post">
        <input type="submit" name="tworze" value="Tworzenie bazy danycyh">
    </form>
    <?php
        if(isset($_POST['tworze'])) //towrzy baze danych 
        {
            // dodaje klucze główne
            $kon = mysqli_connect('localhost', 'root', '', 'bd8');
            $kwerenda='ALTER TABLE `kontynenty` ADD PRIMARY KEY(`id_kontynent`)';
            mysqli_query($kon,$kwerenda);
            $kwerenda='ALTER TABLE `panstwa` ADD PRIMARY KEY(`id_panstwa`);';
            mysqli_query($kon,$kwerenda);

            //dodaje klucze obce
            $kwerenda='ALTER TABLE `panstwa` ADD INDEX(`id_kontynentu`);';
            mysqli_query($kon,$kwerenda);
            $kwerenda='ALTER TABLE `miasta` ADD INDEX(`id_panstwa`);';
            mysqli_query($kon,$kwerenda);

            //Tworzy relacje 
            $kwerenda='ALTER TABLE `panstwa` ADD FOREIGN KEY (`id_kontynentu`) REFERENCES `kontynenty`(`id_kontynent`) ON DELETE RESTRICT ON UPDATE RESTRICT;';
            mysqli_query($kon,$kwerenda);
            $kwerenda='ALTER TABLE `panstwa` ADD FOREIGN KEY (`id_panstwa`) REFERENCES `miasta`(`id_miasta`) ON DELETE RESTRICT ON UPDATE RESTRICT;';
            mysqli_query($kon,$kwerenda);

            mysqli_close($kon);
        }
    ?>
    </body>
</html>

