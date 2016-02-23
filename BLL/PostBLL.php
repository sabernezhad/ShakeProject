<?php

/**
 *  @package ShakeBLL
 */
include_once 'DAL/PostDAL.php';
include_once 'DAL/UserDAL.php';
include_once 'DOMAIN/User.php';
include_once 'DOMAIN//Post.php';


class PostBLL {
	/**
	 *
	 * @author hakime ghasemi <ghasemi.hakimeh@yahoo.com> and
	 *         fateme naderi <fatemeh_naderi_swg@yahoo.com>
	 * @version 1.0
	 *          akharin taghirat (91/4/11)
	 */
	public function UserDAL(){
		$this->UserDAL = new UserDAL();
	
	}
	
	public function Stream($username,$numOFpost)
	{
		$user=new User();
		$userDAL=new UserDAL();
		$postDAL=new PostDAL();
		$this->UserDAL();
		$user=$this->UserDAL->GetUserByUserName($username);
	
		$returnList = $postDAL->GetAllPost($user,$numOFpost);
	
		return $returnList;
	}
	
	public function AddPost($post)//post writer=username va content va timesend dare bayad userid ham bashe 
	{
		$postDAL = new PostDAL ();
		$userDAL=new UserDAL();
		//$user_temp=new User();
		$user=new User();
		$errorList=array();
		if ($post->Content != "")
		{
			$user_temp=$userDAL->GetUserByUserName($post->Writer);
			if($userDAL->GetUserByUserName($post->Writer))
			{
				$user->ID=$user_temp['ID'];
				if($postDAL->AddPost ( $post,$user ))
				{
					$errorList[0]=true;
				}
				else
				{
					$errorList[0]=false;
					$errorList[1] = 'Error in Adding Post!';
					return $errorList;
				}
			}
			else
			{
				$errorList[0]=false;
				$errorList[1] = 'User is not valid';
				return $errorList;
			}
		}
		else 
		{
			$errorList[0]=false;
			return $errorList;
		}
		return $errorList;
	}
	/**
	 * *************************************************
	 */
	public function EditPost($post) {
		/*
		 * obj az post dar package DAL
		 */
		$_post = new PostDAL ();
		
		if ($post->title == ""   /*agar poste ersal shode title nadasht*/
 || $post->content == "" /*ya content marbut be post zamane edite khali bud*/
 )
{
			
			/*
			 * edite ba movafaghiyat anjam nemishavad
			 */
			return false;
		} else {
			
			/*
			 * edite ba movafaghiyat anjam mishavad
			 */


/*farakhani method marbut be EditPost dar DAL*/
$_post->EditPost ( $post );
			
			return true;
		}
	}
	
	/**
	 * **************************************************
	 */
	public function DeletePost($post) {
		
		$_post = new PostDAL (); /*
		                       * obj az package DAL
		                       */


/*nafahmidam manzuresh az bargashtan in string chiye*/
 		$string = "";
		
		/*
		 * farakhani methode marbut be Delete dar DAL
		 */
		$_post->DeletePost ( $post );
		
		return $string;
	}
	
	/**
	 * **************************************************
	 * @param USER $user
	 */
	public function FindPostByUser($user) {
		
		$_postDAL = new PostDAL (); /*
		                          * obj az package DAL
		                          */

        $u=new UserDAL();
        $us=$u->GetUserByUserName($user->UserName);
        $user->ID=$us['ID'];
        

/*baraye search kardan bayad faghat username ra vared konad*/
		if ($user->UserName != "")/*agar in username mokhalefe karactere khali bud va khast find konad*/
         {
			
			/*
			 * farakhani method marbut be FindPostByUser dar DAL
			 */
         	
			$returnList = $_postDAL->FindPostsBySender ( $user );
			
			return $returnList; /*
			                     * post haye shakhse morede nazar ra bar migardanad
			                     */
		}
	
	}
	
	/**
	 * **************************************************
	 */
	public function FindPostByTitle($postTitle) {
		$_postDAL = new PostDAL (); /*
		                          * obj az package DAL
		                          */

/*baraye search kardan bayad faghat title ra vared konad*/
		if ($postTitle != "") {
			
			/*
			 * farakhani method marbut be FindPostByTitle
			 */
			$returnList = $_postDAL->FindPostByTitle ( $postTitle );
			
			return $returnList; /*
			                     * list post hayi ba title vared shode ra bar
			                     * migardanad
			                     */
		}
	}
	
