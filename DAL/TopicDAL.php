<?php

/**
 * @package ShakeDLL
 * @author Azade Khalili <azade_khalili@yahoo.com>
 * @version 1.0 (july,8,2012)
 * @Co-Programmer:"MRs Esmaeli And MR Abdi
 */
include_once("/sql/mysql.php");

class TopicDAL extends db {

    /**
     * register new topic
     * @access public
     * @param Topic $topic
     * @return string Title if added topic or null in other
     * 
     */
    public function AddTopic($topic) {
        /**
         * $mytitle to keep topic.Title
         * @var string
         */
        $mytitle = $this->safesql($topic->Title);

        if ($this->query("INSERT INTO `Topic`(`SocietyID`,`Title`,`Type`,`TimeCreated`)VALUES
			(
            
            '" . $this->safesql($topic->SocietyId) . "',
            '$mytitle',
            '" . $this->safesql($topic->TopicType) . "',
            '" . $this->safesql($topic->TimeCreated) . "')
            "))
            return mytitle;
        else
            return null;
    }

    /**
     * update topic table
     * @access public
     * @param Topic $topic
     * @return boolean true if edited or false in other
     */
    public function EditTopic($topic) {
        if ($this->query("UPDATE `Topic` SET
            `SocietyID`='" . $this->safesql($topic->SocietyId) . "',
            `Title`='" . $this->safesql($topic->Title) . "',
            `Type`='" . $this->safesql($topic->TopicType) . "',
            `TimeCreated`='" . $this->safesql($topic->TimeCreated) . "'

            WHERE ID ='" . $this->safesql($topic->TopicID) . "'
            "))
            return true;
        else
            return false;
    }

    /**
     * deleted from topic table
     * @access public
     * @param topic $topic
     * @return true id deleted or false in other
     */
    public function DeleteTopic($topic) {
        if ($this->query("DELETE FROM `Topic` WHERE 
			ID ='" . $this->safesql($topic->TopicID) . "'"))
            return true;
        else
            return false;
    }

    /**
     * get topics by society
     * @access public
     * @param Society $society
     * @return list/array of topics
     */
    public function GetTopicBySociety($society) {
        return $this->super_query("SELECT * FROM `Topic` 
			WHERE `SocietyID`='" . $this->safesql($society->SocietyID) . "' ");
    }

    /**
     * find topics by topic name or title
     * @access public
     * @param string $TopicName
     * @return list/array of topics
     */
    public function FindByName($TopicName) {
        return $this->super_query("SELECT * FROM `Topic` WHERE
			 `Title` LIKE'" . $this->safesql($TopicName) . "'");
    }

    /**
     * find topic by created time
     * @access public
     * @param string $date
     * @return list/array of topics
     */
    public function FindByCreateTime($date) {
        return $this->super_query("SELECT * FROM `Topic` WHERE
			 `TimeCreated` LIKE'" . $this->safesql($date) . "'");
    }

    /**
     * Get all topic
     * @access public
     * @param void
     * @return list/array of topics
     */
    public function GetAll() {
        return $this->super_query("SELECT * FROM `Topic`");
    }

}

?>