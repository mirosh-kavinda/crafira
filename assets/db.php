<!-- our database load with this code -->
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "crafira";

// $dbhost = "sql104.epizy.com";
// $dbuser = "epiz_33054522";
// $dbpass = "7442";
// $db = "epiz_33054522_crafira";

$con = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


?>