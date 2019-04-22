<?php
require('functions.php');
require('functions_database.php');

$table_name = 'th26tava_users';

    $submitted_first = $_POST['first']; // get user submitted first name update
    $submitted_last = $_POST['last']; // get user submitted password update
    $submitted_email = $_POST['email'];
    $submitted_bio = $_POST['bio'];
    $uid = $_GET['uid'];
    // Update the user below
    $result = run_query("UPDATE $table_name SET first='$submitted_first', last='$submitted_last', bio='$submitted_bio', email='$submitted_email' WHERE uid='$uid'");
    
	if($result){
		$content = '<div id="loginAlert" class="alert alert-primary" role="alert">
                    Successfully updated '.$uid.'.
                </div>';
		make_page($page_name, $content);
	}

?>