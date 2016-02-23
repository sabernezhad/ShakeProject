<?php

require_once AdminDAL . php;

/**
 * @author "Milad Baderan"
 * Last Update: 10 tir 1391, 06:58:00 PM
 * Co-Programmer: "King Hadi"
 */
class admin {

    public $UserName;   // :string
    public $Password;   // :string
    public $role;   // :Role
    public $messages;   // :list<Message>
    public $BlockedUsers;   // :list<User>
    public $PosterExpireTimeLimitMonth;   // :int

    /*
     * Parameters:
     *  No Parameter
     *
     * Return Value :
     *  int
     *
     * Exception :
     * No exception
     */

    public function GetUserCount() {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get list of all of Users  ...
            $AllUsers = $AdminDAL->GetAllUsers();

            // get count of Users
            $i = 0;

            while ($AllUsers[$i] != Null) {
                $i++;
            }
            $i++;

            // return  the Count to the UI ...
            return $i;
        }
        return 0;
    }

    /*
     * Parameters:
     *  No Parameters // note : dar diagrame dade shode in tabe bedune voroodi ast
     * dar hali ke dar diagrame marbut be CompanyDAL voroodi darad, tasmim gereftam
     * movaghatan tabe marbut be companyDAL ro bedune argoman dar nazar begiram.
     *
     * Return Value :
     *  List<Employee>
     *
     * Exception :
     * No exception
     */

    public function GetEmployees() {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of CompanyDAL ...
            $_companyDAL = new CompanyDAL();
            // get list of employees
            $_employees = $_companyDAL->GetEmployees();
            // return list to the UI ...
            return $_employees;
        }
        return null;
    }

    /*
     * Parameters:
     *  No Parameter
     *
     * Return Value :
     *  List<UnEmployees>
     *
     * Exception :
     * No exception
     */

    public function GetUnEmployees() {
        if (False) {
            // checks come here ...
            ;
        } else {
            //create an instance of AdminBLL ...
            $_AdminBLL = new AdminBLL();
            //create an instance of AdminDAL ...
            $_AdminDAL = new AdminDAL();
            // Get list of employees
            $_employees = $_AdminBLL->GetEmployees();
            // Get list of Users
            $_users = $_AdminDAL->GetAllUsers();
            // find out who is not employee
            $i = 0;
            $j = 0;
            $k = 0;
            $check = false;
            while ($_users[$i] != null) {
                while ($_employees[$j] != null) {
                    if ($_users[i] == $_employees[j]) {
                        $check = true;
                    }
                    $j++;
                }
                if ($check == false) {
                    $_unemployee[$k] = $_users[$i];
                    $k++;
                }
                $j = 0;
                $i++;
            }
            //return unemployees;
            return $_unemployee;
        }
        return null;
    }

    /*
     * Parameters:
     *  No Parameter
     *
     * Return Value :
     *  List<TaskMaster>
     *
     * Exception :
     * No exception
     */

    public function GetTaskMasters() {

        return null;
    }

    /*
     * Parameters:
     *  No Parameter
     *
     * Return Value :
     *  int
     *
     * Exception :
     * No exception
     */

    public function GetSocietiesCount() {

        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get list of all of societies  ...
            $AllSocieties = $AdminDAL->GetAllSocieties();

            // get count of societies
            $i = 0;
            while ($AllSocieties[$i] != null) {
                $i++;
            }
            $i++;
            // return  the Count to the UI ...
            return $i;
        }
        return 0;
    }

    /*
     * Parameters:
     *  No Parameter
     *
     * Return Value :
     *  int
     *
     * Exception :
     * No exception
     */

    public function GetAllSocieties() {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get list of all of societies  ...
            $AllSocieties = $AdminDAL->GetAllSocieties();

            // return list to the UI ...
            return $AllSocieties;
        }
        return null;
    }

    /*
     * Parameters:
     *  No Parameter
     *
     * Return Value :
     *  string
     *
     * Exception :
     * No exception
     */

    public function GetStatistics() {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get Statistics  ...
            $Statistics = $AdminDAL->GetStatistics();

            // return Statistics to the UI ...
            return $Statistics;
        }
        return "";
    }

    /*
     * Parameters:
     *  $rules -> string
     *
     * Return Value :
     *  boolean
     *
     * Exception :
     * No exception
     */

    public function EditRules($rules) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get Result of Edit  ...
            $ResultOfEdit = $AdminDAL->EditRules($rules);

            // return Result to the UI ...
            return $ResultOfEdit;
        }
        return False;
    }

    /*
     * Parameters:
     *  $month -> int
     *
     * Return Value :
     *  boolean
     *
     * Exception :
     * No exception
     */

    public function ChangePosterExpireTimeLimit($month) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get result of change  ...
            $PosterExpireTimeLimitMonth = $AdminDAL->ChangePosterExpireTimeLimit($month);

            // return result to the UI ...
            return $PosterExpireTimeLimitMonth;
        }
        return false;
    }

    /*
     * Parameters:
     *  $society -> Society
     *
     * Return Value :
     *  boolean
     *
     * Exception :
     * No exception
     */

    public function AddSociety($society) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get result of change  ...
            $_resultString = $AdminDAL->AddSociety($society);

            // return result to the UI ...
            return $_resultString;
        }
        return false;
    }

    /*
     * Parameters:
     *  $society -> Society
     *
     * Return Value :
     *  boolean
     *
     * Exception :
     * No exception
     */

    public function EditSociety($society) {
        if (False) {
            // checks come here ...
            return false;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get Result of Edit  ...
            $ResultOfEdit = $AdminDAL->EditSociety($society);

            // return Result to the UI ...
            return $ResultOfEdit;
        }
        return false;
    }

    /*
     * Parameters:
     *  $societyId -> int
     *
     * Return Value :
     *  boolean
     *
     * Exception :
     * No exception
     */

    public function DeleteSociety($societyId) {
        if (False) {
            // checks come here ...
            return false;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get all societies ...
            $_allSocieties = $AdminDAL->GetAllSocieties();

            // return value set to false if couldn't remove it ...
            $_returnValue = false;

            // search for special society ID ...
            foreach ($_allSocieties as $_society) {
                if ($_society->SocietyID === $societyId) {
                    $_returnValue = $AdminDAL->DeleteSociety($_society);
                    break;
                }
            }

            // return the result value of operation ...
            return $_returnValue;

            // get Blocked List  ...
            //  $BlockedList = $AdminDAL->DeleteSociety();
            // return BlockedList to the UI ...
            //  return $BlockedList;
        }
    }

    /*
     * Parameters:
     *  No Parameter
     *
     * Return Value :
     *  List<User>
     *
     * Exception :
     * No exception
     */

    public function GetBlockedList() {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get Blocked List  ...
            $BlockedList = $AdminDAL->GetBlockedList();

            // return BlockedList to the UI ...
            return $BlockedList;
        }
        return null;
    }

    /*
     * Parameters:
     *  $user -> User
     *
     * Return Value :
     *  boolean
     *
     * Exception :
     * No exception
     */

    public function AddUserToBlockedList($user) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get a result of Add of user  ...
            $ResultOfAdd = $AdminDAL->AddUserToBlockedList($user);

            // return the result to the UI ...
            return $ResultOfAdd;
        }
        return false;
    }

    /*
     * Parameters:
     *  $user -> User
     *
     * Return Value :
     *  boolean
     *
     * Exception :
     * No exception
     */

    public function RemoveUserFromBlockedList($user) {
        if (False) {
            // checks come here ...
            ;
        } else {
            // create an instance of AdminDAL ...
            $AdminDAL = new AdminDAL();

            // get a result of remove of user  ...
            $ResultOfRemove = $AdminDAL->RemoveUserFromBlockedList($user);

            // return the result to the UI ...
            return $ResultOfRemove;
        }
        return false;
    }

}

?>