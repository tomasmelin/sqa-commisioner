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
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        session_start();
//        $validSale = true;

        if (isset($_POST["insert_data"])) {
            $this->inputNewSale();
            if (!($this->checkIfInvalidSale($_SESSION['user_id']))) {
                header("Location: overview.php");
            }
        }
    }

    /**
     * INSERT THE NEW INPUT INTO THE DATABASE.
     * IF THE CONDITIONS ARE MEET.
     */
    public function inputNewSale() // PARAMETER? $saleDetailID
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user
            if ($this->checkIfInvalidSale($_SESSION['user_id'])) {
                echo "You have inserted invalid data, please try again.";
                return;
            }
            date_default_timezone_set('Asia/Harbin');
            $todays_date = date('Y-m-d', time());
            $amount_total_sold = 45 * $_POST['quantity_1'] + 30 * $_POST['quantity_2'] + 25 * $_POST['quantity_3'];
            $sql_new_sale = "INSERT INTO `sale`(`user_id`,
                            `ID_Customer`,
                            `Sale_Date`,
                            `Sale_Total_Price`)
              VALUES (" . $_SESSION['user_id'] . ",
              " . $_POST['customer_id'] . ",
               CURDATE()," . $amount_total_sold . ");";

            $new_sale = $this->db_connection->query($sql_new_sale);

            $sql_new_sale_details = "INSERT INTO `sale_detail`(`ID_Sale`,`ID_Product`,`Product_Quantity`)
                VALUES (" . $this->db_connection->insert_id . "," . 1 . "," . $_POST['quantity_1'] . "),
                (" . $this->db_connection->insert_id . "," . 2 . "," . $_POST['quantity_2'] . "),
                (" . $this->db_connection->insert_id . "," . 3 . "," . $_POST['quantity_3'] . ");";

            $new_sale_details = $this->db_connection->query($sql_new_sale_details);

//            if ($sql_new_sale_details) {
//                $this->messages[] = "Your sale has been inserted successfully.";
//            } else {
//                $this->errors[] = "Sorry, your sale has not been inserted to the system.";
//            }

        } else {
            $this->errors[] = "Database connection problem.";
        }
    }

    public function checkIfInvalidSale($userID)
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // database query, getting all the info of the selected user
            date_default_timezone_set('Asia/Harbin');
            $currentMonth = date('n', time());
            $productSQL = "SELECT `ID_Product`, `Product_Quantity`, `sale_detail`.`ID_Sale`
                FROM `sale_detail`
                INNER JOIN `sale`
                ON `sale_detail`.`ID_Sale` = `sale`.`ID_Sale`
                WHERE month(Sale_Date) = $currentMonth
                AND `sale`.`user_id` = " . $userID . ";";
            $productsinfo = $this->db_connection->query($productSQL);
            while ($row = $productsinfo->fetch_assoc()) {
                switch ($row['ID_Product']) {
                    case 1:
                        if ($row['Product_Quantity'] + $_POST['quantity_1'] > 70) {
//                            echo var_dump($_POST['Quantity']);
                            return true;
                        }
                        echo "sale ok_1";
                        break;
                    case 2:
                        if ($row['Product_Quantity'] + $_POST['quantity_2'] > 80) {
//                            echo var_dump($_POST['Quantity']);
                            return true;
                        }
                        echo "sale ok_2";
                        break;
                    case 3:
                        if ($row['Product_Quantity'] + $_POST['quantity_3'] > 90) {
//                            echo var_dump($_POST['Quantity']);
                            return true;
                        }
                        echo "sale ok_3";
                        break;
                }
            }
            echo "Is valid";
            echo var_dump($productsinfo);
            return false; // TODO: Change this return statement.
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