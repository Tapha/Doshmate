<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

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
			$this->load->helper('url');
		
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
			
			$data['base_url'] = base_url();
                        $data['username'] = $this->session->userdata('username');
                        $data['user_id']= $this->session->userdata('users_id');

			$this->load->view('space', $data);
		}	
		else

		{

				
			$this->load->helper('url');
			
			$data['base_url'] = base_url();
		
			$this->load->view('register', $data);

		}

	}
	
	public function user()
	{

		$false = $this->session->userdata('loggedin');

		if ((isset($false)) && ($false == TRUE))
		{
			$this->load->helper('url');

			$data['base_url'] = base_url();
			
			//Grab Product Data ->From the db
		
			$product_name = 'Apple iPod Touch 8 GB ';
			//Put word count limit on admin section.
			$data['product_name'] = $product_name;
				
			//Product Image.-> Put it here.
				
			$rrp = '$189.99';
				
			$data['rrp'] = $rrp;
				
			$selling_price = '$1.97'; //Find a way to convert database intergers to currency, like shown <- there. eg. make db integer 197 -> $1.97
				
			$data['selling_price'] = $selling_price;
				
			$winning_user = 'bobindo';
				
			$data['winning_user'] = $winning_user;

			$this->load->view('homepage', $data);
		}	
		else

		{

		$username = $_POST['username'];

		$email = $_POST['email'];

		$password = md5($_POST['password']);  

		//Insert into db

		$insert = array(
		'username' => $username,
		'email' => $email,
		'password' => $password	
		);
		$this->db->insert('users', $insert);

		// create account for users
		
                // GRAB PRODUCT INFO
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
		
		$q1 = $this->db->get_where('users', array('username' => $username));

		foreach ($q1->result() as $row)
					{
						$email = $row->email;
						$users_id = $row->users_id;
					}
		
		//make user data in session

		$data_user = array(
		'email' => $email,
		'users_id' => $users_id,
		'loggedin' => TRUE
		);	
		
		$this->session->set_userdata($data_user);
		/*Add this all later.
		//Email the user with a confirmation link
		//set email library configuration
		 $config = Array(
		 'protocol' => 'smtps',
		 'smtp_host' => 'server22.namecheaphosting.com',
		 'smtp_port' => 465,
		 'smtp_user' => 'no_reply@doshmate.com',
		 'smtp_pass' => 'xxx',
		 'mailtype' => 'html'
		 );

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");	

		$conf_url = "<a href='".base_url()."main/confirm/".$first_name.$appkey.$last_name."'>".base_url()."main/confirm/".$first_name.$appkey.$last_name."</a>";

		$message = "<html>Hi $first_name, <p><br>Click on this confirmation link to get started and confirm your account with us: $conf_url <br><br> Thanks for using us! <b><br><br> Tapha Ngum, <br> Founder, foggypencil</b></html>";

		$this->email->from('no_reply@foggypencil.com', 'FoggyPencil');
        $this->email->to($email); 
		$this->email->subject('Confirmation Link');
		$this->email->message($message);	

		$this->email->send();
		
		$data['email'] = $this->session->userdata('email');

		*/
		$data['base_url'] = base_url();

		$this->load->view('space', $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */