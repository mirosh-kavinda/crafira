<?php
session_start();
if(isset($_SESSION['ID']))
{
	unset($_SESSION["ID"] );
	unset($_SESSION["Email"]);
	unset($_SESSION["First_Name"]);
	unset($_SESSION["Address"] );
	unset($_SESSION["Telephone"] );

}
header("Location: /CRAFIRA/index.php");
die;

?>