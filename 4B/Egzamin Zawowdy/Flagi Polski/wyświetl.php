<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "bd11";
 $conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_GET['panstwo'])) {
    $panstwo = $_GET['panstwo'];

    $sql = "SELECT panstwa_txt.panstwo, stolice_txt.stolica, panstwa_txt.powierzchnia, panstwa_txt.ludnosc, panstwa_txt.domena FROM panstwa_txt JOIN stolice_txt on panstwa_txt.id = stolice_txt.id_panstwa WHERE panstwo = '$panstwo'; ";
    $result = mysqli_query($conn, $sql);
    $img = "flagi/".$panstwo.".png";

    while ($row = mysqli_fetch_assoc($result))
    {
        echo "<p> Panstwo: " . $panstwo . "</p>
        <img src=".$img.">
        <p> Stolica: ".$row["stolica"]."</p>
        <p> Powierzchnia: ".$row["powierzchnia"]."</p>
        <p> Ludność: ".$row["ludnosc"]."</p>
        <p> Domena: ".$row["domena"]."</p>
        ";
        // echo"<img src="'/flagi'.$panstwo.'.png'">";
    }

} else {
    echo "Państwo nie zostało określone.";
}
?>

