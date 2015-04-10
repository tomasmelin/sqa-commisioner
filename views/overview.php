<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in! ;)o okok

<!-- TODO: SHOW THE DATABASE OF THE SOLD ITEMS -->

<table>
    <tr>
        <th>Sale</th>
        <th>Customer</th>
        <th>City</th>
        <th>Turnover</th>
        <th>Date</th>
    </tr>


<?php

    $sales = $overview->getSale();

    while ($row = $sales->fetch_assoc()) {
        echo "<tr>";
        echo "<th>" . $row['ID_Sale'] . "</th>";
        echo "<th>" . $row['ID_Customer'] . "</th>";
        echo "<th>" . $row['ID_City'] . "</th>";
        echo "<th>" . $row['Sale_Total_Price'] . "</th>";
        echo "<th>" . $row['Sale_Date'] . "</th>";
        echo "</tr>";

    }


?>

</table>

