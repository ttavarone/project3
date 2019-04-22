<?php
require('functions.php');
require('functions_database.php');

$page_name = 'Update Course Info';
$table_name = 'th26tava_courses';
$cid = $_GET['cid'];

session_start();

if ($_SESSION['uid']){

    $content = '
    <form method="post" action="update_course_script.php?cid='.$cid.'">
    <div id="inputGroupDiv" class="input-group">
    	<div id="inputGroup" class="input-group-prepend">
    		<span id="span" class="input-group-text">Subject</span>
      	<input type="text" aria-label="sub" class="form-control" name="sub">
    	</div>
      <div id="inputGroup" class="input-group-prepend">
        <span id="span" class="input-group-text">Course Number</span>
        <input type="text" aria-label="num" class="form-control" name="num">
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
                      ';}
make_page($page_name, $content);

?>