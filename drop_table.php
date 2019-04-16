<?php
	
	require('functions.php');
	require('functions_database.php');
	
	$table_name = $_GET["table_name"];

	$sql = "DROP TABLE $table_name";
			
	$result = run_query($sql);
	
	if ($result === TRUE) {
    $content = 'Table '.$table_name.' dropped';
	}
	else {
		$content = 'Error: '.$db->error;
	}
	
	
	make_page('Drop table', $content);
	
?>