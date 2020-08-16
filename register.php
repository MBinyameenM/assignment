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

	<?php session_start(); require_once('includes\navbar.php') ?>

		<div class="container">
			<div class="row">
				<div class="offset-3 col-6">
					
					<div class="card">
						<div class="card-header">
							Register
						</div>
						<div class="card-body">
							<?php if(isset($_SESSION['errors'])){ foreach ($_SESSION['errors'] as $val) {?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									  <?php echo $val; ?>
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
							<?php } } unset($_SESSION['errors']) ?>
				
							<form  action="includes\users.php" name="register" method="post">
								<div class="form-group">
									<input type="hidden" name="register" value="true">
									<input type="text"  autofocus class="form-control" name="name" placeholder="Enter your Full Name">
								</div>
								<div class="form-group">
									<input type="email"   class="form-control" name="email" placeholder="Enter Email">
								</div>
								<div class="form-group">
									<input type="password" required minlength="6" class="form-control" name="password" placeholder="Enter Password">
								</div>
								<div class="form-group">
									<input type="password" required minlength="6" class="form-control" name="password1" placeholder="Confirm Password">
								</div>
								<div class="form-group">
									<button class="btn btn-primary float-right mr-3" type="submit"> Register </button>
								</div>
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