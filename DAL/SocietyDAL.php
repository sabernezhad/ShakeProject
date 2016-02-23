<?php

/**
 * @package ShakeDLL
 * @author Azade Khalili <azade_khalili@yahoo.com>
 * @version 1.0 (july,8,2012)
 * @Co-Programmer:"MRs Esmaeli And MR Abdi
 */
include_once( "/sql/mysql.php" );

class SocietyDAL extends db {

    /**
     * find user by name
     * @access public
     * @param string $name
     * @return  list/array of society
     * 
     */
    public function FindSocietyByName($name) {

        return $this->super_query("SELECT * FROM `Society` WHERE
		 `Title`LIKE'" . $this->safesql($name) . "'");
    }

    /**
     * find Society by date
     * @access public
     * @param string $date* @access public
     * @return  list/array of society
     */
    public function FindSocietyByDate($date) {
        return $this->super_query("SELECT * FROM `Society` WHERE
		 `TimeCreated` LIKE '" . $this->safesql($date) . "'");
    }

    /**
     * get all society in table
     * @access public
     * @param void 
     * @return list/array of siciety
     */
    public function GetAllSocieties() {
        return $this->super_query("SELECT * FROM `Society`");
    }

    /**
     * find society by category
     * @access public
     * @param string $category
     * @return  list/array of society
     */
    public function FindSocietyByCategory($category) {
        return $this->super_query("SELECT * FROM `Society` WHERE 
		Category LIKE '" . $this->safesql($category) . "'");
    }

}

?>