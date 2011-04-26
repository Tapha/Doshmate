<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

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

		//Destroy Sess

		$data_user = array(
		'loggedin' => FALSE
		);	

		$this->session->set_userdata($data_user);

		$this->session->sess_destroy();

		$this->load->helper('url');

		$data['base_url'] = base_url();
		
		//Grab Product Data
		
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
			echo "You are not logged in.";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */