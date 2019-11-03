<?php include "template/header.php"; ?>




<form action="user.php" method="post" style="width: 500px; margin: auto">
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
<?php include "template/footer.html"; ?>