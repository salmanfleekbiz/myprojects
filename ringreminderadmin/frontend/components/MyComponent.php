<?php



namespace frontend\components;



use Yii;

use yii\base\Component;



class MyComponent extends Component{



	public $url = 'http://clients2.5stardesigners.net/boxingapp/';

	public $admin_url = 'http://clients2.5stardesigners.net/ringreminderadmin/';

	public $notification_url = 'http://clients2.5stardesigners.net/notification/index.php';

	public function getUserurl(){

		return	$this->url.'v1/user/getuser/1';

	}



	public function add_boxers(){

		return	$this->url.'v1/boxer/addboxer';

	}



	public function show_boxer(){

		return	$this->url.'v1/boxer/allboxers';

	}



	public function get_boxer($id){

		return	$this->url.'v1/boxer/boxerget?id='.$id;

	}



	public function update_boxer(){

		return	$this->url.'v1/boxer/updateboxerdata';

	}



	public function add_channel(){

		return	$this->url.'v1/channel/addchannel';

	}



	public function show_channel(){

		return	$this->url.'v1/channel/allchannel';

	}



	public function get_channel($id){

		return	$this->url.'v1/channel/channelget?id='.$id;

	}



	public function update_channel(){

		return	$this->url.'v1/channel/updatechaneldata';

	}



	public function add_tournament(){

		return	$this->url.'v1/tournament/addtournament';

	}



	public function show_tournament(){

		return	$this->url.'v1/tournament/alltournament';

	}



	public function get_tournament($id){

		return	$this->url.'v1/tournament/tournamentget?id='.$id;

	}

	

	public function update_tournament(){

		return	$this->url.'v1/tournament/updatetournamentdata';

	}



	public function show_tournament_channel(){

		return	$this->url.'v1/channel/allchannel';

	}



	public function show_matches(){

		return	$this->url.'v1/match/allmatch';

	}

	public function viewall_matches(){

		return	$this->url.'v1/match/matchshowbytournamentid';

	}


	public function add_match(){

		return	$this->url.'v1/match/addmatch';

	}



	public function get_match($id){

		return	$this->url.'v1/match/matchget?id='.$id;

	}



	public function update_match(){

		return	$this->url.'v1/match/updatematchdata';

	}

	public function get_matchwinner(){

		return	$this->url.'v1/match/winnernames';

	}

	public function get_matchesbytournamentid(){

		return	$this->url.'v1/match/matchshowbytournamentid';

	}

	public function get_userdeviceIds(){

		return	$this->url.'v1/reminder/userdeviceids';

	}

	public function deletematch(){

		return	$this->url.'v1/match/matchdelet';

	}

	public function alluser(){

		return	$this->url.'v1/user/allusers';

	}

	public function get_redirecturlmatchdelete($id){

		return	$this->admin_url.'index.php?r=site/viewallmatches&id='.$id;

	}

	public function notificationurl(){

		return	$this->notification_url;

	}

	public function menuactive($currentname,$name){

		$getname = explode(",",$name);

		if (in_array($currentname, $getname)) {

    		return 'start active';

		}else{

			return 'start';

		}

	}

}

?>