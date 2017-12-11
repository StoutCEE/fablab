<?php

/* Page Titles:
 *  - $global_title[0] is short title
 *  - $global_title[1] is longer title
 */
$global_title = ["Stout Engineering","UW Stout Engineering Labs"];

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
 */
$global_cssURL = ["res/css/reset.css", "res/css/style.css"]; 

/* Functions to Generate Layout Elements:
 *  - layout_head() generates the <head> element
 *  - layout_header() generates the <header> element in <body>
*/
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

} function layout_body($output, $layout=0) {
	
	$title = $GLOBALS['global_title'];
	$header = '<div class="title">' . $title[1] . '</div><nav>';
	foreach ($GLOBALS['global_navURL'] as $l) {
		$header .= '<a href="' . $l[0] . '">' . $l[1] .'</a>';
	}
	$header .= '</nav>';
	
	$main = '<main><section>' . $output . '</section></main>';
	
	$footer = '<footer></footer>';
	
	return '<body>' . $header . $main . $footer . '</body>';

}

// Generates entire layout
function generate_layout($output, $title="") {
	$head = layout_head($title);
	$body = layout_body($output);
	echo '<!doctype html><html>' . $head . $body . '</html>';
}

?>
