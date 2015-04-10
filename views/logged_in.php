<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in! ;)

<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<a href="index.php?logout">Logout</a>

<table style'width:100%'>
    <tr>
        <th>Sale</th>
        <th>Date</th>
        <th>Customer</th>
        <th>City</th>
        <th>Turnover</th>
    </tr>
</table>


<?php

/*var_dump();
while()
{
    echo "<tr><th>" . $result["ID_Sale"] . " </th>";
    echo "<th>" . $result["ID_Customer"] . " </th></tr>";
    var_dump($result); // Prints useful info.
}
*/
