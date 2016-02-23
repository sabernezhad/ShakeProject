<?php

/**
 *  @package Post
 */
class Post {
    /**
     * relation with SOCITY
     * @auther mhk448 <mhk448@yahoo.com>
     * @version 1.0 90/4/9
     */

    /**
     * 
     * @var User
     */
    Public $Writer;

    /**
     * 
     * @var string
     */
    Public $Title;

    /**
     * 
     * @var String
     */
    Public $Content;

    /**
     *
     * @var DateTime
     */
    Public $TimeSent;

    /**
     * 
     * @var list<Comment>
     */
    Public $Comment;

    /**
     * 
     * @var string
     */
    Public $PostID;

    /**
     * the file which is attached to the post
     * @var file
     */
    Public $File;

}

?>