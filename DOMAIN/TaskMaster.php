<?php

/**
 *  @package Company
 */
class Task_Master {
    /**
     * Relation with EMPLOYEE_PACK
     * @auther mhk448 <mhk448@yahoo.com>
     * @version 1.0 90/4/9
     */

    /**
     * each task master may agent a company
     * @var company
     */
    Public $Company;

    /**
     * each task master has a set of posters
     * @var List<Posters>
     */
    Public $posters;

    /**
     * each task master has a group of employees
     * @var List <Employee>
     */
    Public $Employee;

}

?>