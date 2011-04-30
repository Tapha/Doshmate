<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Doshmate</title>
	<link rel="icon" type="image/png" href="<?php echo $base_url."images/favicon.ico";?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url.'css/style.css';?>" />
	<script type="text/javascript" src='<?php echo $base_url.'js/prototype.js';?>'></script>
	<script type="text/javascript" src='<?php echo $base_url.'js/countdown.js';?>'></script>
	<script type="text/javascript" >
        document.observe("dom:loaded", function(){
           new countDown("<?php echo time(); ?>"); 
        });
        </script>
</head>
<body>
<div id='icon_iphone'>
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
	<div id='mini_box'>
		<h1>One Awesome Deal, Everyday!</h1>
		<img id='ipad' src='<?php echo $base_url.'images/ipad.png'; ?>'>
		<div id='text'><p>Register now and invite a friend to get a chance to win a brand new iPad 2! You can Register <a id='r_to_2_b_2' href='<?php echo $base_url.'register'; ?>'>here</a>, It's FREE!</p></div>
		* Terms and conditions apply.
		</div>
		<img class='product' src='<?php echo $base_url.'images/apple-ipod-touch.jpg'; ?>'>
		<div class='info_product' id="product_1">
			<div class='title_product'>	
				<h1><?php echo $product_name; ?></h1>
			</div>
			<div class='price'>	
				<h1>RRP: <?php echo $rrp; ?></h1>
			</div>
			<div class='selling_for'>	
				<h1><?php echo $selling_price; ?></h1>
			</div>
			<div class='winning_user'>	
				<h1><?php echo $winning_user; ?></h1>
			</div>
			<div class='timer'>
				<h2>00:10:00</h2>
			</div>
			  <button class="cupid-green">Place A Bid</button>
	</div>
	<div id='side_box'>
	
		<div id='login_box_half'>
		<a id='r_to_bid' href='<?php echo $base_url.'register'; ?>'>Get Started Bidding!</a>
		<p><?php 
			
			  $this->load->helper('form'); 
		
			  $attributes = array('class' => 'form');
			  
			  echo form_open('login', $attributes);
			  
			  $data = array(
              'name'        => 'username',
              'id'          => 'username',
			  'placeholder' => 'Username',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
			  );
			  
			  echo form_input($data);
			  
			  echo "</br>";
			  
			  $data = array(
              'name'        => 'password',
			  'type'        => 'password',
              'id'          => 'password',
			  'placeholder' => 'Password',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
			  );
			  
			  echo form_input($data);
			  
			  echo "</br>";
			  
			  echo "<input class = 'submit' type = 'submit' value = 'login'>"." <br><a id='forgot' href='".$base_url.'forgot'."'>Forgot?</a>";
		
		?></p>
		</div>
		<div id='how_it_works'>
			<div id='logo'>
				<img src="<?php echo $base_url.'images/how_it_works.png'; ?>">
			</div>
			<div='register_bid'>
				<img id='Money' src="<?php echo $base_url.'images/Money-bag-128.png'; ?>">
				<img id='word_register' src="<?php echo $base_url.'images/register_words.png'; ?>">
			</div>
			<div id='bid_stuff'>
				<img id='gamepad-128' src="<?php echo $base_url.'images/game_pad-128.png'; ?>">
				<img id='bid_img' src="<?php echo $base_url.'images/bid_stuff.png'; ?>">
			</div>
			<div='win_stuff'>
				<img id='ipad-128' src="<?php echo $base_url.'images/ipad-128.png'; ?>">
				<img id='win_img' src="<?php echo $base_url.'images/win_img.png'; ?>">
			</div>
	</div>
<div id='product_description'>
</br>
	<p>
		Product Description.
	</p>
</div>
</div>
</body>
</html>
