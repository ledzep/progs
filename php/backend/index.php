<html>
<head>
<title>Gallery</title>
</head>
<body>
<?php include ("header.php"); ?>
<h2>Artist Information</h2>
<form action="index.php" method="post">
Artist: <input type="text" name="a_name" />
<input type="submit" />
</form>

<?php
function PrintArtistTable($name)
{
	$con = mysql_connect("localhost", "gallery_user", "gallery2010");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("gallery", $con);

	$result = mysql_query("SELECT * FROM artist WHERE first_name LIKE '" . $name . "'" );
	if (!$result)
	{
		echo "Sorry!! could not find artist with name: " . $name;
		return;
	}
	if (!mysql_num_rows($result))
	{
		echo "there no such result found";
		return;
	}
	
	echo "<table border = '1'>";
	echo "<tr>";
	echo "<td>artist_id</td>";
	echo "<td>first_name</td>";
	echo "<td>surname</td>";
	echo "<td>bibliography</td>";
	echo "<td>phone</td>";
	echo "<td>email</td>";
	echo "</tr>";

	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['artist_id'] . "</td>";
		echo "<td>" . $row['first_name'] . "</td>";
		echo "<td>" . $row['surname'] . "</td>";
		echo "<td>" . $row['bibliography'] . "</td>";
		echo "<td>" . $row['phone'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";

	mysql_close($con);
}
 
if (array_key_exists("a_name", $_POST))
{
	PrintArtistTable($_POST["a_name"]);
}


?>
<?php include ("footer.php"); ?>
</body>
</html>