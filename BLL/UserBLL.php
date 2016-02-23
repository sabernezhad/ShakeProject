<?php

/**
 *  @package ShakeBLL
 *  @package ShakeDAL
 *  @package DOMAIN
 */

require_once 'DAL/UserDAL.php';
require_once 'DAL/CompanyDAL.php';


class UserBLL{
    /**
     * @auther {NAME} {EMAIL}
     * @version {start at 1.0} {date}
     */
	private $UserDAL;
	
	public function UserDAL(){
		$this->UserDAL = new UserDAL();
		
	}

        
	/**
	 * add user
	 * @access public
	 * @param User $user
	 * @return $errorList[]    //$errorList[0]=true if added,$errorList[0]=false in other
	 * 
	 */
    public function AddEmployeeUser($user,$employee,$personalinformation,$confirmpass,$birthdate) 
    {	
    	UserBLL::UserDAL();
    	$errorList =UserBLL::IsValidEmployee($user,$employee,$personalinformation,$confirmpass,$birthdate);
 	
    	if(count($errorList) == 0 ){
    		$user->Password=md5($user->Password);
    		if($this->UserDAL->AddUser($user))
    		{
    			$user_temp=$this->UserDAL->GetUserByUserName($user->UserName);
    		}
    		else
    		{
    			$errorList[0]=false;
    			$errorList[1] = 'Error in Adding User!';
    			return $errorList;
    		}
    		$user->ID=$user_temp['ID'];
    		$personalinformation->age=$birthdate;
    		if($this->UserDAL->AddPersonalInformation($user, $personalinformation)   &&   $this->UserDAL->AddWorks($user, $employee))
    		{
    			$errorList[0]=true;
    		}
    		else
    		{
    			$errorList[0]=false;
    			$errorList[1] = 'Error in Adding User!';
    		}
    	}
    	
   		return  $errorList;
    }
    
    public function AddEmployerUser($user,$company,$branch,$personalinformation,$confirmpass,$birthdate)
    {
    	UserBLL::UserDAL();
    	$companyDAL=new CompanyDAL();
    	$errorList =UserBLL::IsValidEmployer($user,$company,$branch,$personalinformation,$confirmpass,$birthdate);
    
    	if(count($errorList) == 0 ){
    		$user->Password=md5($user->Password);
    		if($this->UserDAL->AddUser($user))
    		{
    			$user_temp=$this->UserDAL->GetUserByUserName($user->UserName);
    		}
    		else
    		{
    			$errorList[0]=false;
    			$errorList[1] = 'Error in Adding User!';
    			return $errorList;
    		}
    		$user->ID=$user_temp['ID'];
    		$personalinformation->age=$birthdate;
    		if($this->UserDAL->AddPersonalInformation($user, $personalinformation)   && $companyDAL->AddCompany($user, $company) && $companyDAL->AddBranch($company, $branch))
    		{
    			$errorList[0]=true;
    		}
    		else
    		{
    			$errorList[0]=false;
    			$errorList[1] = 'Error in Adding User!';
    		}
    	}
    	 
    	return  $errorList;
    }

    public function AddUnEmployeeUser($user,$work,$personalinformation,$confirmpass,$birthdate)
    {
    	UserBLL::UserDAL();
    	$errorList =UserBLL::IsValidUnEmployee($user,$work,$personalinformation,$confirmpass,$birthdate);
    
    	if(count($errorList) == 0 ){
    		$user->Password=md5($user->Password);
    		if($this->UserDAL->AddUser($user))
    		{
    			$user_temp=$this->UserDAL->GetUserByUserName($user->UserName);
    		}
    		else
    		{
    			$errorList[0]=false;
    			$errorList[1] = 'Error in Adding User!';
    			return $errorList;
    		}
    		$user->ID=$user_temp['ID'];
    		$personalinformation->age=$birthdate;
    		if($this->UserDAL->AddPersonalInformation($user, $personalinformation))
    		{
    			$errorList[0]=true;
    		}
    		else
    		{
    			$errorList[0]=false;
    			$errorList[1] = 'Error in Adding User!';
    		}
    	}
    
    	return  $errorList;
    }
    
