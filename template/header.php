<?php session_start (); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<title></title>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
	<h1><a href="index.php" class="navbar-brand">Forum</a></h1>
	<form class="form-inline" action="search.php" method="post">
		<?php if(!isset($_SESSION['name'])) { ?>
		<h1><a href="register.php" class="navbar-brand"> Sing up</a></h1>
		<h1><a href="login-form.php" class="navbar-brand"> Log in</a></h1>
	<?php } else { ?>
		<h1><a href="#" class="navbar-brand"> <?php echo $_SESSION["name"]; ?></a></h1>
		<h1><a href="singout.php" class="navbar-brand"> Sign out</a></h1>
<?php 	} ?>

		<input type="text" class="form-control" placeholder="Search" name="search">
		<button type="submit" class="btn btn-primary">Search</button>
	</form>
	</nav>	