<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Tomas-->
<!-- * Date: 2015-04-15-->
<!-- * Time: 10:14-->
<!-- */-->

<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Hey, <?php echo $_SESSION['user_name']; ?>. Please fill in information to add a new sale.

<!-- TODO: SHOW GUI FOR ADDING A NEW SALE. Conditions for the sale. -->
<table>
    <tr>
        <th>
            USER:  <?php echo $_SESSION['user_name'] ?>
            MONTH: <?php
            date_default_timezone_set('Asia/Harbin');
            echo date('F', time());
            ?>
            <?php //echo $_GET['id'];?>
        </th>
    </tr>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Unit Price</th>
        <th>Quantity (only positive integers)</th>
    </tr>

    <?php
    echo '<form method="post" action="new_sale.php" method="GET" name="newsale">
            <tr><label for="customer_id">CustomerID: </label>
            <input type="number" name="customer_id" required />
        </tr>';
    $products = $newsale->getProducts();
    $nr = 1;
    while ($row = $products->fetch_assoc()) {
        echo    "<tr>
                    <th>" . $row['ID_Product'] . "</th>
                    <th>" . $row['Product_Name'] . "</th>
                    <th>" . $row['Product_Price'] . "</th>
                    <th><input type=\"number\" name=\"quantity_" .
                        $nr . "\" required min=\"0\" max=\"91\" step=\"1\" /></th>
                </tr>";
        $nr++;
    }
    ?>

</table>
<table>
    <tr>
        <td>
            <a href='overview.php'>Back</a>
        </td>
        <td>
            <input type='submit' name='insert_data' value='Submit' />
            </form>
        </td>
    </tr>
</table>



