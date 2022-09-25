<?php
session_start();

// logout function work with this 
if(isset($_SESSION['ID']))
{
	unset($_SESSION["ID"] );
	unset($_SESSION["Email"]);
	unset($_SESSION["First_Name"]);
	unset($_SESSION["Address"] );
	unset($_SESSION["Telephone"] );
	header("Location: ../index.php");
	die;
	
}

?>