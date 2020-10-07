<?php include 'templates/autoloader.php';

$post= $_POST['post'];
$id= $_POST['postid'];
$topicID=$_POST["topicid"];
$forumID=$_POST["forumid"];


$object = new Controler();
 
 if ($_POST && $post != ''){
 	$object->changeThisPost($post,$id);
 	header('Location:topic.php?forum='.$forumID.'&topic='.$topicID.'&page=1');
 }
 else {
 	header('Location:topic.php?forum='.$forumID.'&topic='.$forumID.'&page=1');
 }