<!-- our database load with this code -->
<?php
$con = new mysqli("us-cdbr-east-06.cleardb.net", "b802d73e127878", "b128cee8", "heroku_7141704bd3c0dd2");

if ($con->connect_error) {
  die("Failed to connect  :" . $con->connect_error);
}
?>