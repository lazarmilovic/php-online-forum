<?php include 'templates/header.php';
	include 'templates/autoloader.php';
	
	$postID=$_GET["post"];
	$topicID=$_GET["topic"];
	$forumID=$_GET["forum"];

	$object=new View();
?>	

	<form action="delete_post.php?post=<?php echo $postID; ?>" method="POST" style="width: 700px; margin: auto">
	<div class="form-group" >
		<h4  class="form-control" style="width: 700px; margin: auto">Old post</h4>
	<textarea  class="form-control" readonly id="post" style="width: 700px; margin: auto" rows="6">
		<?php echo $object->showPost($postID)['post_post'];  ?>
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
	<input type="hidden" name="topicid" value="<?php echo $topicID; ?>">
	<input type="hidden" name="forumid" value="<?php echo $forumID; ?>">
	</div>
	<button type ="submit" class="btn btn-primary">Sumbit</button>
</form>
<?php include 'templates/footer.html'; ?>