<?php
	
require('functions.php');
require('functions_database.php');

$this_script = basename(__FILE__);
$page_name = 'Login';

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST) {
    $submitted_email = $_POST['email']; // get user submitted email
    $submitted_pwd = $_POST['pwd']; // get user submitted password
    // Here we have to fetch the stored password and uid
    $result = run_query("SELECT first, last, uid, pwd FROM th26tava_users WHERE email='$submitted_email'");
    $row = $result->fetch_assoc(); // pointer to all the rows
    $stored_pwd = $row['pwd']; // password stored for user is set to stored pwd for validation
    $stored_uid = $row['uid']; // uid stored for user is set to the stored uid for session setting
    $author = $row['first'].' '.$row['last'];
    
    // Check to see if a password was submitted and if if matches the stored password
    if ($submitted_pwd == $stored_pwd) {
      session_start();
      $_SESSION['uid'] = $stored_uid;
      $_SESSION['author'] = $author;

      if($submitted_email == 'th26tava@siena.edu'){ // if it is me, set to admin session
        $_SESSION['admin'] = $stored_uid;
      }
      else {$_SESSION['admin'] = null;}; // otherwise make it false, no admin access

      redirect('user_profile.php');
    };
  };
};

// The content should be a login form
$content = '
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4">Welcome!</h1>
    <p class="lead">Please login to view or manage courses or users.  Thanks!</p>
  </div>
</div>
<form id="login" method="post" action="login.php">
<div class="row">
  <div class="form-group col">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
  </div>
  </div>
  <div class="row">
  <div class="form-group col">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
  </div>
  </div>
  <button type="submit" class="btn btn-success login">Login</button>
  <button href="join.php" class="btn btn-primary d-inline">Join</button>
</form>

';

// Here you can add embedded CSS for the login form
$style = 'div {
  margin: auto;
  width: 25%;
  padding: 1%;
  border: 1px solid black;
  border-radius: 2px;
  }';


make_page('Login', $content);

?>