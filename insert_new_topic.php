<?php  include 'template/connection.php';
		

	$id= $_GET["id"];
	$topic= $_POST["topic"];
	$post = $_POST["post"];
	$date= date('y-m-d');
	
	if($topic !=""){

	$sql= "INSERT INTO topic (topic_id, topic_forum_id, topic_name, topic_date) VALUES (NULL,'$id', '$topic', '$date' )";
	$tiket= mysqli_query($mysqlConnection, $sql); 
	header("Location:insert_post.php?forum=$id&topic=$topic&post=$post");
	}
	else { echo "Topic cannot be empty! Please click on the link and return to the New Topic Page"; ?>
		<a href="new_topic.php?id=<?php echo $id; ?>">Back to New Topic</a> 

	<?php } 

?>