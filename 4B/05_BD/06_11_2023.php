<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06.11.2023</title>
</head>
<body>
    <form action="" method="post">
        <input type="submit" name="tworze" value="Tworzenie bazy danycyh">
        <input type="submit" name="kasujbaza" value="Kasowanie bazy danycyh">
    </form>
    <?php    
        if(isset($_POST['tworze'])){
        $kon=mysqli_connect('localhost','root','');
        $tworz_baza='CREATE DATABASE 4B_06_11_2023';
        $wybierz_baza='USE 4B_06_11_2023';
        mysqli_query($kon,$tworz_baza);
        mysqli_query($kon,$wybierz_baza);
        mysqli_close($kon);
        }
        if(isset($_POST['kasujbaza'])){
            $kon=mysqli_connect('localhost','root','');
            $kasujbaza='DROP DATABASE 4B_06_11_2023';
            mysqli_query($kon,$kasujbaza);
            mysqli_close($kon);
            }
    ?>
    <form action="" method="post">
        <input type="submit" name="tworzetab1" value="Tworzenie tabeli klasy">
        <input type="submit" name="kasujtab1" value="Kasowanie tabeli klasy">
    </form>
    <?php    
        if(isset($_POST['tworzetab1'])){
        $kon=mysqli_connect('localhost','root','','4B_06_11_2023');
        $tworz_tab1='CREATE TABLE `4b_06_11_2023`.`klasy` (`id_klasy` INT(11) NOT NULL , `klasa` VARCHAR(20) NOT NULL ) ENGINE = InnoDB;';
        mysqli_query($kon,$tworz_tab1);
        mysqli_close($kon);
        }
        if(isset($_POST['kasujtab1'])){
            $kon=mysqli_connect('localhost','root','','4B_06_11_2023');
            $kasujtab1='DROP TABLE klasy';
            mysqli_query($kon,$kasujtab1);
            mysqli_close($kon);
            }
    ?>
</body>
</html>

