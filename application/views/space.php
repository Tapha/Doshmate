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
           new countDown("<?php echo $base_url; ?>","<?php echo time(); ?>"); 
        });
        
        function bid(prodId){
            
            new Ajax.Request('<?php echo $base_url.'bid'; ?>', {
                  method: 'post',
                  parameters : "product_id="+prodId
            });
            
        }
        </script>
</head>
<body>
<div id='icon_iphone'>
    <div id='beta'>Beta</div>
    <a href='<?php echo $base_url ?>'><img id='big_logo2' src='<?php echo $base_url.'images/big-logo2.png'; ?>'></a>
</div>
<ul class="links">
    <li><a href="<?php echo $base_url."winners"; ?>">Winners</a></li>
    <li><a href="<?php echo $base_url."earn"; ?>">Affiliates</a></li>
    <li><a href="<?php echo $base_url."works" ?>">How It Works</a></li>
    <li><a href="<?php echo $base_url."faq"; ?>">FAQ</a></li>
    <li class="last"><a href="<?php echo $base_url."logout"; ?>">Logout</a></li>
</ul>
<div id='main'>
    <img class='product' src='<?php echo $base_url.$product_image; ?>'>
    <div class='info_product' id="product_<?php echo $product_id;?>" >
        <div class='title_product'>	
                    <h1><?php echo $product_name; ?></h1>
            </div>
            <div class='price'>	
                    <h1>RRP: <?php echo $rrp; ?></h1>
            </div>
            <div class='selling_for'>	
                    <h1><span><?php echo $selling_price; ?></span></h1>
            </div>
            <div class='winning_user'>	
                    <h1><span><?php echo $winning_user; ?></span></h1>
            </div>
            <div class='timer'>
                    <h2><span><?php echo $difference; ?></span></h2>
            </div>
            <button class="cupid-green" onclick="bid(<?php echo $product_id;?>)">Place A Bid</button>
    </div>
    <div id='product_description'>
    <br/>
    <p>Product Description.</p>
    </div>
    <div id='side_box'>
        <div id='login_box_half'>
            <h1>YOU ARE IN</h1>
        </div>
        <div id='how_it_works'>
            <div id='logo'>
                    <img src="<?php echo $base_url.'images/how_it_works.png'; ?>">
            </div>
            <div id='register_bid'>
                    <img id='Money' src="<?php echo $base_url.'images/Money-bag-128.png'; ?>">
                    <img id='word_register' src="<?php echo $base_url.'images/register_words.png'; ?>">
            </div>
            <div id='bid_stuff'>
                    <img id='gamepad-128' src="<?php echo $base_url.'images/game_pad-128.png'; ?>">
                    <img id='bid_img' src="<?php echo $base_url.'images/bid_stuff.png'; ?>">
            </div>
            <div id='win_stuff'>
                    <img id='ipad-128' src="<?php echo $base_url.'images/ipad-128.png'; ?>">
                    <img id='win_img' src="<?php echo $base_url.'images/win_img.png'; ?>">
            </div>
        </div>
    </div>
</div>
</body>
</html>
