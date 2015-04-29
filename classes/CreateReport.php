<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2015-04-24
 * Time: 15:20
 */

class CreateReport {

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
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        session_start();
    }

    /**
     *
     */
    public function getProdOneSales($userID)
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user
            date_default_timezone_set('Asia/Harbin');
//            $todays_date = date('Y-m-d', time());

            // Product 1
            $prod_one_q = "SELECT SUM(`Product_Quantity`) AS `quantity`
            FROM `sale_detail`
            WHERE `ID_Product` = 1 AND `ID_Sale` IN (
                SELECT `ID_Sale`
                FROM `sale`
                WHERE `sale`.`user_id` = " . $userID . "
                AND MONTH(`Sale_Date`) = MONTH(NOW()));";
            return $prod_one_result = $this->db_connection->query($prod_one_q);
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

    public function getProdTwoSales($userID)
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user
            date_default_timezone_set('Asia/Harbin');
//            $todays_date = date('Y-m-d', time());

            // Product 2
            $prod_two_q = "SELECT SUM(`Product_Quantity`) AS `quantity`
            FROM `sale_detail`
            WHERE `ID_Product` = 2 AND `ID_Sale` IN (
                SELECT `ID_Sale`
                FROM `sale`
                WHERE `sale`.`user_id` = " . $userID . "
                AND MONTH(`Sale_Date`) = MONTH(NOW())
                );";
            return $prod_one_result = $this->db_connection->query($prod_two_q);
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

    public function getProdThreeSales($userID)
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user
            date_default_timezone_set('Asia/Harbin');
//            $todays_date = date('Y-m-d', time());

            // Product 3
            $prod_three_q = "SELECT SUM(`Product_Quantity`) AS `quantity`
            FROM `sale_detail`
            WHERE `ID_Product` = 3 AND `ID_Sale` IN (
                SELECT `ID_Sale`
                FROM `sale`
                WHERE `sale`.`user_id` = " . $userID . "
                AND MONTH(`Sale_Date`) = MONTH(NOW()));";
            return $prod_one_result = $this->db_connection->query($prod_three_q);
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

    /**
     * GET THE PRODUCT IDS, PRODUCT NAMES, UNIT PRICES. (AND PREPARE THE TOTAL PRICE)
     */
    public function getProducts()
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user (allows login via email address in the
            // username field)
            $sql = "SELECT `Product_Name`
                FROM `product`
                WHERE 1;";
            $productsinfo = $this->db_connection->query($sql);
            return $productsinfo;
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

    public function calcCommission($q1, $q2, $q3) {
        $total = $q1 * 45 + $q2 * 30 + $q3 * 25;
//        $commission = 0;
        // Calc Commission.
        if ($total <= 1000) {
            $commission =  $total * 0.1;
        } elseif ($total > 1000 && $total < 1800) {
            $commission = 100 + ($total - 1000) * 0.15;
        } else {
            $commission = 220 + ($total - 1800) * 0.2;
        }
        return $commission;
    }

}