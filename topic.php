<?php 
include 'template/header.php'; 
	include 'template/connection.php'; 

$forumID= $_GET["forum"];
$topicID= $_GET["topic"];
$page= $_GET["page"];

$posts_per_page= 5;
$startFrom= ($page-1)*$posts_per_page;

$all_posts= array();
$sql= "SELECT post_post FROM post WHERE post_topic_id = '$topicID'";
$tiket= mysqli_query($mysqlConnection,$sql);
while ($row= mysqli_fetch_assoc($tiket)) {
	$all_posts[]= $row;
}

$array_forum= array();
$sql= "SELECT * FROM post WHERE post_topic_id = '$topicID' LIMIT ".$startFrom.",".$posts_per_page."";
$tiket= mysqli_query($mysqlConnection,$sql);
while ($row = mysqli_fetch_assoc($tiket)) {
	$array_forum[]=$row;
}

$array_topic= array();
$sql= "SELECT * FROM topic WHERE topic_forum_id= '$forumID' AND topic_id = '$topicID'";
$tiket= mysqli_query($mysqlConnection,$sql);
while ($row= mysqli_fetch_assoc($tiket)){
	$array_topic[]=$row;
}

$thisforum= array();
$sql= "SELECT * FROM forum WHERE forum_id = '$forumID'";
$tiket=mysqli_query($mysqlConnection,$sql);
while ($row= mysqli_fetch_assoc($tiket)){
	$thisforum[]=$row;
}

$totalPosts= sizeof($all_posts);
$totalPages= ceil($totalPosts/$posts_per_page);

$pages= (int)$totalPages;

?>

<table class="table table-striped table-bordered table-responsive" style="width: 1000px; margin: auto">
<thead class="thead-light">
		<tr>
			<th scope="col" style="width: 100%; margin: auto"> Forum name: <a href="forum.php?id=<?php echo $forumID; ?>&page=<?php echo $page; ?>"><?php echo $thisforum[0]['forum_name']; ?> </a> </th>


		</tr>
</thead>
<tbody>
		<tr>
			<th><h3>Topic name: <?php echo $array_topic[0]['topic_name'];?></h3></th>
			<td scope="col">Date of the comment</td>
			<td scope="col">Author</td>
			<td scope="col">Change comment</td>
		</tr>
		<?php for($i=0;$i<sizeof($array_forum); $i++) { ?>
		<tr>
			<td scope="col"><?php echo $array_forum[$i]['post_post']; ?> </td>
			<td scope="col"><?php echo $array_forum[$i]['post_date']; ?></td>
			<td scope="col"><?php 
									$getUser= array(); //getting usermname for each written comment 
									$sql1 = "SELECT user_username FROM users WHERE user_id = '".$array_forum[$i]['post_user_id']."'" ;
									$tiket1= mysqli_query($mysqlConnection,$sql1);
									while ($row = mysqli_fetch_assoc($tiket1)){
										$getUser[]= $row; }
										
										echo $getUser[0]["user_username"];
			
			?></td>
				<?php if (isset($_SESSION['user_name'])) {
				if($getUser[0]['user_username'] == $_SESSION['user_name']) { //making availbale "change/delete post" option, only if the logged in user wrote the comment  ?> 
				<td><a href="change_post.php?post=<?php echo $array_forum[$i]['post_id'];  ?>" disabled>Change/Delete post</a></td>
				<?php } } ?>
		</tr>
	<?php } ?>
</tbody>
</table>

			<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  	<?php if ($page>1) { ?>
  	<li class="page-item">
      <a class="page-link" href="topic.php?forum=<?php echo $forumID; ?>&topic=<?php echo $topicID; ?>&page=<?php echo $page-1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
<?php } 
for($i=1; $i<= $totalPages; $i++){ ?>
	<li class="page-item">
<?php echo '<a href="topic.php?forum='.$forumID.'&topic='.$topicID.'&page='.$i.'" class="page-link">'.$i.'</a>'; ?>	
 		</li>
 		<?php } 	
 		if ($i-1>$page) {  ?>
 		<li class="page-item">
      <a class="page-link" href="topic.php?forum=<?php echo $forumID; ?>&topic=<?php echo $topicID; ?>&page=<?php echo $page+1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
  </li>
  <?php  } ?>
</ul>
</nav>

<?php echo "</br>"; 

	if (isset($_SESSION['name'])) { // making option of posting a new comment available only if the user is logged in?>
<form action="insert_new_post.php?forum=<?php echo $forumID; ?>&topic=<?php echo $topicID;?>" method="POST" style="width: 1000px; margin: auto">
	<div class="form-group">
		<textarea class="form-control" name="post" rows="6" required></textarea>
		<input type="hidden" name="user" value= "<?php echo $getUser[0]["user_username"]; ?>">
	</div>
	<button type ="submit" class="btn btn-primary">Submit</button>
</form>
<?php }
include "template/footer.html"; ?>