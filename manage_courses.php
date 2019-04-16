<?php
  require('functions.php');

/* -----------------------------------------------------------------------
	 Returns an HTML table for managing courses
----------------------------------------------------------------------- */	
function show_admin_table($table_name) {
	
	session_start();						// Restore session variables
	if ($_SESSION['uid']) {			// Only process if a user is logged in
		
		$uid = $_SESSION['uid'];	// Get the uid from the session

		// Get the course id, subject, number and user id
		$rows = run_query("SELECT cid, sub, num, uid FROM $table_name WHERE uid='$uid'");
		
		if ($rows) { // Only process if there are rows
			
			// Hard-code the table header row (ths)
			$ths .= '
				<tr>
					<th>Admin Controls</th>
					<th>cid</th>
					<th>sub</th>
					<th>num</th>
					<th>uid</th>
				</tr>';
			
			// Loop for each row and use the cid to create custom URL links for editing and deleting courses	
			while($row = $rows->fetch_assoc()) {
				$tds .= '
					<tr>
						<td>
							<a class="btn btn-sm btn-warning" href="update_course.php?cid='.$row['cid'].'">Edit</a>
							<a class="btn btn-sm btn-danger" href="delete_course.php?cid='.$row['cid'].'">X</a>
						</td>
						<td>'.$row['cid'].'</td>
						<td>'.$row['sub'].'</td>
						<td>'.$row['num'].'</td>
						<td>'.$row['uid'].'</td>
					</tr>';
			}
			
			// Slice the header row and table data into a Bootstrap table
			$table =  '
				<table class="table">
				 <thead>
				 	'.$ths.'
				 </thead>
				 <tbody>
				 	'.$tds.'
				 </tbody>
				</table>';		
		
			// Return the table
			return $table;			
		}
		return 'No rows';
	}
	return 'Must be logged in';
}	

$table_name = 'th26tava_courses';	 // Be sure to change this to your userid, e.g., f01last_courses
$page_name = 'Manage '.$table_name;

$content = '<h2>'.$page_name.'</h2>';
$content .= show_admin_table($table_name);

make_page($page_name, $content);
?>