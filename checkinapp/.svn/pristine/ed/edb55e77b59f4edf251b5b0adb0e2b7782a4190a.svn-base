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
	public function __construct() {
		parent::__construct();
		
	}
	 
	public function index()
	{
		if($this->user_lib->is_logged_waqas()){
			$this->load->view('main');
		}else{
			$this->load->view('login');
		}
	}
	public function process(){
		$this->load->view('process');
	}
	/*public function auth() {
	$username = $this->input->post("username");
	$userpassword = $this->input->post("userpassword");
	if($username == "" && $userpassword == "") {
	 $this->user_lib->set_logged(true);
			  $user_session_data = array(
				  'username'  => $username
			  );
	 $this->session->set_userdata($user_session_data);
	 redirect(base_url("main"));
	}
	  
	else {
	 redirect(base_url("login/?error=1"));
	}
   }*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */