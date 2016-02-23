<?php

/**
 *  @package Society
 */
class Topic {
    /**
     * @auther mhk448 <mhk448@yahoo.com>
     * @version 1.0 90/4/9
     */

    /**
     * 
     * @var string
     */
    Public $Title;

    /**
     * 
     * @var List<Post>
     */
    Public $Posts;

    /**
     * 
     * @var string
     */
    Public $TopicID;

    /**
     *  The Id of society which this topic belongs to
     * @var string
     */
    Public $Societyld;

    /**
     * topic types 
     * are: closed,important,normal
     * @var string
     */
    Public $TopicType;

    /**
     * 
     * @var DAteTime
     */
    Public $TimeCreated;

}

?>