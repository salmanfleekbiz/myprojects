<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservations extends CI_Controller {

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
			$access2 = $_COOKIE['waitlistpage'];
			//$access2 = $this->session->userdata('permisionreservation');
			if($access2 == 'reservations'){
				$this->load->view('reservations');
			}else{
				redirect('main');
			}

        } else{

            $controller_redirect_name = $this->uri->segment(1);
            $redirect_session_data = array(
                'redirect'  => $controller_redirect_name
            );
            $this->session->set_userdata($redirect_session_data);

            $this->load->view('login');
        }
    }

    public function reservationData(){
        $processedData = array();
        $todayDate = date("Y-m-d");

        $reservation_data = file_get_contents(API_URL_GET_RESERVATIONS);
        $reservation_data = json_decode($reservation_data, true);
        $i = 0;

        foreach($reservation_data['data']['results'] as $reservation) {

            if(empty($reservation['isDeleted']) && empty($reservation['isConfirmed']) && empty($reservation['isNoShow']) && empty($reservation['isCanceled']) /*&& $reservation['date'] == $todayDate*//*"2016-01-31"*/) {
                $processedData[] = $reservation;

                if(!empty($reservation['isBirthday'])) {
                    $processedData[$i]['occasion'] = "Birthday";
                } else if(!empty($reservation['isAnniversary'])) {
                    $processedData[$i]['occasion'] = "Anniversary";
                } else {
                    $processedData[$i]['occasion'] = "None";
                }

                if(!empty($reservation['isFirstTime'])) {
                    $processedData[$i]['occasion'] .= "<br/>- First Time";
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

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => "apicode: ".API_CODE."\r\n" .
                    "Content-type: application/x-www-form-urlencoded\r\n" .
                    "token: ".$this->input->post("userToken")."\r\n",
                'content' => $postdata
            )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents(API_URL_WAITING_QUEUE, false, $context);
        $result = json_encode($result, true);
        if($result) echo '1'; else '0';
    }

    public function reservationLog() {

        $resCode = $this->input->post("resCode");
        $fName = $this->input->post("fName");
        $lName = $this->input->post("lName");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $status = $this->input->post("status");

        $postdata = http_build_query(
            array(
                'reservationCode' => $resCode,
                'firstname' => $fName,
                'lastname' => $lName,
                'emailaddress' => $email,
                'phone' => $phone,
                'status' => $status
            )
        );

        //$headArray = ['apicode: '.API_CODE,'Content-type: application/x-www-form-urlencoded'];
        $headArray = 'apicode: '.API_CODE;

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => $headArray,
                'content' => $postdata
            )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents(API_URL_RESERVATION_LOG, false, $context);
        $result = json_decode($result, true);
        // print_r($result);
        if($result) echo '1'; else '0';
    }

    public function cancelReservation() {

        $resCode = $this->input->post("resCode");

        $postdata = http_build_query(
            array(
            )
        );

        //$headArray = ['apicode: '.API_CODE,'Content-type: application/x-www-form-urlencoded'];
        $headArray = 'Content-type: application/json';

        $opts = array('http' =>
            array(
                'method' => 'DELETE',
                'header' => $headArray,
                'content' => $postdata
            )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents("https://services.nextable.com/api/v1/reservations?restaurantId=0EP87552H&reservationId=".$resCode."&apiKey=D6D47E8EF63847B85959C9C7C7546", false, $context);
        $result = json_decode($result, true);
        if($result) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function confirmReservation() {

        $resCode = $this->input->post("resCode");
        $postdata = http_build_query(
            array(
            )
        );

        $headArray = 'Content-type: application/json';

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => $headArray,
                'content' => $postdata
            )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents("https://services.nextable.com/api/v1/reservations/".$resCode."/confirm?restaurantId=0EP87552H&reservationId=".$resCode."&apiKey=D6D47E8EF63847B85959C9C7C7546", false, $context);
        $result = json_decode($result, true);

        if($result) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function process(){
        $this->load->view('process');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */