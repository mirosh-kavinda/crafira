<!-- our database load with this code -->
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "crafira";

$con = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


?>