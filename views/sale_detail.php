<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Tomas-->
<!-- * Date: 2015-04-14-->
<!-- * Time: 18:56-->
<!-- */-->

<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.

<p> ID of the Sale: <?php echo $_GET['id']; ?> </p>
<p>You have entered detailed sale view!</p>

<!-- TODO: SHOW DETAILS OF THE SALE -->
<table>
    <tr>
        <th>
            USER:  <?php echo $_SESSION['user_name'] ?>
            MONTH: <?php
                date_default_timezone_set('Asia/Harbin');
                echo date('F', time());;
            ?>
            SALE ID: <?php echo $_GET['id'];?>
        </th>
    </tr>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>§
    </tr>
    <?php
    $sale = $saledetail->getSaleDetails($_GET['id']);
    while ($row = $sale->fetch_assoc()) {
        echo "<tr>";
            echo "<th>" . $row['ID_Product'] . "</th>";
            echo "<th>" . $row['Product_Name'] . "</th>";
            echo "<th>" . $row['Product_Quantity'] . "</th>";
            echo "<th>" . $row['Product_Price'] . "</th>";
            echo "<th>" . $row['Product_Price'] * $row['Product_Quantity'] . "</th>";
        echo "</tr>";
    }
    ?>
</table>
<?php echo "<a href='overview.php'>Back</a>"; ?>
