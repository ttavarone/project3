<?php
	require('functions.php');
	require('functions_database.php');

	$users = run_query("SELECT uid, first, last, email FROM th26tava_users");

    $content = '<div class="list-group">';
    while($user = $users->fetch_assoc()){
      $uid = $user['uid'];
      $first = $user['first'];
      $last = $user['last'];
      $email = $user['email'];
      
      $content .= '<a href="user_profile.php?uid='.$uid.'" class="list-group-item list-group-item-action">'.$first.' '.$last.', '.$email.'</a>';
    }
	$content .= '</div>';

	make_page('Users', $content);
?>