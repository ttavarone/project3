<?php
require('functions.php');
require('functions_database.php');

$page_name = 'Update User Info';
$table_name = 'th26tava_users';
session_start();
$uid = $_GET['uid'];

if ($_SESSION['uid']) {
  if(empty($_GET)){$uid = $_SESSION['uid'];}
      $content = '
      <form method="post" action="update_user_script.php?uid='.$uid.'">
      <div id="inputGroupDiv" class="input-group">
      	<div class="input-group">
        		<div class="input-group-prepend">
          		<span class="input-group-text">First and last name</span>
        		</div>
        		<input type="text" aria-label="First name" class="form-control" name="first">
        		<input type="text" aria-label="Last name" class="form-control" name="last">
      	</div>
      	<div id="inputGroup" class="input-group-prepend">
      		<span id="span" class="input-group-text">Email</span>
        	<input type="text" aria-label="Email" class="form-control" name="email">
      	</div>
      	<div id="inputGroup" class="input-group-prepend">
      		<span id="span" class="input-group-text">Bio</span>
        	<input type="text" aria-label="Bio" class="form-control" name="bio">
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