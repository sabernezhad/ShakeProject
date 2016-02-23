<?php
require_once 'function.php';
if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	if (checkValidUser ( $_POST ['username'], $_POST ['password'] ))
	{
		setcookie ( 'valid_user', true );
		echo 'Your validation was successful';
	}
	else 
	{
		echo 'invalid username or password';
	}

}
?>