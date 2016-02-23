<?php
/** 
 * @author "King Hadi"
 * Last Update: 10 Tir 1391, 06:43:00 PM  
 * Co-Programmer: "Milad Baderan"
 */

require_once DOMAIN.php;

class FriendshipBLL {	
		  
	/**	 
	 * Parameters: 
	 * 	$sender -> User 
	 * 	$reciever -> User
	 * 	 
	 * Return Value:
	 * 	boolean - True if any changes happens and False otherwise
	 * 	 
	 * Exception:
	 * 	no exception thrown from this function.
	 */
	public function SendFriendshipRequest($sender,$reciever) {		
		if (TRUE) {
			// checks come here ...
			
			return false;			
		}else 
		{
			// create an instance of friendshipDAL ...
			$_friendshipDAL = new FriendshipDAL();

			// get a list of pending friendship requests of reciever ... 
			$_pendingFriendshipRequestsList = $_friendshipDAL->GetPendingFriendshipRequests($reciever);												
			
			// check if the user exists do not add it to the list and return false ...
			if (array_key_exists($sender, $_pendingFriendshipRequestsList)) {
				// return false because no changes happen ...
				return false;
			}
			// add the new user to the list ...
			$_pendingFriendshipRequestsList[] = $sender;

			// update the reciever request list in database. Keep the result of this operation in a bool variable ...
			$_returnValue = $_friendshipDAL->UpdatePendingFriendshipRequests($reciever, $_pendingFriendshipRequestsList);
			
			// notify the UI about applying the change in success condition true and false otherwise ...
			return $_returnValue;
		}
	}
	
	/**
	 * Parameters: 
	 * 	$reciever -> User
	 * 
	 * Return Value:
	 * 	array - a list of users have pending request(at least one item with index "error" exists). 
	 * 			A one-item array with "error" index set to NULL if no item exists in pending list.
	 * 
	 *		    <b>NOTIC</b>: "error" index will set to NULL when there is no error with arguments 
	 * 						   and set to "ERROR" when there exits at least an error.
	 *  
	 * Exceptoin:
	 * 	no exception thrown from this function.
	 */
	public function GetPendingFriendshipRequests($reciever)
	{
		if (TRUE) {
			// checks come here ...			
			
			// "error" index set to "ERROR" because there exists at least an error in arguments ...
			$_listOfPendingFriendshipRequests["error"] = "ERROR";
			
			// return the pending request list with "error" index set to "ERROR" ...
			return $_listOfPendingFriendshipRequests;
		}else 
		{
			// create an instance of friendshipDAL ...
			$_friendshipDAL = new FriendshipDAL();
			
			// get a list of pending friendship request ...
			$_listOfPendingFriendshipRequests = $_friendshipDAL->GetPendingFriendshipRequests($reciever);
			
			// "error" index set to NULL because there exists no error in process ...
			$_listOfPendingFriendshipRequests["error"] = NULL;
			
			// return the list to the UI ...
			return $_listOfPendingFriendshipRequests;
		}
	}
	
	/**
	 * Parameters: 
	 * 	$sender -> User 
	 * 	$reciever -> User
	 * 
	 * Return Value:
	 * 	boolean - True if the request is accepted without error. False otherwise.
	 * 
	 * Exception:
	 * 	no exception thrown from this function.
	 */
	public function AcceptFriendshipRequest($reciever, $sender) {
		if (TRUE) {
			// checks come here ...
			return false;
		}else 
		{
			// create an instance of friendshipDAL ...
			$_friendshipDAL = new FriendshipDAL();
			
			// get the list of pending friendship requests ...
			$_listOfPendingFriendshipRequests = $_friendshipDAL->GetPendingFriendshipRequests($reciever);

			// checks that this user exists in the list or not and if the friendship request exists for this sender. Return false if not exits ...			
			if (is_null($_listOfPendingFriendshipRequests) || !array_key_exists($sender, $_listOfPendingFriendshipRequests)) {
				// return false because no changes happened ...
				return false;
			}
			
			// remove the sender user from pending friendship request ...
			unset($_listOfPendingFriendshipRequests[$sender]);
			
			// update the list of pending request of reciever ...
			$_friendshipDAL->UpdatePendingFriendshipRequests($reciever, $_listOfPendingFriendshipRequests);
			
			// add the sender user to the friend list of reciever ...
			$_friendshipDAL->AddFriend($reciever, $sender);
			
			// add the reciever to the sender list of friends ...
			$_friendshipDAL->AddFriend($sender, $reciever);
			
			// returns true because changes applied ...
			return true;
		}	
	}
	
