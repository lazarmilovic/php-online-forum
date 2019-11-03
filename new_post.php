<?php include 'template/connection.php';

$postID= $_POST['postid'];
$new_post = $_POST['post'];

$array=array();
$sql = "SELECT * FROM post WHERE post_id= '$postID'";
$tiket= mysqli_query($mysqlConnection, $sql);
while ($row= mysqli_fetch_assoc($tiket)){
	$array[]=$row;
}
$forum= $array[0]['post_forum_id'];
$topic= $array[0]['post_topic_id'];
if ($new_post !== $array[0]['post_post']){

$sqlpost= "UPDATE post SET post_post= '$new_post' WHERE post_id = '$postID'";
$tiketpost= mysqli_query($mysqlConnection,$sqlpost);
}
header("Location:topic.php?forum=$forum&topic=$topic");

?>