<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8"></meta>-->
<!--    <meta content="IE=edge" http-equiv="X-UA-Compatible"></meta>-->
<!--    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>-->
<!--    <!---->
<!--     The above 3 meta tags *must* come first in the he…-->
<!--    -->-->
<!--    <meta content="Commissioner" name="description"></meta>-->
<!--    <meta content="Tomas Melin" name="author"></meta>-->
<!--    <link href="../../favicon.ico" rel="icon"></link>-->
    <title>Overview</title>
    <!--     Bootstrap core CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <!--     Custom styles for this template-->
<!--    <link rel="stylesheet" href="starter-template.css"></link> TODO: Remove. -->
    <!--     Just for debugging purposes. Don't actually copy these 2 lines!-->
    <!--    [if lt IE 9]><script src="../../assets/js/ie8-resp…-->
<!--    <script src="../../assets/js/ie-emulation-modes-warning.js"></script> TODO: Remove. -->
    <!--     HTML5 shim and Respond.js for IE8 support of HTML…-->
    <!--    [if lt IE 9]>          <script src="https://oss.maxcd…-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" aria-controls="navbar"
                    aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Commissioner</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse"></div>
        <!--
        /.nav-collapse
        -->
    </div>
</nav>
<div class="container" style="margin-top: 60px">
    <div class="starter-template">
        <h1>

            Welcome to Commissioner!

        </h1>
        <p class="lead">
            <!-- if you need user information, just put them into the $_SESSION variable and output them here -->
            Hey <?php echo $_SESSION['user_name']; ?>. You are logged in.
            You may create a new sale or create a sales report.
        </p>
<!--        <h5>-->
<!--            <a href="index.php?logout">Logout</a>-->
<!--        </h5>-->
        <a href="new_sale.php" class="btn btn-default">
            New Sale
        </a>
        <a href="report.php" class="btn btn-default">
            Create Sales Report
        </a>
        <a href="index.php?logout" class="btn btn-default">
            Log out
        </a>
        <table class="table">
            <tr>
                <th>
                    USER:  <?php echo $_SESSION['user_name'] ?>
                    MONTH: <?php
                    date_default_timezone_set('Asia/Harbin');
                    echo date('F', time());;
                    ?>
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
            $sales = $overview->getSale($_SESSION['user_id']);
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
    </div>
</div>
<!--
 /.container
-->
<!--
 Bootstrap core JavaScript
    ===================…
-->
<!--
 Placed at the end of the document so the pages lo…
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!--
 IE10 viewport hack for Surface/desktop Windows 8 …
-->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>