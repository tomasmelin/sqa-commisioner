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
    <title>Not Logged In</title>
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
        <p class="lead">

            You have been logged out.

        </p>

        <p>
            Please enter your information.
        </p>

        <?php
        // show potential errors / feedback (from login object)
        if (isset($login)) {
            if ($login->errors) {
                foreach ($login->errors as $error) {
                    echo $error;
                }
            }
            if ($login->messages) {
                foreach ($login->messages as $message) {
                    echo $message;
                }
            }
        }
        ?>

        <!-- login form box -->
        <form method="post" action="index.php" name="loginform">

            <label for="login_input_username">Username</label>
            <input id="login_input_username" class="login_input" type="text" name="user_name" required />

            <label for="login_input_password">Password</label>
            <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

            <input type="submit" name="login" value="Log in" />

        </form>

        <a href="register.php">Register new account</a>

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