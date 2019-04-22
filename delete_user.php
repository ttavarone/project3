<?php
require('functions.php');
require('functions_database.php');

$uid = $_GET['uid'];
$table_name = 'th26tava_users';

$result = run_query("DELETE FROM $table_name WHERE uid='$uid'");

// $content = '';
// if($result){
// 	$content = '<div class="alert alert-info" role="alert">
//   					Successfully deleted user.
// 				</div>';
// }
// else {
// 	$content = '
// 		<div class="alert alert-info" role="alert">
//   			Unsuccessful deletion. Error.
// 		</div>
// 	';
// }
?>