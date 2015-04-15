<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in! ;)

<h5>
    <a href="index.php?logout">Logout</a>
</h5>

<p> This view will be seen once the user has logged in. </p>

<!-- TODO: SHOW THE DATABASE OF THE SOLD ITEMS -->
<table>
    <tr>
        <th>
            USER:  <?php echo $_SESSION['user_name'] ?>
            MONTH: <?php
            date_default_timezone_set('Asia/Harbin');
            echo date('F', time());;
            ?>
            <th><a href='new_sale.php'>NEW SALE</a></th>
        </th>
    </tr>
    <tr>
        <th>Sale</th>
        <th>Customer</th>
        <th>City</th>
        <th>Turnover</th>
        <th>Date</th>
    </tr>
    <?php
    $sales = $overview->getSale();
    while ($row = $sales->fetch_assoc()) { // $row['ID_Sale']
        echo "<tr>";
        echo "<th>" . $row['ID_Sale'] . "</th>";
        echo "<th>" . $row['Customer_Name'] . "</th>";
        echo "<th>" . $row['City_Name'] . "</th>";
        echo "<th>" . $row['Sale_Total_Price'] . "</th>";
        echo "<th>" . $row['Sale_Date'] . "</th>";
        echo "<th><a href='sale_detail.php?id= " . $row['ID_Sale'] . "'>Details</a></th>";
        echo "</tr>";
    }
    ?>
</table>