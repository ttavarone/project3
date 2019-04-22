<?php

require('functions.php');
require('functions_database.php');

$page_name = 'Admin';

session_start();            // Restore session variables
  if ($_SESSION['uid']) {
    if($_SESSION['uid'] == '1'){

		$user_options = array(
			'Add User' => 'join.php',
			'Edit Users' => 'manage_users.php',
			'Show User Table' => 'show_table.php?table_name=th26tava_users',
			'Create New User Table' => 'create_users_table.php',
		);
		$course_options = array(
			'Add Course' => 'create_course.php',
			'Edit Courses' => 'manage_courses.php',
			'Show Courses Table' => 'show_table.php?table_name=th26tava_courses',
			'Create New Courses Table' => 'create_courses_table.php',
		);

		//  for user options array
		$content = '<div class="col-md-6" id="userOpt"><h2>Admin: User Options</h2><nav id="adminNav" class="nav"><div id="adminNav" class="list-group">';
		foreach ($user_options as $option => $value) {
			$content .= '<a href="'.$value.'" class="list-group-item list-group-item-action">'.$option.'</a>';
		}
		$content .= '</div></nav></div>';

		//  for course table options array
		$content .= '<div class="col-md-6" id="courseOpt"><h2>Admin: Course Table Options</h2><nav id="adminNav" class="nav"><div id="adminNav" class="list-group">';
		foreach ($course_options as $option => $value) {
			$content .= '<a href="'.$value.'" class="list-group-item list-group-item-action">'.$option.'</a>';
		}
		$content .= '</div></nav></div>';
	}
}
else{$content = '<div id="loginAlert" class="alert alert-warning" role="alert">
                        Error: Must be logged in as admin!
                      </div>
                      <a href="login.php" class="btn btn-primary btn-lg" tabindex="-1" role="button">Login</a>
                      ';};

make_page('Admin', $content);

?>