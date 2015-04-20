<?php

/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2015-04-08
 * Time: 08:38
 */
class Overview
{

    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    private $db_connection = null;

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // TODO
        session_start();
    }

    public function getSale($userID)
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user (allows login via email address in the
            // username field)
            echo var_dump($userID);
            $sql = "SELECT *
                FROM `city`,`users`
                INNER JOIN `customer`
                ON `ID_City`= `ID_City`
                INNER JOIN `sale`
                ON `customer`.`ID_Customer`=`sale`.`ID_Customer`
                WHERE `users`.`user_id` = $userID";
            $sale = $this->db_connection->query($sql);
            return $sale;
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

}