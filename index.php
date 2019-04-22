<?php

require('functions.php');

if($_SESSION['uid']){
	redirect('user_profile.php');}
else{
	redirect('login.php');
}

?>