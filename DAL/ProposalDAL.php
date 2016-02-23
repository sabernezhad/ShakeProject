<?php
/** 
 * @Author:"Hamid Reza Abdi" 
 * @Co-Programmer:"MRs Esmaeli And MRs Khalili"
 * @Version:1.0
 */
include_once( "/sql/mysql.php" );
class ProposalDAL extends db
{
	/**
	 * Send Proposal
	 *
	 * @abstract
	 * @access public
	 * @param Proposal
	 * @return bool
	 */
 	public function SendProposal($Proposal)
	{
		if($this->query("INSERT INTO `Proposal` (`SenderID`,`RecieverID`,`Content`,`RecieveTime`) VALUES (".$this->safesql($Proposal->SenderID).",".$this->safesql($Proposal->RecieverID).",".$this->safesql($Proposal->Content).",".$this->safesql($Proposal->RecieveTime).")"))
			return true;
		else
			return false;
	}
	/**
	 * Get Proposal By Role Id
	 *
	 * @abstract
	 * @access public
	 * @param Role
	 * @return ARRAY
	 */	
	public function GetProposalByRoleId($role)
	{
		return $this->super_query("SELECT * FROM `Proposal` WHERE SenderID IN(SELECT ID FROM `user` WHERE Role=".$this->safesql($role->RoleId)."");
	}
	/**
	 * Get All Proposal By Reciever
	 *
	 * @abstract
	 * @access public
	 * @param USER
	 * @return ARRAY
	 */	
	public function GetAllProposalByReciever($user)
	{
		return $this->super_query("SELECT * FROM `Proposal` RecieverID IN (SELECT ID FROM `user` WHERE Username=".$this->safesql($user->Username)."";
	}
	/**
	 * Delete Proposal
	 *
	 * @abstract
	 * @access public
	 * @param Proposal
	 * @return bool
	 */	
	public function DeleteProposal($Proposal)
	{
		if($this->query("DELETE `Proposal` WHERE ID=".$this->safesql($Proposal)." "))
			return true;
		else
			return false;			
	}

}
?>