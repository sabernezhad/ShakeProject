<?php
/**
 * @Author:"Zohre Esmaeily"
 * @Co-Programmer:"MR Abdi And MRs Khalili"
 * @Version:1.0
 */
include_once( "/sql/mysql.php" );
class CompanyDAL extends db
{
	/**
	 * Add Company
	 *
	 * @abstract
	 * @access public
	 * @param User, Company
	 * @return bool
	 */
	public function AddCompany($user, $company)
	{
		if($this->query("INSERT INTO `Taskmaster` (`userid`,`Name`,`Address`,`Type`,`Phone`,`City`,`MoreDetails`) VALUES (".$this->safesql($user->ID).",".$this->safesql($company->Name).",".$this->safesql($company->Adress).",".$this->safesql($company->TypeCompany).",".$this->safesql($company->Phone).",".$this->safesql($company->City).",".$this->safesql($company->MoreDetails).")"))
			return true;
		else
			return false;
	}
	/**
	 * Edit Company
	 *
	 * @abstract
	 * @access public
	 * @param User, Company
	 * @return bool
	 */
	public function EditCompany($user, $company)
	{
		if($this->query("UPDATE Taskmaster SET
				userid ='".$this->safesql($user->ID)."',
				Name ='".$this->safesql($company->Name)."',
				Address ='".$this->safesql($company->Address)."'
				Type ='".$this->safesql($company->TypeCompany)."'
				Phone ='".$this->safesql($company->Phone)."'
				City ='".$this->safesql($company->City)."'
				MoreDetails ='".$this->safesql($company->MoreDetails)."'
				WHERE TaskmasterID='".$this->safesql($company->CompanyID)."'
				"))
			//baraye jadvale Taskmaster fildi be onvane TaskmasterID dar nazar gerefte am ke primarykey ast
			return true;
		else
			return false;
	}
   	/**
	 * Delete Company
	 *
	 * @abstract
	 * @access public
	 * @param TaskMaster
	 * @return bool
	 */
	public function DeleteCompany($taskMaster)
	{
		//baraye jadvale Taskmaster fildi be onvane TaskmasterID dar nazar gerefte am ke primarykey ast
		if($this->query("DELETE FROM Taskmaster WHERE `TaskmasterID` = ".$taskMaster->TaskmasterID))
			return true;
		else 
			return false;
	}
	/**
	 * Get Companies By Company Type
	 *
	 * @abstract
	 * @access public
	 * @param string
	 * @return Array
	 */
	public function GetCompaniesByCompanyType($companyType)
	{
		return $this->super_query("SELECT * FROM `Taskmaster` WHRER Type = ".$this->safesql($companyType));
	}
	/**
	 * Get Companies By Company Name
	 *
	 * @abstract
	 * @access public
	 * @param string
	 * @return Array
	 */
	public function GetCompaniesByCompanyName($companyName)
	{
		return $this->super_query("SELECT * FROM `Taskmaster` WHRER Name = ".$this->safesql($companyName));
	}
	/**
	 * Add Brunch
	 *
	 * @abstract
	 * @access public
	 * @param User, Brunch
	 * @return bool
	 */
	public function AddBranch($user, $branch)
	{
		//querye dastyabi be Brunch ID ba estefade az user ???? 
		if($this->query("INSERT INTO `Branches` (`TaskMasterID`, `Name`, `Address`, `Tell`) VALUES ('".$this->safesql($brunch->TaskMasterID)."','".$this->safesql($branch->Name)."','".$this->safesql($brunch->Address)."','".$this->safesql($brunch->Telphone)."')"))
			return  true;
		else
			return  false;
	}
	/**
	 * Remove Brunch
	 *
	 * @abstract
	 * @access public
	 * @param User,Brunch
	 * @return bool
	 */
	public function RemoveBranch($user, $branch)
	{
		//querye dastyabi be Brunch ID ba estefade az user ????
		if($this->query("DELETE FROM `Brunches` WHERE Brunches.ID = ".$this->safesql($brunch->XXXX))."")
			return  true;
		else 
			return false;
		
	}
	/**
	 * Edit Brunch
	 *
	 * @abstract
	 * @access public
	 * @param User, Brunch
	 * @return bool
	 */
	public function EditBranch($user, $branch)
	{
		//querye dastyabi be Brunch ID ba estefade az user ????
	}
	/**
	 * Get All Brunches
	 *
	 * @abstract
	 * @access public
	 * @param Company
	 * @return Array
	 */
	public function GetAllBranches($company)
	{
		return $this->super_query("SELECT * FROM `Brunches` WHERE ID = ".$this->safesql($company->CompanuID));
	}
	/**
	 * Get All Companies
	 *
	 * @abstract
	 * @access public
	 * @param
	 * @return Array
	 */
	public function GetAllCompanies()
	{
		return $this->super_query("SELECT `Name`, `Address`, `Type`, `Phone`, `City`, `MoreDetails` FROM `Taskmaster`");
	}
	/**
	 * Add Employee By Master
	 *
	 * @abstract 
	 * @access public
	 * @param TaskMaster, Employee, Company
	 * @return bool
	 */
	public function AddEmployeeByMaster($taskMaster, $employee, $company)
	{
		//?!?!?!
	}
	/**
	 * Fire Employee By Master
	 *
	 * @abstract 
	 * @access public
	 * @param TaskMaster, Employee
	 * @return bool
	 */
	public function FireEmployeeByMaster($taskMaster, $employee)
	{
		//?!?!?!
	}
	/**
	 * Quit From Company
	 *
	 * @abstract
	 * @access public
	 * @param User
	 * @return bool
	 */
	public function QuitFromCompany($user)
	{
		//?!?!?!
	}
	/**
	 * Get Employees
	 *
	 * @abstract
	 * @access public
	 * @param User
	 * @return Array
	 */
	public function GetEmployees($user)
	{
		//?!?!?!
	}
}

?>