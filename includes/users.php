<?php
	require_once('db.php');
	session_start();

	if( isset($_POST['bio']) )
	{
		$name = $_POST['name'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$bio = $_POST['bio'];


		$query = "UPDATE users SET name= '$name' where id =".$_SESSION['user_id'];
		$query_result = mysqli_query( $conn, $query );

		$query = "UPDATE profile SET country= '$country', state = '$state', city = '$city',
		phone = '$phone', address = '$address', bio = '$bio' where user_id =".$_SESSION['user_id'];
		$query_result = mysqli_query( $conn, $query );


		if( !$query_result )
		{
			die('Profile update failed: '.mysqli_error($conn));
		}

		header('Location: ../home.php');

		
		
	}

	if( isset($_POST['register']) )
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];

		$errors = array();
		foreach( $_POST as $key => $val )
		{
			if( empty($val) )
			{
				array_push($errors, '<b>'.$key.'</b> field  is required.');
			}
		}

		if($password != $password1)
		{
			array_push($errors, '<b> Password </b> doesn\'t match.');
		}
		if( !empty($errors) )
		{
			$_SESSION['errors'] = $errors;
			header('Location: ../register.php');
		}

		$query = "INSERT INTO users( name, email, password) VALUES
				( '$name', '$email', '".md5($password)."')";
		$query_result = mysqli_query( $conn, $query );

		if( !$query_result )
		{
			die('Registraion failed: '.mysqli_error($conn));
		}

		$_SESSION['name'] = $name;
		$_SESSION['user_id'] = $conn->insert_id;
		header('Location: ../home.php');

	}

	if( isset($_POST['email']) )
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$errors = array();
		foreach( $_POST as $key => $val )
		{
			if( empty($val) )
			{
				array_push($errors, '<b>'.$key.'</b> field  is required.');
			}
		}

		if( !empty($errors) )
		{
			$_SESSION['errors'] = $errors;
			header('Location: ../register.php');
		}

		$query = "SELECT * from users where email = '$email' and password = '".md5($password)."'";
		$query_result = mysqli_query( $conn, $query );
		$data = mysqli_fetch_assoc($query_result);

		if( !$query_result )
		{
			die('Login failed: '.mysqli_error($conn));
		}

		if( $data['name'] )
		{
			$_SESSION['name'] = $data['name'];
			$_SESSION['user_id'] = $data['id'];
			header('Location: ../home.php');
		}
		else 
		{
			$_SESSION['errors'] = 'Email or Password incorrect';
			header('Location: ../login.php');

		}
		
		
	}

	if( isset($_POST['dp'] ))
	{
		$target_dir = "../images/users/";
		$file = 'images/users/'.basename($_FILES["profile"]["name"]);
		$target_file = $target_dir	 .basename($_FILES["profile"]["name"]);
		$query = "select count(id) as count from user_pictures where user_id =".$_SESSION['user_id'];
		$query_result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($query_result);

		if(!$data['count'])
		{
			$query = "INSERT into user_pictures( user_id, dp ) VALUES (".$_SESSION['user_id'].", '$file')";
			$query_result = mysqli_query($conn,$query);
			if( !$query )
			{
				die('Profile Picture failed to upload: '.mysqli_error($conn));
			}
			move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
			header('Location: ../home.php');
		}

		$query = "UPDATE user_pictures SET dp ='$file' where user_id = ".$_SESSION['user_id'];
			$query_result = mysqli_query($conn,$query);
			if( !$query )
			{
				die('Profile Picture failed to upload: '.mysqli_error($conn));
			}
			move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
			header('Location: ../home.php');
	}

	if( isset($_POST['cover'] ))
	{
		$target_dir = "../images/users/";
		$file = 'images/users/'.basename($_FILES["cover"]["name"]);
		$target_file = $target_dir	 .basename($_FILES["cover"]["name"]);
		$query = "select count(id) as count from user_pictures where user_id =".$_SESSION['user_id'];
		$query_result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($query_result);

		if(!$data['count'])
		{
			$query = "INSERT into user_pictures( user_id, cover ) VALUES (".$_SESSION['user_id'].", '$file')";
			$query_result = mysqli_query($conn,$query);
			if( !$query )
			{
				die('Profile Picture failed to upload: '.mysqli_error($conn));
			}
			move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);
			header('Location: ../home.php');
		}

		$query = "UPDATE user_pictures SET cover ='$file' where user_id = ".$_SESSION['user_id'];
			$query_result = mysqli_query($conn,$query);
			if( !$query )
			{
				die('Profile Picture failed to upload: '.mysqli_error($conn));
			}
			move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);
			header('Location: ../home.php');
	}

	

 ?>