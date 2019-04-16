<?php
require('functions.php');
require('functions_database.php');

$page_name = 'Update User Info';
$table_name = 'th26tava_users';
session_start();
$uid = $_SESSION['uid'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST) {
    $submitted_first = $_POST['first']; // get user submitted first name update
    $submitted_last = $_POST['last']; // get user submitted password update
    $submitted_email = $_POST['email'];
    $submitted_bio = $_POST['bio'];
    // Update the user below
    $result = run_query("UPDATE th26tava_users SET first='$submitted_first', last='$submitted_last', bio='$submitted_bio', email='$submitted_email' WHERE uid='$uid'");
    
    	if($result){
    		$content = '<p>Successfully updated'.$submitted_first.'</p>';
    		make_page($page_name, $content);
    		die();
    	}
    };

  };

//$content = '<p>Unsuccessful.</p>';



$user_info = run_query("SELECT * FROM $table_name WHERE uid='$uid'");

$first = '';
$last = '';
$email = '';
$bio = '';

while($info = $user_info->fetch_assoc()){
          $first = $info['first'];
          $last = $info['last'];
          $email = $info['email'];
          $bio = $info['bio'];
};

$content = '
<form method="post" action="update_user.php">
	<div class="input-group">
  		<div class="input-group-prepend">
    		<span class="input-group-text">First and last name</span>
  		</div>
  		<input type="text" aria-label="First name" class="form-control" name="first">
  		<input type="text" aria-label="Last name" class="form-control" name="last">
	</div>
	<div class="input-group-prepend">
		<span class="input-group-text">Email</span>
  	<input type="text" aria-label="Email" class="form-control" name="email">
	</div>
	<div class="input-group-prepend">
		<span class="input-group-text">Bio</span>
  	<input type="text" aria-label="Bio" class="form-control" name="bio">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button></form>
</form>
';

make_page($page_name, $content);

?>