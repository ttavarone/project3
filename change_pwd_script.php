<?php

require('functions.php');
require('functions_database.php');
$table_name = 'th26tava_users';
session_start();
$content = '';

if ($_SESSION['uid']) {
	$uid = $_SESSION['uid'];

	$submitted_oldpwd = $_POST['opwd'];
	$submitted_newpwd = $_POST['pwd'];
	$submitted_newrepwd = $_POST['repwd'];

	$result = run_query("SELECT pwd FROM $table_name WHERE uid='$uid'");
	while($pwd = $result->fetch_assoc()){
		$stored_pwd = $pwd['pwd'];
	}

	if($stored_pwd == $submitted_oldpwd){
		if($submitted_newpwd == $submitted_newrepwd){
			$result = run_query("UPDATE $table_name SET pwd='$submitted_newpwd' WHERE uid='$uid'");
			$content = '
				<div class="alert alert-success" role="alert">
  					Password changed!
				</div>
			';
		}
		else{
			$content = '
				<div class="alert alert-warning" role="alert">
  					New password does not match retyped password.
				</div>
			';
		}
	}
	else{
		$content = '
				<div class="alert alert-warning" role="alert">
  					Current password and old password do not match.
				</div>
			';
	}
}
else{
	$content = '<div id="loginAlert" class="alert alert-warning" role="alert">
                        Error: Must be logged in!
                      </div>
                      <a href="login.php" class="btn btn-primary btn-lg" tabindex="-1" role="button">Login</a>
                      ';
}

make_page('Password Change', $content);

?>