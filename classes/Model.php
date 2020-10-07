<?php include 'Connection.php';

class Model extends Connection {
	
	public function getUsers(){
		$sql= "SELECT * FROM users";
		$stmt=$this->connect()->query($sql);
		$result = $stmt->fetchAll();
		return $result;
		

	}
	public function getForums(){
		$sql="SELECT * FROM forum";
		$stmt=$this->connect()->query($sql);
		$result=$stmt->fetchAll();
		return $result;

	}
	public function getTopicById($id){
		$sql="SELECT topic_name FROM topic WHERE topic_id= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result=$stmt->fetch();
		return $result;
	}
	public function getForumById($id){
		$sql="SELECT * FROM forum WHERE forum_id=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result= $stmt->fetch();
		return $result;
	}
	public function getTopics($id){
		$sql="SELECT * FROM topic WHERE topic_forum_id= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result=$stmt->fetch();
		return $result;

	}
	public function getPost($id){
		$sql="SELECT * FROM post WHERE post_id= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result= $stmt->fetch();
		return $result;
	}
	public function numberOfTopicsForOneForum($id){
		$sql="SELECT * FROM topic WHERE topic_forum_id= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result=$stmt->rowCount();
		return $result;
	}
	public function getPostsForSpecificTopic($id,$startFrom,$limit){
		$sql="SELECT * FROM post WHERE post_topic_id=? LIMIT ?,?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id,$startFrom,$limit]);
		$result=$stmt->fetchAll();
		return $result;
	}
	public function getAllPostsForOneForum($id){
		$sql="SELECT * FROM post WHERE post_forum_id= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result=$stmt->rowCount();
		return $result;

	}
	public function getAllPostsForOneTopic($id){
		$sql="SELECT * FROM post WHERE post_topic_id= ?";
		$stmt= $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result=$stmt->fetchAll();
		return $result;
	}

	public function getUser($email, $pass){
		$sql= "SELECT * FROM users WHERE user_email= ? and password= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$email, $pass]);
		$result= $stmt->fetch();
		return $result;
	}
	public function getUserById($id){
		$sql="SELECT * FROM users WHERE user_id= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result=$stmt->fetch();
		return $result;
	}
	public function getUserByUsername($username){
		$sql="SELECT * FROM users WHERE user_username= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$username]);
		$result=$stmt->fetch();
		return $result;
	}
	public function getTheLatestDateOfThePost($forum){
		$sql="SELECT post_date FROM post WHERE post_forum_id=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$forum]);
		$result=$stmt->fetchAll();
		if(sizeof($result)>0){
			$latest_date= max($result);
			return $latest_date;
		}
		else {
			echo 'No posts yet!';
		}
	}
	public function getTheLatestDateOfThePostForSpecificTopic($topic_id){
		$sql="SELECT post_date FROM post WHERE post_topic_id=?";
		$stmt= $this->connect()->prepare($sql);
		$stmt->execute([$topic_id]);
		$result=$stmt->fetchAll();
		if(sizeof($result)>0){
			$latest_date=max($result);
			return $latest_date;
		}
		else {
			echo 'No posts yet!';
		}
	}

	public function getTopicsForSpecificForum($forum_id){
		$sql="SELECT * FROM topic LEFT JOIN forum ON topic.topic_forum_id= forum.forum_id WHERE topic_forum_id =?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$forum_id]);
		$result= $stmt->fetchAll();
		return $result;

	}
	public function getNumberOfPostsForEachTopic($topic_id){
		$sql="SELECT * FROM post LEFT JOIN topic ON post.post_topic_id=topic.topic_id WHERE post_topic_id= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$topic_id]);
		$result=$stmt->rowCount();
		return $result;

	}
	public function insertNewUser($name, $lastname, $email, $username, $pass){
		$sql="INSERT INTO users (user_name, user_lastname, user_email, user_username, password) VALUES (?,?,?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$name, $lastname, $email, $username, $pass]);
	}
	public function insertNewForum($name,$description, $user_id, $date){
		$sql="INSERT INTO forum (forum_name, forum_description, forum_user_id, forum_date) VALUES (?,?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$name,$description, $user_id, $date]);
	}
	public function insertNewTopic($forumID,$topic_name,$topic_date){
		$sql="INSERT INTO topic (topic_forum_id,topic_name,topic_date) VALUES (?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$forumID,$topic_name,$topic_date]);
	}
	public function insertNewPost($post, $topicId, $forumId, $userId, $date){
		$sql="INSERT INTO post (post_post, post_topic_id, post_forum_id, post_user_id, post_date) VALUES (?,?,?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$post, $topicId, $forumId, $userId, $date]);
	}
	public function changePost($post,$postId){
		$sql="UPDATE post SET post_post=? WHERE post_id= ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$post,$postId]);
	}


}

?>