<?php
define('true-access',true);
include ('../lib/layout.php');

startOfPage("file upload complete");

print_r($_FILES);

//move uploaded file took: path to temp, where to put it
move_uploaded_file($_FILES['file1']['tmp_name'], '../files/image/'.$_FILES['file1']['name']);

h1('File Uploaded');

endOfPage();
?>