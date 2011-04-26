<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Doshmate</title>
	<link rel="icon" type="image/png" href="<?php echo $base_url."images/favicon.ico";?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url.'css/space_style.css';?>" />
</head>
<body>
<div id='icon_iphone'>
<div id='beta'>Beta</div><a href='<?php echo $base_url ?>'><img id='big_logo2' src='<?php echo $base_url.'images/big-logo2.png'; ?>'></a>
</div>

<ul class="links">
        <li class="first"><a href="<?php echo $base_url.'account'; ?>">My Account</a></li>
                <li><a href="<?php echo $base_url."buy"; ?>">Buy Bids</a></li>
        <li><a href="<?php echo $base_url."earn"; ?>">Affiliates</a></li>
        <li><a href="<?php echo $base_url."works" ?>">How It Works</a></li>
        <li class="last"><a href="<?php echo $base_url."logout"; ?>">Logout</a></li>
    </ul>
<div id='main'>
		</div>
		<img id='product' src='<?php echo $base_url.'images/apple-ipod-touch.jpg'; ?>'>
		<div id='info_product'>
			<div id='title_product'>	
				<h1><?php echo $product_name; ?></h1>
			</div>
			<div id='price'>	
				<h1>RRP: <?php echo $rrp; ?></h1>
			</div>
			<div id='selling_for'>	
				<h1><?php echo $selling_price; ?></h1>
			</div>
			<div id='winning_user'>	
				<h1><?php echo $winning_user; ?></h1>
			</div>
			<div ='timer'>
				<h2>00:00:00</h2>
			</div>
			  <button class="cupid-green">Place A Bid</button>
	</div>
	<div id='side_box'>
	
		<div id='login_box_half'>
		<p><h1>Your In!</p>
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
