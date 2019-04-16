<?php

require('functions.php');

if(isset($_SESSION['uid'])){
	redirect('user_profile.php');
}else{
	redirect('login.php');
}

?>