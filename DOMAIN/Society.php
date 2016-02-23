<?php

/**
 *  @package Society
 */
class Society {
    /**
     * @auther mhk448 <mhk448@yahoo.com>
     * @version 1.0 90/4/9
     */

    /**
     * the ID of society in DB
     * @var int
     */
    Public $SocietyID;

    /**
     * 
     * @var string
     */
    Public $Title;

    /**
     * 
     * @var List<Topic>
     */
    Public $Topics;

    /**
     *
     * @var string
     */
    Public $category;

    /**
     *
     * @var DateTime
     */
    Public $TimeCreated;

    /**
     * 
     * @var List<User>
     */
    Public $Members;

}

?>