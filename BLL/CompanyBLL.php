<?php
 class CompanyBLL {
	
	/*
	 * create variable
	 */
	
	var $user;
	var $company;
	
	var $AddCompany;
	var $EditCompany;
	var $taskMaster;
	var $DeleteCompany;
	var $GetCompaniesByCompanyType;
	var $GetCompaniesByCompanyName;
	var $GetAllCompanies;
	var $branch;
	var $AddBranch;
	var $RemoveBranch;
	var $EditBranch;
	var $GetAllBranches;
	var $employee;
	var $AddEmployeeByMaster;
	var $FireEmployeeByMaster;
	var $QuitFromCompany;
	var $GetEmployes;
	var $employees;
	
	/*
	 * create construction
	 */
	
	public function CompanyBLL() {
		
		/*
		 * create object from companyBLL()
		 */
		
		$this->user = new User ();
		$this->company = new Company ();
		$this->AddCompany = new CompanyDAL ();
		$this->EditCompany = new CompanyDAL ();
		$this->taskMaster = new TaskMaster ();
		
		$this->DeleteCompany = new CompanyDAL ();
		$this->GetCompaniesByCompanyType = new CompanyDAL ();
		$this->GetCompaniesByCompanyName = new CompanyDAL ();
		$this->GetAllCompanies = new CompanyDAL ();
		
		$this->branch = new Branch ();
		$this->AddBranch = new CompanyDAL ();
		$this->RemoveBranch = new CompanyDAL ();
		$this->EditBranch = new CompanyDAL ();
		$this->GetAllBranches = new CompanyDAL ();
		$this->employee = new Employee ();
		$this->AddEmployeeByMaster = new CompanyDAL ();
		$this->FireEmployeeByMaster = new CompanyDAL ();
		$this->QuitFromCompany = new CompanyDAL ();
		$this->GetEmployes = new CompanyDAL ();
		$this->employees = GetEmployees ( $user );
		
		$branchs = GetAllBranches ( $company );
	
	}
	
	function AddCompany($user, $company)  /*Úãá ÇÖÇÝå ˜ÑÏä ÔÑ˜Ê*/
{
		
		$result = $AddCompany->AddCompany ( $user, $company );
		
		return $result;
	
	}
	
	function EditCompany($user, $company) /*æíÑÇíÔ ÔÑ˜Ê*/
{
		
		$result = $EditCompany->EditCompany ( $user, $company );
		
		return $result;
	
	}
	
	function DeleteCompany($taskMaster) /* ÍÐÝ ÔÑ˜Ê*/
{
		
		$result = $DeleteCompany->DeleteCompany ( $taskMaster );
		
		return $result;
	
	}
	
	function GetCompaniesByCompanyType($CompanyType) /*Úãá˜ÑÏ ˜ÓÈ ÈÑ ÇÓÇÓ äæÚ ÔÑ˜Ê*/
{
		
		$result = $GetCompaniesByCompanyType->GetCompaniesByCompanyType ( $CompanyType );
		
		return $result;
	
	}
	
	function GetCompaniesByCompanyName($CompanyName) {
		
		$result = $GetCompaniesByCompanyName->GetCompaniesByCompanyName ( $CompanyName );
		
		return $result;
	
	}
	
	function GetAllCompanies() {
		
		$result = $GetAllCompanies->GetAllCompanies ();
		
		return $result;
	
	}
	
	function AddBranch($user, $branch) /*ÇÖÇÝå ˜ÑÏä æÇÍÏ*/{
		
		$result = $AddBranch->AddBranch ( $user, $branch );
		
		return $result;
	
	}
	
	function RemoveBranch($user, $branch)/*ÍÐÝ æÇÍÏ*/ {
		
		$result = $RemoveBranch->RemoveBranch ( $user, $branch );
		
		return $result;
	
	}
	
	function EditBranch($user, $branch)/*æíÑÇíÔ æÇÍÏ*/ {
		
		$result = $EditBranch->EditBranch ( $user, $branch );
		
		return $result;
	
	}
	
	function GetAllBranches($company)/* åãå æÇÍÏ*/  {
		
		$result = $GetAllBranches->GetAllBranches ( $company );
		
		return $result;
	
	}
	
	function AddEmployeeByMaster($taskMaster, $employee)/*ÇÖÇÝå ˜ÑÏä ˜ÇÑãäÏ ÊæÓØ Master*/
{
		
		$result = $AddEmployeeByMaster->AddEmployeeByMaster ( $taskMaster, $employee );
		
		return $result;
	
	}
	
	function FireEmployeeByMaster($taskMaster, $employee) /*ÎÑÇÌ ˜ÇÇÑãäÏ ÊæÓØ master*/
{
		
		$result = $FireEmployeeByMaster->FireEmployeeByMaster ( $taskMaster, $employee );
		
		return $result;
	
	}
	
	function QuitFromCompany($user) {
		
		$result = $QuitFromCompany->QuitFromCompany ( $user );
		
		return $result;
	
	}
	
	function GetEmployees($user)/*˜ÇÑãäÏ ÏÇÏä */
{
		
		$result = $GetEmployes->GetEmployees ( $user );
		
		return $result;
	
	}
	
	function SortEmployeeListByName($employees) {
		sort ( $employees );
		return $employees;
	
	}
	
	function SortBranchListByName($branchs) /*ãÑÊÈ ÓÇÒí æÇÍÏåÇ ÈÇ ÇÓãÔæä*/ 
{
		sort ( $branchs );
		return $branchs;
	
	}

}
?> 