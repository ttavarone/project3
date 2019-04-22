<?php
require('functions.php');
require('functions_database.php');
$page_name = 'Change Password';
$table_name = 'th26tava_users';
session_start();

if ($_SESSION['uid']) {
	$uid = $_SESSION['uid'];
      $content = '
      <form method="post" action="change_pwd_script.php">
      <div id="inputGroupDiv" class="input-group">
      	<div id="inputGroup" class="input-group-prepend">
      		<span id="span" class="input-group-text">Old Password</span>
        	<input type="password" aria-label="Old Password" class="form-control" name="opwd">
      	</div>
      	<div id="inputGroup" class="input-group-prepend">
      		<span id="span" class="input-group-text">New Password</span>
        	<input type="text" aria-label="New Password" class="form-control" name="pwd">
      	</div>
      	<div id="inputGroup" class="input-group-prepend">
      		<span id="span" class="input-group-text">Re-type New Password</span>
        	<input type="text" aria-label="Re-type New Password" class="form-control" name="repwd">
      	</div>
        </div>
      	<button type="submit" class="btn btn-primary">Submit</button></form>
      </form>
      ';
    }
    else{$content = '<div id="loginAlert" class="alert alert-warning" role="alert">
                        Error: Must be logged in!
                      </div>
                      <a href="login.php" class="btn btn-primary btn-lg" tabindex="-1" role="button">Login</a>
                      ';};

make_page($page_name, $content);
?>