<?php
define("true-access",true);
include("./lib/layout.php");
$i = $_GET['blog'];
$dir = "files/".$i."/";
		$files = scandir($dir);
		$title = $files[2];
		
		$data = file_get_contents("files/".$i."/".$title);
		echo "<h3>".$title."</h3>";
		if (file_exists('files/image/'.$i.'.jpg')) {
		echo "<image src=files/image/".$i.".jpg>";
		}
		echo $data."<br>";
		
?>