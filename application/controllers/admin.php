<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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

			$this->load->view('innit', $data);         
                    
		}

		else

		{
			$this->load->helper('url');
			
			$data['base_url'] = base_url();

			$this->load->view('admin', $data);
		}
	}
	
	public function login()
	{
		//Get form data

		$username = $_POST['username'];

		$password = md5($_POST['password']);

		//check against the db password and username address.

		$q1 = $this->db->get_where('admin', array('username' => $username));

		$query_pass = $this->db->get_where('admin', array('password' => $password));

		foreach ($q1->result() as $row)
					{
						$db_username = $row->username;

						$admin_id = $row->admin_id;
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

				$q_user_id = $this->db->get_where('admin', array('username' => $username));
				
				foreach ($q_user_id->result() as $row)
					{
						$admin_id = $row->admin_id;
					}

				//make user data in session

				$data_user = array(
				'username' => $username,
				'admin_id' => $admin_id,
				'loggedin' => TRUE
				);	

				$this->session->set_userdata($data_user);

				$data['username'] = $this->session->userdata('username');
                                $data['user_id']= $this->session->userdata('admin_id');
				//log the user in
				
				$this->load->helper('url');
	
				$data['base_url'] = base_url();

				$this->load->view('admin_space', $data);
				
			}

		else
			{echo "Wrong email address or password.";}
	}
      
}	  