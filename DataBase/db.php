<?php
/**
 * @version		$Id: db.php 2012-05-06 14:10:00Z M.R.Sabernezhad $
 * @package		Shake.Framework

 
 */
if (stristr ( $_SERVER ['PHP_SELF'], "db.php" )) {
	Header ( "Location: ../index.php" );
	die ();
}

if (defined ( 'FORUM_ADMIN' )) {
	define ( "CORE_INCLUSION", "../../../" );
} elseif (defined ( 'INSIDE_MOD' )) {
	define ( "CORE_INCLUSION", "../../" );
} elseif (defined ( 'BRIDGE_MOD' )) {
	define ( "CORE_INCLUSION", "../" );
} else {
	define ( "CORE_INCLUSION", "./" );
}

switch ($dbtype) {
	
	case 'MySQL' :
		include ("DataBase/mysql.php");
		break;
	
	case 'mysql4' :
		include ("DataBase/mysql4.php");
		break;
	
	case 'sqlite' :
		include ("DataBase/sqlite.php");
		break;
	
	case 'postgres' :
		include ("DataBase/postgres7.php");
		break;
	
	case 'mssql' :
		include ("DataBase/mssql.php");
		break;
	
	case 'oracle' :
		include ("DataBase/oracle.php");
		break;
	
	case 'msaccess' :
		include ("DataBase/msaccess.php");
		break;
	
	case 'mssql-odbc' :
		include ("DataBase/mssql-odbc.php");
		break;
	
	case 'db2' :
		include ("DataBase/db2.php");
		break;

}

$db = new sql_db ( $dbhost, $dbuname, $dbpass, $dbname, false );
if (! $db->db_connect_id || ! file_exists ( "SystemConfig.php" )) {
echo 'Some Problem Are Here :-s';
}


?>