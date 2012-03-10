<?php include ("admin_header.php"); ?>

<?php

	$con = mysql_connect("localhost", "gallery_user", "gallery2010");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("gallery", $con);
	
	$sql = "SELECT art.art_id, art.title, art.description, art.price, artist.first_name, artist.surname 
			FROM art, artist WHERE art.artist_id = artist.artist_id ORDER BY artist.first_name";
	$result = mysql_query($sql);
	
	if (!$result)
	{
		echo "Failed accessing the database. Error:  " . mysql_error();
		return;
	}
	if (!mysql_num_rows($result))
	{
		echo "There is no art inventory in the database.";
		return;
	}
	
	echo "<h3>Art inventory details</h3>";
	echo "<table border = '1'>";
	echo "<tr>";
	echo "<td>art_id</td>";
	echo "<td>title</td>";
	echo "<td>description</td>";
	echo "<td>price</td>";
	echo "<td>first_name</td>";
	echo "<td>surname</td>";
	echo "</tr>";
	
	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['art_id'] . "</td>";
		echo "<td>" . $row['title'] . "</td>";
		echo "<td>" . $row['description'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "<td>" . $row['first_name'] . "</td>";
		echo "<td>" . $row['surname'] . "</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	
	mysql_close($con);
	
?>
<?php include ("admin_footer.php"); ?>
