
<?php
$con = new mysqli("localhost", "root", "", "Crafira_db");

if ($con->connect_error) {
  die("Failed to connect  :" . $con->connect_error);
}

?>