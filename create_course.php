<?php
require('functions.php');
require('functions_database.php');

$page_name = 'Create a Course';

session_start();            // Restore session variables
  if ($_SESSION['uid']) {
	$course_att = array(
		'Subject Area' => 'sub',
		'Course Number' => 'num',
		'Course Title' => 'title',
		'Course Description' => 'descr',
		'Year Taken' => 'year',
		'Semester Taken' => 'sem'
	);

	$content = '<form method="post" action="add_course.php"><div id="inputGroupDiv" class="input-group">';
	foreach($course_att as $label => $field){

		$content .= '
			<div id="inputGroup" class="input-group-prepend">
      			<span id="span" class="input-group-text">'.$label.'</span>
        		<input type="text" aria-label="'.$label.'" class="form-control" name="'.$field.'">
      		</div>
		';

		// $content .= '
		// <div class="form-group">
	 //    	<label for="'.$field.'">'.$label.'</label>
	 //    	<input type="text" class="form-control" id="'.$field.'" name="'.$field.'">
	 //  	</div>';
	};
	$content .= '<button type="submit" class="btn btn-primary">Submit</button></div></form>';
}
else{$content = '<div id="loginAlert" class="alert alert-warning" role="alert">
                        Error: Must be logged in!
                      </div>
                      <a href="login.php" class="btn btn-primary btn-lg" tabindex="-1" role="button">Login</a>
                      ';};


make_page($page_name, $content);
?>