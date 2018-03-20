<?php 
require "res/generate.php";
require "res/dbaccess.php";

$title = "Check Out";
$output = "";

if (isset($_POST['id'])) {
    $c = connectDB();
	$id = $_POST["id"];
	$output = cardout($id, $c);
	disconnectDB($c);
} else {
	$output = '
		<form action="' . $GLOBALS['url_checkout'] . '" method="post">
			<p>Please swipe card to leave:</p>
			<input type="number" name="id" autofocus></input>
			<input type="submit" style="display: none" /> 
		</form>';
}
echoLayout($output,$title);
?>
