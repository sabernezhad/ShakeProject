<?php
/** 
 * @Author:"Hamid Reza Abdi" 
 * @Co-Programmer:"MRs Esmaeli And MRs Khalili"
 * @Version:1.0
 */
include_once( "sql/mysql.php" );
class PostDAL extends db
{
	/**
	 * Add Post To Database
	 *
	 * @abstract
	 * @access public
	 * @param POST
	 * @return bool
	 */
 	public function AddPost($post,$user)
	{   
		if($this->query("INSERT INTO `post` (`UserID`,`TopicID`,`Title`,`Content`,`TimeSent`,`File`)
		VALUES ('".$this->safesql($user->ID)."','null','null','".$this->safesql($post->Content)."',now(),'null') "))
			return true;
		else
			return false;
	}
	/**
	 * Update Post Table From Database
	 *
	 * @abstract
	 * @access public
	 * @param POST,INT
	 * @return bool
	 */
	public function UpdatePost($post,$lastpostId)
	{
		if($this->query("UPDATE `POST` SET `UserID`=".$this->safesql($post->Writer).",`Title`='".$this->safesql($post->title).",`Content`='".$this->safesql($post->Content)."',`TimeSent`='".$this->safesql($post->TimeCreat)."' WHERE ID=".$this->safesql($lastpostId)))
			return true;
		else
			return false;
	}
	/**
	 * Delete Post From Database
	 *
	 * @abstract
	 * @access public
	 * @param INT
	 * @return bool
	 */
	public function DeletePost($lastpostId)
	{
		if($this->query("DELETE `POST` WHERE ID=".$this->safesql($lastpostId).""))
			return true;
		else
			return false;
	}
	/**
	 * Find Posts By Sender
	 *
	 * @abstract
	 * @access public
	 * @param USER $user
	 * @return ARRAY
	 */
	public function FindPostsBySender($user)
	{
		return $this->super_query("SELECT * FROM `post` WHERE `UserID`='".$this->safesql($user->ID)."' ORDER BY ID DESC");
	}
	/**
	 * Find Posts By Date
	 *
	 * @abstract
	 * @access public
	 * @param DATE
	 * @return ARRAY
	 */
	public function FindPostsByDate($date)
	{
		return $this->super_query("SELECT * FROM `POST` WHERE `TimeSent`=".$this->safesql($date)."");
	}
	/**
	 * Find Posts By Topic
	 *
	 * @abstract
	 * @access public
	 * @param TOPIC
	 * @return ARRAY
	 */
	public function FindPostsByTopic($topic)
	{
		return $this->super_query("SELECT * FROM `POST` WHERE `TopicID`=".$this->safesql($topic)."");
	}
	/**
	 * Find Posts By Title
	 *
	 * @abstract
	 * @access public
	 * @param TITLE
	 * @return ARRAY
	 */
	public function FindPostsByTitle($title)
	{
		return $this->super_query("SELECT * FROM `POST` WHERE `Title`=".$this->safesql($title)."");
	}
	/**
	 * Add Comment
	 *
	 * @abstract
	 * @access public
	 * @param Comment
	 * @return bool
	 */
	public function AddComment($comment)
	{
		if($this->query("INSERT INTO `Comments` (`PostID`,`UserID`,`Content`,`TimeSent`) VALUES ('".$this->safesql($comment->PostID)."','null','".$this->safesql($comment->Writer)."','".$this->safesql($comment->Content)."','".$this->safesql($comment->TimeCreat)."','null') "))
			return true;
		else
			return false;
	}
	/**
	 * Edite Comment
	 *
	 * @abstract
	 * @access public
	 * @param Comment,INT
	 * @return bool
	 */
	public function EditeComment($comment,$lastIdcomment)
	{
		if($this->query("UPDATE `Comments` SET `UserID`=".$this->safesql($comment->Writer).",`Content`='".$this->safesql($comment->Content)."',`TimeSent`='".$this->safesql($comment->TimeCreat)."' WHERE ID= ".$this->safesql($lastIdcomment).""))
			return true;
		else
			return false;		
	}
	/**
	 * Delete Comment
	 *
	 * @abstract
	 * @access public
	 * @param Comment
	 * @return bool
	 */
	public function DeleteComment($comment)
	{
		if($this->query("DELETE `Comments` WHERE ID=".$this->safesql($comment)." "))
			return true;
		else
			return false;		
	}
	/**
	 * Get All Post Comments
	 *
	 * @abstract
	 * @access public
	 * @param Comment
	 * @return ARRAY
	 */
	public function GetAllPostComments($comment)
	{
		return $this->super_query("SELECT * FROM `Comments`");
	}
	public function GetAllPost($user,$numOFpost){
		$list=array();
		$list=$this->super_query("SELECT p.ID,p.UserID,p.TopicID,p.Title,p.Content,p.TimeSent,p.File FROM 
   		(SELECT * FROM (SELECT FriendID FROM friendships WHERE friendships.UserID=".
		$this->safesql($user->ID)." and friendships.status='accept') as friend JOIN post ON post.UserID=friend.FriendID ) as p ORDER BY p.TimeSent DESC LIMIT ".$numOFpost.",5 ");
		return $list;
	}
}
?>