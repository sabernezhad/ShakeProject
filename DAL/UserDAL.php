<?php

/**
 * @package ShakeDLL
 * @author Azade Khalili <azade_khalili@yahoo.com>
 * @version 1.0 (july,9,2012)
 * @Co-Programmer:"MRs Esmaeli And MR Abdi
 */
include_once("sql/mysql.php");

class UserDAL extends db {

    /**
     * Get User By UserName
     * (not exist at crc)
     * @param string $userName
     * @return user 
     */
    public function GetUserByUserName($userName) {
        $user = $this->get_row($this->query("SELECT * FROM `user` WHERE
		 `Username`='" . $this->safesql($userName) . "' limit 1"));
        if ($user)
            return $user;
        else
            return false;
        // print_r( $user);
    }

    /**
     * add Personal Information
     * @access public
     * @param User $user
     * @param personalinformation $PI
     * @return TRUE id added,false in other
     */
    public function AddPersonalInformation($user, $PI) {
        if ($this->query("INSERT INTO `personalinformation`(`userid`,`lastname`,`profpic`,
            `mobile`,`tel`,`gender`,`birth`,`addresshome`,
            `workrep`,`educationrep`,`educationsite`,`skill`) VALUES (
		'" . $this->safesql($user->ID) . "',
		'" . $this->safesql($PI->LastName) . "',
		'" . $this->safesql($PI->ProfilePicture) . "',
		'" . $this->safesql($PI->Mobile) . "',
		'" . $this->safesql($PI->Phone) . "',
		'" . $this->safesql($PI->sex) . "',
		'" . $this->safesql($PI->age) . "',
		'" . $this->safesql($PI->AddressHome) . "',
		'" . $this->safesql($PI->WorkRepute) . "',
		'" . $this->safesql($PI->EducationRepute) . "',
		'" . $this->safesql($PI->EducationSite) . "',
		'" . $this->safesql($PI->Skill) . "'
		)"))
            return true;
        else
            return false;
    }

    /**
     * add user
     * @access public
     * @param User $user
     * @return TRUE id added,false in other
     */
    public function AddUser($user) {
        if ($this->query("INSERT INTO `user`(`username`,`password`,`FirstName`,`LastName`,`Email`,`role`,`isoffender`) VALUES (
		'" . $this->safesql($user->UserName) . "',
		'" . $this->safesql($user->Password) . "',
        '" . $this->safesql($user->Fname) . "',
        '" . $this->safesql($user->Lname) . "',
        '" . $this->safesql($user->email) . "',
		'" . $this->safesql($user->Role) . "',
		'" . $this->safesql($user->IsOffender) . "'
		)"))
            return true;
        else
            return false;
    }
    /**
     * AddWorks
     * @access public
     * @param User $user
     * @param Work $work
     * @return TRUE id added,false in other
     */
    public function AddWorks($user, $work) {
    	if ($this->query("INSERT INTO `works`(`UserID`, `Title`, `Description`,
    			 `CompanyID`, `CompanyName`, `WorkCity`, `Salary`, `OtherPoints`) VALUES (
    			'" . $this->safesql($user->ID) . "',
    			'" . $this->safesql($work->Name) . "',
    			'" . $this->safesql($work->description) . "',
    			'" . $this->safesql($work->Company->companyID) . "',
    			'" . $this->safesql($work->Company->Name) . "',
    			'" . $this->safesql($work->WorkCity) . "',
    			'" . $this->safesql($work->salary->Salary) . "',
    			'" . $this->safesql($work->salary->OtherPoint) . "'
    			
    	)"))
    		return true;
    	else
    		return false;
    }
    
    /**
     * update
     * @access public
     * @param User $user
     * @return boolean
     */
    public function EditUser($user) {
        if ($this->query("UPDATE `User` SET
		
		`Username`='" . $this->safesql($user->Username) . "',
		`Password`='" . $this->safesql($user->Password) . "',
		`Role`='" . $this->safesql($user->Role) . "',
		`IsOffender`='" . $this->safesql($user->IsOffender) . "'
		WHERE `ID`='" . $this->safesql($user->ID) . "'
		"))
            return true;
        else
            return false;
    }

    /**
     * delete
     * @param User $user
     * @access public
     * @return boolean
     */
    public function DeleteUser($user) {
        if ($this->query("DELETE FROM `User` WHERE 
		ID='" . $this->safesql($user->ID) . "'"))
            return true;
        else
            return false;
    }

    /**
     * find user
     * @access public
     * @param string $userName
     * @return array/list of user
     */
    public function FindUserByUserName($userName) {
        return $this->super_query("SELECT * FROM `User` WHERE
		 `Username` LIKE '" . $this->safesql($userName) . "'");
    }

    /**
     * find user
     * @access public
     * @param string $userName
     * @return array/list of user
     */
    public function FindUserByFirstName($firstName) {
        return $this->super_query("SELECT * FROM `User` WHERE
		 `FirstName` LIKE '" . $this->safesql($firstName) . "'");
    }

    /**
     * find user
     * @access public
     * @param string $lastName
     * @return array/list of user
     */
    public function FindUserByLastName($lastName) {
        return $this->super_query("SELECT * FROM `User` WHERE
		 `LastName` LIKE '" . $this->safesql($lastName) . "'");
    }

    /**
     * find user
     * @access public
     * @param string $companyName
     * @return array/list of user
     */
    public function FindUserByCompanyName($companyName) {
        return $this->super_query("SELECT * FROM `User` WHERE
		 `CompanyName`LIKE '" . $this->safesql($companyName) . "'");
    }

    /**
     * find user
     * @access public
     * @param string $time
     * @return array/list of user
     */
    public function FindUserByTime($time) {
        return $this->super_query("SELECT * FROM `User` WHERE
		 `TimeCreated`LIKE '" . $this->safesql($time) . "'");
    }

    /**
     * get all user
     * @access public
     * @param void
     * @return array/list of user
     */
    public function GetAllUseres() {
        return $this->super_query("SELECT * FROM `User`");
    }

    /**
     * get resume
     * @access public
     * @param string $userName
     * @return file
     */
    public function GetResume($userName) {
        return $this->super_query("SELECT * FROM `User` WHERE '?'='?'");
        //resume not exist
    }

    /**
     * update
     * @access public
     * @param string $userName
     * @return boolean
     */
    public function UpdateResume($userName) {
        if ($this->query(""))
            return true;
        else
            return false;
    }

    /**
     * get information
     * @access public
     * @param string $userName
     * @return personam information
     */
    public function GetPersonalInformation($userName) {
        return $this->super_query("SELECT * FROM `personalinformation` WHERE `UserID` in 
		(SELECT ID FROM `user` WHERE 
		Username LIKE'" . $this->safesql($userName) . "') limit 1");
    }

    /**
     * update
     * @access public
     * @param string $userName
     * @return boolean
     */
    public function UpdatePersonalInformation($userName) {
        //???
        if ($this->query("UPDATE `PersonalInformation` SET 
				
				"))
            return true;
        else
            return false;
    }

    /**
     * get favoritework
     * @param User 4user
     * @access public
     * @return FavoriteWork
     */
    public function GetFavoriteWork($user) {
        return $this->super_query("SELECT * FROM `FavoriteWorks` WHERE
		 `UserID`='" . $this->safesql($user->ID) . "'");
    }

    /**
     * update favoritejob
     * @param User $user
     * @param FavoriteWork $favoritework
     * @access public
     * @return boolean
     */
    public function UpdateFavoriteJob($user, $favoriteWork) {
        if ($this->query("UPDATE 'FavoriteWorks' SET 
		
		`UserID`='" . $this->safesql($user->ID) . "',
		`FullTime`='" . $this->safesql($favoriteWork->FullTime) . "',
		`Salary`='" . $this->safesql($favoriteWork->PreferedSalary) . "',
		`city`='" . $this->safesql($favoriteWork->PreferedCity) . "'
		WHERE `UserID`='" . $this->safesql($user->ID) . "'
		"))
            return true;
        else
            return false;
    }

    /**
     * get informationjob
     * @access public
     * @param user $user
     * @return Informationjob
     */
    public function GetInformationJob($user) {

        return $this->super_query("SELECT * FROM 'Works' WHERE
				UserID='" . $this->safesql($user->ID) . "'
				");
    }

    /**
     * update informationjob
     * @access public
     * @param user $user
     * @param Work $work
     * @return boolean
     */
    public function UpdateInformationJob($user, $work) {

        if ($this->query("UPDATE 'Works' SET
				UserID='" . $this->safsql($user->ID) . "',
				Title='" . $this->safesql($work->name) . "',
				Description='" . $this->safesql($work->description) . "',
				WorkCity='" . $this->safesql($work->WorkCity) . "',
				Salary='" . $this->safesql($work->Salary->salary) . "',
				OtherPoints='" . $this->safesql($work->Salary->OtherPoints) . "'
				WHERE ID='" . $this->safesql($work->workID) . "'
				"))
            return true;
        else
            return false;
    }

    /**
     * add picture
     * @access public
     * @param file $pic
     * @param User $user
     * @return boolean
     */
    public function AddprofilePicture($pic, $user) {
        if ($this->query("INSERT INTO 'User'('ProfilePictureUrl') VALUES
				'" . $this->safesql($oic) . "'
				WHERE ID='" . $this->safesql($user->ID) . "'
				"))
            return true;
        else
            return false;
    }

    /**
     * get pictures
     * @access public
     * @param void
     * @return file
     */
    public function GetProfiePicture() {
        return $this->super_query("SELECT ProfilePictureUrl FROM 'User'");
    }

    /**
     * remove pictures
     * @access public
     * @param void
     * @return boolean
     */
    public function RemoveProfilePicture() {
        if ($this->query("DELETE ProfilePictureUrl FROM 'User' "))
            return true;
        else
            return false;
    }

}

?>