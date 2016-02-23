<?php

/**
 *  @package User
 */
class Admin {
    /**
     * @auther mhk448 <mhk448@yahoo.com>
     * @version 1.0 90/4/9
     */

    /**
     * 
     * @var string
     */
    Public $UserName;

    /**
     * 
     * @var string
     */
    Public $Password;

    /**
     * 
     * @var Role
     */
    Public $Role;

    /**
     * 
     * @var list<USER.Message>
     */
    Public $message;

    /**
     * 
     * @var list<User>
     */
    Public $BlockedUsers;

    /**
     * 
     * @var int
     */
    Public $PosterExpireTimLimitMonth;

}

?>