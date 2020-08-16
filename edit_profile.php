<?php require_once('includes\db.php'); session_start(); if( !isset($_SESSION['user_id']) ) header('Location: login.php');

	$query = "SELECT pr.*,u.name, u.email, pic.* from users u left join profile pr ON u.id = pr.user_id left JOIN user_pictures pic ON pic.user_id = u.id WHERE u.id =".$_SESSION['user_id'];
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($result);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Register	
	</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<?php require_once('includes\navbar.php') ?>

		<div class="container">


					<div class="row">
						<div class="offset-1 col-10">

							<div class="offset-1 col-10 mt-3">
								<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><a href="home.php">Profile</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Edit</li>
								  </ol>
								</nav>

							<form  action="includes\users.php" method="post">
								<div class="row">
								<div class="col-6">
									<div class="form-group">
										<input type="text"  autofocus class="form-control" name="name"
										value="<?php echo $data['name'] ?>" placeholder="Enter your Full Name">
									</div>
									<div class="form-group">
										<input type="text"   class="form-control" name="phone" placeholder=" Enter Phone Number"	value="<?php echo $data['phone'] ?>">
									</div>
									<div class="form-group">
										<textarea type="text" class="form-control" rows="4" name="address" placeholder="Enter Address"><?php echo $data['address'] ?></textarea>
									</div>
								</div>

								<div class="col-6">
									<div class="form-group">
										<input type="text"  class="form-control" name="city" 
										value="<?php echo $data['city'] ?>" placeholder="Enter City">
									</div>
									<div class="form-group">
										<input type="text"   class="form-control" name="state" 
										value="<?php echo $data['state'] ?>" placeholder="Enter State">
									</div>
									<div class="form-group">
										<input type="text"  class="form-control" name="country" 
										value="<?php echo $data['country'] ?>" placeholder="Enter Country">
									</div>
								</div>
								</div>

								<div class="form-group">
									 <textarea id="editor" name="bio" placeholder="Enter Bio"><?php echo $data['bio'] ?></textarea>
								</div>
								
								<div class="form-group">
									<button class="btn btn-primary float-right mr-3" type="submit"> Update </button>
									<a href="home.php" class="btn btn-default mr-3 float-right"> Cancel</a>
								</div>
							</form>	
							
							</div>							
						
						</div>
					</div>


		</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/k8aaemajh4grijw0jczycetgt4ddfipsgptm84u9jhdoxp8f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
  	  $(document).ready(function() {
            tinymce.init({
                selector: 'textarea#editor',
                menubar: false
            });
        });
  </script>


</body>
</html>