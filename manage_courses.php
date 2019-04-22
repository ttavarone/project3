<?php
  require('functions.php');
  require('functions_database.php');

  $table_name = 'th26tava_courses';	 // Be sure to change this to your userid, e.g., f01last_courses
  $page_name = 'Manage Courses';

/* -----------------------------------------------------------------------
	 Returns an HTML table for managing courses
----------------------------------------------------------------------- */	
function show_admin_table($table_name) {
	global $page_name;
	session_start();						// Restore session variables
	if ($_SESSION['uid']) {			// Only process if a user is logged in
		
		$uid = $_SESSION['uid'];	// Get the uid from the session

		// Get the course id, subject, number and user id
		if($uid == '1'){
			$rows = run_query("SELECT cid, sub, num, uid FROM $table_name ORDER BY cid");
		}
		else {
			$rows = run_query("SELECT cid, sub, num, uid FROM $table_name WHERE uid='$uid' ORDER BY cid");	
		}
		
		if ($rows) { // Only process if there are rows
	
			$out = '<h2>'.$page_name.'</h2><a role="button" href="create_course.php" class="btn btn-primary">Add Course</a><div id="scroll"><ul id="listgroup" class="list-group">';
			while($row = $rows->fetch_assoc()) {
				$cid = $row['cid'];
				$sub = $row['sub'];
				$num = $row['num'];
				$cuid = $row['uid'];

				//need to update the href links
				$out .= '<li class="list-group-item">
                          		<a href="update_course.php?cid='.$cid.'" role="button" class="btn btn-warning d-inline">Edit</a>
                          		<a id="'.$cid.'" role="button" class="btn btn-danger d-inline deletec">X</a>
                          		<span>   '.$cid.', '.$sub.', '.$num.', UID: '.$cuid.'</span>
                      		</li>';
			}
			$out .= '</ul></div>';
		}		
	}

	else{$out = '<div id="loginAlert" class="alert alert-warning" role="alert">
                        Error: Must be logged in!
                      </div>
                      <a href="login.php" class="btn btn-primary btn-lg" tabindex="-1" role="button">Login</a>
                      ';};
	return $out;
}

$content = show_admin_table($table_name);

make_page($page_name, $content);
?>