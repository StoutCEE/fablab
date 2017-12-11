<?php

/* Page Titles:
 *  - $global_title[0] is short title
 *  - $global_title[1] is longer title
 *  - $global_title[2] is the prefix for longer title
 */
$global_title = ["Stout Engineering","Engineering Labs","University of Wisconsin - Stout"];

/* Navigation Links:
 *  - $global_navURL[0] is main page
 *  - $global_navURL[1] is registration page
 * Other links may be added
 */
$global_navURL = [["index.php", "Home"],
	["register.php", "Register"]];

/* CSS Links:
 *  - $global_cssURL[0] is the reset sheet
 *  - $global_cssURL[1] is the style sheet
 * Other links may be added
 */
$global_cssURL = ["res/css/reset.css", "res/css/style.css"];

function layout_head($t="") {
	$title = $GLOBALS['global_title'];
	$css = $GLOBALS['global_cssURL'];
	if ($t == "") {
		$t = $title[0];
	} else {
		$t = $title[0] . ": " . $t;
	}
	$head = '
		<head>
			<meta charset="utf-8">
			<title>' . $t . '</title>
			<link rel="stylesheet" href="'.$css[0].'">
			<link rel="stylesheet" href="'.$css[1].'">
		</head>';
	return $head;
}
function layout_header() {
	$title = $GLOBALS['global_title'];
	$links = $GLOBALS['global_navURL'];
	$header = '
		<div class="title">
			' . $title[2] . '<br />
			' . $title[1] . '
		</div>
		<nav>'
	foreach ($links as $l) {
		$header .= '<a href="' . $l[0] . '">' . $l[1] .'</a>';
	}
	$header .= '</nav>';
	return $header;
}
function layout_footer() {
	return = '<footer></footer>';
}


// Generates a layout around the output given.
function layout_output($output, $title = "") {
	
	$head = layout_head($t="");
	$body = '
		<body>' . layout_header() . '
			<main><section>' . $output . '</section></main>' . layout_footer() . '
		</body>';
	
	echo '<!doctype html><html>' . $head . $body . '</html>';
}

?>
