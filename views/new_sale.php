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
            echo date('F', time());;
            ?>
            <?php //echo $_GET['id'];?>
        </th>
    </tr>
    <tr>
        <td>
            <form method="post" action="new_sale.php" name="customer_id">
                <label for="customer">Customer (only positive integers): </label>
                <input id="customer_id" class="customer_id_input" type="number" name="customer_id" required />
            </form>
        </td>
    </tr>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Quantity (only positive integers)</th>
        <th>Unit Price</th>
    </tr>

    <!--  INPUTS  -->
<!--    <form method="post" action="new_sale.php" name="newsale">-->
<!--        <!-- the user name input field uses a HTML5 pattern check -->-->
<!--        <label for="Quantity">(only integers)</label>-->
<!--        <input numberofitems="quantity_input" class="qty_input" type="number" name="quantity" required />-->
<!--    </form>-->

    <?php
    $products = $newsale->getProducts();
    while ($row = $products->fetch_assoc()) {
        echo "<tr> <th>" . $row['ID_Product'] . "</th><th>" . $row['Product_Name'] . "</th>";
        echo '<th> <form method="post" action="new_sale.php" name="newsale">
            <label for="Quantity"></label>
            <input numberofitems="quantity_input" class="qty_input" type="number" name="quantity" required />
            </form> </th>';
        echo "<th>" . $row['Product_Price'] . "</th>";
        echo "</tr>";
    }
    ?>
</table>
<table>
    <tr>
        <td>
            <a href='overview.php'>Back</a>
        </td>
        <td>
            <a href='overview.php?create_new_sale'>Add Products</a>
        </td>
    </tr>
</table>



