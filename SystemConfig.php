<?php
if (stristr(htmlentities($_SERVER["PHP_SELF"]), "SystemConfig.php")) {
	Header("Location: SystemConfig.php"); show_error(HACKING_ATTEMPT);
}


$dbhost = "localhost";
$dbuname = "goli_shake";  // Database username 
$dbpass = "eY1a9epZ9PI";	// Database password
$dbname = "goli_shake";	// Database NAME
$dbtype = "MySQL";//Database Type

?>