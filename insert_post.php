<?php  session_start();
	include 'template/connection.php';

		$forum= $_GET["forum"];
		$topic= $_GET["topic"];
		$post= $_GET["post"];
		

		$date= date('y-m-d');
		$user= $_SESSION["user_name"];

		$user1= array();
		$sqlU= "SELECT user_id FROM users WHERE user_username= '$user'";
		$tiketU= mysqli_query($mysqlConnection,$sqlU);
		while ($row = mysqli_fetch_assoc($tiketU)){
			$user1[]=$row;
		}

		$user_id= $user1[0]["user_id"];


		$array= array();
		$sql= "SELECT topic_id FROM topic WHERE topic_name= '".$topic."'";
		$tiket= mysqli_query($mysqlConnection, $sql);
		while ($row = mysqli_fetch_assoc($tiket)) {
			$array[]=$row;
		}

		$topic_id=$array[0]["topic_id"];


		if ($post != ""){
				$sql= "INSERT INTO post (post_id, post_post, post_topic_id, post_forum_id, post_user_id, post_date) VALUES (NULL, '$post', '$topic_id', '$forum', '$user_id', '$date')";
				$tiket= mysqli_query($mysqlConnection,$sql);
		}
		header("Location:forum.php?id=$forum");
?>