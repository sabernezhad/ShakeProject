<?php
/**
 * @package ShakeUI
 * @author M.R.Sabernezhad <mr.sabernezhad@gmail.com> 
 * @version 2.1.1 (july,18,2015)
 
 */

include "DOMAIN/User.php";
include ("BLL/UserBLL.php");

/**
 * Validating User
 * @return resultOfValidating(true,false)
 */
function CheckValidUser() {
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	$remember = $_POST ['remember'];
	// $user = new User ();
	// $user->UserName = $username;
	// $user->Password = $password;
	$userBLL = new UserBLL ();
	$result = $userBLL->Login ( $username, $password );
	// $result=UserBLL::Login($username,$password);
	if ($result [0] == true) {
		setcookie ( "user[uname]", $username, time () + 1800 );
		SetLastActivityTime ();
		echo true;
	} else {
		echo $result [1];
	}
}
/**
 * Every Time user do anything set last activity
 * @return nothing:d
 */
function SetLastActivityTime() {
	/*
	 * session_set_cookie_params((time()+3600)); session_start(); $sess =
	 * session_name(); setcookie($sess, session_id(), time() +3600);
	 */
	
	setcookie ( "user[lastactivity]", time (), time () + 1800 );
	setcookie ( "user[expire]", intval ( time () + 1800 ), time () + 1800 );
}

/**
 * Check user is login or not
 * @return result(true,false)
 */
function Islogin() {
	if (($_COOKIE ['user'] ['expire'] - $_COOKIE ['user'] ['lastactivity']) > 10) {
		return true;
	} else {
		return false;
	}
}
/**
 * include Shake Home Page
  */
function ShowMain() {
	include 'UI/Home and Report/Home.php';
}
/**
 * include Shake Login page
 */
function ShowLogin() {
	include 'UI/Login.php';
}
/**
 * User register 
 * @return array
 */
function Register() {
	include "DOMAIN/PersonalInformation.php";
	include "DOMAIN/Work.php";
	include "DOMAIN/Company.php";
	include "DOMAIN/Salary.php";
	
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	$confirmPassword = $_POST ['confirmPassword'];
	$userType = $_POST ['usertype'];
	
	if ($userType == "Employee") {
		
		$FirstName = $_POST ['FirstName'];
		$LastName = $_POST ['lastName'];
		$Birthday = $_POST ['birthday'];
		$Gender = $_POST ['gender'];
		$Tel = $_POST ['tel'];
		$Job = $_POST ['job'];
		$Email = $_POST ['email'];
		$Organization = $_POST ['organization'];
		$OrganizationCity = $_POST ['organizationCity'];
		// making opbject ans send it to BLL
		$user = new User ();
		$personal = new personalinformation ();
		$work = new Work ();
		//
		$user->UserName = $username;
		$user->Password = $password;
		$confirmpass = $confirmPassword;
		$user->Role = $userType;
		$user->Fname = $FirstName;
		$user->Lname = $LastName;
		$user->email = $Email;
		
		$personal->FirstName = $FirstName;
		$personal->LastName = $LastName;
		$birthdate = $Birthday;
		$personal->sex = $Gender;
		$personal->Phone = $Tel;
		
		$work->Name = $Job;
		$personal->Email = $Email;
		$work->Company = new Company ();
		$work->Company->Name = $Organization;
		$work->WorkCity = $OrganizationCity;
		$work->salary = new Salary ();
		
		$b = new UserBLL ();
		
		$a = $b->AddUser ( $user, $work, $personal, $confirmpass, $birthdate );
		
		if ($a [0] == true)
			echo "Registerd";
		else {
			echo "Please correct the following values:";
			$i = 0;
			foreach ( $a as $value ) {
				$i ++;
				echo $value . '<br>';
				if ($i > 4)
					break;
			}
		}
	
	} elseif ($userType == "Employer") {
		
		$FirstName = $_POST ['FirstName'];
		$LastName = $_POST ['lastName'];
		$Birthday = $_POST ['birthday'];
		$Gender = $_POST ['gender'];
		$Tel = $_POST ['post'];
		$Email = $_POST ['email'];
		$Organization = $_POST ['organization'];
		$OrganizationLocation = $_POST ['organizationLocation'];
		$Branch = $_POST ['branch'];
		$NumberBranch = $_POST ['numberBranch'];
		$OrganizationCity = $_POST ['organizationCity'];
		$OrganizationTel = $_POST ['organizationTel'];
		//
	} elseif ($userType == "LookingForJob") {
		$FirstName = $_POST ['FirstName'];
		$LastName = $_POST ['lastName'];
		$Birthday = $_POST ['birthday'];
		$Gender = $_POST ['gender'];
		$Tel = $_POST ['post'];
		$Email = $_POST ['email'];
		$Hometown = $_POST ['hometown'];
		$Education = $_POST ['education'];
		$Univarsity = $_POST ['university'];
		$Job = $_POST ['job'];
		$Nationality = $_POST ['nationality'];
		$Bachground = $_POST ['bachground'];
		$UploadResume = $_POST ['uploadResume'];
		$Proficiency = $_POST ['proficiency'];
		//
	}
}
/**
 * include About page
 */
