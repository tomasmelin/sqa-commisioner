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
    <title>New Sale</title>
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
        <!--        /.nav-collapse        -->
    </div>
</nav>
<div class="container" style="margin-top: 60px">
    <div class="starter-template">
        <h1>
            Add a New Sale
        </h1>

<!--        <h5>-->
<!--            <a href="index.php?logout">Logout</a>-->
<!--        </h5>-->

        <p class="lead">
            Hello <?php echo $_SESSION['user_name']; ?>. Please fill in information to add a new sale.
        </p>
        <a href='overview.php' class="btn-default">
            <button type="button" class="btn btn-default">Back</button>
        </a>
        <form method="post" action="new_sale.php" method="GET" name="newsale" role="form">
        <table class="table">
            <tr>
                <th>
                    USER:  <?php echo $_SESSION['user_name'] ?>
                    MONTH: <?php
                    date_default_timezone_set('Asia/Harbin');
                    echo date('F', time());
                    ?>
                </th>
            </tr>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity (only positive integers)</th>
            </tr>
            <div class="form-group">
                <tr>
                    <label for="customer_id">CustomerID: </label>
                    <input type="number" name="customer_id" required />
                </tr>
            </div>
            <div class="form-group">
            <?php
                $products = $newsale->getProducts();
                $nr = 1;
                while ($row = $products->fetch_assoc()) {
                    echo
                    "<tr>
                        <th>" . $row['ID_Product'] . "</th>
                        <th>" . $row['Product_Name'] . "</th>
                        <th>" . $row['Product_Price'] . "</th>
                        <th>
                            <input type=\"number\" class=\"form-control\" name=\"quantity_" .
                        $nr . "\" required min=\"0\" max=\"91\" step=\"1\"  />
                        </th>
                    </tr>";
                    $nr++;
                }
            ?>
            </div>
        </table>
        <table class="table">
            <tr>
                <td>
                    <input type='submit' name='insert_data' value='Submit' />
                </td>
            </tr>
        </table>
        </form>
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


