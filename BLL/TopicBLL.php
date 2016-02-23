<?php
/**
 *  @package ShakeBLL
 */
class Topic {
	/**
	 *
	 * @author hakime ghasemi <ghasemi.hakimeh@yahoo.com>
	 *         fateme naderi <fatemeh_naderi_swg@yahoo.com>
	 * @version 1.0
	 *          akharin taghirat (91/4/10)
	 */
	function AddTopic($topic) {
		/*
		 * obj az topic dar package DAL
		 */
		$_topicDAL = new TopicDAL ();
		
		/*
		 * age topic morede nazar title nadasht addtopic anjam nemishavad
		 */
		if ($tapic->title == "") {
			return false;
		} else {
			
			/*
			 * farakhani method marbut be addtopic dar DAL
			 */
			$_topicDAL->AddTopic ( $topic );
			
			return true;
		}
	}
	
	function EditTopic($topic) {
		
		/*
		 * obj az topic dar package DAL
		 */
		$_topicDAL = new TopicDAL ();
		
		/*
		 * age topic morede nazar title nadasht edittopic anjam nemishavad
		 */
		if ($tapic->title == "") {
			
			return false;
		
		} else {
			
			/*
			 * farakhani methode edittopic dar DAL
			 */
			
			$_topicDAL->EditTopic ( $topic );
			
			return true;
		}
	}
	
	function DeleteTopic($topicId) {
		/*
		 * obj az topic dar package DAL
		 */
		$_topicDAL = new TopicDAL ();
		
		/*
		 * age delet dar DAL ba movafaghiyat anjam shod true bar migardad
		 */
		if ($_topicDAL ( $topicID )) {
			
			return true;
		
		} 		

		/*
		 * age delete dar DAL movafag nabud false bar migardad
		 */
		else {
			return false;
		}
	}
	
	function FindByName($topicName) {
		/*
		 * obj az topic dar package DAL
		 */
		$_topicDAL = new TopicDAL ();
		
		/*
		 * agar topicname vared shode bud findbyname dar DAL farakhani mishavad
		 */
		if (topicName != "") {
			$returnList = $_topicDAL->FindByName ( $topicName );
			
			/*
			 * dar andis error null vared mishavad agar sharayetbar gharar bud
			 */
			$returnList ["error"] = null;
			
			/*
			 * list mavarede peyda shode bargardande khahad shod
			 */
			return $returnList;
		} else {
			
			/*
			 * dar in halat ke sharayet monaseb nist dar andise "erroe" dar list
			 * morede nazar error vared mishavad"
			 */
			$returnList ["error"] = "error";
			
			/*
			 * list morede nazar bargardande mishavad
			 */
			return $returnList;
		}
	}
	
	function FindByCreateTime($date) {
		/*
		 * obj az topic dar package DAL
		 */
		$_topicDAL = new TopicDAL ();
		
		/*
		 * age tarikh entekhab shode bud farakhani DAL surat migirad
		 */
		if ($date != "") {
			
			/*
			 * farakhani methode FindByCreateTime dar DAL
			 */
			$returnList = $_topicDAL->FindByCreateTime ( $date );
			$returnList ["error"] = NULL;
			return $returnList;
		} else {
			
			/*
			 * dar in halat ke sharayet monaseb nist dar andise "erroe" dar list
			 * morede nazar error vared mishavad"
			 */
			$returnList ["error"] = "error";
			
			/*
			 * list morede nazar bargardande mishavad
			 */
			return $returnList;
		}
	
	}
	
	// tozih bekhah
	function GetTopicsBySocity($socity) {
		/*
		 * obj az topic dar package DAL
		 */
		$_topicDAL = new TopicDAL ();
		
		/*
		 * dar surate bargharar budane sharayet
		 */
		{
			
			/*
			 * farakhani method Get.... DAL
			 */
			$returnList = $_topicDAL->GetTopicBySocity ( $socity );
			
			/*
			 * dar return list dar andis erroe NULL vared mikonad
			 */
			$returnList ["error"] == NULL;
			
			/*
			 * liste marbute ra barmigardanad
			 */
			return $returnList;
		}
		
		/*
		 * dar hali ke sharayet bargharar nabud
		 */
		{
			
			/*
			 * dar andis error error garar midahad
			 */
			$returnList ["error"] = "error";
			
			/*
			 * list marbute ra barmigardanad
			 */
			return $returnList;
		}
	
	}
	
	function SortTopic($Topics) {
		/*
		 * list topics ra moratab mikonad be surate default
		 */
		ksort ( $topics );
		
		/*
		 * list moratab shode ra bar migardanad
		 */
		return $topics;
	}
	
	function GetAll() {
		/*
		 * obj az topic dar package DAL
		 */
		$_topicDAL = new TopicDAL ();
		
		/*
		 * farakhani methode GetAll az DAL
		 */
		$returnList = $_topicDAL->GetAll ();
		
		/*
		 * liste marbute bargardande khahad shod
		 */
		return $returnList;
	}

}
?>