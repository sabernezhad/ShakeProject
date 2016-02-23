<?php

/**
 *  @package Company
 */
class Poster {
    /**
     * @auther mhk448 <mhk448@yahoo.com>
     * @version 1.0 90/4/9
     */

    /**
     * 
     * @var int
     */
    Public $PosterID;

    /**
     * 
     * @var string
     */
    Public $title;

    /**
     *
     * @var Company
     */
    Public $Company;

    /**
     * 
     * @var Data Time
     */
    Public $Time_created;

    /**
     * 
     * @var string
     */
    Public $Content;

    /**
     * a set of users , which recieved the poster
     * @var List<PosterReciever>
     */
    Public $PosterReciever;

    /**
     * 
     * @var DateTime
     */
    Public $LastUpdate;

}

?>