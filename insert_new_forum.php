<?php session_start();
include 'template/connection.php';

$forum = $_POST["forum"];
$desc = $_POST["description"];

$username = $_SESSION['user_name'];

$array= array();
$sql= "SELECT user_id FROM users WHERE user_username = '$username'";
$tiket = mysqli_query($mysqlConnection, $sql);
while ($row = mysqli_fetch_assoc($tiket)){
	$array[]=$row;
}
$userID= $array[0]["user_id"];
$date= date('y-m-d');



$forumSql= "INSERT INTO forum (forum_id, forum_name, forum_description, forum_user_id, forum_date) VALUES (NULL, '$forum', '$desc', '$userID', '$date') "; 
$tiket1= (mysqli_query($mysqlConnection,$forumSql));
header ("Location:index.php");
?>