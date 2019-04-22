<?php
require('functions.php');
require('functions_database.php');

$cid = $_GET['cid'];
$table_name = 'th26tava_courses';

$result = run_query("DELETE FROM $table_name WHERE cid='$cid'");

// $content = '';
// if($result){
//   $content = '<div class="alert alert-info" role="alert">
//             Successfully deleted course.
//         </div>';
// }
// else {
//   $content = '
//     <div class="alert alert-info" role="alert">
//         Unsuccessful deletion. Error.
//     </div>
//   ';
// }

// make_page('Delete Course TEMP', $content);
?>