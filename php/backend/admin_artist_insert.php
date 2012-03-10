<html>
<head>
<title>New artist Page</title>
</head>
<body>

<?php include ("admin_header.php"); ?>
<h3>Add new artist</h3>
<form action="admin_artist_insert" method="post">
<table border="1">
<tr>
<td>ID</td>
<td><input type="text" name="id" /></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" name="f_name" /></td>
</tr>
<tr>
<td>Surname</td>
<td><input type="text" name="surname" /></td>
</tr>
<tr>
<td>bibliography</td>
<td><input type="text" name="bib" /></td>
</tr>
<tr>
<td>Phone</td>
<td><input type="text" name="phone" /></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name="email" /></td>
</tr>
</table>
<br>
<input type="submit" />
</form>

<?php

function InsertNewArtist($id, $name, $surname, $bibliography, $phone, $email)
{
	$con = mysql_connect("localhost", "gallery_user", "gallery2010");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("gallery", $con);

	$sql="INSERT INTO artists (artist_id, first_name, surname, bibliography, phone, email)
			VALUES ('$id','$name','$surname','$bibliography','$phone','$email')";
	
	$result = mysql_query($sql);
	if (!$result)
	{
		echo "Sorry! no artist was added. Error: " . mysql_error();
		return;
	}
	
	echo "1 record added";
	
	mysql_close($con);
}

InsertNewArtist($_POST['id'], $_POST['name'], $_POST['surname'], $_POST['bibliography'], $_POST['phone'], $_POST['email'])

	
<?php include ("admin_footer.php"); ?>
</body>
</html>


