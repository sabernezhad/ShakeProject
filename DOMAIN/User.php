<?php

/**
 *  @package User
 */
class User {
    /**
     * @auther mhk448 <mhk448@yahoo.com>
     * @version 1.0 90/4/9
     */

    /**
     * the user name
     * @var string
     */
    Public $UserName;

    /**
     * the password of user
     * @var string
     */
    Public $Password;

    /**
     * the FristName of user
     * @var string
     */
    Public $Fname;
    /**
     * the LastName of user
     * @var string
     */
    Public $Lname;
    /**
     * the Email of user
     * @var string
     */
    Public $email;
    
    /**
     * type role of user
     * @var Role
     */
    Public $Role;

    /**
     * 
     * @var list<USER.Message>
     */
    Public $message;

    /**
     * table identifier
     * @var int
     */
    Public $ID;

    /**
     * list of user friends
     * @var list<FriendUser>
     */
    Public $Friends;

    /**
     * Shows if this user is blocked by admin or not
     * @var bool
     */
    Public $IsOffender;

    /**
     * List of Defriended users
     * @var list<FriendUser>
     */
    Public $BlockList;

    /**
     * user who sent friend request for this
     * user and are not accepted yet
     * @var list<User>
     */
    Public $PendingFriends;

    /**
     * 
     * @var list<USER.Proposal>
     */
    Public $ReceiverProposals;

}

?>