    /**
     * IsValidEmployee
     * @access public
     * @param User $user
     * @param Work $employee
     * @param personalinformation $personalinformation
     * @param $confirmpass
     * @return TRUE id added,false in other
     */
    private  function IsValidEmployee($user,$employee,$personalinformation,$confirmpass,$birthdate)
    {
    	
    	$errorValidationList = array();
    	if($user->UserName=="")
    		$errorValidationList[]="Username must be filled";
    	if($user->Password=="")
    		$errorValidationList[]="Password must be filled";
    	if(strlen($user->Password) < 6 ){
    		$errorValidationList[] = "Password length must be greater than 6 characters";
    	}
    	if($user->Password!=$confirmpass)
    		$errorValidationList[]="Password not match";
    	if($personalinformation->FirstName == ""){
    		$errorValidationList[] = "First name must be filled";
    	}
    	if($personalinformation->LastName == ""){
    		$errorValidationList[] = "Last name must be filled";
    	}
       	
    	if($personalinformation->Phone=="")
    		$errorValidationList[]="Tel muset be filled";
    	if($employee->Name=="")
    		$errorValidationList[]="Job must be filled";
    	if($employee->Company->Name=="")
    		$errorValidationList[]="Organization must be filled";
    	if($employee->WorkCity=="")
    		$errorValidationList[]="Organization's City must be filled";
    	
    	$b=explode("/",$birthdate);
    	
    	if(strlen($b[0])<4  || strlen($b[1])<2  ||  strlen($b[2])<2){
    		$errorValidationList[] = "Birthdate not in correct format. correct format: 1369/01/01";
    	}
    	
    	if($personalinformation->Email == ""){
    		$errorValidationList[] = "Email must be filled";
    	}
	   	$emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/';
    	if (preg_match($emailPattern,$personalinformation->Email) == false ){
    		$errorValidationList[] = "Email is not valid";
    	}
    	
    	//echo $user->UserName;
    	//print_r($this->UserDAL->GetUserByUserName($user->UserName));
    	//return;
    	if($this->UserDAL->GetUserByUserName($user->UserName) != false ){
    		$errorValidationList[] = "User Name already submited. please use another user name";
    	}
    	
    	if(count($errorValidationList)!=0)
    	{
    		$s[0]=false;
    		$index=1;
    		foreach ($errorValidationList as $a)
    			$s[$index++]=$a;
    		
    		return $s;
    	}
    	return $errorValidationList;
    		
    }
    
    private  function IsValidEmployer($user,$company,$branch,$personalinformation,$confirmpass,$birthdate)
    {
    	$errorValidationList = array();
    	if($user->UserName=="")
    		$errorValidationList[]="Username must be filled";
    	if($user->Password=="")
    		$errorValidationList[]="Password must be filled";
    	if(strlen($user->Password) < 6 ){
    		$errorValidationList[] = "Password length must be greater than 6 characters";
    	}
    	if($user->Password!=$confirmpass)
    		$errorValidationList[]="Password not match";
    	if($personalinformation->FirstName == ""){
    		$errorValidationList[] = "First name must be filled";
    	}
    	if($personalinformation->LastName == ""){
    		$errorValidationList[] = "Last name must be filled";
    	}
    	if($personalinformation->Phone=="")
    		$errorValidationList[]="Tel muset be filled";
    	if($company->Name=="")
    		$errorValidationList[]="Organization must be filled";
    	if($company->City=="")
    		$errorValidationList[]="Organization's City must be filled";
    	if($company->Address=="")
    		$errorValidationList[]="Organization's Location must be filled";
    	if($branch->Name=="")
    		$errorValidationList[]="Branch's Name must be filled";
    	$b=explode("/",$birthdate);
    	if(strlen($b[0])<4  || strlen($b[1])<2  ||  strlen($b[2])<2){
    		$errorValidationList[] = "Birthdate not in correct format. correct format: 1369/01/01";
    	}
    	 
    	if($personalinformation->Email == ""){
    		$errorValidationList[] = "Email must be filled";
    	}
    	$emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/';
    	if (preg_match($emailPattern,$personalinformation->Email) == false ){
    		$errorValidationList[] = "Email is not valid";
    	}
    	 
    	if($this->UserDAL->GetUserByUserName($user->UserName) != false ){
    		$errorValidationList[] = "User Name already submited. please use another user name";
    	}
    	 
    	if(count($errorValidationList)!=0)
    	{
    		$s[0]=false;
    		$index=1;
    		foreach ($errorValidationList as $a)
    			$s[$index++]=$a;
    
    		return $s;
    	}
    	return $errorValidationList;
    
    }

    private  function IsValidUnEmployee($user,$work,$personalinformation,$confirmpass,$birthdate)
    {
    	$errorValidationList = array();
    	if($user->UserName=="")
    		$errorValidationList[]="Username must be filled";
    	if($user->Password=="")
    		$errorValidationList[]="Password must be filled";
    	if(strlen($user->Password) < 6 ){
    		$errorValidationList[] = "Password length must be greater than 6 characters";
    	}
    	if($user->Password!=$confirmpass)
    		$errorValidationList[]="Password not match";
    	if($personalinformation->FirstName == ""){
    		$errorValidationList[] = "First name must be filled";
    	}
    	if($personalinformation->LastName == ""){
    		$errorValidationList[] = "Last name must be filled";
    	}
    	if($personalinformation->Phone=="")
    		$errorValidationList[]="Tel muset be filled";
    	$b=explode("/",$birthdate);
    	if(strlen($b[0])<4  || strlen($b[1])<2  ||  strlen($b[2])<2){
    		$errorValidationList[] = "Birthdate not in correct format. correct format: 1369/01/01";
    	}
    	if($personalinformation->Email == ""){
    		$errorValidationList[] = "Email must be filled";
    	}
    	$emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/';
    	if (preg_match($emailPattern,$personalinformation->Email) == false ){
    		$errorValidationList[] = "Email is not valid";
    	}
    	if($personalinformation->AddressHome=="")
    		$errorValidationList[]="Hometown muset be filled";
    	if($personalinformation->EducationSite=="")
    		$errorValidationList[]="University muset be filled";
    	if($work->Name=="")
    		$errorValidationList[]="Job muset be filled";
    	if($personalinformation->Skill=="")
    		$errorValidationList[]="PROFICIENCY muset be filled";
    	if($this->UserDAL->GetUserByUserName($user->UserName) != false ){
    		$errorValidationList[] = "User Name already submited. please use another user name";
    	}
    
    	if(count($errorValidationList)!=0)
    	{
    		$s[0]=false;
    		$index=1;
    		foreach ($errorValidationList as $a)
    			$s[$index++]=$a;
    
    		return $s;
    	}
    	return $errorValidationList;
    
    }

