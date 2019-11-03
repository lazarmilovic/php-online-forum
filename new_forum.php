<?php include 'template/header.php';
		include 'template/connection.php'; ?>

<form action="insert_new_forum.php" method="post" style="width: 500px; margin: auto">
	<div class="form-group">
		<label for= "name">Forum Name</label>
		<input name="forum"  id="name" class="form-control" placeholder= "Type your forum name here">
	</div>
	<div class="form-group">
		<label for= "description">Description</label>
		<input name="description" id="description" class="form-control" placeholder="Type a sentance that perfectly describes it.">
	</div>
	<button type="sumbit">Submit</button>
</form>
