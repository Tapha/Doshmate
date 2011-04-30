<?php
    mysql_connect("localhost","root","");
    mysql_select_db("doshmate");
    
    $users_id=$_POST['users_id'];
    
    $sql = "SELECT * FROM bids WHERE product_id = 1 ORDER BY bid_time DESC LIMIT 1 ";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_assoc($result);
    
    if($row["users_id"]==$users_id) break;
    
    $max_bid = ($row["current_bid"]);
    $bid = $max_bid + 0.01;
    $sql = "INSERT INTO bids ( users_id , product_id , bid_time , current_bid ) VALUES  ( '$users_id' , '1' , NOW() , '$bid') ";
    $sql2= "UPDATE products SET ends_at = DATE_ADD(ends_at,INTERVAL 15 SECOND) WHERE product_id = 1";
    $result = mysql_query($sql) or die(mysql_error());
    $result = mysql_query($sql2) or die(mysql_error());
    
?>