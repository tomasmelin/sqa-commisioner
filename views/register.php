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
    <title>Register New User</title>
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
            Register New User
        </h1>
        <p class="lead">
            Please fill in all information.
        </p>

        <?php
        // show potential errors / feedback (from registration object)
        if (isset($registration)) {
            if ($registration->errors) {
                foreach ($registration->errors as $error) {
                    echo $error;
                }
            }
            if ($registration->messages) {
                foreach ($registration->messages as $message) {
                    echo $message;
                }
            }
        }
        ?>

        <!-- register form -->
        <form method="post" action="register.php" name="registerform" role="form">
            <div class="form-group">
                <!-- the user name input field uses a HTML5 pattern check -->
                <label for="login_input_username">
                    Username (only letters and numbers, 2 to 64 characters)
                </label>
                <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}"
                       name="user_name" required />
            </div>
            <div class="form-group">
                <!-- the email input field uses a HTML5 email type check -->
                <label for="login_input_email">User's email</label>
                <input id="login_input_email" class="form-control" type="email" name="user_email" required />
            </div>
                <label for="login_input_password_new">Password (min. 6 characters)</label>
                <input id="login_input_password_new" class="form-control" type="password"
                       name="user_password_new" pattern=".{6,}" required autocomplete="off" />
            <div class="form-group">
                <label for="login_input_password_repeat">Repeat password</label>
                <input id="login_input_password_repeat" class="form-control" type="password"
                       name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
            </div>
            <input type="submit"  name="register" value="Register" />
        </form>

        <!-- backlink -->
        <a href="index.php">Back to Login Page</a>

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