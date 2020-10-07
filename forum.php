<?php include 'templates/header.php';
	include 'templates/autoloader.php'; 

	$forum_id=$_GET['forum_id'];
	$object= new View();
	$topics= $object->showTopicsForSpecificForum($forum_id);

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
		<?php for($i=0;$i<sizeof($topics);$i++){ ?>
		<tr>
			<td scope="col"><a href="topic.php?forum=<?php echo $forum_id; ?>&topic=<?php echo $topics[$i]['topic_id'];?>&page=1"><?php echo $topics[$i]['topic_name']; ?></a></td> 
			<td scope="col"><? echo $object->showNumberOfPostsForEachTopic($topics[$i]['topic_id']); ?></td>
			<td scope="col"><? echo $object->showTheLatestDateOfThePostForSpecificTopic($topics[$i]['topic_id'])['post_date']; ?></td>
		</tr>
		
		<?php } ?>

</tbody>
</table>
<?php if (isset($_SESSION['name'])) { ?>
				<div class="row justify-content-center">
				<div class="justify-content-center">
				 Got something new to say?
				<h2><a href="new_topic_form.php?id=<?php echo $forum_id; ?>"> Strat new topic in this forum!</a></h2>
				</div>
				</div>
<?php }
include "templates/footer.html"; ?>