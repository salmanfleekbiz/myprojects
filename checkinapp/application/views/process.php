<?php 
session_start();

?>
<?php
$action = htmlspecialchars($_REQUEST['action'], ENT_QUOTES);
if($action == 'selectmember'){
$member = htmlspecialchars($_REQUEST['member'], ENT_QUOTES);
echo $member;
}
if($action == 'searchqrcode'){
$searchingresults = htmlspecialchars($_REQUEST['searchingresults'], ENT_QUOTES);
$qrcode = htmlspecialchars($_REQUEST['qrcode'], ENT_QUOTES);	
echo $qrcode;
}
if($action == 'showsearchresult'){
$searchArray = htmlspecialchars($_REQUEST['searchArray'], ENT_QUOTES);
$arr = explode(",",$searchArray);
$memberidsArray = htmlspecialchars($_REQUEST['memberidsArray'], ENT_QUOTES);
$ids = explode(",",$memberidsArray);
?>
<!--<input type="hidden" name="addmembertotal" id="addmembertotal" value="<?php //echo count($arr); ?>" />-->
<ul class="showmember">
<?php
for($i=0;$i<count($arr);$i++){
if($arr[$i] != ''){	
?>
<li><span><?php echo $arr[$i]; ?></span>&nbsp;<a class="removemember" name="<?php echo $arr[$i]; ?>" id="<?php echo $ids[$i]; ?>">x</a></li>

<?php }else{} } ?>
</ul>
<?php 
}if($action == 'checkmember'){
$member_name = htmlspecialchars($_REQUEST['member_name'], ENT_QUOTES);	
$searchArray = htmlspecialchars($_REQUEST['searchArray'], ENT_QUOTES);
$allmembersIds = htmlspecialchars($_REQUEST['allmembersIds'], ENT_QUOTES);
$member_id = htmlspecialchars($_REQUEST['member_id'], ENT_QUOTES);
$arr = explode(",",$allmembersIds);
if (in_array($member_id, $arr))
{
  echo "Done";
}
else
{
 echo "Match not found";
}
}
if($action == 'selecttime'){
$memberid = htmlspecialchars($_REQUEST['memberid'], ENT_QUOTES);
echo $memberid;
}
if($action == 'searchmembers'){
	$srchby = htmlspecialchars($_REQUEST['srchby'], ENT_QUOTES);	
	$searchby = htmlspecialchars($_REQUEST['searchby'], ENT_QUOTES);
	
	echo 'Serch By:'.$searchby.' field: '.$srchby;
}
if($action == 'checkpartymember'){
$membersidsadd = htmlspecialchars($_REQUEST['membersidsadd'], ENT_QUOTES);
$memids = explode(",",$membersidsadd);
$partymember = $_POST['partymember'];
$partymemids = explode(",",$partymember);
//$result = array_diff($memids, $partymemids);
if( array_values($memids) === array_values($partymemids)){
	echo "comparenotdone";
}else{
	echo "comparedone";
}
}
if($action == 'checkjuniorisfirst'){
$allmembersIds = htmlspecialchars($_REQUEST['allmembersIds'], ENT_QUOTES);
$isjuniors = htmlspecialchars($_REQUEST['isjuniors'], ENT_QUOTES);
	if($isjuniors == 'true' && $allmembersIds == ''){
		echo 'firstjunior';
	}else{
		echo 'notfirstjunior';
	}
}
if($action == 'checkjuniorauthoriz'){
$isjuniors = htmlspecialchars($_REQUEST['isjuniors'], ENT_QUOTES);
$isauthoriz = htmlspecialchars($_REQUEST['isauthoriz'], ENT_QUOTES);
$primarymember_gamertag = htmlspecialchars($_REQUEST['primarymember_gamertag'], ENT_QUOTES);
$allmembersIds = htmlspecialchars($_REQUEST['allmembersIds'], ENT_QUOTES);
$adultGamerTags = htmlspecialchars($_REQUEST['adultGamerTags'], ENT_QUOTES);
$members = explode(",",$allmembersIds);
$adultGamerTagArray = explode(",",$adultGamerTags);
	if($isjuniors == 'true' && $isauthoriz == 'false'){
		if (in_array($primarymember_gamertag, $members) || in_array($primarymember_gamertag, $adultGamerTagArray))
		{
			echo "primarymemberadded";
		}
	  	else
		{
			echo "primarymembernotadded";
		}
	}else{
		echo "primarymemberadded";
	}
}
if($action == 'checkpass'){
$userpass = htmlspecialchars($_REQUEST['userpass'], ENT_QUOTES);
echo $userpass;
}
if($action == 'loogin'){
$username = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
$userpassword = htmlspecialchars($_REQUEST['userpassword'], ENT_QUOTES);
$remember = htmlspecialchars($_REQUEST['remember'], ENT_QUOTES);
$token = htmlspecialchars($_REQUEST['token'], ENT_QUOTES);
//if($username == 'admin' && $userpassword == 'MoRo@357'){
	if($remember == 1){
	$cookie_name = "user";
	$cookie_pass = "passw";
	$cookie_token = "usertoken";
	$cookie_pass_value = $userpassword;
	$cookie_value = $username;
	$cookie_token_value = $token;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	setcookie($cookie_pass, $cookie_pass_value, time() + (86400 * 30), "/"); // 86400 = 1 day		
	setcookie($cookie_pass, $cookie_token_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	$this->user_lib->set_logged(true);
			  $user_session_data = array(
				  'username'  => $username,
				  'usertoken'  => $token
			  );
	 $this->session->set_userdata($user_session_data);
	echo 'logincorrect';
	}else{
		unset($_COOKIE['user']);
		unset($_COOKIE['usertoken']);
		unset($_COOKIE['passw']);
		
		setcookie('user', null, -1, '/');
    	setcookie('passw', null, -1, '/');
    	setcookie('usertoken', null, -1, '/');
	$this->user_lib->set_logged(true);
			  $user_session_data = array(
				  'username'  => $username,
                  'usertoken'  => $token
			  );
	 $this->session->set_userdata($user_session_data);
	echo 'logincorrect';
	}
}
if($action == 'accesscheckin'){
$page0 = htmlspecialchars($_REQUEST['pagename0'], ENT_QUOTES);
if($page0 == 'checkinmember'){
$cookie_page0 = "checkinpage";
$cookie_page0_value = $page0;
setcookie($cookie_page0, $cookie_page0_value, time() + (86400 * 30), "/"); // 86400 = 1 day	
echo 'ok';
}else{
$cookie_page0 = "checkinpage";
$cookie_page0_value = 'checkingpage_noaccess';
setcookie($cookie_page0, $cookie_page0_value, time() + (86400 * 30), "/"); // 86400 = 1 day	
echo 'no';	
}
}
if($action == 'accessassign'){
$page1 = htmlspecialchars($_REQUEST['pagename1'], ENT_QUOTES);
if($page1 == 'assign'){
$cookie_page1 = "assignpage";
$cookie_page1_value = $page1;
setcookie($cookie_page1, $cookie_page1_value, time() + (86400 * 30), "/"); // 86400 = 1 day
echo 'ok';
}else{
$cookie_page1 = "assignpage";
$cookie_page1_value = 'assignpage_noaccess';
setcookie($cookie_page1, $cookie_page1_value, time() + (86400 * 30), "/"); // 86400 = 1 day
echo 'no';	
}
}
if($action == 'accesswaitlist'){
$page2 = htmlspecialchars($_REQUEST['pagename2'], ENT_QUOTES);
if($page2 == 'reservations'){
$cookie_page2 = "waitlistpage";
$cookie_page2_value = $page2;
setcookie($cookie_page2, $cookie_page2_value, time() + (86400 * 30), "/"); // 86400 = 1 day
echo 'ok';
}else{
$cookie_page2 = "waitlistpage";
$cookie_page2_value = 'waitlistpage_noaccess';
setcookie($cookie_page2, $cookie_page2_value, time() + (86400 * 30), "/"); // 86400 = 1 day
echo 'no';	
}
}
/*if($action == 'accessassign'){
$page1 = htmlspecialchars($_REQUEST['pagename1'], ENT_QUOTES);
if($page1 == 'assign'){
$pages_access_assign = array('permisionasign'  => $page1);
$this->session->set_userdata($pages_access_assign);
echo 'ok';
}
}
if($action == 'accesswaitlist'){
$page2 = htmlspecialchars($_REQUEST['pagename2'], ENT_QUOTES);
if($page2 == 'reservations'){
$pages_access_waitlist = array('permisionreservation'  => $page2);
$this->session->set_userdata($pages_access_waitlist);
echo 'ok';
}
}*/
?>