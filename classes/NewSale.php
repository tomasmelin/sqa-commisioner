<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2015-04-15
 * Time: 10:18
 */

class NewSale {

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

        if (isset($_GET["create_new_sale"])) {
            $this->inputNewSale();
        }
    }

    /**
     * INSERT THE NEW INPUT INTO THE DATABASE.
     * IF THE CONDITIONS ARE MEET.
     */
    public function inputNewSale() // PARAMETER? $saleDetailID
    {
//        echo "nihao, entered new sale method";
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user (allows login via email address in the
            // username field)
            date_default_timezone_set('Asia/Harbin');
            $currentMonth = date('n', time());


//            $sql = ""; // SQL-QUERY
//            $saleDet = $this->db_connection->query($sql);
//            return $saleDet;
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