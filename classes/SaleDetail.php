<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2015-04-14
 * Time: 18:55
 */

class SaleDetail {

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

    /**
     * @return bool|mysqli_result
     */
    public function getSaleDetails($saleDetailID)
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user (allows login via email address in the
            // username field)
            $sql = "SELECT *
                FROM `product`
                INNER JOIN `sale_detail`
                ON `product`.`ID_Product`=`sale_detail`.`ID_Product`
                WHERE `sale_detail`.`ID_Sale` = $saleDetailID";
            $saleDet = $this->db_connection->query($sql);
            return $saleDet;
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

}