<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Doshmate</title>
	<link rel="icon" type="image/png" href="<?php echo $base_url."images/favicon.ico";?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url.'css/style.css';?>" />
</head>
<body>
	<div id='beta'>Beta</div><a href='<?php echo $base_url ?>'><img id='big_logo2' src='<?php echo $base_url.'images/big-logo2.png'; ?>'></a>
	</div>
	<ul class="links">
        <li class="first"><a href="<?php echo $base_url.'register'; ?>">Register</a></li>
                <li><a href="<?php echo $base_url."winners"; ?>">Winners</a></li>
        <li><a href="<?php echo $base_url."earn"; ?>">Affiliates</a></li>
        <li><a href="<?php echo $base_url."works" ?>">How It Works</a></li>
        <li class="last"><a href="<?php echo $base_url."faq"; ?>">FAQ</a></li>
    </ul>
	<div id='main'>
	<?php

	$this->load->helper('form'); 

	$attributes = array('id' => 'registration_form');

	echo form_open('register/user', $attributes);
	
	$username_data = array(
	'name' => 'username',
	'id' => 'reg_username'
	);

	$email_data = array(
	'name' => 'email',
	'id' => 'reg_email'
	);

	$password_data = array(
	'name' => 'password',
	'id' => 'reg_password',
	'type' => 'password'
	);

	echo "<h2>Register HERE</h2>";
	
	echo "<br>";
	
	echo "Username: </br>".form_input($username_data);

	echo "<br>";

	echo "Email: </br>".form_input($email_data);

	echo "<br>";

	echo "Password: </br>".form_input($password_data);

	echo "<br><br>";

	echo form_submit('register','Sign Up');
	
	?>		
	</div>
</body>
</html>