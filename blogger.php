	<?php
	/**
	* blog application
	* user can upload a new status
	* also view previous status
	*/
	define("true-access",true);
	include("./lib/layout.php");
	startOfPage();

//	define ("data_file_path","files/blogEntries.blog");
	define ("form_blog_input_name","blog");
	//define ("special_separator","_#####_");
	define( "form_blog_input_title","blogTitle");
	$data_file_path = 'files/myBlog.datatypefile';
	$i=1;
	function append_data()
	{
	

	$inputTitle = $_POST[form_blog_input_title];
	$inputData = $_POST[form_blog_input_name];
	 if($inputTitle == '' || $inputData == ''){
	 echo '<script>alert("Title or data not entered");';
	 echo 'window.location = "blogger.php";';
	 echo '</script>';
	 }
	 else{
		$dir = 'files/';
		$num_files = count(glob('files/*'));
		$i = $num_files;
		mkdir("files/".$i);
		move_uploaded_file($_FILES['file1']['tmp_name'], './files/image/'.$i.'.jpg');
		file_put_contents("files/".$i."/".$inputTitle,
		
		htmlspecialchars($inputData).PHP_EOL,
		
		FILE_APPEND | LOCK_EX);
		
		
		
		if(file_exists($inputData) && is_dir($data_file_path))
		
		{ 
		   mkdir("files/BlogEntries/");
		   
		   } 
		
		h1("File uploaded");
			
		}
	}

	// function read_data()
	// {
		// if (file_exists(data_file_path)) {
			// $allBlogs = file_get_contents(data_file_path);
			
			// $data = str_replace(special_separator,"<br><br><br>",$allBlogs);
			
			// echo $data; 
			
			// }
			
		// }

	function create_link()
	{
		
		echo '<a href="./admin/directories.php"> View Previous Directory</a>';
	}

	function display_update_form()
	{
		echo '<form enctype="multipart/form-data" method="POST" action="#" enctype="multipart/form-data">'.PHP_EOL;
		echo '<input type="text" name=" '.form_blog_input_title.'" placeholder=" Blog title">'.PHP_EOL;
		echo '<label for data>Enter some data to save!</label><br>'.PHP_EOL;
		echo '<textarea type="textfield" cols="100" rows="20" name="'.form_blog_input_name.'" placeholder="Please write some thing to record your life."></textarea><br>'.PHP_EOL;
		echo '<input type="file" name="file1" /><br>';
		echo '<input type="submit" class="submit_buttone" value="submit"/>'.PHP_EOL;
		echo '<input type="submit" name ="Reset" class = "reset_button" value="Reset"/>'.PHP_EOL;
		echo '</form> '.PHP_EOL;
	}

	function print_page_title()
	{
		h1("Welcome to My First Blogging");
	}


	// function upload_image()

	// {   h1('Choose A File to Upload');

	// echo '<form action="./admin/upload.php" method="POST" >';
	// echo '<input type="file" name="file1" />';
	// echo '<input type="submit"/>';

	// }

	//some sort of update happened
	if (!empty($_POST)) {
		print_page_title();
		append_data();
		create_link();
		//upload_image();
		
		
		
	}
	else //regular viewing of the page
	{
		print_page_title();
		//read_data();
		display_update_form();
		//upload_image();
		
	}

	endOfPage();

	?>