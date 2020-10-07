<?php 

include 'classes/Model.php';

class Controler extends Model {
	
	public function newUser($name, $lastname, $email, $username, $pass){
		$this->insertNewUser($name, $lastname, $email, $username, $pass);
		header('Location:login-form.php?registered=true');
	}
	public function checkUser($email, $pass){
		$result= $this->getUser($email,$pass);
		return $result;

	}
	public function startSession($email, $pass){
		$result=$this->getUser($email, $pass);
		session_start();
		$_SESSION['name']= $result['user_name'];
		$_SESSION['id']= $result['user_id'];
		return $_SESSION['name'];
		return $_SESSION['id'];
	}

	public function newForum($name,$description, $user_id, $date){
		$this->insertNewForum($name,$description, $user_id, $date);
	}
	public function newTopic($forumID,$topic_name,$topic_date){
		$this->insertNewTopic($forumID,$topic_name,$topic_date);
	}
	public function newPost($post, $topicId, $forumId, $userId, $date){
		$this->insertNewPost($post, $topicId, $forumId, $userId, $date);
	}
	public function changeThisPost($post,$postId){
		$this->changePost($post,$postId);
	}
}




?>