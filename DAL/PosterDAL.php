<?php
/**
 * @package ShakeDLL
 * @author Azade Khalili <azade_khalili@yahoo.com>
 * @version 1.0 (july,9,2012)
 * @Co-Programmer:"MRs Esmaeli And MR Abdi
 */


include_once("/sql/mysql.php");

class PosterDAL extends db
{
	
	
	/**
	 * register new poster
	 * @param User $user
	 * @param Poster $poster
	 * @access public
	 * @return boolean true if regeistered new poster or false in other
	 * 
	 */
	public function CreatePoster($user,$poster)
	{
			
		if($this->query("INSERT INTO `Poster`(`Content`,`TaskMasterID`,`Timecreated`,`LastUpdateTime`) VALUES(
		
		'".$this->safesql($poster->Content)."',
		'".$this->safesql($user->ID)."',
		'".$this->safesql($poster->TimeCreated)."',
		'".$this->safesql($poster->LastUpdate)."'
		)"))
			return true;
		else
			return false;	
		
	}
	/**
	 * update table
	 * @param User $user
	 * @param Poster $poster
	 * @access public
	 * @return boolean true if edited  poster or false in other
	 * 
	 */
	public function EditPoster($user,$Poster)
	{
		
			
		if($this->query("UPDATE `Poster` SET
		
		`Content`='".$this->safesql($poster->Content)."',
		`TaskMasterID`='".$this->safesql($user->ID)."',
		`TimeCreated`='".$this->safesql($poster->TimeCreated)."'
		`PastUpdate`='".$this->safesql($poster->LastUpdate)."'
		WHERE ID='".$this->safesql($Poster->PosterID)."'
		"))
			return true;
		else
			return false;	
		
	}
	/**
	 * delete poste
	 * @param User $user
	 * @param Poster $poster
	 * @access public
	 * @return boolean true if found and deleted new poster or false in other
	 */
	public function DeletePoster($user,$poster)
	{
		
		if($this->query("DELETE FROM `Poster` WHERE
		 `ID`='".$this->safesql($Poster->PosterID)."'"))
		 	return true;
		else
			return false;
	}
	
	/**
	 * get poster by company
	 * @access public
	 * @param string $name
	 * @return array/list of posters
	 */
	public function GetPostersByCompanyName($name)
	{
		return $this->super_query("SELECT * FROM `Poster` WHERE 
		`Companyname`='".$this->safesql($name)."'");
		//it dosent work because poster has not companyname

	}
	
	
	/**
	 * get poster by title
	 * @access public
	 * @param string $title
	 * @return list/array of poster
	 */
	public function GetPostersByPosterTitle($title)
	{
		return $this->super_query("SELECT * FROM `Poster` WHERE
		 `Title`='".$this->safesql($title)."'");

	}
	
	/**
	 * get poster by date
	 * @access public
	 * @param string $date
	 * @return list/array of poster
	 */
	public function GetPostersByCreateTime($date)
	{
		
		return $this->super_query("SELECT * FROM `Poster` WHERE 
		`TimeCreated`='".$this->safesql($date)."'");
	}
	
	
	/**
	 * get poster by reciever
	 * @access public
	 * @param User $user
	 * @return list/array of poster
	 */
	public function GetAllPostersByReciever($user)
	{
		
		return $this->super_query("SELECT * FROM `Poster`
		WHERE ID in 
		(SELECT Poster.ID,UserID
		FROM `Poster`,`PosterRecievers`
		WHERE `Poster`.`ID`=`PosterID`
		GROUP BY `UserID`
		HAVING `UserID`='".$this->safesql($user->ID)."'
		
		) 
		");
	}
	
	/**
	 * find all by creator
	 * @access public
	 * @param User $user
	 * @return list/array of posters
	 */
	public function GetAllPosterByCreator($user)
	{
		
		return $this->super_query("SELECT * FROM 'Poster'
				WHERE TaskMasterID='".$this-<safesql($user->ID)."'
				");
	}
	
	/**
	 * get poster by reciever
	 * @access public
	 * @param Poster $poster
	 * @return list/array of posters
	 */
	public function GetPosterRecieversList($poster)
	{
		
		return $this->super_query("SELECT * FROM `PosterRecievers` WHERE `PosterID`='".$this->safesql($poster->PosterID)."'");
	}
	
	/**
	 * submit
	 * @access public
	 * @param User $person
	 * @param Poster $poster
	 * @return true if submitted false in other
	 */
	public function SubmitForPoster($person,$poster)
	{
		if($this->query("INSERT INTO 'PosterRecievers'('UserID','PosterID')VALUES
				'".$this->safesql(&person->ID)."',
				'".$this->safesql($poster->PosterID)."'

				"))
		
			return true;
		
		else
			return false;
		
	}
	
	/**
	 * acceptsubmited
	 * @access public
	 * @param RegularPerson $person
	 * @param Poster $poster
	 * @return boolean
	 */
	public function AcceptSubmitedPersonForPoster($person,$poster)
	{
		if($this->query("INSERT INTO 'PosterRecievers'('UserID','PosterID','State')VALUES
				'".$this->safesql(&person->ID)."',
				'".$this->safesql($poster->PosterID)."',
				'accept'

				"))
			return true;
		else
			return false;
		
	}
	
	/**
	 * rejectsubmited
	 * @access public
	 * @param RegularPerson $person
	 * @param Poster $poster
	 * @return true if rejected, false in other
	 */
	public function RejectSubmitedPersonForPoster($person,$poster)
	{
		if($this->query("INSERT INTO 'PosterRecievers'('UserID','PosterID','State')VALUES
				'".$this->safesql(&person->ID)."',
				'".$this->safesql($poster->PosterID)."',
				'reject'
		
				"))
			return true;
		else
			return false;
		
	}
	
	/**
	 * sendposter
	 * @access public
	 * @param RegularPerson[] $person
	 * @param Poster $poster
	 * @return true if sent, false in other
	 */
	public function SendPosterForPersons($poster,$recievers)
	{
		if()
			return true;
		else
			return false;
		
	}
}
?>