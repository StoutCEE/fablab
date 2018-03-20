<?php 
require "res/generate.php";
require "res/dbaccess.php";

$title = "Check In";
$output = "";
$c = connectDB();

if (isset($_POST['id'])) {
    $id = $_POST["id"];
	$output = cardswipe($id, $c);
	disconnectDB($c);
} else {
	$output = '
		<form action="' . $GLOBALS['url_swipeCard'] . '" method="post">
            <p align="center">Machine Name:</p>
            ' . selectMachine($c) . '
			<p>Please swipe card:</p>
			<input type="number" name="id" autofocus></input>
			<input type="submit" style="display: none" /> 
		</form>';
}
echoLayout($output,$title);
?>
