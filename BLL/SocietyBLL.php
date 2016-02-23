<?php

/**
 *  @package ShakeBLL
 *  @package ShakeDAL
 *  @package DOMAIN
 */
class SocietyBLL {
    /**
     * @auther Amir hosein jelodari
     * @version 1390/4/17
     */
	private $SocietyDAL;
	

        public function __construct() {
            $this->SocietyDAL = new SocietyDAL();
	}
	
	public function FindSocietyByName($name){
		if($name == "") return null;
		return $this->SocietyDAL->FindSoceityByName($name);
                
	}
	
	public function GetAllSocieties(){
		return  $this->SocietyDAL->GetAllSocieties();
	}
	
	public function FindSocietyByDate($date){
		if($date == null) return null;
		return $this->SocietyDAL->FindSoceityByDate($date);
	}
	public function FindSocietyByCategory($category){
		if($category == "") return null;
		return $this->SocietyDAL->FindSoceityByCategory($category);
	}
	
	//SendRequestForCreation like Create Society?!!!!
	public function SendRequestForCreation($society){
		$errorList = IsValid($society);
		if(count($errorList) == 0) $this->SocietyDAL->CreateSociety($society);
		return $errorList;
	}
	private function IsValid($society){
		$errorSocietyList = array();
		if($society->Title == ""){
			$errorSocietyList[] = 'Title must be filled';
		}
		if($society->Category == ""){
			$errorSocietyList[] = 'Category must be filled';
		}
		return $errorSocietyList;
	}
	
	
	
	
	
}

?>