<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

//connection between database and the php code.
if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
  die("failed to connect!");
}
