<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
		$this->user_lib->check_user_auth();
	}
	
	public function logout() {
		$this->user_lib->set_logged(false);
        $user_session_data = array(
            'username'     => '',
            'usertoken'     => ''
        );
        $this->session->unset_userdata($user_session_data);
		unset($_COOKIE['checkinpage']);
		unset($_COOKIE['assignpage']);
		unset($_COOKIE['waitlistpage']);
		setcookie('checkinpage', null, -1, '/');
    	setcookie('assignpage', null, -1, '/');
    	setcookie('waitlistpage', null, -1, '/');
		redirect(base_url("login"));
	}

    public function index()
    {
        //echo $this->session->userdata('redirect'); die;
        //$this->load->library('session');
        if($this->session->userdata('redirect') && $this->session->userdata('redirect') != "") {
            $controller_name = $this->session->userdata('redirect');
            $redirect_session_data = array(
                'redirect'     => ''
            );
            $this->session->unset_userdata($redirect_session_data);
            redirect(base_url($controller_name));
        } else {
            $this->load->view('main');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */