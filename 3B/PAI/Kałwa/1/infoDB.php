<?php
error_reporting(E_ALL);
const dsn = 'mysql:host=localhost:3307;dbname=mysql';
const user = 'root';
const password = '';

try {
	$pdo = new PDO(dsn, user, password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * FROM help_keyword";
        $result = $pdo->query($sql);
        echo '<table border="1">';
        foreach($result as $r) {
			echo '<tr>';
			echo "<td>".$r[0]."</td>";
			echo "<td>".$r[1]."</td>";
			echo '</tr>';
        }
        echo "</table>";
}

catch (PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}

