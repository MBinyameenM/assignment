<?php
	
	$host = "127.0.0.1";
	$username = "root";
	$password = "";
	$db = "assignment";

	$conn = mysqli_connect( $host, $username, $password, $db );

	if( !$conn )
	{
		print("Connection failed: ".mysqli_error($conn));
	}
 ?>