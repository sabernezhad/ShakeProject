<?php

/**
 * @author "King Hadi"
 * @author "Milad Baderan"
 * @author "hakime ghasemi" <ghasemi.hakimeh@yahoo.com> 
 * @author "fateme naderi" <fatemeh_naderi_swg@yahoo.com>
 * 
 */


/** 
 * @author "King Hadi"
 * Last Update: 18 Tir 1391, 06:43:00 PM  
 * Co-Programmer: "Milad Baderan"
 */

require_once PosterDAL.php;
require_once UserDAL.php;
require_once CompanyDAL.php;

class PosterBLL {

	function __construct() {
		;
	}
			
    function __destruct() {
		;
	}
	/**
	 * Parameters:
	 * 	$user -> User
	 * 	$poster -> Poster
	 *
	 * Return Value:
	 * 	boolean - True if any posts created and False otherwise.
	 *
	 * Exception:
	 * 	no exception is thrown from this function.
	 */
	function CreatePoster($user, $poster){
		if (TRUE) {
			// checks come here ...
			;
		}else {

			// create an instance of PosterDAL for connecting to the database ...
			$_posterDAL = new PosterDAL(); 
			
			// create an instance of UserDAL for verifying user existance ...
			$_userDAL = new UserDAL();
			
			// get all the users available ...
			$_listOfUsers = $_userDAL->GetALLUsers();
			
			// checking the existance of the user ...
			if (is_null($_listOfUsers) || !array_key_exists($user, $_listOfUsers) || is_null(trim($poster))) {
				// return false because no poster was created ...
				return Flase;								
			}

			// create poster in database by calling its related function and saving its result ...
			$_returnValue = $_posterDAL->CreatePoster($user, $poster);		
				
			// return the result of database transaction to UI ...
			return $_returnValue;
		}		
	}
	
	/**
	 * Parameters:
	 * 	$user -> User
	 * 	$poster -> Poster
	 *
	 * Return Value:
	 * 	boolean - True if any posts edited and False otherwise.
	 *
	 * Exception:
	 * 	no exception is thrown from this function.
	 */
	function EditPoster($user,$poster) {
	if (TRUE) {
			// checks come here ...
			;
		}else {

			// create an instance of PosterDAL for connecting to the database ...
			$_posterDAL = new PosterDAL(); 
			
			// create an instance of UserDAL for verifying user existance ...
			$_userDAL = new UserDAL();
			
			// get all the users available ...
			$_listOfUsers = $_userDAL->GetALLUsers();
			
			// checking the existance of the user ...
			if (is_null($_listOfUsers) || !array_key_exists($user, $_listOfUsers) || is_null(trim($poster))) {
				// return false because no poster was created ...
				return Flase;								
			}
			
			// edit the post in the database by calling its appripiate function and saving the result ... 
			$_returnValue = $_posterDAL->EditPoster($user, $poster);
			
			// return value of transaction in database ...
			return $_returnValue;

		}
	}
	
	/**
	 * Parameters:
	 * 	$user -> User
	 * 	$poster -> Poster
	 *
	 * Return Value:
	 * 	boolean - True if any posts deleted and False otherwise.
	 *
	 * Exception:
	 * 	no exception is thrown from this function.
	 */
	function DeletePoster($user, $poster) {
	if (TRUE) {
			// checks come here ...
			;
		}else {

			// create an instance of PosterDAL for connecting to the database ...
			$_posterDAL = new PosterDAL(); 
			
			// create an instance of UserDAL for verifying user existance ...
			$_userDAL = new UserDAL();
			
			// get all the users available ...
			$_listOfUsers = $_userDAL->GetALLUsers();
			
			// checking the existance of the user and verifying poster ...
			if (is_null($_listOfUsers) || !array_key_exists($user, $_listOfUsers) || is_null(trim($poster))) {
				// return false because no poster was created ...
				return Flase;								
			}
			
			// delete the post from database and saving its result ...
			$_returnValue = $_posterDAL->DeletePoster($user, $poster);
			
			// return the result of database transaction ...
			return $_returnValue;
		}
	}
	
