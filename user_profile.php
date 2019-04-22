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
      $school = $user_data['school'];
      $major = $user_data['major'];
  }

$content = '<div class="jumbotron">
              <h1 class="display-4">'.$first.' '.$last.'</h1>
                <p class="lead">'.$school.', '.$major.' major</p>
                <hr class="my-4">
                  <p>'.$bio.'</p>
                <a class="btn btn-primary btn-lg" href="mailto:'.$email.'" role="button">Email '.$first.'</a>
                <a class="btn btn-primary btn-lg" href="view_course.php?uid='.$uid.'" role="button">View '.$first.'\'s Courses</a>
            </div>';

//$content .= make_card('Important Links', 'You can find here a view important links to my other online accounts.', 'https://github.com/ttavarone', 'GitHub');

make_page($page_name, $content);

?>