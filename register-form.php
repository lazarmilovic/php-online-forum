<?php include "templates/header.php"; 

if(isset($_GET['name_err'])){ ?>

	<div class="alert alert-danger text-center" role="alert">
  	Name cannot be numeric!
	</div>
<?php } 

if (isset($_GET['lastname_err'])) { ?>
	
	<div class="alert alert-danger text-center" role="alert">
  	Last name cannot be numeric!
	</div>
<?php  }

if (isset($_GET['username_err'])) { ?>
	
	<div class="alert alert-danger text-center" role="alert">
  	Username is already taken!
	</div>
<?php }

if (isset($_GET['email_err'])) { ?>
	
	<div class="alert alert-danger text-center" role="alert">
  	Email address is already used for creating an account!
	</div>
<?php }

if (isset($_GET['filled_err'])) { ?>
	<div class="alert alert-danger text-center" role="alert">
  	All fields have to be filled!
</div>
<?php } ?>
	
<form action="register-check.php" method="post" style="width: 500px; margin: auto">
	<div class="form-group">
		<label for= "name">Name</label>
		<input type="text" name="name" placeholder="Name" id="name" class="form-control">
	</div>
	<div class="form-group">
		<label for= "lastname">Last Name</label>
		<input type="text" name="lastname" placeholder="Last Name" id="lastname" class="form-control">
	</div>
	<div class="form-group">
		<label for= "username">Username</label>
		<input type="text" name="username" placeholder="Username" id="username" class="form-control">
	</div>
	<div class="form-group">
		<label for= "password">Password</label>
		<input type="text" name="password" placeholder="Password" id="password" class="form-control">
	</div>
	<div class="form-group">
		<label for= "email">Email</label>
		<input type="email" name="email" placeholder="example@example.com" id="email" class="form-control">
	</div>
	<button class="button">Posalji</button>
</form>
		

</body>
<?php include "templates/footer.html"; ?>