<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2015-04-24
 * Time: 15:20
 */

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("config/db.php");

// load the Overview class
require_once("classes/CreateReport.php");

// create the SalesDetail object. when this object is created, it will do all SalesDetail stuff automatically
// so this single line handles the entire SalesDetail process.
$report = new CreateReport();

// show the register view (with the registration form, and messages/errors)
include("views/report.php");