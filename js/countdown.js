function countDown(timestamp){

    var _parent = this;
    
    _parent.timestamp = timestamp;
    
    _parent.products = new Array();
    
    _parent.init = function(){

        var elements = $$("div.info_product"); // Get All Elements

        elements.each(function(element){ // Loop throught all elements
            
            element.countdown = new _parent.timer(element); // Initialize timer function on this element
        });

        _parent.ajax();
    }
    
    _parent.ajax = function(){
        
        setTimeout(function(){
            new Ajax.Request('json.php', {
                  method: 'get',
                  parameters : "products="+_parent.products.join(",")+"&timestamp="+_parent.timestamp+"&"+new Date().getTime(),
                  onSuccess: function(transport) {
                        
                     if(parseInt(transport.responseJSON.timestamp)>0){
                        _parent.timestamp = transport.responseJSON.timestamp;
                     
                     }
                     
                     for(i in transport.responseJSON.products){
                         
                         var product = transport.responseJSON.products[i];
                         var el = $("product_"+product["product_id"]);
                         
                         el.countdown.addTime(product['add_time']);
                         el.countdown.setWinningUser(product['winning_user']);
                         el.countdown.setSellingForPrice(product["current_bid"]);

                     }
                     
                },
                onComplete : _parent.ajax
            });
        },1000);
        
    }

    _parent.timer = function(el){

        var _self = this;
        
        var product_id = el.readAttribute("id").split("_")[1];
        _parent.products.push(product_id);
        
        var $timer = el.getElementsBySelector("div.timer h2")[0];
        var $winning_user = el.getElementsBySelector("div.winning_user h1")[0];
        var $selling_for = el.getElementsBySelector("div.selling_for h1")[0];
        var time_split = $timer.innerHTML.split(":"); // Get time from the element and split it into pieces
        var hours = parseInt(time_split[0].replace(/^0/,""));
        var minutes = parseInt(time_split[1].replace(/^0/,""));
        var seconds = parseInt(time_split[2].replace(/^0/,""));
        
        _self.tick = function(){

            if(seconds==0){ 
                if(hours!=0 || minutes!=0){
                    seconds=59;

                    if(minutes==0){
                        minutes=59;
                        hours = hours-1;
                    }
                    else {
                        minutes=minutes-1;
                    }

                }
                else {
//                    _self.end(); // END if seconds == 0 and hours == 0 and minute = 0
                }
            }
            else {
                seconds=seconds-1;
            }
            
            $timer.update(_self.formatTime(hours,minutes,seconds)); // Insert formatted time
        }
        
        _self.addTime = function(i){
            
            i=parseInt(i);
            
            seconds = seconds + i;
            if(seconds>59) {
                seconds = seconds - 60;
                minutes = minutes + 1;
                if(minutes>59){
                    minutes = minutes - 60;
                    hours = hours + 1;
                }
            }
            
        }

        _self.setWinningUser = function(user){
            
            $winning_user.update(user);
            
        }

        _self.setSellingForPrice = function(price){
            
            $selling_for.update(price);
            
        }
        
        _self.formatTime = function(hours,minutes,seconds){

            hours = (hours<10?"0":"")+hours;
            minutes = (minutes<10?"0":"")+minutes;
            seconds = (seconds<10?"0":"")+seconds;

            return hours + ":" + minutes + ":" + seconds;
        }

        _self.start = function(){

            _self.interval = setInterval(_self.tick,1000); // start timing interval
        }

        _self.end = function(){

            clearInterval(_self.interval); // end timing interval
        }

        _self.start(); // Start counting down after object is created
    }

    _parent.init(); // Start filtering elements and setting up timers
}