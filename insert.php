#To create connection between mysql and comment box
<?php
	
$name = $_REQUEST['name'];
$comments = $_REQUEST['comments'];


$con=mysqli_connect("localhost","root","password","comment_box");
		// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_query($con, "INSERT INTO comment(name, comments) VALUES('$name','$comments')");
?>