    public function EditUser($user) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	$errorList =UserBLL::IsValid($user);
    	
    	if(count($errorList) == 0 ){
    		if($UserDAL->EditUser($user) == false){
    			return $errorList[] = 'Error in Editing User!';
    		}
    		else{
    			return $errorList;
    		}
    	}
    	else return $errorList;
    }
    
    public function DeleteUser($userId) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	if($userId != null){
    		if($UserDAL->DeleteUser($userId) == false){
    			return false;
    		}
    		return true;
    	}
    	return false;
    	
    }
    
    public function GetAllUsers() 
    {
    	$UserDAL =UserBLL::UserDAL();
    	return $UserDAL->GetAllUsers();
    }
    
    public function FindUserByFirstName($firstName) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	if($firstName == "") return $UserDAL->GetAllUsers();
    	return $UserDAL->FindUserByFirstName($firstName);
    }
    
    public function FindUserByLastName($lastName) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	if($lastName == "") return $UserDAL->GetAllUsers();
    	return $UserDAL->FindUserByLastName($lastName);
    }
    
	public function FindUserByCompanyName($companyName) 
	{
		$UserDAL =UserBLL::UserDAL();
		if($companyName == "") return $UserDAL->GetAllUsers();
    	return $UserDAL->FindUserByCompanyName($companyName);
    }
    
    public function FindUserByUserName($UserName) 
    {
    	
    	$this->UserDAL();
    	
     	return $this->UserDAL->GetUserByUserName($UserName);
    }
    
    public function FindUserByTime($time) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	if($time == null) return $UserDAL->GetAllUsers();
    	return $UserDAL->FindUserByTime($time);
    }
    public function GetpersonalinfbyUsername($UserName)
    {
    	$this->UserDAL();
    	 
    	return $this->UserDAL->GetPersonalInformation($UserName);
    }
    public function FindUsernameByUserID($userID)
    {
    	$this->UserDAL();
    	return $this->UserDAL->FindUsernameByUserID($userID);
    }
  public function Login($userName , $password ) 
    {
    	//$this->UserDAL();
    	
    	$errorList = array();
    	if($userName == "")
    	{
    		$errorList[0] = false;
    		$errorList[1] = "Please enter your username !";
    	}
    	else
    	{
    		if($password == "")
    		{
    			$errorList[0] = false;
    			$errorList[1] = "Please enter your password !";
    		}
    		else
    		{
    			$userDAL = new UserDAL();
    			$user = $userDAL->GetUserByUserName($userName);
    			
    			if($user != false && $user['Password'] == md5($password))
    			{
    				$errorList[0]=true;
    			}
    			else
    			{ 
    				$errorList[0] = false;
    				$errorList[1] = "Your Username or Password is not valid !";
    			}
    		}
    	}
    	return $errorList;
    }
    
    //niazi dide nashod:D
    //public function LogOut($user) {
    //	return 'Example Return';
    //}
    
    public function ChangePassword($newPassword , $user) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	$errorList = array();
    	if($user == null) $errorList[] = "user is not valid";
    	if($newPassword == "") $errorList[] = "New password must be entered";
    	if(strlen($newPassword) < 6 ) $errorList[] = "your new password must be greater than 6 characters";
    	else{
    		$user->Password = $newPassword;
    	}
    }
    
    public function ForgetPassword($email) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	if($email == "") return null;
    	$user = $UserDAL->GetUserByEmail($email);
    	if( $user != null){
    		return $user;
    	}
    	return null;
    }
    
    public function AddProfilePicture($pic , $userName) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	if($userName == "") return false;
    	if(pic != null){
    		$user = $UserDAL->GetUserByUserName($userName);
    		$user->Image = $pic;
    		$UserDAL->EditUser($user);
    	}
    	return true;
    }
    
    public function GetProfilePicture($userName) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	if($userName == "") return null;
    	$user = $UserDAL->GetUserByUserName($userName);
    	return $user->Image;
    }
    
    public function RemoveProfilePicture($userName) 
    {
    	$UserDAL =UserBLL::UserDAL();
    	if($userName == "") return false;
    	$user = $UserDAL->GetUserByUserName($userName);
    	$user->Image = null;
    	$UserDAL->EditUser($user);
    	return true;
    }

}

?>