	/**
	 * Parameters:
	 * 	$sender -> User
	 * 	$reciever -> User
	 *
	 * Return Value:
	 * 	boolean - True when the request rejected successfuly and False otherwise.
	 *
	 * Exception:
	 * 	no exception thrown from this function.
	 */
	public function RejectFriendshipRequest($reciever, $sender) {
		if (TRUE) {
			// checks come here ...
			return false;
		}else 
		{
			// create an instance of friendshipDAL ...
			$_friendshipDAL = new FriendshipDAL();
						
			// get the list of pending friendship requests ...
			$_listOfPendingFriendshipRequests = $_friendshipDAL->GetPendingFriendshipRequests($reciever);
			
			// checks that this user exists in the list or not and if the sender is in the pending friendship request list. Return false if not exits ...
			if (is_null($_listOfPendingFriendshipRequests) || array_key_exists($sender, $_listOfPendingFriendshipRequests)) {
				// return false because no changes happen ...
				return false;
			}
				
			// remove the sender user from pending friendship request ...
			unset($_listOfPendingFriendshipRequests[$sender]);
				
			// update the list of pending request of reciever ...
			$_friendshipDAL->UpdatePendingFriendshipRequests($reciever, $_listOfPendingFriendshipRequests);
			
			// returns true because changes applied ... 
			return true;
				
		}
	}
	
	/**
	 * Parameters:
	 * 	$user -> User
	 * 	$friend -> User
	 *
	 * Return Value:
	 * 	boolean - True if removes successfuly False otherwise ...
	 *
	 * Exception:
	 * 	no exception thrown from this function.
	 */
	public function DeFriend($user, $friend) {
		if (TRUE) {
			// checks come here ...
			return false;
		}else 
		{
			// create an instance of friendshipDAL ...
			$_friendshipDAL = new FriendshipDAL();
			
			// get the list of all friends ...
			$_listOfAllFriends = $_friendshipDAL->GetAllFriends($user);
			
			// check to see the friend exits or not ...
			if (is_null($_listOfAllFriends) || array_key_exists($friend, $_listOfAllFriends)) {
				// return false because no deletion occured ...
				return false;
			}
			
			// remove the $friend user from friend list of $user ... 
			$_friendshipDAL->Defriend($user, $friend);
			
			// add the $friend user to the blocked-user list attribute ...
			$BlockedUsers[] = $friend;
						
			// removes successfuly ...
			return true;
			
		}			
	}
	
	/**
	 * Parameters:
	 * 	$user -> User
	 *
	 * Return Value:
	 * 	array[FriendUser] - a list of friends if there exists at least one friend(at least one item with index "error" exists).
	 *						A one-item array with "error" index set to NULL if no item exists in friends list.	 
	 * 						
	 * 						<b>NOTIC</b>: "error" index will set to NULL when there is no error with arguments 
	 * 										and set to "ERROR" when there exits at least an error.  
	 *
	 * Exception:
	 * 	no exception thrown from this function.
	 */
	public function GetAllFriends($user) {
		if (TRUE) {
			// checks come here ...
			
			// set the "error" index to NULL when there is an error with arguments ...
			$_returnArray["error"] = "ERROR";
			
			// returns an array with "error" indec set to NULL ...
			return $_returnArray;
		}else
		{			
			// create an instance of friendshipDAL ...
			$_friendshipDAL = new FriendshipDAL();
			
			// get the list of all friends ...
			$_listOfAllFriends = $_friendshipDAL->GetAllFriends($user);
			
			// set the "error" index to NULL when there is no error with arguments ... 
			$_listOfAllFriends["error"] = NULL;
			
			// returns list of friends to the UI ...			
			return $_listOfAllFriends;
		}
	}
	
