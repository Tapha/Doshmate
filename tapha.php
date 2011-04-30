<?php

    
    
    include("common.php");
    
    $sql = "SELECT * FROM bids , users , products WHERE bids.users_id = users.users_id AND products.product_id = bids.product_id AND products.product_id = 1 ORDER BY bid_time DESC LIMIT 1";
    $result=mysql_query($sql) or die(mysql_error());
    
    $bid = mysql_fetch_assoc($result);

    $bid["current_bid"]=format_price($bid["current_bid"]);
    
    $current_time = date("Y-m-d H:j:s");
    $end_time = $bid["ends_at"];
    
    $difference = getCountdownDiff($current_time,$end_time);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Doshmate</title>
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src='js/prototype.js'></script>
	<script type="text/javascript" src='js/countdown.js'></script>

	<script type="text/javascript" >
        document.observe("dom:loaded", function(){
           new countDown("<?php echo time(); ?>"); 
        });
        
        function bid(){
            
            new Ajax.Request('bid.php', {
                  method: 'post',
                  parameters : "users_id=1"
            });
            
        }
        </script>
</head>
<body>
<div id='icon_iphone'>
<div id='beta'>Beta</div><a href=''><img id='big_logo2' src='images/big-logo2.png'></a>
</div>

<ul class="links">
        <li class="first"><a href="register">Register</a></li>
                <li><a href="winners">Winners</a></li>

        <li><a href="earn">Affiliates</a></li>
        <li><a href="works">How It Works</a></li>
        <li class="last"><a href="faq">FAQ</a></li>
    </ul>
<div id='main'>
	<div id='mini_box'>
		<h1>One Awesome Deal, Everyday!</h1>

		<img id='ipad' src='images/ipad.png'>
		<div id='text'><p>Register now and invite a friend to get a chance to win a brand new iPad 2! You can Register <a id='r_to_2_b_2' href='register'>here</a>, It's FREE!</p></div>
		* Terms and conditions apply.
		</div>
		<img class='product' src='images/apple-ipod-touch.jpg'>
		<div class='info_product' id="product_1">
			<div class='title_product'>	
				<h1>Apple iPod Touch 8 GB </h1>

			</div>
			<div class='price'>	
				<h1>RRP: $189.99</h1>
			</div>
			<div class='selling_for'>	
				<h1><span><?php echo $bid["current_bid"]; ?></span></h1>
			</div>
			<div class='winning_user'>	
				<h1><span><?php echo $bid["username"]; ?></span></h1>

			</div>
			<div class='timer'>
				<h2><span><?php echo $difference; ?></span></h2>
			</div>
			  <button class="cupid-green" onclick="bid()">Place A Bid</button>
	</div>
	<div id='side_box'>
	
		<div id='login_box_half'>

		<a id='r_to_bid' href='register'>Get Started Bidding!</a>
		<p><form action="login" method="post" accept-charset="utf-8" class="form"><input type="text" name="username" value="" id="username" placeholder="Username" maxlength="100" size="50" style="width:50%"  /></br><input type="password" name="password" value="" id="password" placeholder="Password" maxlength="100" size="50" style="width:50%"  /></br><input class = 'submit' type = 'submit' value = 'login'> <br><a id='forgot' href='forgot'>Forgot?</a></p>
		</div>
		<div id='how_it_works'>
			<div id='logo'>
				<img src="images/how_it_works.png">
			</div>

			<div id='register_bid'>
				<img id='Money' src="images/Money-bag-128.png">
				<img id='word_register' src="images/register_words.png">
			</div>
			<div id='bid_stuff'>
				<img id='gamepad-128' src="images/game_pad-128.png">
				<img id='bid_img' src="images/bid_stuff.png">
			</div>
			<div id='win_stuff'>

				<img id='ipad-128' src="images/ipad-128.png">
				<img id='win_img' src="images/win_img.png">
			</div>
	</div>
        </div>
</div>

<div id='product_description'>
</br>
	<p>
		Product Description.
	</p>
</div>
</body>
</html>
