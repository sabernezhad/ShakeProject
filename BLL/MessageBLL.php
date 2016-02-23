<?php

/**
 *  @package ShakeBLL
 *  @package ShakeDAL
 *  @package DOMAIN
 */
class MessageBLL {
    /**
     * @auther {NAME} {EMAIL}
     * @version {start at 1.0} {date}
     */
	private $MessageDAL;
	
	public function MessageDAL(){
		$MessageDAL = new MessageDAL();
	}
	
	public function SendMessage($msg ){
		$errorList = IsValid($msg);
		$msg->IsRead = false;
		if(count($errorList) == 0 ) {
			SendMessage($msg);
		}
		return $errorList;
		
	}
	private function IsValid($msg){
		$errorMessageList = array();
		if($msg->Title == ""){
			$errorMessageList[] = 'Title must be filled';
		}
		if($msg->Content == ""){
			$errorMessageList[] = 'Content must be filled';
		}
		if($msg->Title == ""){
			$errorMessageList[] = 'Title must be filled';
		}
		return $errorMessageList;
	}
	public function MarkMessageAsRead($msg ){
		if($msg->IsRead == false){
			$MessageDAL->MarkMessageAsRead($msg);
			return true;
		}
		return false;
	}

	public function MarkMessageAsUnRead($msg ){
		if($msg->IsRead == true){
			$MessageDAL->MarkMessageAsUnRead($msg);
			return true;
		}
		return false;
	}
	public function ReplyToMessage($msg ){
		if($msg != null ){
			$MessageDAL->ReplyToMessage($msg);
		}
	}
	
	public function DeleteMessage($msg){
		if($msg != null ){
			$MessageDAL->DeleteMessage($msg);
		}
	}
	
	public function GetMessageBySenderUserName($userName , $reciever ){
		$userBll= new UserBLL();
		if($userName != null && count($userBll->IsValid($reciever)) == 0){
			$MessageDAL->GetMessageBySenderUserName($userName , $reciever);
		}
	}
	
	public function GetAllMessages($reciever ){
		$userBll = new UserBLL();
		if(count($userBll->IsValid($reciever)) == 0){
			return $MessageDAL->GetAllMessages($reciever);
		}
		else return null;
	}
	public function SortMessagesByTime($messages ){
		usort($messages, function($a, $b) {
			return strtotime($a['dateTime']) - strtotime($b['dateTime']);
		});
	}
	
	
	
	
}

?>