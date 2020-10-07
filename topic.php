<?php 
include 'templates/header.php'; 
include 'templates/autoloader.php'; 

$forumID= $_GET["forum"];
$topicID= $_GET["topic"];
$page= $_GET["page"];

$object= new View();


$posts_per_page= 5;
$startFrom= ($page-1)*$posts_per_page;


/*$totalPosts= sizeof($all_posts);
$totalPages= ceil($totalPosts/$posts_per_page); 

$pages= (int)$totalPages;*/

?>

<table class="table table-striped table-bordered table-responsive" style="width: 1000px; margin: auto">
<thead class="thead-light">
		<tr>
			<th scope="col" style="width: 100%; margin: auto"> Forum name: <a href="forum.php?id=<?php echo $forumID; ?>&page=<?php echo $page; ?>"><?php echo $object->showForumById($forumID)['forum_name']; ?> </a> </th>


		</tr>
</thead>
<tbody>
		<tr>
			<th><h3>Topic name: <?php echo $object->showTopicById($topicID)['topic_name'];?></h3></th>
			<td scope="col">Date of the comment</td>
			<td scope="col">Author</td>
			<td scope="col">Change comment</td>
		</tr>
		<?php for($i=0;$i<sizeof($object->showPostsForSpecificTopic($topicID,$startFrom,$posts_per_page)); $i++) { ?>
		<tr>
			<td scope="col"><?php echo $object->showPostsForSpecificTopic($topicID,$startFrom,$posts_per_page)[$i]['post_post']; ?> </td>
			<td scope="col"><?php echo $object->showPostsForSpecificTopic($topicID,$startFrom,$posts_per_page)[$i]['post_date']; ?></td>
			<td scope="col"><?php echo $object->showUser($object->showPostsForSpecificTopic($topicID,$startFrom,$posts_per_page)[$i]['post_user_id'])['user_username'];?></td>
				<?php if (isset($_SESSION['name'])) {
				if($object->showUserByUsername($object->showUser($object->showPostsForSpecificTopic($topicID,$startFrom,$posts_per_page)[$i]['post_user_id'])['user_username'])['user_name'] == $_SESSION['name']) { //making availbale "change/delete post" option, only if the logged in user wrote the comment  ?> 
				<td><a href="change_post.php?forum=<?php echo $forumID; ?>&topic=<?php echo $topicID; ?>&post=<?php echo $object->showPostsForSpecificTopic($topicID,$startFrom,$posts_per_page)[$i]['post_id']; ?>" disabled>Change/Delete post</a></td>
				<?php } } ?>
		</tr>
	<?php  } ?>
</tbody>
</table>
		
<?php include "templates/footer.html"; ?>