<?php
if(!defined('true-access')) {
    die('Direct access not permitted');
} 

function startOfPage($title = 'blog', $company="bliu40") {
	echo "<!doctype html>  ".PHP_EOL;
	echo "<html>           ".PHP_EOL;
	echo "<head>           ".PHP_EOL;
	if (isset($title))
	{
		echo "<title>$company - $title</title>". PHP_EOL;
	}
	echo "</head>          ".PHP_EOL;
	echo "<body>           ".PHP_EOL;
}
function endOfPage() {
	echo "</body>          ".PHP_EOL;
	echo "</html>          ".PHP_EOL;
}

function h1($content, $class="") {
	echo "<h1 class='$class'>$content</h1>";
}

ob_start();
session_start();
if (isset($_SESSION ['hitsFromUser']))
{
	$_SESSION ['hitsFromUser'] = $_SESSION ['hitsFromUser'] + 1;
}
else
{
	$_SESSION ['hitsFromUser'] = 1;
}

// reset the sessions.

if(!empty($_POST['Reset'])){ 

$_SESSION ['hitsFromUser'] = 0;
         
        } 
$hits = $_SESSION ['hitsFromUser'];



echo "<footer> Sessions: $hits </footer>".PHP_EOL;

ob_end_flush(); //open that dam


?>