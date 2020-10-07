<?php

$host = "localhost";    /* Host name */
$user = "ghana369";         /* User */
$password = "dynamic95!";         /* Password */
$dbname = "ghana369";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>