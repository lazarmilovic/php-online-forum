<?php include 'template/header.php';
	include 'template/connection.php';
	
	$postID=$_GET["post"];

	$thispost= array();
	$sql= "SELECT * FROM post WHERE post_id = '$postID' ";
	$tiket = mysqli_query($mysqlConnection, $sql);
	while ($row= mysqli_fetch_assoc($tiket)){
		$thispost[]=$row;
	}
	

?>	<form action="delete_post.php?post=<?php echo $postID; ?>" method="POST" style="width: 700px; margin: auto">
	<div class="form-group" >
		<h4  class="form-control" style="width: 700px; margin: auto">Old post</h4>
	<textarea  class="form-control" readonly id="post" style="width: 700px; margin: auto" rows="6">
		<?php  echo $thispost[0]['post_post'];  ?>
	</textarea>
	</div>
	<button type ="submit" class="btn btn-primary">Delete post</button>
	</form>
</br>
<form action="new_post.php" method="POST" style="width: 700px; margin: auto">
	<div class="form-group">
	<h4  class="form-control" style="width: 700px; margin: auto">Your New Post</h4>
	<textarea class="form-control" id="post" name= "post" style="width: 700px; margin: auto" rows="6" required></textarea>
	<input type="hidden" name="postid" value="<?php echo $postID; ?>">
	</div>
	<button type ="submit" class="btn btn-primary">Sumbit</button>
</form>
