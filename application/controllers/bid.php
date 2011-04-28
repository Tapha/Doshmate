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
			
		}

		else

		{
			echo "You are not logged in.";
		}
	}
	
	public function grab
	{
		$query = $this->db->get('bids');

		foreach ($query->result() as $row)
		{
			$user_id = $row->users_id;
			$current_bid = $row->current_bid;
		}
		
		$q1 = $this->db->get_where('users', array('users_id' => $user_id));
		
		foreach ($q1->result() as $row)
		{
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