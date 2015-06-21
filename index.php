<?php
define('true-access',true);
include('./lib/layout.php');
$pageTitle = 'index';
$dataFilePath = 'files/myBlog.iitdatatypefile';

startOfPage($pageTitle);

echo" <h1> View the last Five Blog Entries.</h1>";

$num_files = count(glob('files/*'));
		$i=$num_files-1;
		$j=$i-5;
		for($i;$i>$j;$i--){
		$dir = "files/".$i."/";
		$files = scandir($dir);
		$title = $files[2];
		
		$data = file_get_contents("files/".$i."/".$title);
		echo "<h3><a href=newpage.php?blog=".$i.">".$title."</a></h3><br>";
		if (file_exists('files/image/'.$i.'.jpg')) {
		echo "<image src=files/image/".$i.".jpg><br><br>";
		}
		echo $data."<br>";
		
		}


endOfPage();

?>