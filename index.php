<?php include "template/header.php"; 
	include "template/connection.php";



if (isset($_GET["page"])){ //checking if page variable is set which will be used for pagination. If set, we are getting it from URL. If not, 
	$page= $_GET["page"];	// it will get automaticaly value 1 so we can be on a first page every time we load index.php
}
else {$page= 1; }



$formus_per_page= 3;
$start_from= ($page-1)*$formus_per_page;


$array = array();
$sql= "SELECT * FROM forum LIMIT ".$start_from.",".$formus_per_page." ";
$tiket = mysqli_query($mysqlConnection,$sql);
while ($row= mysqli_fetch_assoc($tiket)){
	$array[]=$row;

}
$array_topics= array();
$sql_topics= "SELECT * from topic";
$tiket1= mysqli_query($mysqlConnection, $sql_topics);
while ($row= mysqli_fetch_assoc($tiket1)) {
	$array_topics[]= $row;
}

$array_posts= array();
$sql_posts = "SELECT * FROM post";
$tiket2= mysqli_query($mysqlConnection, $sql_posts);
while ($row= mysqli_fetch_assoc($tiket2)){
	$array_posts[]=$row;
}
$all_forums = array();
$sql= "SELECT * FROM forum ";
$tiket = mysqli_query($mysqlConnection,$sql);
while ($row= mysqli_fetch_assoc($tiket)){
	$all_forums[]=$row; 
}

$number_of_forums= sizeof($all_forums);
$number_of_pages= ceil($number_of_forums/$formus_per_page);


?>


	
<table class="table table-striped table-bordered table-responsive" style="width: 500px; margin: auto">
	<thead class="thead-light">
		<tr>
			<th scope="col">Forum name</th>
			<th scope="col">Topic</th>
			<th scope="col">Posts</th>
			<th scope="col">Last Post</th>
			<th scope="col">Created by</th>
		</tr>

	</thead>	
	<tbody>
		<?php for ($i=0;$i<sizeof($array);$i++){ ?> <?php //fetching all forums from forum table ?>
		<tr>
			<td>
				<h3><a href="forum.php?id=<?php echo $array[$i]['forum_id']; ?>&page=1"><?php echo $array[$i]['forum_name']; ?></a></h3>
				<p><?php echo $array[$i]['forum_description']; ?></p>
			</td>
			
			<td>			
				<div><?php $check_topics= array(); //fetching all topics for each forum to avoid error in case we just created new forum without any topics
							$sql= "SELECT topic_id from topic WHERE topic_forum_id= '$i'+1 ";
							$tiket= mysqli_query($mysqlConnection, $sql);
							while (mysqli_fetch_assoc($tiket)){
								$check_topics[]= $row;
							}

							if(array_key_exists(0, $check_topics) ) {// checking if check_topic array is empty or not- if empty return string to avoid "Undefined offset" error
							echo array_count_values(array_column($array_topics, 'topic_forum_id'))[$i+1]; }
							else {echo "0";}
				 ?></div> <?php //counting number of topics for each forum ?>
			</td>
			
			<td>
				<div><?php  $check_posts = array();//fetching all posts for each forum to avoid error 
								$sql = "SELECT post_id FROM post WHERE post_forum_id= '$i'+1";
								$tiket= mysqli_query($mysqlConnection,$sql);
								while ($row= mysqli_fetch_assoc($tiket)){
									$check_posts[]=$row;
								}
								if (array_key_exists(0, $check_posts)){ // checking if check_posts array is empty or not- if empty return string to avoid "Undefined offset" error

				echo array_count_values(array_column($array_posts, 'post_forum_id'))[$i+1]; } 
					else {echo "0";} ?>
				</div> <?php //counting number of posts for each forum ?>
			</td>
			<td>
				<div><?php 
							$date = array ();
							$sql_date= "SELECT post_date FROM post WHERE post_forum_id = '$i'+1 "; //fetching all posts from for the topic 
							$tiket_date= mysqli_query($mysqlConnection,$sql_date);
							while ($row= mysqli_fetch_assoc($tiket_date)){
								$date[]= $row;
							}
							if (array_key_exists(0, $date)) {
							$sortedDate= array_column($date, 'post_date');
							echo (max($sortedDate));
							 }

							else { echo "No posts- no date.";}
				 ?></div>
			</td>
			<td>
				<div><?php $getName= array(); //getting user_id from array for the column Created by
							$sql= "SELECT user_username FROM users WHERE user_id ='".$array[$i]['forum_user_id']."'";
							$tiket= mysqli_query($mysqlConnection,$sql);
							while ($row= mysqli_fetch_assoc($tiket)){
									$getName[]= $row;
							}

							echo $getName[0]['user_username'];


				?></div>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>
<div class="row justify-content-center" style="padding:30px">
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
<?php if ($page>1) { ?>
  	<li class="page-item">
      <a class="page-link" href="index.php?page=<?php echo $page-1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
<?php } 
	for ($i=1;$i<=$number_of_pages; $i++) { ?>
		<li class="page-item">
      <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    </li>
<?php  }
if ($i-1>$page) {  ?>
 		<li class="page-item">
      <a class="page-link" href="index.php?page=<?php echo $page+1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
  </li>
</ul>
</nav>
</div>
  <?php  } 
 if (isset($_SESSION['name'])) { ?>
				<div class="row justify-content-center">
				<div class="justify-content-center">
				 Got something new to say?
				<h2><a href="new_forum.php"> Strat new forum!</a></h2>
				</div>
				</div>
		<?php	}
		include "template/footer.html"; ?>

