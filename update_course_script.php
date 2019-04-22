<?php
require('functions.php');
require('functions_database.php');

$page_name = 'Update Course Info';
$table_name = 'th26tava_courses';
$cid = $_GET['cid'];

    $submitted_sub = $_POST['sub']; // 
    $submitted_num = $_POST['num'];
    // Update the course below
    $result = run_query("UPDATE $table_name SET sub='$submitted_sub', num='$submitted_num' WHERE cid='$cid'");
    
  	if($result){
  		$content = '<div class="alert alert-primary" role="alert">
                    Successfully updated course '.$cid.'.
                </div>';
  		make_page($page_name, $content);
  	}
?>