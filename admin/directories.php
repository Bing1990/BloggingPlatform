<?php
define('true-access',true);
include('../lib/layout.php');
$pageTitle = 'Directories';

startOfPage($pageTitle);

h1("Scanning the directory where you store all blog entries");

print '<table>';
$path = '../files/'; //list the submit result
$dirs = scandir($path);
print "<tr>"."<th>"."Listing for directory: ".$path."</th>"."</tr>";
foreach($dirs as $file)
{
	$columType = "td";	
	print "<tr>";
	print "<td>";
	print $file;
	print "<td>";
	print "</tr>";
}
print '</table>';
endOfPage();
?>