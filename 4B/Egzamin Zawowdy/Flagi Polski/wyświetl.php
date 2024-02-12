<?php
if (isset($_GET['panstwo'])) {
    $panstwo = $_GET['panstwo'];
    echo "<p>" . $panstwo . "</p>";

} else {
    echo "Państwo nie zostało określone.";
}
?>
