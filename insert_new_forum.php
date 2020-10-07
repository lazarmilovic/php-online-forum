<?php session_start(); 

include 'templates/autoloader.php';

$forum_name=$_POST['forum'];
$forum_desc= $_POST['description']; 

$object= new Controler();

if($_POST){
	if($forum_name != '' && $forum_desc !=''){
		$object->newForum($forum_name,$forum_desc,$_SESSION['id'],date('y-m-d'));
		header("Location:index.php");
	} 
}