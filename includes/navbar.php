<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="home.php">Assignment</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav ml-auto pr-5 mr-5">
	      <li class="nav-item active">
	        <a class="nav-link mr-3" href="home.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <?php if(isset($_SESSION['user_id'])) { ?>
	      	<div class="dropdown">
			  <a href="#" class="dropdown-toggle nav-link" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <?php echo $_SESSION['name'] ?>
			  </a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
			    <a href="includes\logout.php" class="dropdown-item"  style="color:  #007bff !important ;">Logout</a>
			  </div>
			</div>
		<?php } else {?>	

	      <li class="nav-item">
	        <a class="nav-link" href="login.php">Login</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="register.php">Register</a>
	      </li>
	  <?php } ?>
	    </ul>
	  </div>
	</nav>