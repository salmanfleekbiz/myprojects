<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shooting_lounge extends CI_Controller {

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
			$this->load->view('shootinglounge');
		}else{
			$this->load->view('login');
		}
        //$this->load->view('shootinglounge');
		//$this->load->view('checkinmember');
	}
	public function process(){
		$this->load->view('process');
	}

    public function reservationData(){
        $processedData = array();
        $todayDate = date("Y-m-d");
        //echo $todayDate; die;
        //echo file_get_contents("https://services.nextable.com/api/v1/restaurants/Z3R9056IR/customers/635889633995947136/reservations?page=0&pageSize=10&apiKey=D6D47E8EF63847B85959C9C7C7546");
        //echo file_get_contents("https://services.nextable.com/api/v1/restaurants/Z3R9056IR/customers/635889633995947136/reservations?apiKey=D6D47E8EF63847B85959C9C7C7546");
        //$reservation_data = file_get_contents("https://services.nextable.com/api/v1/restaurants/Z3R9056IR/customers/635889633995947136/reservations?apiKey=D6D47E8EF63847B85959C9C7C7546");
        $reservation_data = file_get_contents("https://services.nextable.com/api/v2/restaurants/Z3R9056IR/reservations?apiKey=D6D47E8EF63847B85959C9C7C7546");
        $reservation_data = json_decode($reservation_data, true);
        $i = 0;
        //print_array($reservation_data); die;
        //echo $reservation_data['reservations'][0]['firstName']; die;
        //foreach($reservation_data['reservations'] as $reservation) {
        foreach($reservation_data['data']['results'] as $reservation) {
            //print_array($reservation);
            if(empty($reservation['isNoShow']) && empty($reservation['isCanceled']) /*&& $reservation['date'] == $todayDate*//*"2016-01-31"*/) {
                $processedData[] = $reservation;

                if(!empty($reservation['isBirthday'])) {
                    $processedData[$i]['occasion'] = "Birthday";
                } else if(!empty($reservation['isAnniversary'])) {
                    $processedData[$i]['occasion'] = "Anniversary";
                } else {
                    $processedData[$i]['occasion'] = "None";
                }
                $i++;
            }
        }

        echo json_encode($processedData);
    }

    public function waitlistReorder() {

        $postdata = http_build_query(
            array(
                'new_position' => $this->input->post("new_position"),
                'old_position' => $this->input->post("old_position"),
                'siteid' => 1
            )
        );

        $headArray = ['apicode: '.API_CODE,'Content-type: application/x-www-form-urlencoded'];

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => $headArray,
                'content' => $postdata
            )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents(API_URL_WAITING_QUEUE, false, $context);
        $result = json_decode($result, true);
       // print_r($result);
        if($result) echo '1'; else '0';
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */