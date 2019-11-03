<?php include 'template/header.php';
	include 'template/connection.php';
$id= $_GET["id"];
$page= $_GET["page"];

$topics_per_page= 5;
$start_from= ($page-1)*$topics_per_page;


$array = array();
$sql= "SELECT * FROM topic LEFT JOIN forum ON topic.topic_forum_id= forum.forum_id WHERE topic_forum_id= '$id' LIMIT ".$start_from.",".$topics_per_page."";
$tiket= mysqli_query($mysqlConnection, $sql);
while ($row = mysqli_fetch_assoc($tiket)){
	$array[]= $row;
}

$all_topics= array();
$sql= "SELECT topic_name FROM topic LEFT JOIN forum ON topic.topic_forum_id= forum.forum_id WHERE topic_forum_id= '$id'";
$tiket= mysqli_query($mysqlConnection, $sql);
while ($row = mysqli_fetch_assoc($tiket)){
	$all_topics[]= $row;
}
$number_of_topics= sizeof($all_topics);
$number_of_pages= ceil($number_of_topics/$topics_per_page);

?>
<table class="table table-striped table-bordered table-responsive" style="width: 500px; margin: auto">
<thead class="thead-light">
		<tr>
			<th scope="col" style="width: 100%; margin: auto">Forum name</th>

		</tr>
</thead>
<tbody>
		<tr>
			<th><h3>Topic name</h3></th>
			<td scope="col">Number of posts</td>
			<td scope="col">Date of the last post</td>
		</tr>
		<?php for($i=0;$i<sizeof($array);$i++){ ?>
		<tr>
			<td scope="col"><a href="topic.php?forum=<?php echo $id; ?>&topic=<?php echo $array[$i]['topic_id'];?>&page=1"><?php echo $array[$i]['topic_name']; ?></a></td> <?php //sending both forum id and topic id to the page topic.php ?>
			<td scope="col"><?php  
								$getPosts= array(); //fetching the number of posts for each topic
								$sql= "SELECT post_post FROM post WHERE post_topic_id = '".$array[$i]['topic_id']."'";
								$tiket= mysqli_query($mysqlConnection, $sql);
								while ($row= mysqli_fetch_assoc($tiket)){
									$getPosts[]= $row;
								}
								
								echo sizeof($getPosts);

			?></td>
			<td scope="col"><?php  
								$getDate = array(); //fetching dates of the posts for every topic 
								$sql= "SELECT post_date FROM post WHERE post_topic_id= '".$array[$i]['topic_id']."'";
								$tiket= mysqli_query($mysqlConnection,$sql);
								while ($row= mysqli_fetch_assoc($tiket)){
									$getDate[]=$row;
								}
								if (sizeof($getDate)>0){ // making sure I don't get error thrown in case there are no posts for the topic
								rsort($getDate); //getting the date of the latest post 
								echo $getDate[0]['post_date'];
								}
								else {echo "No posts yet! Be the first po post something!"; }


			?></td>
		</tr>
		
		<?php } ?>

</tbody>
</table>

	<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  	<?php if ($page >1) { ?>
  	<li class="page-item">
      <a class="page-link" href="forum.php?id=<?php echo $id; ?>&page=<?php echo $page-1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
<?php } for($i=1;$i<=$number_of_pages;$i++) { ?>
<li class="page-item">
      <a class="page-link" href="forum.php?id=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
    </li>
<?php } 
if ($i-1>$page) {  ?>
 		<li class="page-item">
      <a class="page-link" href="forum.php?id=<?php echo $id; ?>&page=<?php echo $page+1; ?>"aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
  </li>
  <?php  } ?>
  </ul>
</nav>
<?php if (isset($_SESSION['name'])) { ?>
	<div class="text-center" style="padding: 100px">
	<div class="form-group">
				<div class="md-3 text-center"> Got something new to say?
				<h2><a href="new_topic.php?id=<?php echo $id; ?>"> Strat new topic!</a></h2></div>
				</div>
		
		<?php	} 
		include "template/footer.html"; ?>