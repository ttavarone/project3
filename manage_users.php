<?php
	require('functions.php');
	require('functions_database.php');

  $page_name = 'Manage Users';

  session_start();            // Restore session variables
  if ($_SESSION['uid']) {
    if($_SESSION['uid'] == '1'){
    	$users = run_query("SELECT uid, first, last, email FROM th26tava_users");

        $content = '<ul class="list-group">';
        while($user = $users->fetch_assoc()){
          $uid = $user['uid'];
          $first = $user['first'];
          $last = $user['last'];
          $email = $user['email'];
          
          $content .= '<li class="list-group-item">
                          <a role="button" class="btn btn-warning d-inline">Edit</a>
                          <a href="user_profile.php?uid='.$uid.'" class="d-inline">'.$first.' '.$last.', '.$email.'</a>
                          <a href="update_user.php?uid='.$uid.'" role="button" class="btn btn-danger d-inline">X</a>
                      </li>';
        }
        $content .= '</ul>';
      }
    }
    else{$content = '<div class="alert alert-warning" role="alert">
                        Error: Must be logged in as admin to manage users!
                      </div>
                      <a href="login.php" class="btn btn-primary btn-lg" tabindex="-1" role="button">Login</a>
                      ';};

	
	make_page($page_name, $content);
?>