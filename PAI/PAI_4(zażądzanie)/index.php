<?php
    $con= mysqli_connect('localhost','root','','pai');
    if(!$con)
    {
        die("Connection failed: " . mysqli_connect_error());

    }
	if (isset($_POST["team"]))
	{
		$team = $_POST["team"];

		mysqli_query($con,"INSERT INTO druzyny VALUES('', '$team');");
	}
	if (isset($_GET['usun']))
	{
		$ID = $_GET["usun"];

		mysqli_query($con,"DELETE FROM zawodnik WHERE ID = $ID");
		
	}
?>
<div>
	Add Player
	<form action="index.php" method="post">
		<input type="text" name="imie"   placeholder="Name">  <br>
		<input type="number" name="pkt"  placeholder="Points"><br>
		<select name="team">
		<?php
		$res=mysqli_query($con, "SELECT * FROM druzyny");
		while($row=mysqli_fetch_assoc($res))
		{
			echo"<option>".$row['team']."</option>";
		}
		?>
		</select>
		<input type="submit" value="Dodaj">
	</form>


</div>

<div class="team">
	Add team
	<form action="index.php" method="post">
		<input type="text" name="team"   placeholder="Team name" default="null">  <br>
		<input type="submit" value="Dodaj">
	</form>
</div>

<?php

	if (isset($_POST["team"]))
	{
		$team = $_POST["team"];

		mysqli_query($con,"INSERT INTO druzyny VALUES('', '$team');");
	}
	if (isset($_GET['usun']))
	{
		$ID = $_GET["usun"];

		mysqli_query($con,"DELETE FROM zawodnik WHERE ID = $ID");
		
	}
    if (isset($_POST["imie"]) && isset($_POST["pkt"]) && isset($_POST["team"]))
    {
        $imie = $_POST["imie"];
        $pkt = $_POST["pkt"];
        $team = $_POST["team"];

        mysqli_query($con,"INSERT INTO zawodnik VALUES('', '$imie', '$pkt', '$team');");

    }
	$res=mysqli_query($con, "SELECT ID, IMIE, PKT, TEAM FROM zawodnik");
	echo "<table>";
	echo "<tr>";
		echo "<th>Name</th>";
		echo "<th>Points</th>";
		echo "<th>Team</th>";
		echo "<th>Menage</th>";
		echo "</tr>";
	while($row=mysqli_fetch_assoc($res))
	{
		echo "<tr>\n";
			echo "<td>".$row['IMIE']."</td>\n";
			echo "<td>".$row['PKT']."</td>\n";
			echo "<td>".$row['TEAM']."</td>\n";
			echo "<td>";
				echo "<a href='index.php?usun=".$row['ID']."'>delete</a>";
			echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</table>";
?>
<style>
.team
{
	position: absolute;
	top: 320px; left: 7px;
}
div 
{
	float: left;
	text-align: center;
}
table 
{
  border-collapse: collapse;
  width: 30%;
}

th, td 
{
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th 
{
  background-color: #04AA6D;
  color: white;
}


input[type=text], select 
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=number], select 
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] 
{
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover 
{
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}



</style>