	/**
	 * Parameters:
	 * 	$name -> String
	 *
	 * Return Value:
	 * array[Poster] - a list of posters (at least one item with index "error" exists). this list shows all the posts created by company
	 * 					sepecified by its name.
	 * 					A one-item array with "error" index set to NULL if no item exists in the list.	 
	 * 						
	 * 					<b>NOTIC</b>:   1) "error" index will set to NULL when there is no error with arguments.
	 * 									2) "error" index will set to "ERROR" when there exits at least an error.
	 * 									3) "error" index will set to "NO_COMPANY" when there is no comapny with the specified name.
	 *
	 * Exception:
	 * 	no exception is thrown from this function.
	 */
	function GetPostersByCompanyName($name) {
		if (TRUE) {
			// checks come here ...
			
			// set the "error" attribute to "ERROR" when there exits at least an error with arguments ...
			$_returnValue["error"] = "ERROR";
			return $_returnValue; 			
		}else {

			// create an instance of PosterDAL for connecting to the database ...
			$_posterDAL = new PosterDAL(); 
			
			// create an instance of CompanyDAL for verifying company existance ...
			$_companyDAL = new CompanyDAL();
			
			// get all the companies available ...
			$_listOfCompanies = $_companyDAL->GetAllCompanies();
						
			// temp var for detecting the existance of company name ...
			$_foundCompany = false;
			
			// checking the existance of the company ...
			foreach ($_listOfCompanies as $_company) {
				
				// checks companies according to thier names, return false if cannot find the company and pass if it does ...
				if ($_company->Name === $name)
				{ 
					// found the company and set the var to true ...
					$_foundCompany = true;
					
					// breaking the loop ...
					break; 
				}
			}
			
			// check for existance of the company ...
			if (!$_foundCompany) {				
				// return a list with "error" index set to "NO_COMPANY" shows that there is no company available ... 
				$_returnValue["error"] = "NO_COMPANY";
				
				// return one-item list to UI ...
				return $_returnValue;
			}
			
			// get the information from database ... get all the poseters by specified name ...
			$_getAllPostersByCompany = $_posterDAL->GetPostersByCompanyName($name);

			//  add the extra index "error" to the list ... 
			$_getAllPostersByCompany["error"] = "NULL";
			
			// return the result to UI ...
			return $_getAllPostersByCompany;											
		}				
	}

/**
 * @author "Milad Baderan"
 * Last Update: 19 tir 1391, 08:50:00 PM
 * Co-Programmer: "King Hadi"
 */
    /*
     * Parameters:
     *  $date -> string
     *
     * Return Value :
     *  List<Poster>
     *
     * Exception :
     * No exception
     */

    public function GetPostersByCreateTime($date) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of PosterDAL ...
            $_PosterDAL = new PosterDAL();

            // get Posters By Create time ...
            $_Posters = $_PosterBLL->GetPostersByCreateTime($date);

            // return Posters to the UI ...
            return $_Posters;
        }
        return null;
    }

    /*
     * Parameters:
     *  $user -> User
     *
     * Return Value :
     *  List<Poster>
     *
     * Exception :
     * No exception
     */

    public function GetAllPostersByReciever($user) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of PosterDAL ...
            $_PosterDAL = new PosterDAL();

            // get All Posters By Reciever ...
            $_Posters = $_PosterBLL->GetAllPostersByReciever($user);

            // return Posters to the UI ...
            return $_Posters;
        }
        return null;
    }

    /*
     * Parameters:
     *  $user -> User
     *
     * Return Value :
     *  List<Poster>
     *
     * Exception :
     * No exception
     */

    public function GetAllPostersByCreator($user) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of PosterDAL ...
            $_PosterDAL = new PosterDAL();

            // get All Posters By Creator ...
            $_Posters = $_PosterBLL->GetAllPostersByCreator($user);

            // return Posters to the UI ...
            return $_Posters;
        }
        return null;
    }

    /*
     * Parameters:
     *  $city -> String
     *
     * Return Value :
     *  List<Poster>
     *
     * Exception :
     * No exception
     */

    public function GetPostersByCompanyCity($city) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of PosterDAL ...
            $_PosterDAL = new PosterDAL();

            // The Goal is getting all of Posters;
            $_AllPosters = $_PosterDAL->GetPostersByCreateTime("1/1/1900");

            //index of all posters
            $i = 0;
            // index of posters which has choosen
            $j = 0;
            /*checking of the city in all posters and add its poster to
             *_Posters
            */
            while ($_AllPosters[$i] != null) {
                if ($_AllPosters[$i]->Company->City == $city) {
                    $_Posters[$j] = $_AllPosters[$i];
                    $j++;
                }
            }
            // return Posters to the UI ...
            return $_Posters;
        }
        return null;
    }


