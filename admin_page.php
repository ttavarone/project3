<?php

require('functions.php');
require('functions_database.php');

$user_options = array(
	'Add User' => 'join.php',
	'Edit User' => 'edit_user.php',
	'Show User Table' => 'show_table.php',
	'Create New User Table' => 'create_users_table.php',
);
$course_options = array(
	'Add Course' => 'add_course.php',
	'Edit Course Table' => 'edit_course_table.php',
	'Show Courses Table' => 'show_table.php',
	'Create New Courses Table' => 'create_courses_table.php',
);

//  for user options array
$content = '<div class="row"><div class="col"><h2>User Options</h2><nav class="nav"><div class="list-group">';
foreach ($user_options as $option => $value) {
	$content .= '<a href="'.$value.'" class="list-group-item list-group-item-action">'.$option.'</a>';
}
$content .= '</div></nav></div>';

//  for course table options array
$content .= '<div class="col"><h2>Course Table Options</h2><nav class="nav"><div class="list-group">';
foreach ($course_options as $option => $value) {
	$content .= '<a href="'.$value.'" class="list-group-item list-group-item-action">'.$option.'</a>';
}
$content .= '</div></nav></div></div>';

$style = '.list-group {
	  margin: auto;
	  width: 25%;
	  padding: 1%;
	  border: 1px solid black;
	  border-radius: 2px;
	  }';

make_page('Admin', $content);

?>