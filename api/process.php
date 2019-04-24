<?php
$action = $_POST['action'];
if($action == 'checkingdomain'){
$domain = str_replace('www.','',$_POST['domain']);
$domain = str_replace('www','',$_POST['domain']);
$domain = str_replace('/','',$_POST['domain']);
$domain = str_replace(':','',$_POST['domain']);
$domain = str_replace('https','',$_POST['domain']);
$domain = str_replace('http','',$_POST['domain']);	
$domain = trim($_POST['domain']);	
$domain = filter_var($_POST['domain'],FILTER_SANITIZE_URL);	
$url = "https://api.godaddy.com/v1/domains/available?domain=".$domain;
$header = array(
'Authorization: sso-key e42fzJfciKCR_PKe5wpTVzJ7ALtvbyxsZtM:PKf3wNpvL9TS5uQYYxu353'
);
$ch = curl_init();
$timeout=60;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);  
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$result = curl_exec($ch);
curl_close($ch);
$dn = json_decode($result, true);
print_r($dn);
// if(isset($dn['code'])){
// 	$msg = explode(":", $dn['message']);
// 	print_r($msg);
// }else{
// 	if(isset($dn['available']) && $dn['available'] == 1){
// 		$msg = 'Wohoo domain is available';
// 		echo $msg.'2';
// 	}else{
// 		$msg = 'Sorry domain is register';
// 		echo $msg.'3';
// 	}
// }
}
?>