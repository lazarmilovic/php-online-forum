<?php  
session_start();
include 'template/connection.php';

$forum= $_GET['forum'];
$topic= $_GET ['topic'];
$post= $_POST['post'];
$user= $_SESSION['user_name'];

$getName = array();
$sql= "SELECT user_id from users WHERE user_username= '$user'";
$tiket= mysqli_query($mysqlConnection, $sql);
while ($row = mysqli_fetch_assoc($tiket)) {
	$getName[]=$row;
}
$date= date('y-m-d');
$name=$getName[0]['user_id'];


$sql= "INSERT INTO post (post_id, post_post, post_topic_id, post_forum_id, post_user_id, post_date) VALUES (NULL, '$post','$topic','$forum','$name', '$date' )";
$tiket= mysqli_query($mysqlConnection,$sql);

header("Location: topic.php?forum=$forum&topic=$topic"); 

?>


