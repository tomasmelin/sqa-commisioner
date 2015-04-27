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

//        if (isset($_POST["insert_data"])) {
//            $this->inputNewSale();
//        }
    }

    /**
     *
     */
    public function inputNewSale()
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user
            date_default_timezone_set('Asia/Harbin');
            $todays_date = date('Y-m-d', time());



            $new_sale = $this->db_connection->query($sql_new_sale);

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
            $sql = "SELECT ID_Product, Product_Name, Product_Price
                FROM `product`
                WHERE 1;";
            $productsinfo = $this->db_connection->query($sql);
            return $productsinfo;
        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

}