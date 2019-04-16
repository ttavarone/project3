<?php
	
require('functions.php');
require('functions_database.php');

$table_name = 'th26tava_users';

if ($_POST) {
		$submitted_first = $_POST['first'];
		$submitted_last = $_POST['last'];
	  	$submitted_email = $_POST['email'];
	  	$submitted_school = $_POST['school'];
	  	$submitted_major = $_POST['major'];
	  	$submitted_gyear = $_POST['gyear'];
	  	$submitted_bio = $_POST['bio'];
	  	$submitted_pwd = $_POST['pwd'];
	  	$submitted_repwd = $_POST['repwd'];

	  	foreach($_POST as $values => $fields){
	  		$submitted_.$values = trim($fields);
	  	};

		if ($submitted_pwd == $submitted_repwd) {
			//add user to database
			$sql = "INSERT INTO $table_name (`uid`,`email`,`pwd`,`first`,`last`,`school`,`major`,`gyear`,`bio`) VALUES
			('','$submitted_email', '$submitted_pwd','$submitted_first','$submitted_last','$submitted_school','$submitted_major','$submitted_gyear','$submitted_bio');";
          
            run_query($sql);
			
			session_start();
			$_SESSION['uid'] = $submitted_uid;
        }
};

redirect('user_profile.php?uid='.$_SESSION['uid']);	
	
?>