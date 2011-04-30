<?php

    

    function format_price($price){
        
        return "$".number_format($price,2);
        
    }
    
    function getCountdownDiff($start,$end){
        
        $start_timestamp = strtotime($start);
        $end_timestamp = strtotime($end);
        $total_seconds = $end_timestamp - $start_timestamp;
        
        if($total_seconds>0){
            $seconds_remaing = $total_seconds%60;
            $minutes_remaining = floor($total_seconds/60)%60;
            $hours_remaining =   floor($total_seconds/3600);
        }
        else {
            $seconds_remaing=$minutes_remaining=$hours_remaining=0;
        }
        
        $seconds_remaing=($seconds_remaing<10?"0":"").$seconds_remaing;
        $minutes_remaining=($minutes_remaining<10?"0":"").$minutes_remaining;
        $hours_remaining=($hours_remaining<10?"0":"").$hours_remaining;

        return $hours_remaining . ":" . $minutes_remaining . ":" . $seconds_remaing;
        
    }
    
?>
