<?php
// Website Title, Header, and Footer options
$global_title = "CEE LAB";
$global_hURL   = ["index.php", "checkin.php", "checkout.php", "register.php", "machine.php", ];
$global_cssURL = ["res/css/reset.css", "res/css/style.css"];
$global_defIMG = 'res/bluedevil.jpg';

$global_header = '
	<div class="title">
		University of Wisconsin - Stout<br />
		Fabrication Laboratory
	</div>
	<div class="nav">
		<a class="btn" href="'.$global_hURL[4].'">New Machine</a>
		<a class="btn" href="'.$global_hURL[3].'">Register</a>
		<a class="btn" href="'.$global_hURL[2].'">Swipe Out</a>
		<a class="btn" href="'.$global_hURL[1].'">Swipe In</a>
	</div>';
$global_css    = '
	<link rel="stylesheet" href="'.$global_cssURL[0].'">
	<link rel="stylesheet" href="'.$global_cssURL[1].'">';
$global_footer = '';

// Generates a layout around the output given.
function echoLayout($output, $t = "") {
	// If given a page title, it should be added to website title
	if ($t == "") {
		$pageTitle = $GLOBALS['global_title'];
	} else {
		$pageTitle = $GLOBALS['global_title'] . ": " . $t;
	}
	
	$h = $GLOBALS['global_header'];
	$f = $GLOBALS['global_footer'];
	$css = $GLOBALS['global_css'];

	echo '<!doctype html><html>
		<head>
			<meta charset="utf-8" http-equiv="refresh" content="60">
			<title>' . $pageTitle . '</title>'.$css.'
		</head>
		<body>
			<header>' . $h . '</header>
			<main><section>' . $output . '</section></main>
			<footer>' . $f . '</footer>
		</body>
	</html>';
}

// Formats message with image
function msg_addimg($msg, $img = "") {
	if ($img == "") {
		$img = $GLOBALS['global_defIMG'];
	}
	
	return '<img src="'. $img .'" /><br /><p> ' . $msg . '</p>';
}
?>
