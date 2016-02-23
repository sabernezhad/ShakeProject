<?php

/**
 *  @package Company
 */
class Company {
    /**
     * @auther mhk448 <mhk448@yahoo.com>
     * @version 1.0 90/4/9
     */

    /**
     * 
     * @var int
     */
    Public $companyID;

    /**
     * 
     * @var string
     */
    Public $Name;

    /**
     * 
     * @var string
     */
    Public $Address;

    /**
     * a company may be govermental , Public or Self-employed 
     * @var Typcompany
     */
    Public $Typecompany;

    /**
     * 
     * @var string
     */
    Public $phone;

    /**
     * each company may have a group of branches
     * @var list<Branch>
     */
    Public $branches;

    /**
     * a description on company added by task master
     * @var string
     */
    Public $MoreDetails;

    /**
     * the city which the company is located in
     * @var string
     */
    Public $City;

}

?>