	/**
	 * *************************************************
	 */
	public function FindPostByDate($date) {
		
		$_postDAL = new PostDAL (); /*
		                          * obj az package DAL
		                          */
		
		if ($date != "")/*hatman bayad tarikh entekhab shavad ta find anjam shavad*/
 {
			
			/*
			 * farakhani method FindPotByDate dar DAL
			 */
			$returnList = $_postDAL->FindPostByDate ( $date );
			
			return $returnList; /*
			                     * list post haye marbut be tarekhe vared shode ra
			                     * barmigardanad
			                     */
		}
	}
	
	/**
	 * *************************************************
	 */
	public function FindPostByTopic($topic) {
		$_postDAL = new PostDAL (); /*
		                          * obj az package DAL
		                          */
		
		if ($topic->title != "")/*hatman bayad topic vared shode bashad*/
{
			
			/*
			 * farakhani methode FindPostByTopic dar DAL
			 */
			$returnList = $_postDAL->FindPostByTopic ( $topic );
			
			return $returnList; /*
			                     * list post haye ba topic morede nazar ra bar
			                     * migardanad
			                     */
		}
	}
	
	/**
	 * *************************************************
	 */
	public function Sort($post) {
		
		/*
		 * farakhani methode marbut be Sort dar DAL
		 */
		ksort ( $post );
		
		return $post; /*
		               * list post haye sort shode ra barmigardanad
		               */
	
	}
	
	/**
	 * *************************************************
	 */
	public function AddComment($cmt) {
		$_postDAL = new PostDAL (); /*
		                          * obj az package DAL
		                          */
		
		if ($cmt->Messege == "") {
			
			/*
			 * agar messege vared nashode bud AddComment ejra nakhahad shod
			 */
			return false;
		} 

		else {
			
			/*
			 * farakhani method AddCOmment dar DAL
			 */
			$_postDAL->AddComment ( $cmt );
			
			return true;
		}
	}
	
	/**
	 * *************************************************
	 */
	public function EditComment($cmt) {
		
		$_postDAL = new PostDAL (); /*
		                          * obj az package DAL
		                          */
		
		if ($cmt->Messege == "") {
			/*
			 * age messege vared nashod
			 */
			return false;
		} 

		else {
			
			/*
			 * farakhani method EditComent dar DAL
			 */
			$_postDAL->EditComment ( $cmt );
			
			return true;
		}
	}
	
	/**
	 * *************************************************
	 */
	public function DeleteComment($cmt) {
		
		$_postDAL = new PostDAL (); /*
		                          * obj az package DAL
		                          */

/*farakhani method DeleteComent dar DAL*/
		if ($_postDAL->DeleteComment ( $cmt )) {
			
			return true;
		} 

		else {
			return false;
		}
	
	}
	
	/**
	 * *************************************************
	 */
	public function GetAllPostComment($post) {
		$postDAL = new PostDAL (); /*
		                          * obj az package DAL
		                          */

/*farakhani methode GetAllPostComent dar DAL*/
		$returnList = $postDAL->GetAllPostComment ( $post );
		
		return $returnList; /*
		                     * tamame coment haye post ra barmigardanad
		                     */
	}
	
	/**
	 * *************************************************
	 */
	public function AddFile($post, $File) {
		/*
		 * file bz mishavad
		 */
		$S = fopen ( $File, "a" );
		
		/*
		 * agar file natavanest kamel baz shavad false bar gardande khahad shod
		 */
		if (! $S) {
			return false;
		} else {
			/*
			 * $post ra be akhare file ezafe mikonad
			 */
			fwrite ( $S, $post );
			
			/*
			 * file baste mishavad
			 */
			fclose ( $S );
			
			return true;
		}
	
	}
	
	/**
	 * ********************************************
	 */
	
	public function ChangeFile($post, $file) {
		
		/*
		 * file ra baz mikonad
		 */
		$D = fopen ( $file, "a" );
		
		/*
		 * agar file baz nashode bashad false bar migardanad
		 */
		if (! $D) {
			return false;
		}
		
		/*
		 * $post ra be entehaye file ezafe mikonad
		 */
		fwrite ( $D, $post );
		
		/*
		 * moteghaye file dar post ra barabare file D gharar midahad
		 */
		$post->File = $D;
		
		/*
		 * file D ra mibandad
		 */
		fclose ( $D );
		
		return true;
	
	}
	
	// bepors************************************8
	public function RemoveFile($post) {
		
		/*
		 * nemidunam chikaresh konam
		 */
		return true;
	}
}
?>