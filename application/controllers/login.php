<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
    
			$this->load->helper('url');
	
			$data['base_url'] = base_url();
			
			//Grab Product Data
		
			//Put word count limit on admin section.
				
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
			
			$this->load->view('space', $data);
		}	
		else

		{
		
		//Get form data

		$username = $_POST['username'];

		$password = md5($_POST['password']);

		//check against the db password and username address.

		$q1 = $this->db->get_where('users', array('username' => $username));

		$query_pass = $this->db->get_where('users', array('password' => $password));

		foreach ($q1->result() as $row)
					{
						$db_username = $row->username;

						$users_id = $row->users_id;
					}

		if (!isset($db_username))

					{
						$db_username = rand().'number';
					}
		foreach ($query_pass->result() as $row)
					{
						$db_pass = $row->password;
					}

		if (!isset($db_pass))

					{
						$db_pass = rand().'number';
					}			

		if ($db_username == $username && $db_pass == $password)

			{	

				$q_user_id = $this->db->get_where('users', array('username' => $username));
				
				foreach ($q_user_id->result() as $row)
					{
						$users_id = $row->users_id;
					}

				//make user data in session

				$data_user = array(
				'username' => $username,
				'users_id' => $users_id,
				'loggedin' => TRUE
				);	

				$this->session->set_userdata($data_user);

				$data['username'] = $this->session->userdata('username');
                                $data['user_id']= $this->session->userdata('users_id');
				//log the user in
				
				$this->load->helper('url');
	
				$data['base_url'] = base_url();
				
                                //Grab Product Data

                                //Put word count limit on admin section.

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

				$this->load->view('space', $data);
			}

		else

			{
				echo "Wrong username address or password";	
			}
			
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */