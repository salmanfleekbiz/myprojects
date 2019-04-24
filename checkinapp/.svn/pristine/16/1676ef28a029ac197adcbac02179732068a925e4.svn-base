<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign extends CI_Controller {

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
			$access1 = $_COOKIE['assignpage'];
			//$access1 = $this->session->userdata('permisionasign');
			if($access1 == 'assign'){
				$this->load->view('assign');
			}else{
				redirect('main');
			}
		}else{

            $controller_redirect_name = $this->uri->segment(1);
            $redirect_session_data = array(
                'redirect'  => $controller_redirect_name
            );
            $this->session->set_userdata($redirect_session_data);

			$this->load->view('login');
		}
       // $this->load->view('assign');
		//$this->load->view('checkinmember');
	}
	public function process(){
		$this->load->view('process');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */