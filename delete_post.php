<?php 
	include 'template/connection.php';

	$post= $_GET['post'];
	

	$array= array();
	$sql= "SELECT * FROM post WHERE post_id = '$post'";
	$tiket= mysqli_query($mysqlConnection, $sql);
	while ($row= mysqli_fetch_assoc($tiket)) {
		$array[]=$row;
	}

$forum=$array[0]['post_forum_id'];
$topic= $array[0]['post_topic_id'];

$delete= "DELETE FROM post WHERE post_id= '$post'";
$tiket= mysqli_query($mysqlConnection,$delete);
header("Location: topic.php?forum=$forum&topic=$topic"); 



?>