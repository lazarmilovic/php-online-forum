<?php 
	class View extends Model{

	public function allForums(){
		$forums= $this->getForums();
		return $forums;
	}
	public function showForumById($id){
		return $this->getForumById($id);
	}
	public function allTopics($id){
		return $this->getTopics($id);
	}
	public function showTopicById($id){
		return $this->getTopicById($id);
	}
	public function numberOfTopics($id){
		echo $this->numberOfTopicsForOneForum($id);
	}
	public function numberOfPostsForForum($id){
		echo $this->getAllPostsForOneForum($id);
	}
	public function theLatestDate($forum){
		$date= $this->getTheLatestDateOfThePost($forum);
		return $date;
	}
	public function showPost($id){
		return $this->getPost($id);
	}
	public function showUser($id){
		$user= $this->getUserById($id);
		return $user;
	}
	public function showUserByUsername($username){
		return $this->getUserByUsername($username);
	}
	public function showPostsForSpecificTopic($id,$startFrom,$limit){
		return $this->getPostsForSpecificTopic($id,$startFrom,$limit);
	}
	public function showTopicsForSpecificForum($id){
		$topics= $this->getTopicsForSpecificForum($id);
		return $topics;
	}
	public function showNumberOfPostsForEachTopic($topic_id){
		$posts= $this->getNumberOfPostsForEachTopic($topic_id);
		echo $posts;
	}
	public function showTheLatestDateOfThePostForSpecificTopic($topic_id){
		$date= $this->getTheLatestDateOfThePostForSpecificTopic($topic_id);
		return $date;
	}
	public function showAllPostsForOneTopic($id){
		$result= $this->getAllPostsForOneTopic($id);
		return $result;
	}
}

?>