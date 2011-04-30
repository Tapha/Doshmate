<?php
    header("Content-Type:application/json");
    mysql_connect("localhost","root","");
    mysql_select_db("mustapha");
    
    $products = $_GET["products"];
    $timestamp = date("Y-m-d H:i:s",$_GET["timestamp"]);

    $json = array(
        "products" => array()
    );
    
    
    function format_price($price){
        
        return "$".number_format($price,2);
        
    }
    
    
    $sql = "SELECT * , (SELECT count(*) FROM bids WHERE bids.product_id = b.product_id AND bid_time > '$timestamp' ) as changes  FROM bids as b , users as u WHERE b.users_id = u.users_id AND b.product_id IN ( $products ) AND b.bid_time > '$timestamp' GROUP BY b.product_id ORDER BY b.bid_time ASC ";
    $sql2 = "SELECT MAX(bid_time) as last_change FROM bids WHERE bid_time > '$timestamp' ";
   
    $result = mysql_query($sql) or die(mysql_error());
    $result2 = mysql_query($sql2) or die(mysql_error());
    
    $row = mysql_fetch_assoc($result2);
    
    $last_change = strtotime($row["last_change"]);
    
    while($row = mysql_fetch_assoc($result)){
       
        $json["products"][]=array(
          "SQL" =>$sql,
          "current_bid"=>format_price($row["current_bid"]),
          "winning_user"=>$row["username"],
          "product_id"=>$row["product_id"],
          "add_time" =>$row["changes"] * 15
        );
        
    }
    
    if(mysql_numrows($result)>0){
        
        $json["timestamp"]=$last_change;
        echo json_encode($json);
        die();
    }
    else {
        
        echo "{}";
        die();
        
    }
?>