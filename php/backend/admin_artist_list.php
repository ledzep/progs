<?php include ("admin_header.php"); ?>

<?php

	$con = mysql_connect("localhost", "gallery_user", "gallery2010");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("gallery", $con);
	
	$sql = "SELECT * FROM artist ORDER BY artist_id";
	$result = mysql_query($sql);
	
	if (!$result)
	{
		echo "Failed accessing the database. Error:  " . mysql_error();
		return;
	}
	if (!mysql_num_rows($result))
	{
		echo "There is no artist in the database.";
		return;
	}
	
	echo "<h3>Artist details</h3>";
	echo "<table border = '1'>";
	echo "<tr>";
	echo "<td>artist_id</td>";
	echo "<td>first_name</td>";
	echo "<td>surname</td>";
	echo "<td>bibliography</td>";
	echo "<td>phone</td>";
	echo "<td>email</td>";
	echo "<td></td>";
	echo "</tr>";

	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['artist_id'] . "</td>";
		echo "<td><a href='admin_art_edit.php'>" . $row['first_name'] . "</a></td>";
		echo "<td>" . $row['surname'] . "</td>";
		echo "<td>" . $row['bibliography'] . "</td>";
		echo "<td>" . $row['phone'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td><a href='admin_artist_edit.php'>Delete</a></td>";
		echo "</tr>";
	}

	echo "</table>";

	mysql_close($con);
	
?>
<?php include ("admin_footer.php"); ?>
