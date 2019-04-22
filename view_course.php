<?php

require('functions.php');
require('functions_database.php');

$table_name = 'th26tava_courses';
$page_name = 'View Courses';

$uid = $_GET['uid'];

$rows = run_query("SELECT cid, sub, num, descr, title, uid FROM $table_name WHERE uid='$uid' ORDER BY cid");

if ($rows) { // Only process if there are rows
	
	$out = '<h2>'.$page_name.'</h2><div id="scroll"><ul id="listgroup" class="list-group">';
	while($row = $rows->fetch_assoc()) {
		$cid = $row['cid'];
		$sub = $row['sub'];
		$num = $row['num'];
		$cuid = $row['uid'];
		$descr = $row['descr'];
		$title = $row['title'];

		//need to update the href links
		$out .= '<li class="list-group-item">
                  		<a tabindex="0" class="btn" role="button" data-toggle="popover" data-trigger="focus" title="'.$title.'" data-content="'.$descr.'">'.$cid.', '.$sub.', '.$num.', UID: '.$cuid.'</a>
              		</li>';
	}
	$out .= '</ul></div>';
}

make_page($page_name, $out);
