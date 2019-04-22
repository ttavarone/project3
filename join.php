<?php
	require('functions.php');

	$this_script = basename(__FILE__);
	$page_name = 'Join';
	$link_to = 'user_profile.php';
	$form_content = '<form method="post" action="add_user.php"><div id="inputGroupDiv" class="input-group">';

	$text_fields = array(
		'first' => 'First name',
		'last' => 'Last name',
		'email' => 'Email',
		'school' => 'School',
		'major' => 'Major',
		'gyear' => 'Graduation Year',
		'bio' => 'Biography',
		'pwd' => 'Password',
		'repwd' => 'Re-type password'
	);

	$type = 'text';
	foreach($text_fields as $name => $label){
		
		if($name == 'pwd' || $name == 'repwd'){
			$type = 'password';
		}

		$form_content .= '
			<div id="inputGroup" class="input-group-prepend">
      			<span id="span" class="input-group-text">'.$label.'</span>
        		<input type="'.$type.'" aria-label="'.$label.'" class="form-control" name="'.$name.'" required>
      		</div>
		';

		// $form_content .= '<div class="input-group-prepend"><div class="form-group col-md-6">
		// 	    <label for="'.$name.'">'.$label.'</label>
		// 	    <input type="'.$type.'" class="form-control" name="'.$name.'" id="'.$name.'" value="'.$_POST[$name].'" required>
		// 	</div></div>';
	};
	$form_content .= '<input type="submit" class="btn btn-primary"></form>
	';

	$style = '.form-group {
	  margin: auto;
	  width: 25%;
	  padding: 1%;
	  border: 1px solid black;
	  border-radius: 2px;
	  }';

	make_page ($page_name, $form_content, $style);
?>