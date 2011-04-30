<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bid extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$false = $this->session->userdata('loggedin');

		if ((isset($false)) && ($false == TRUE))

		{
			
                    $users_id=$this->session->userdata('users_id');
                    $product_id = $_POST["product_id"];
                    
                    $sql = "SELECT * FROM bids WHERE product_id = '$product_id' ORDER BY bid_time DESC LIMIT 1 ";
                    $result = $this->db->query($sql);
                    $bid = $result->row();
                    
                    $sql = "SELECT * FROM products WHERE product_id = '$product_id' ";
                    $result = $this->db->query($sql);
                    $product = $result->row();
                    
                    if($bid->users_id==$users_id) die();

                    $max_bid = isset($bid->current_bid)?$bid->current_bid:$product->selling_price;
                    $new_bid = $max_bid + 0.01;
                    $sql = "INSERT INTO bids ( users_id , product_id , bid_time , current_bid ) VALUES  ( '$users_id' , '$product_id' , NOW() , '$new_bid') ";
                    $sql2= "UPDATE products SET ends_at = DATE_ADD(ends_at,INTERVAL 15 SECOND) WHERE product_id = '$product_id'";
                    $this->db->query($sql);
                    $this->db->query($sql2);
                    
		}

		else

		{
			echo "You are not logged in.";
		}
	}
        
	public function refresh()
	{
            header("Content-Type:application/json");

            $products = $_GET["products"];
            $timestamp = date("Y-m-d H:i:s",$_GET["timestamp"]);

            $json = array(
                "products" => array()
            );

            $sql = "SELECT * , (SELECT count(*) FROM bids WHERE bids.product_id = b.product_id AND bid_time > '$timestamp' ) as changes  FROM bids as b , users as u , products as p WHERE p.product_id = b.product_id AND b.users_id = u.users_id AND b.product_id IN ( $products ) AND b.bid_time > '$timestamp' GROUP BY b.product_id ORDER BY b.bid_time ASC ";
            $sql2 = "SELECT MAX(bid_time) as last_change FROM bids WHERE bid_time > '$timestamp' ";

            $result = $this->db->query($sql);
            $result2 = $this->db->query($sql2);

            $row = $result2->row();

            $last_change = strtotime($row->last_change);

            $current_time = date("Y-m-d H:j:s");

            foreach ($result->result() as $row){
                
                $price=format_price(isset($row->current_bid)?$row->current_bid:$row->selling_price);
                $json["products"][]=array(
                  "current_bid"=>($price),
                  "winning_user"=>$row->username,
                  "product_id"=>$row->product_id,
                  "time_remaining" =>getCountdownDiff($current_time,$row->ends_at)
                );

            }

            if($result->num_rows()>0){

                $json["timestamp"]=$last_change;
                echo json_encode($json);
                die();
            }
            else {

                echo "{}";
                die();

            }
            
        }
	
	public function grab() {
		$query = $this->db->get('bids');

		foreach ($query->result() as $row){
			$user_id = $row->users_id;
			$current_bid = $row->current_bid;
		}
		
		$q1 = $this->db->get_where('users', array('users_id' => $user_id));
		
		foreach ($q1->result() as $row){
			$username = $row->username;
		}
		
		//Put data into array
		
		$data['username'] = $username;
		
		$data['current_bid'] = $current_bid;
		
		$this->load->view('update', $data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */