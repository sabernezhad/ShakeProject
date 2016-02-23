<?php
require_once 'function.php';
switch ($_REQUEST ['task']) {
	case 'login' :
		checkValidUser ();
		break;
	case 'register' :
		if (Islogin ())
			echo 'You already have registered';
		else
			Register ();
		break;
	case 'aboutpage' :
		ShowAboutPage ();
		break;
	case 'contactuspage' :
		ShowContactUsPage ();
		break;
	case 'helppage' :
		ShowHelpPage ();
		break;
	case 'logout' :
		Logout ();
		break;
	case 'profile' :
		ShowProfilePage ();
		break;
	case 'share_new':
		SaveAndShareNewPost();
		break;
	case 'showfivepost':
		ShowLastFivePost();
		//echo 'salam';
		break;
	
	
	case 'loginpage' :
	default :
		if (Islogin ())
			ShowMain ();
		else
			ShowLogin ();
		break;
}

?>