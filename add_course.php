<?php
	
require('functions.php');
require('functions_database.php');

$table_name = 'th26tava_courses';

if ($_POST) {
	session_start();
		$submitted_sub = $_POST['sub'];
		$submitted_num = $_POST['num'];
	  	$submitted_title = $_POST['title'];
	  	$submitted_descr = $_POST['descr'];
	  	$submitted_year = $_POST['year'];
	  	$submitted_sem = $_POST['sem'];
	  	$submitters_uid = $_SESSION['uid'];

	  	if(!$submitters_uid){
	  		$submitters_uid = '1';
	  	}

	  	foreach($_POST as $values => $fields){
	  		$submitted_.$values = trim($fields);
	  	};

		$sql = "INSERT INTO $table_name (`cid`,`sub`,`num`,`title`,`descr`,`year`,`sem`,`uid`) VALUES
		('','$submitted_sub', '$submitted_num','$submitted_title','$submitted_descr','$submitted_year','$submitted_sem', '$submitters_uid');";
      
        run_query($sql);
};

redirect('user_profile.php');
?>