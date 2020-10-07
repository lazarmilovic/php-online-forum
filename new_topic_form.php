<?php 
include 'templates/header.php';
include 'templates/autoloader.php'; 

$forumid= $_GET["id"];
$object= new View();
?>

<form action="insert_new_topic.php?id=<?php echo $forumid ?>" method="post" style="width: 500px; margin: auto">
	<div class="form-group">
		<label for= "topic">Topic Name</label>
		<input name="topic"  id="topic" class="form-control" placeholder= "Start a new topic within <?php echo $object->showForumById($forumid)['forum_name']; ?>Forum">
	</div>
	<button type="submit">Submit</button>
</form>
<?php include 'templates/footer.html'; ?>