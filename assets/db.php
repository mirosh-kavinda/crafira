<!-- our database load with this code -->
<?php
$con = new mysqli("localhost", "root", "", "crafira");

if ($con->connect_error) {
  die("Failed to connect  :" . $con->connect_error);
}
?>