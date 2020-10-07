<?php include "templates/header.php"; 

if(isset($_GET['registered'])){ ?>

	<div class="alert alert-success text-center" role="alert">
  	You are registered! Please log in. 
	</div>

<?php  } 

if(isset($_GET['error'])){ ?>

	<div class="alert alert-danger text-center" role="alert">
  	You've entered wrong info. Please enter valid data. 
	</div>

<?php  } ?>

<form action="login-check.php" method="post" style="width: 500px; margin: auto">
	<div class="form-group">
		<label for= email>Email address</label>
		<input type="email" name="email" placeholder="example@example.com" id="email" class="form-control">
	</div>
	<div class="form-group">
		<label for= password>Password</label>
		<input name="password" placeholder="enter your password" id="password" class="form-control">
	</div>
	<button type="submit">Submit</button>
</form>

</body>
</html>
<?php include "templates/footer.html"; ?>