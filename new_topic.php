<?php include 'template/header.php';
		include 'template/connection.php'; 

$forumid= $_GET["id"];


$array= array();
$sql= "SELECT * FROM forum WHERE forum_id = '$forumid'";
$tiket= mysqli_query ($mysqlConnection, $sql);
while ($row = mysqli_fetch_assoc($tiket)){
	$array[]=$row;
}
?>

<form action="insert_new_topic.php?id=<?php echo $forumid ?>" method="post" style="width: 500px; margin: auto">
	<div class="form-group">
		<label for= "topic">Topic Name</label>
		<input name="topic"  id="topic" class="form-control" placeholder= "Start a new topic within <?php echo $array[0]['forum_name']; ?>Forum">
	</div>
	<div class="form-group">
		<label for= "post">First post!</label>
		<input name="post" id="post" class="form-control" placeholder="Post the first comment on it!.">
	</div>
	<button type="submit">Submit</button>
</form>