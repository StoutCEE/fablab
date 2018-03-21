<?php 
require "res/generate.php";
require "res/dbaccess.php";

$title = "Machine";
$output = "";

if (isset($_POST[$dbt_machine[1]])) {
	$c = connectDB();
	$output = addMachine($c);
	disconnectDB($c);
} else {
	$output = addMachineForm();
}

echoLayout($output,$title);
?>
