<?php

require('functions.php');
require('functions_database.php');

session_start();
$page_name = 'Profile';


if(empty($_GET)){
	$uid = $_SESSION['uid'];
}
else{
	$uid = $_GET['uid'];
}

$result = run_query("SELECT * FROM th26tava_users WHERE uid='$uid'");

$bio = '';
$first = '';
$last = '';
$email = '';

while($user_data = $result->fetch_assoc()){
      $bio = $user_data['bio'];
      $first = $user_data['first'];
      $last = $user_data['last'];
      $email = $user_data['email'];
  }

$content = make_card($first.' '.$last, $bio, 'mailto:'.$email, 'Email '.$first);

make_page($page_name, $content);

?>