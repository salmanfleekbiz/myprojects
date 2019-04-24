<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require_once("head.inc.php"); ?>
<title>Check In Member</title>
<style type="text/css">
body{height:100%; position:relative}
#content{margin:auto;width: 75%;top:0;bottom:0;left:0;right:0;background:gray;padding:60px;}
.steps li {background-color: #fff;border: 1px solid #000;float: left;list-style: outside none none;text-align: center;width: 210px;padding:10px;}
.active{ background-color:#0FF !important;}
.red{ color:#F00;text-align:center; }
.membersbtn > li {background: #fff;border: 2px solid #000;float: left;list-style: none;margin: 10px;padding: 10px;text-align: center;width: 270px;}
#showmemberselect p{ color:#F93;text-align:center; }
.selectbtn > li {background: #fff;border: 2px solid #000;float: left;list-style: none;margin: 10px;padding: 10px;text-align: center;width: 270px;}
.showmember > li {background: #fff;border: 2px solid #000;float: left;list-style: none;margin: 10px;padding: 10px;text-align: center;width: auto;}
.current{ background-color:#0FF !important; }
.show{display:block !important; }
.hide{display:none !important;}
</style>
</head>
<body>
<div id="content">
<?php echo $this->load->view('modals/modal_in_use'); ?>
<input type="hidden" name="totalmember" id="totalmember" value="2" />
<ul class="steps">
<li id="one" class="active"><a>Step 1: Player Select</a></li>
<li id="two"><a>Step 2: Time Select</a></li>
<li id="three"><a>Step 3: Assign Shooting Lounge</a></li>
<li id="four"><a>Step 4: Purchase</a></li>
</ul> 
<div id="firststep">
<div style="clear:both;"></div>
<h2 style="text-align:center;">How many in your party?</h2>
<p class="red">Note: A maximum of 6 members can be in 1 shooting loung, with a maximum 2 members playing at a time.</p>
<ul class="membersbtn">
<li><a class="member" onclick="userGenerateNickName();" rel="1">1 Members</a></li>
<li class="current"><a class="member" onclick="userGenerateNickName();" rel="2">2 Members</a></li>
<li><a class="member" onclick="userGenerateNickName();" rel="3">3 Members</a></li>
<li><a class="member" onclick="userGenerateNickName();" rel="4">4 Members</a></li>
<li><a class="member" onclick="userGenerateNickName();" rel="5">5 Members</a></li>
<li><a class="member" onclick="userGenerateNickName();" rel="6">6 Members</a></li>
</ul>
<div style="clear:both;"></div>
<div id="showmemberselect"><p>2 Member have been selected, please click Continue</p></div>
<ul class="selectbtn">
<li><a href="#">Cancel</a></li>
<li><a id="secstep" onclick="secondstep();">Add to Existing Reservation</a></li>
<li><a id="secstep" onclick="secondstep();">Continue</a></li>
</ul>
</div>
<div id="secondstep" class="hide">
<div style="clear:both;"></div>
<h2 style="text-align:center;">Scan QR Codes</h2>
<form name="searchqrcode" id="searchqrcode" method="post" action="" style="text-align:center;">
<input type="hidden" name="action" id="action" value="searchqrcode" />
<input type="hidden" name="searchingresults" id="searchingresults" value="" />
<input type="text" name="qrcode" id="qrcode" />
<div id="alreadyadded"></div>
<input type="submit" name="submit" id="submit" value="Search" />
</form>
<h2 style="text-align:center;">OR</h2>
<form name="searchmembers" id="searchmembers" method="post" action="">
<label>Search Existing Members By:</label>
<input type="radio" name="searchby" id="fname" value="fname" checked="checked" />First Name
<input type="radio" name="searchby" id="lname" value="lname" />Last Name
<input type="radio" name="searchby" id="email" value="email" />Email
<input type="radio" name="searchby" id="gamertag" value="gamertag" />Gamer Tag
<input type="radio" name="searchby" id="pnumber" value="pnumber" />Phone Number
<input type="radio" name="searchby" id="dob" value="dob" />Date of Birth
<input type="text" name="searchbyop" id="searchbyop" />
<input type="submit" name="submit" id="submit" value="Search" />
</form>
<div id="showallmembers"><input type="hidden" name="addmembertotal" id="addmembertotal" value="0" /></div>
</div>
<div style="clear:both;"></div>
</div>
<a href="#qrcodes" data-toggle="modal" id="clickqrcodes"></a>
<a href="#addmoreplayes" data-toggle="modal" id="clickaddmoreplayes"></a>
<script type="text/javascript">
jQuery("#searchqrcode").validate({
rules: {
	qrcode: "required"
},
messages: {
	qrcode: "Please enter search criteria below."
},
submitHandler: function() {
	getMemberInfo();
},
success: function(label) {
	label.remove();
}
});
</script>
</body>
</html>