function ShowAboutPage() {
	include 'UI/About.php';
}
/**
 * include ContactUs Page
 */
function ShowContactUsPage() {
	include 'UI/ContactUs.php';
}
/**
 * include help page
 */
function ShowHelpPage() {
	include 'UI/Help.php';
}
/**
 * Set cookie validation time to 1800 sec before for delete cookie
 */
function Logout() {
	setcookie ( "user[uname]", null, time () - 1800 );
	setcookie ( "user[lastactivity]", null, time () - 1800 );
	setcookie ( "user[expire]", null, time () - 1800 );
}
/**
 * include Profile page
 */
function ShowProfilePage() {
	include 'UI/Profile/Profile.php';
}
/**
 * Find Name and Family of login user
 * @param $type (how to retun 0 for echo | 1 for return)
 */
function PrintUserNameAndFamily($type) {
	$userinf = new UserBLL ();
	$userinfBack = $userinf->FindUserByUserName ( $_COOKIE ['user'] ['uname'] );
	if($type)
		return ($userinfBack ['FirstName'] . ' ' . $userinfBack ['LastName']);
	else
	echo $userinfBack ['FirstName'] . ' ' . $userinfBack ['LastName'];
}
/**
 * Find Name And Family Of Other User by UserID
 * @param interger $uid
 * @return string
 */
function PrintUserNameAndFamilyOther($uid)
{
	$uname=new UserBLL();
	$username=$uname->FindUsernameByUserID($uid);
	$userinfBack = $uname->FindUserByUserName ( $username[0]['username'] );
	return ($userinfBack ['FirstName'] . ' ' . $userinfBack ['LastName']);
	
}
/**
* Find Avatare of login user
 * @param $type (how to retun 0 for echo | 1 for return)
 */
function PrintUserAvatar($type) {
	$userinf = new UserBLL ();
	$userinfBack = $userinf->GetpersonalinfbyUsername ( $_COOKIE ['user'] ['uname'] );
	if($type)
		return ($userinfBack [0] ['ProfPic']);
	else
	echo $userinfBack [0] ['ProfPic'];
	// print_r($userinfBack);

}
/**
 * Find Avatar Of Other User by UserID
 * @param interger $uid
 * @return string
 */
function PrintOtherPostAvatar($uid)
{
	$uname=new UserBLL();
	$username=$uname->FindUsernameByUserID($uid);
	$userinfBack = $uname->GetpersonalinfbyUsername ($username[0]['username'] );

		return ($userinfBack [0] ['ProfPic']);
	
}
/**
 * Save new post of user And Show immediatly
 * @return string
 */
