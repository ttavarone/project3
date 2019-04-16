<?php
require('functions.php');
require('functions_database.php');

$page_name = 'Create a Course';

$course_att = array(
	'Subject Area' => 'sub',
	'Course Number' => 'num',
	'Course Title' => 'title',
	'Course Description' => 'descr',
	'Year Taken' => 'year',
	'Semester Taken' => 'sem'
);




$content = '<form method="post" action="add_course.php">';
foreach($course_att as $label => $field){
	$content .= '
	<div class="form-group">
    	<label for="'.$field.'">'.$label.'</label>
    	<input type="text" class="form-control" id="'.$field.'" name="'.$field.'">
  	</div>';
};
$content .= '<button type="submit" class="btn btn-primary">Submit</button></form>';


make_page($page_name, $content);
?>