	/**
	 * Parameters:
	 * 	$user -> User
	 * 	$name -> String
	 *
	 * Return Value:
	 * 	array[FriendUser] - a list of found friends searched by name(at least one item with index "error" exists).
	 * 						A one-item array with "error" index set to NULL if no item exists in the list.	 
	 * 						
	 * 						<b>NOTIC</b>: "error" index will set to NULL when there is no error with arguments 
	 * 										and set to "ERROR" when there exits at least an error.
	 *
	 * Exception:
	 * 	no exception thrown from this function.
	 */
	public function FindFriendByName($user, $name) {
		if (TRUE) {
			// checks come here ...
			
			// set the "error" attribute to "ERROR" when there exits at least an error with arguments ...
			$_returnValue["error"] = "ERROR";
			return $_returnValue;
		}else 
		{
			// create an instance of friendshipDAL ...
			$_friendshipDAL = new FriendshipDAL();
				
			// get the list of all friends ...
			$_listOfAllFriends = $_friendshipDAL->GetAllFriends($user);
			
			// check that the list is null or not ... 
			if (is_null($_listOfAllFriends)) {
				// return value. A friendUser type  ...
				$_friendUserList["error"] = NULL;
				return $_friendUserList;
			}
						
			// temp PersonalInformatin class var ...
			$_personInfo = new PersonalInformation();
			
			// fetch the first name and last name of the user ...
			foreach ($_listOfAllFriends as $_friend) {
				
				// split the given name from space character ...							
				list($fname,$lname) = split(" ",$name);
				
				// casting types ...
				$_personInfo = $_friend;
				
				// looking for the same name ... 
				if ($_personInfo->FirstName === $fname && $_personInfo->LastName === $lname) {
					$_friendUserList[] = $_friend;									
				}
			}					
			
			// return value. A friendUser type  ...
			$_friendUserList["error"] = NULL;
			
			// return list of found friend ... 
			return $_friendUserList;
		}
	}
	
	/**
	 * Parameters:
	 * 	$uesr -> User
	 * 	$jobTitle -> String
	 *
	 * Return Value:
	 * 	array[FriendUser] - a list of found friend searched by job title(at least one item with index "error" exists).
	 *						A one-item array with "error" index set to NULL if no item exists in the list.	 
	 * 						
	 * 						<b>NOTIC</b>: "error" index will set to NULL when there is no error with arguments 
	 * 										and set to "ERROR" when there exits at least an error.
	 *
	 * Exception:
	 * 	no exception thrown from this function.
	 */
	public function FindFriendByJobTitle($user, $jobTitle) {
		if (TRUE) {
			// checks come here ...
						
			// set the "error" attribute to "ERROR" when there exits at least an error with arguments ...
			$_returnValue["error"] = "ERROR";
			return $_returnValue;
		}else
		{
			// create an instance of friendshipDAL ...
			$_friendshipDAL = new FriendshipDAL();
			
			// get the list of all friends ...
			$_listOfAllFriends = $_friendshipDAL->GetAllFriends($user);
									
			// check that the list is null or not ...
			if (is_null($_listOfAllFriends)) {
				// return value. A friendUser type  ...
				$_friendUserList["error"] = NULL;
				return $_friendUserList;
			}
			
			// create a return list of friends ...
			$_friendUserList = array();
			
			// check for match ones ...
			foreach ($_listOfAllFriends as $_friend) {
				
				if ($_friend->role->Name === $jobTitle) {
					$_friendUserList[] = $_friend;																		
				}
			}						
			
			// return value. A friendUser type  ...
			$_friendUserList["error"] = NULL;
			
			// return the list of friends ...
			return $_friendUserList;
		}
	}
	
	/**
	 * Parameters:
	 * 	$friends -> array[FriendUser]
	 * 	
	 * Return Value:
	 * 	array[FriendUser] - a list of sorted friend user(at least one item with index "error" exists).
	 * 						A one-item array with "error" index set to NULL if no item exists in the list.	 
	 * 						
	 * 						<b>NOTIC</b>: "error" index will set to NULL when there is no error with arguments 
	 * 										and set to "ERROR" when there exits at least an error.
	 *
	 * Exception:
	 * 	no exception thrown from this function.
	 */
	public function SortFriendsByName($friends) {
		if (TRUE) {
			// checks come here ...
		
			// set the "error" attribute to "ERROR" when there exits at least an error with arguments ...
			$_returnValue["error"] = "ERROR";
			return $_returnValue;
		}
		else
		{
			// sort the list using default sort ...
			ksort($friends);		

			// return the sorted item ...
			return $friends;
		}
	}
	
	
	function __construct() {	
		// TODO - Insert your code here
	}
	
	/**
   	*	 
    */
    function __destruct() {	
		// TODO - Insert your code here
	}
}
?>