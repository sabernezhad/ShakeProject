<?php
/**
 * @Author:"Zohre Esmaeily"
 * @Co-Programmer:"MR Abdi And MRs Khalili"
 * @Version:1.0
 */
include_once( "/sql/mysql.php" );
class FriendshipDAL extends db
{
	/**
	 * AddFriend
	 *
	 * @abstract
	 * @access public
	 * @param User, User
	 * @return bool
	 */
 	public function AddFriend($user, $friend)
	{
		if($this->query("INSERT INTO `Friendships` (`UserID`,`FriendID`) VALUES ('.$this->safesql($user->ID).','.$this->safesql($friend->ID).')"))
			return true;
		else
			return false;
	}
	/**
	 * Defriend
	 *
	 * @abstract
	 * @access public
	 * @param User, User 
	 * @return bool
	 */
	public function Defriend($user, $friend)
	{
		if($this->query("DELETE FROM Friendships WHERE `UserID` = ".$this->safesql($user->ID)." AND FriendID = ".$this->safesql($friend->ID)." "))
			return true;
		else
			return false;
		
	}
	/**
	 * GetAllFriends
	 *
	 * @abstract
	 * @access public
	 * @param User
	 * @return Array
	 */
	public function GetAllFriends($user)
	{
		return $this->super_query("SELECT * FROM `User` WHERE ID IN (SELECT FriendID FROM `Friendships` WHERE Friendships.UserID = ".$this->safesql($user->ID));
	}
	/**
	 * FindFriendByName
	 *
	 * @abstract
	 * @access public
	 * @param User, string
	 * @return Array
	 */
	public function FindFriendByName($user, $name)
	{
		return $this->super_query("SELECT * FROM `User` 
				WHRER FirstName = ".$this->safesql($name)." AND ID IN (SELECT FriendID FROM `Friendships` WHERE UserID = ".$this->safesql($user->ID)));
	}
	/**
	 * FindFriendByJobTitle
	 *
	 * @abstract
	 * @access public
	 * @param User, string
	 * @return Array
	 */
	public function FindFriendByJobTitle($user, $jobTitle)
	{
		return $this->super_query("SELECT * FROM `User` WHERE ID IN (SELECT FriendID FROM `Friendships` WHERE UserID = ".$this->safesql($user->ID)." AND FriendID IN (SELECT UserID FROM `Works` WHERE Title = ".$this->safesql($jobTitle)."")));
	}
	/**
	 * GetPendingFriendshipRequests
	 *
	 * @abstract
	 * @access public
	 * @param User
	 * @return Array
	 */
	public function GetPendingFriendshipRequests($user)
	{
		// zaheran amalkardi moshabehe GetAllFriends($user) darad
	}
	/**
	 * UpdatePendingFriendshipRequests
	 *
	 * @abstract
	 * @access public
	 * @param User, Array
	 * @return bool
	 */
	public function UpdatePendingFriendshipRequests($user, $request)
	{
		//bemanad!!!
	}
}

?>