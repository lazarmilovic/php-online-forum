<?php include "template/header.php"; ?>

	
<form action="login.php" method="post" style="width: 500px; margin: auto">
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
<?php include "template/footer.html"; ?>