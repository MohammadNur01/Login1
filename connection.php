<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sample_login_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("Filed to connect!");
}
