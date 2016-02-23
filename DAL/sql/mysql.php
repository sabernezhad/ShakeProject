<?PHP
/** 
 * @Author:"Hamid Reza Abdi" 
 * @Co-Programmer:"MRs Esmaeli And MRs Khalili"
 * @Version:1.0
 */
 //config database:
define ("DBHOST", "localhost"); 
define ("DBNAME", "goli_shake");
define ("DBUSER", "goli_shake");
define ("DBPASS", "5hIf2mDQLZW");  
define ("COLLATE", "utf8"); 

if ( true )
{
	include_once( "mysqli.class.php" );
}
else
{
	include_once( "mysql.class.php" );
}
		
/*class Basedb{
	protected $db=null;
	function __construct() {
       $this->db=new db();
	}
}*/
?>