<?php require_once('includes\db.php'); session_start(); if( !isset($_SESSION['user_id']) ) header('Location: login.php');

	$query = "SELECT pr.*,u.name, u.email, pic.* from users u left join profile pr ON u.id = pr.user_id left JOIN user_pictures pic ON pic.user_id = u.id WHERE u.id =".$_SESSION['user_id'];
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($result);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Home	
	</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<?php require_once('includes\navbar.php') ?>

		<div class="container">

				<div class="row">
						<div class="col-12">
							<div class="fb-profile">
						        <img align="left" class="fb-image-lg" src="<?php if(!empty($data['cover'])) echo $data['cover']; else echo 'images/cover.jpg' ?>" alt="Profile image example"/>
						        <img align="left" class="fb-image-profile rounded-circle img-thumbnail" src="<?php if(isset($data['dp'])) echo $data['dp']; else echo 'images/profile.jpg' ?>" alt="Profile image example"/>
						    </div>
						</div>
					</div>
				

					<div class="row">
						<div class="offset-1 col-10">
							<div class="float-right">
								<div class="dropdown">
								  <a href="#" class="dropdown-toggle nav-link" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								   Edit
								  </a>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
								    <a href="edit_profile.php" class="dropdown-item" > Edit Profile </a>
								    <a  type="button" data-toggle="modal" data-target="#profileModal" class="dropdown-item" > Change Profile Picture </a>
								    <a type="button" data-toggle="modal" data-target="#coverModal" class="dropdown-item"> Change Cover Picture </a>
								  </div>
								</div>

							</div>
							<h5 class="mt-4"> Bio:</h5>
							<p><?php echo $data['bio']  ?></p>

							<div class="row" style="min-height: 400px;">
								<div class="col-6">
									<ul class="list-group list-group-flush">
										<li class="list-group-item"> Name: <span class="float-right"> <?php echo $data['name']  ?> </span> </li>
										<li class="list-group-item"> Email: <span class="float-right"> <?php echo $data['email']  ?> </span> </li>
										<li class="list-group-item"> Phone: <span class="float-right"> <?php echo $data['phone']  ?></span> </li>
										<li class="list-group-item"> Address: <span class="float-right"> <?php echo $data['address']  ?> </span> </li>
									</ul>		
								</div>

								<div class="col-6">
									<ul class="list-group list-group-flush">
										<li class="list-group-item"> City: <span class="float-right"> <?php echo $data['city']  ?> </span> </li>
										<li class="list-group-item"> State: <span class="float-right"> <?php echo $data['state']  ?> </span> </li>
										<li class="list-group-item"> Country: <span class="float-right"> <?php echo $data['country']  ?> </span> </li>
										<li class="list-group-item">	</li>
									</ul>		
								</div>

							</div>
							
						
						</div>
					</div>


<!--Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/users.php" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="dp" value="true">
        	<div class="form-group">
        		<input type="file" name="profile" class="form-control">
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>	

<!-- Cover Modal -->
<div class="modal fade" id="coverModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Cover Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/users.php" method="post" enctype="multipart/form-data">
        	<div class="form-group">
        		<input type="hidden" name="cover" value="true">
        		<input type="file" name="cover" class="form-control">
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>	


		</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>