<?php session_start();
include 'templates/autoloader.php'; 

$forumid= $_GET["id"];
$topic= $_POST['topic'];

$object=new Controler();

if($_POST){
	if($topic !=''){
		$object->newTopic($forumid,$topic,date('y-m-d'));
		header("location:forum.php?forum_id=".$forumid);
		}
	else { echo "Topic cannot be empty! Please click on the link and return to the New Topic Page"; ?>
		<a href="new_topic_form.php?id=<?php echo $forumid; ?>">Back to New Topic</a> 
<?php	 }
}
?>