function SaveAndShareNewPost() {
	include_once 'BLL/PostBLL.php';
	include_once 'DOMAIN/Post.php';
	$content = $_POST ['content'];
	$user = new User ();
	$post = new Post ();
	$user->UserName = $_COOKIE ['user'] ['uname'];
	$post->Writer = $user->UserName;
	$post->Content = nl2br($content);
	//htmlspecialchars($string)
	//ht
	// $post->TimeSent="2012-07-13 18:35:00";
	
	$b = new PostBLL ();
	$a = $b->AddPost ( $post );
	
	if ($a [0] == true)
	{
		unset($postsinf);
		unset($lastpostinf);
		$postsinf=$b->FindPostByUser($user);
		$lastpostinf=$postsinf[0];
		$newpost = '
		<div id="post">
		<div id="chat" class=border-out>
		<div id="chat-date">
		<div id="chat-date-day">'.substr($lastpostinf['TimeSent'],5,2).'</div>
		<div id="chat-date-month">'.substr($lastpostinf['TimeSent'],8,2).'</div>
		</div>
		<!--end of chat date-->
		
		<div id="chat-body" class=border-in>
		
		<div id="chat-identity">
		<img id="chat-avatar" src="UI/Home and Report/images/'.PrintUserAvatar(1).'" />
		</div>
		
		<table id="postproperty">
		<tr>
		<td>
		<div id="chat-id"><font size="3px">'.PrintUserNameAndFamily(1).'</font></div>
		</td>
		</tr>
		<tr>
		<td>
		<div id="chat-status">Employee</div>
		</td>
		</tr>
		<tr>
		<td>
		<div id="chat-time">
		<img id="chat-clock"
		src="UI/Home and Report/images/chat-clock.png" />
		<div id="chat-digital-time">11:24 PM</div>
		</div>
		</td>
		</tr>
		</table>
		
		<div id="chat-txt"><br>
		'.$lastpostinf['Content'].'
		</div>
		<div id="chatmenu" class="Menus">
		<img id="chat-comment-pic"
		src="UI/Home and Report/images/commentIcon.png" title="Comment" />
		<img id="chat-like-pic" src="UI/Home and Report/images/starIcon.png"
		title="Like" /> <img id="chat-block-pic"
		src="UI/Home and Report/images/ignorIcon.png" title="Block" />
		</div>
		</div>
		</div>
		
		
		
		</div>';
		echo $newpost;
		
	}
	else {
		echo "Has Error!";
		print_r ( $a );
	
	}

	//print_r($lastpostinf);
	
	//echo '<br>';
	//print_r($b->FindPostByUser($user));
		
}
function ShowLastFivePost()
{
	include_once 'BLL/PostBLL.php';
	$numOFpost=$_POST['lastpostid'];
	$stream=new PostBLL();
	$lastpostsinf=$stream->Stream($_COOKIE ['user'] ['uname'], $numOFpost);
	
	for($i=0;$i<4;$i++){
		
	$posts .= '
	<div id="post">
	<div id="chat" class=border-out>
	<div id="chat-date">
	<div id="chat-date-day">'.substr($lastpostinf[$i]['TimeSent'],5,2).'</div>
	<div id="chat-date-month">'.substr($lastpostinf['TimeSent'],8,2).'</div>
	</div>
	<!--end of chat date-->
	
	<div id="chat-body" class=border-in>
	
	<div id="chat-identity">
	<img id="chat-avatar" src="UI/Home and Report/images/'.PrintOtherPostAvatar($lastpostsinf[$i]['UserID']).'" />
	</div>
	
	<table id="postproperty">
	<tr>
	<td>
	<div id="chat-id"><font size="3px">'.PrintUserNameAndFamilyOther($lastpostsinf[$i]['UserID']).'</font></div>
	</td>
	</tr>
	<tr>
	<td>
	<div id="chat-status">Employee</div>
	</td>
	</tr>
	<tr>
	<td>
	<div id="chat-time">
	<img id="chat-clock"
	src="UI/Home and Report/images/chat-clock.png" />
	<div id="chat-digital-time">11:24 PM</div>
	</div>
	</td>
	</tr>
	</table>
	
	<div id="chat-txt"><br>
	'.$lastpostinf[$i]['Content'].'
	</div>
	<div id="chatmenu" class="Menus">
	<img id="chat-comment-pic"
	src="UI/Home and Report/images/commentIcon.png" title="Comment" />
	<img id="chat-like-pic" src="UI/Home and Report/images/starIcon.png"
	title="Like" /> <img id="chat-block-pic"
	src="UI/Home and Report/images/ignorIcon.png" title="Block" />
	</div>
	</div>
	</div>
	
	
	
	</div>';
	}
	echo $posts;
}
?>