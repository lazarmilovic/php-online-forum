<?php 
include 'templates/header.php'; 
include 'templates/autoloader.php'; 

$object = new View(); 
var_dump($object->allForums());?>

	
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
		<?php for($i=0;$i<sizeof($object->allForums());$i++){ ?>
		<tr>
			<td>
				<h3><a href="forum.php?forum_id=<?php echo $object->allForums()[$i]['forum_id']; ?>&page=1"><?php echo $object->allForums()[$i]['forum_name']; ?></a></h3>
				<p><?php echo $object->allForums()[$i]['forum_description']; ?></p>
			</td>
			
			<td>			
				<div><?php echo $object->numberOfTopics($object->allForums()[$i]['forum_id']); ?></div> 
			</td>
			
			<td>
				<div><?php $object->numberOfPostsForForum($object->allForums()[$i]['forum_id']); ?></div> 
			</td>
			<td>
				<div><?php echo ($object->theLatestDate($object->allForums()[$i]['forum_id'])['post_date']); ?></div>
			</td>
			<td>
				<div><?php echo ($object->showUser($object->allForums()[$i]['forum_user_id'])['user_username']); ?></div>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>

<?php if (isset($_SESSION['name'])) { ?>
				<div class="row justify-content-center">
				<div class="justify-content-center">
				 Got something new to say?
				<h2><a href="new_forum_form.php"> Strat new forum!</a></h2>
				</div>
				</div>
<?php	}

include 'templates/footer.html';
?>