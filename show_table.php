<?php

  require('functions.php');
  require('functions_database.php');

  $table_name = $_GET['table_name'];

  session_start();						// Restore session variables
	if ($_SESSION['uid']) {
		if($_SESSION['uid'] == '1'){
			$content = show_table($table_name);
		}
	}
  else{
      $content = '<div id="loginAlert" class="alert alert-warning" role="alert">
                        Error: Must be logged in as admin to view raw table data!
                      </div>
                      <a href="login.php" class="btn btn-primary btn-lg" tabindex="-1" role="button">Login</a>
                      ';
                      $table_name = 'Must Login';
                    }

 make_page($table_name, $content);

?>