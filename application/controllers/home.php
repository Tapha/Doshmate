<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/home/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	
		$false = $this->session->userdata('loggedin');

		if ((isset($false)) && ($false == TRUE))
		{
		
                    //Product Image.-> Put it here.
                    $product_id =  1; // DEFAULT PRODUCT ID

                    $sql = "SELECT * FROM products   WHERE product_id = '$product_id' ";
                    $result=$this->db->query($sql);
                    $product =$result->row();

                    $sql = "SELECT * FROM bids , users  WHERE bids.users_id = users.users_id AND  bids.product_id = '$product_id' ORDER BY bid_time DESC LIMIT 1";
                    $result=$this->db->query($sql);
                    $bid=$result->row();

                    $price=format_price(isset($bid->current_bid)?$bid->current_bid:$product->selling_price);

                    $current_time = date("Y-m-d H:j:s");
                    $end_time = $product->ends_at;

                    $data['product_image'] = $product->product_img;
                    $data['product_id'] = $product->product_id;
                    $data['product_name'] = $product->product_name;	
                    $data['rrp'] = format_price($product->rrp);
                    $data['selling_price'] = $price;
                    $data['winning_user'] = isset($bid->username)?$bid->username:"";
                    $data['difference'] = getCountdownDiff($current_time,$end_time);

                    $this->load->helper('url');

                    $data['base_url'] = base_url();
                    $data['username'] = $this->session->userdata('username');
                    $data['user_id']= $this->session->userdata('users_id');

                    $this->load->view('space', $data);
		
		}
		
		else
		{
		
		$this->load->helper('url');
		
                $product_id =  1; // DEFAULT PRODUCT ID

                $sql = "SELECT * FROM products   WHERE product_id = '$product_id' ";
                $result=$this->db->query($sql);
                $product =$result->row();

                $sql = "SELECT * FROM bids , users  WHERE bids.users_id = users.users_id AND  bids.product_id = '$product_id' ORDER BY bid_time DESC LIMIT 1";
                $result=$this->db->query($sql);
                $bid=$result->row();

                $price=format_price(isset($bid->current_bid)?$bid->current_bid:$product->selling_price);

                $current_time = date("Y-m-d H:j:s");
                $end_time = $product->ends_at;

                $data['product_image'] = $product->product_img;
                $data['product_id'] = $product->product_id;
                $data['product_name'] = $product->product_name;	
                $data['rrp'] = format_price($product->rrp);
                $data['selling_price'] = $price;
                $data['winning_user'] = isset($bid->username)?$bid->username:"";
                $data['difference'] = getCountdownDiff($current_time,$end_time);
                $data['base_url'] = base_url();
	
		$this->load->view('homepage', $data);
		
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */