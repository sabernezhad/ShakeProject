<?php
/**
 * @Author:"Zohre Esmaeily"
 * @Co-Programmer:"MR Abdi And MRs Khalili"
 * @Version:1.0
 */
include_once( "sql/mysql.php" );
class MessageDAL extends db
{
	/**
	 * SendMessage
	 *
	 * @abstract
	 * @access public
	 * @param Message
	 * @return bool
	 */
	public function SendMessage($msg)
	{
		if($this->query("INSERT INTO `Message` (`SenderID`,`RecieverID`,`Content`,`SendTime`) VALUES (".$this->safesql($msg->Sender->ID).",".$this->safesql($msg->Reciever->ID).",'".$this->safesql($msg->Content)."','".$this->safesql($msgl->SendTime)."')"))
			return true;
		else
			return false;
	}
	/**
	 * MarkMessageAsRead
	 *
	 * @abstract
	 * @access public
	 * @param Message
	 * @return bool
	 */
	public function MarkMessageAsRead($msg)
	{
		if($this->query("UPDATE `Message` SET `IsRead`= 1 WHERE ID= ".$this->safesql($msg->MessageId).""))
			return true;
		else
			return false;
	}
	/**
	 * MarkMessageAsUnread
	 *
	 * @abstract
	 * @access public
	 * @param Message
	 * @return bool
	 */
	public function MarkMessageAsUnread($msg)
	{
		if($this->query("UPDATE `Message` SET `IsRead`= 0 WHERE ID= ".$this->safesql($msg->MessageId).""))
			return true;
		else
			return false;
	}
	/**
	 * ReplyToMessage
	 *
	 * @abstract
	 * @access public
	 * @param Message
	 * @return bool
	 */
	public function ReplyToMessage($msg)
	{
		if($this->query("INSERT INTO `Message` (`SenderID`,`Content`,`SendTime`) VALUES (".$this->safesql($msg->Reciever->ID).",'".$this->safesql($msg->Content)."','".$this->safesql($msgl->SendTime)."')"))
			return true;
		else
			return false;
	}  
	/**
	 * DeleteMessage
	 *
	 * @abstract
	 * @access public
	 * @param Message
	 * @return bool
	 */
	public function DeleteMessage($msg)
	{
		//return $this->query("DELETE FROM Message WHERE Message.ID = 'msg->Messageid'");
		if($this->query("DELETE FROM `Message` WHERE `ID` = '".$this->safesql($msg->ID)."' "))
			return true;
		else
			return false;
	}
	/**
	 * GetMessageBySenderUsername
	 *
	 * @abstract
	 * @access public
	 * @param string, User
	 * @return Array
	 */
	public function GetMessageBySenderUsername($senderUserName, $reciever)
	{
		//return $this->super_query("SELECT * FROM Message WHERE Message.RecieverID = '$reciever->ID' AND Message.SenderID IN (SELECT User.ID FROM User WHERE User.Username = '$senderUserName')");
		return $this->super_query("SELECT * FROM `Message` WHERE `RecieverID` = '".$this->safesql($reciever->ID)."' AND `SenderID` IN(SELECT `ID` FROM `User` WHERE `Username` = '".$this->safesql($senderUserName)."'");
	}
	/**
	 * GetAllMessage
	 *
	 * @abstract
	 * @access public
	 * @param User
	 * @return Array
	 */
	public function GetAllMessages($reciever)
	{
		return $this->query("SELECT * FROM `Message` WHERE `Message`.`RecieverID` = '".$this->safesql($reciever->ID)."' ");
	}
}

?>