/**
 *
 * @author hakime ghasemi <ghasemi.hakimeh@yahoo.com> and
 *         fateme naderi <fatemeh_naderi_swg@yahoo.com>
 * @version 1.0
 *          akharin taghirat (91/4/18)
 */

    public function SubmitForPoster($user, $poster) {
        /*
         * sakhatane yek shay az clase poster da package DAL
         */
        $_poster = new PosterDAL();
        /*
         * barresi sharayet be manzure null nabudane poster va ham chenin user
         */
        if ($user == NULL || $poster->title == "" || $poster->Content == "") {
            /**
             * darsurate bargharar nabudane sharayet false bar gardande khahad shod
             */
            return false;
        } else {
            /**
             * farakhani methode marbute az DAl
             */
            $_poster->SubmitForPoster($user, $poster);

            return true;
        }
    }

    /**
     * ************************************************************************
     */
    public function GetSubmitedPersonsForPoster($poster) {

        if ($poster->title == "" || $poster->content == "") {
            /*
             * dar surate bargharar budane shart dar andise error list bazgashti meghdare error vared shode va
             * list bargardande khahad shod
             */
            $returnList ["error"] = "error";
            return $returnList;
        } else {
            $_regularPerson = new ReqularPerson();
            /*
             * dar surate bar gharar nabudane if liste posterrecivers dar return list copy mishavad
             */
            /*             * $returnList= */

            /*
             * dar andise error returnlist null gharar midahim
             */
            $returnList ["error"] = NULL;
            /*
             * list marbute bargardande khahad shod
             */
            return $returnList;
        }
    }

    /**
     * **************************************************************************
     */
    public function AcceptSubmitedPersonForPoster($person, $poster) {
        /*
         * barresi sharayet
         */
        if ($poster->title == "" || $poster->content == "" || $person = NULL) {
            /*
             * dar surate bargharari sharayet false bar migardad
             */
            return false;
        } else {
            $_poster = new PosterDAL();
            /*
             * farakhani method dar DAL
             */
            $_poster->AcceptSubmitedPersonForPoster($person, $poster);
            return true;
        }
    }

    /*
     * ***********************************************************************
     */

    public function RejectSubmitedPersonForPoster($person, $poster) {
        /*
         * barresi sharayet
         */
        if ($poster->title == "" || $poster->content == "" || $person->FirstName == "" || $person->LastName == ""
                || $person->age == "" || $person->Skils == "") {
            /*
             * dar surate bargharari sharayet false bar migardad
             */
            return false;
        } else {
            $_poster = new PosterDAL();
            /*
             * farakhani method dar DAL
             */
            $_poster->RejectSubmitedPersonForPoster($person, $poster);

            return true;
        }
    }

    /*
     * *****************************************************************************
     */

    public function ProposeSubmitedPersonForPoster($person, $poster) {
        /*
         * dar in halat bayad etelaate marbut be person vared shode null nabashad ta yek shakhs yek post begirad
         */
        if ($person->FirstName == "" || $person->LastName == ""
                || $person->age == "" || $person->Skils == "" || $poster->title == "" || $poster->Content == ""
                || $poster->Company == NULL) {
            return false;
        } else {

            return true;
        }
    }

    /*
     * **********************************************************************************
     */

    public function SendPosterForPersone($poster, $recievers) {
        /*
         * baraye ferestadane yek post be yek shakhs bayad aval un post morede nazar null nabashad
         * hamchenin moshakhastae reciver ke az jense person hast nabayd null bashad 
         */
        if ($poster->title == "" || $poster->Content == "" || $recievers->FirstName == "" || $recievers->LastName == ""
                || $recievers->age == "" || $recievers->Skils == "") {
            return false;
        } else {
            $_poster = new PosterDAL();
            /*
             * farakhani method az DAL
             */
            $_poster->SendPosterForPersone($poster, $recievers);

            return true;
        }
    }

    /*
     * *****************************************************************************************
     */

    public function SortByTimeCreate($posters) {
        /*
         * list posters ra moratab mikonad be surate default
         */
        ksort($posters);

        /*
         * list moratab shode ra bar migardanad
         */
        return $posters;
    }

}

?>