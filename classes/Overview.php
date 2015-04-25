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

            $sql = "SELECT `sale`.`ID_Sale`,
                    `sale`.`Sale_Total_Price`,
                    `sale`.`Sale_Date`,
                    `sale`.`ID_Customer`,
                    `City_Name`,
                    `customer`.`Customer_Name`
                FROM `sale`,`users`, `city`, `customer`
                WHERE `users`.`user_id` = " . $userID . "
                    AND `City_Name` IN (
                        SELECT `City_Name`
                        FROM `city`
                        WHERE `ID_City` IN (
                            SELECT `ID_City`
                            FROM `customer`
                            WHERE `sale`.`ID_Customer` = `customer`.`ID_City`))
                    AND `Customer_Name` IN (
                        SELECT `Customer_Name`
                        FROM `customer`
                        WHERE `sale`.`ID_Customer` = `customer`.`ID_Customer`)
                        ORDER BY `sale`.`ID_Sale` ASC;";
            $sale = $this->db_connection->query($sql);
            return $sale;
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

}