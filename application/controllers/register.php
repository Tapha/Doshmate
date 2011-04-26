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
			
			$data['base_url'] = base_url();

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

		$data['email'] = $this->session->userdata('email');

		$data['base_url'] = base_url();

		$this->load->view('space', $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */