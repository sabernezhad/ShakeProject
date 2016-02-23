<?php
/** 
 * @Author:"Hamid Reza Abdi" 
 * @Co-Programmer:"MRs Esmaeli And MRs Khalili"
 * @Version:1.0
 */
include_once( "/sql/mysql.php" );
class AdminDAL extends db
{
	/**
	 * Add Society
	 *
	 * @abstract
	 * @access public
	 * @param Society
	 * @return bool
	 */
 	public function AddSociety($society)
	{
		if($this->query("INSERT INTO `Society` (`Title`,`Category`,`TimeCreated`) VALUES ('".$this->safesql($society->Title)."','".$this->safesql($society->Category)."','".$this->safesql($society->TimeCreat)."')"))
			return true;
		else
			return false;		
	}
	/**
	 * Edit Society
	 *
	 * @abstract
	 * @access public
	 * @param society,INT
	 * @return bool
	 */
	public function EditSociety($society,$soID)
	{
		if($this->query("UPDATE `Society` SET `Title`=".$this->safesql($post->Title).",`Category`='".$this->safesql($post->Category)."',`TimeCreated`='".$this->safesql($post->TimeCreated)."' WHERE ID= ".$this->safesql($soID).""))
			return true;
		else
			return false;		
	}
	/**
	 * Delete Society
	 *
	 * @abstract
	 * @access public
	 * @param Society
	 * @return bool
	 */
	public function DeleteSociety($society)
	{
		if($this->query("DELETE `Society` WHERE ID=".$this->safesql($society)." "))
			return true;
		else
			return false;		
	}
	/**
	 * Get All Societies
	 *
	 * @abstract
	 * @access public
	 * @param Void
	 * @return ARRAY
	 */
	public function GetAllSocieties()
	{
		return $this->super_query("SELECT * FROM `Society`");
	}
	/**
	 * GetAllUsers
	 *
	 * @abstract
	 * @access public
	 * @param Void
	 * @return ARRAY
	 */
	public function GetAllUsers()
	{
		return $this->super_query("SELECT * FROM `user` WHERE `user`.ID IN(SELECT `userid` FROM `SocietyMembership`)");
	}
	/**
	 * Get Statistics(NOT COMPELETE)
	 *
	 * @abstract
	 * @access public
	 * @param void
	 * @return ARRAY
	 */
	public function GetStatistics()
	{
		return $this->super_query("no found table for this query ");
	}
	/**
	 * Edite Rules
	 *
	 * @abstract
	 * @access public
	 * @param Rule
	 * @return bool
	 */
	public function EditeRules($rule)
	{
		if($this->query("no found table for this query"))
			return true;
		else
			return false;	
	}
	/**
	 * Change Poster Expire Time Limit
	 *
	 * @abstract
	 * @access public
	 * @param Month
	 * @return bool
	 */
	public function ChangePosterExpireTimeLimit($month)
	{
		if($this->query("no found table for this query"))
			return true;
		else
			return false;	
	}
	/**
	 * Get Blocked List
	 *
	 * @abstract
	 * @access public
	 * @param void
	 * @return bool
	 */
	public function GetBlockedList()
	{
		if($this->query("no found table for this query"))
			return true;
		else
			return false;	
	}
	/**
	 * Add User To Blocked List
	 *
	 * @abstract
	 * @access public
	 * @param USER
	 * @return bool
	 */
	public function AddUserToBlockedList($user)
	{
		if($this->query("no found table for this query"))
			return true;
		else
			return false;	
	}
	/**
	 * Remove User Frome Blocked List
	 *
	 * @abstract
	 * @access public
	 * @param USER
	 * @return bool
	 */
	public function RemoveUserFromeBlockedList($user)
	{
		if($this->query("no found table for this query"))
			return true;
		else
			return false;	
	}
}

?>