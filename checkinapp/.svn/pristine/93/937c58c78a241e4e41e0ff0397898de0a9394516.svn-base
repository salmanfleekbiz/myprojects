<!DOCTYPE HTML>
<html>
<head>
    <?php require_once("head.inc.php"); ?>
    <style type="text/css" rel="stylesheet">
        #container {
            width: 90%;
            margin: 0 auto;
        }
		#fancybox-loading{position:fixed; top:50% ;left:50%; width:40px; height:40px; margin-top:-20px; margin-left:-20px; cursor:pointer; overflow:hidden; z-index:9999;display:none;}

#fancybox-loading div{position:absolute; top:0; left:0;}

#fancybox-overlay{position:absolute; top:0; left:0; width:100%; z-index:1100; display:none; background-color:#FFF; opacity:0.7; cursor:pointer; height:1695px;}
        @media only screen and (max-width: 768px) {
            #container {
                width: 90%;
                margin: 0 auto;
            }
        }
		/*#example_length{display:none;}*/
		#example_filter{display:none;}
		#example_info{display:none;}
		/*#example2_length{display:none;}*/
		#example2_filter{display:none;}
		#example2_info{display:none;}
    </style>
    <style type="text/css">
table.scroll {width: 100%;border-spacing: 0;border: 2px solid black;}
table.scroll tbody,table.scroll thead { display: block; }
thead tr th {}
table.scroll tbody {height: 100px;overflow-y: auto;overflow-x: hidden;}
tbody td, thead th {width: 2%;border-right: 1px solid black; border-left: 1px solid #000000; text-align:center;}
#example2 > thead { font-size: 11px;}
.active.odd { font-size: 9px;}
.active.even { font-size: 9px;}
tbody td:last-child, thead th:last-child {}
.green_row{ background:#95bcf2 !important;}

@media screen and (min-width: 1920px) {

#example2 > thead {
    font-size: 18px;
}
.active.odd {
    font-size: 14px;
}
.active.even {
    font-size: 14px;
}
.fullwidth{
margin-left: 14px;
width: 55% !important;	
}
#nextbtn{
/*font-size:9px;	*/
width:14.8em;
}
}
</style>
<?php if(isset($_GET['action'])){ ?>
<script type="text/javascript">
$(document).ready(function() {
$.ajax({
        url: api_url + api_version + "TimeSelect?siteid=1&playercount=<?php if(isset($_GET['partysize'])) { echo $_GET['partysize']; } else { echo "1"; } ?>",
        headers: {apicode: apiCode, token: user_token},
        data: {
        },
        type: 'GET',
        crossDomain: true,
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (result) {
            var time_div = '';
            var unlimitedtime = '';
			var time_message = '';
			var gettime = '';
            time_div += '<div class="bs-example">';
            for (var i = 0; i < result.experiences.length; i++) {
                if (result.experiences[i].expname == '30 Mins' && <?php if(isset($_GET['partysize'])) { echo $_GET['partysize']; } else { echo 1; } ?> == 1) {
                    time_div += '<a id="tm' + result.experiences[i].id + '" class="time current" time="' + result.experiences[i].expname + '" rel="' + result.experiences[i].id + '"><button type="button" id="nextbtn" class="btn btn-default timeselectbtn activess' + result.experiences[i].id + '">' + result.experiences[i].expname + ' </button></a>';
                    document.getElementById('expId').value = result.experiences[i].id;
					time_message += '30 Mins has been selected, please click Continue';
					gettime = result.experiences[i].expname;
                }else if (result.experiences[i].expname == '1 Hour' && <?php if(isset($_GET['partysize'])) { echo $_GET['partysize']; } else { echo 1; } ?> == 2) {
                    time_div += '<a id="tm' + result.experiences[i].id + '" class="time current" time="' + result.experiences[i].expname + '" rel="' + result.experiences[i].id + '"><button type="button" id="nextbtn" class="btn btn-default timeselectbtn activess' + result.experiences[i].id + '">' + result.experiences[i].expname + ' </button></a>';
                    document.getElementById('expId').value = result.experiences[i].id;
					time_message += '1 Hour has been selected, please click Continue';
					gettime = result.experiences[i].expname;
                }else if (result.experiences[i].expname == '1 Hour 30 Mins' && <?php if(isset($_GET['partysize'])) { echo $_GET['partysize']; } else { echo 1; } ?> == 3) {
                    time_div += '<a id="tm' + result.experiences[i].id + '" class="time current" time="' + result.experiences[i].expname + '" rel="' + result.experiences[i].id + '"><button type="button" id="nextbtn" class="btn btn-default timeselectbtn activess' + result.experiences[i].id + '">' + result.experiences[i].expname + ' </button></a>';
                    document.getElementById('expId').value = result.experiences[i].id;
					time_message += '1 Hour 30 Mins has been selected, please click Continue';
					gettime = result.experiences[i].expname;
                } else if (result.experiences[i].expname == '2 Hours' && <?php if(isset($_GET['partysize'])) { echo $_GET['partysize']; } else { echo 1; } ?> == 4) {
                    time_div += '<a id="tm' + result.experiences[i].id + '" class="time current" time="' + result.experiences[i].expname + '" rel="' + result.experiences[i].id + '"><button type="button" id="nextbtn" class="btn btn-default timeselectbtn activess' + result.experiences[i].id + '">' + result.experiences[i].expname + ' </button></a>';
                    document.getElementById('expId').value = result.experiences[i].id;
					time_message += '2 Hours has been selected, please click Continue';
					gettime = result.experiences[i].expname;
                } else if (result.experiences[i].expname == '2 Hours 30 Mins' && <?php if(isset($_GET['partysize'])) { echo $_GET['partysize']; } else { echo 1; } ?> == 5) {
                    time_div += '<a id="tm' + result.experiences[i].id + '" class="time current" time="' + result.experiences[i].expname + '" rel="' + result.experiences[i].id + '"><button type="button" id="nextbtn" class="btn btn-default timeselectbtn activess' + result.experiences[i].id + '">' + result.experiences[i].expname + ' </button></a>';
                    document.getElementById('expId').value = result.experiences[i].id;
					time_message += '2 Hours 30 Mins has been selected, please click Continue';
					gettime = result.experiences[i].expname;
                } else if (result.experiences[i].expname == '3 Hours' && <?php if(isset($_GET['partysize'])) { echo $_GET['partysize']; } else { echo 1; } ?> == 6) {
                    time_div += '<a id="tm' + result.experiences[i].id + '" class="time current" time="' + result.experiences[i].expname + '" rel="' + result.experiences[i].id + '"><button type="button" id="nextbtn" class="btn btn-default timeselectbtn activess' + result.experiences[i].id + '">' + result.experiences[i].expname + ' </button></a>';
                    document.getElementById('expId').value = result.experiences[i].id;
					time_message += '3 Hours Mins has been selected, please click Continue';
					gettime = result.experiences[i].expname;
                } else if (result.experiences[i].expname == 'Unlimited') {
                    unlimitedtime += '<a id="tm' + result.experiences[i].id + '" class="time" time="' + result.experiences[i].expname + '" rel="' + result.experiences[i].id + '"><button type="button" id="nextbtn" class="btn btn-default activess' + result.experiences[i].id + '">' + result.experiences[i].expname + ' </button></a>';
                } else {
                    time_div += '<a id="tm' + result.experiences[i].id + '" class="time" time="' + result.experiences[i].expname + '" rel="' + result.experiences[i].id + '"><button type="button" id="nextbtn" class="btn btn-default activess' + result.experiences[i].id + '">' + result.experiences[i].expname + ' </button></a>';
                }
            }
            time_div += unlimitedtime;
            time_div += '</div>';
            $("#timetoshow").html(time_div);
           $("#showtimeselect").html(time_message);
		   $("#showtim").html(gettime);
            //document.getElementById('reservationId').value = reservation;
        },
        error: function () {
            hide_load();
        }
    });

$.ajax({
headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
url:<?php echo '"'.API_URL_BAY_LIST.'"'; ?>,
type: 'POST',
dataType: 'json',
crossDomain: true,
data: { siteid: "1" }
}).done(function (data) {
for (var i = 0; i < data.length; i++) {
if(data[i].bayid == '<?php if(isset($_GET['action'])) { echo $_GET['action']; } else { echo ""; } ?>'){
if (data[i].partymembers != null) {
var part = [];	
for (var j = 0; j < data[i].partymembers.length; j++) {
	part.push(data[i].partymembers[j].gamertag);
}
document.getElementById('searchingresults').value = ','+data[i].gamertag+','+part;
document.getElementById('membername').value = data[i].membername;
}else{
document.getElementById('searchingresults').value = ','+data[i].gamertag;	
document.getElementById('membername').value = data[i].membername;
}
}else{}
}
});	
});	
</script>
<?php } ?>
</head>
<body background="<?php echo base_url(); ?>images/checkIn.png" style="overflow-x: hidden;">
<!--logo-->
<div class="header-top">
        <div class="social-icons">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a>
        </div>
        <div class="clearfix"></div>
    </div>
<div class="inner-banner">
<div class="logount2">Welcome&nbsp;<?php echo $this->session->userdata('username'); ?>&nbsp;</div>
<div class="logout2"><a href="<?php echo base_url(); ?>main/logout" class="logout-btn">Logout</a></div>    <div class="container">
        

    </div>
</div>
<?php echo $this->load->view('modals/modal_assign_shooting_lounges'); ?>
<?php echo $this->load->view('modals/modal_in_use'); ?>
<div id="container">
<div id="fancybox-loading"><div><img src="<?php echo base_url(); ?>images/loading.gif" alt="Loading" /></div></div>
<div id="fancybox-overlay"></div>
<input type="hidden" name="memberids" id="memberids">
<input type="hidden" name="searchingresults" id="searchingresults">
<input type="hidden" name="realeasebckid" id="realeasebckid">
<input type="hidden" name="reservationId" id="reservationId">
<input type="hidden" name="expId" id="expId" value="" />
<input type="hidden" name="expTime" id="expTime" value="" />
<input type="hidden" name="waitingid" id="waitingid" value="<?php if(isset($_GET['waitid'])){ echo $_GET['waitid']; }else{} ?>">
<input type="hidden" name="membername" id="membername">
<input type="hidden" name="boxIDforColorChange" id="boxIDforColorChange" value="<?php if(isset($_GET['action'])){ echo $_GET['action']; }else{} ?>">
<div id="parentVerticalTab">
            <ul class="resp-tabs-list hor_1">
                <!--<li><a href="<?php echo base_url(); ?>" id="home">Home</a></li>-->
				<li><a href="<?php echo base_url(); ?>reservations" id="addtomember">Wait List</a></li>
				<li class="resp-tab-active"><a href="<?php echo base_url(); ?>assign" id="shootinglounges">Shooting Lounges</a></li>
            </ul>
            <!-- Vinod <div class="resp-tabs-container hor_1 fullwidth">-->
            <div class="resp-tabs-container hor_1">
                <div>
            <div id="thirdstep" class="show">
        <h4>How Many Hours Would You Like To Shoot?</h4><br>
        <p class="headingp">Based on your selection of <b><span id="showqty"><?php if(isset($_GET['partysize'])) { echo $_GET['partysize']; } else { echo "1"; } ?></span></b> player(s), we recommend <b><span id="showtim"></span></b> for an optimal experience.</p>
        <br>
        <div id="timetoshow"></div>
        <br>
        <h4 id="showtimeselect" class="heading">1 has been selected, please click Continue</h4>
        <br>
        <div class="bs-example">
           <a id="perviousshoot" class="periouspartyassign"><button type="button" id="nextbtn" class="btn btn-default">Continue</button></a></div>
            <footer id="footer-barcode" style="display:none;"></footer>
<div class="footer-bottom" style="display:none;"> 
	<div class="footer-row">
		<div class="footer-bottom-copyright">
			To Add More Members, Please Scan Membership ID
		</div><!-- end .footer-bottom-copyright -->

		<div id="showallmemberstwo"></div>
<!-- end .footer-bottom-social -->
	</div><!-- end .footer-row -->
</div>
    </div>    
                    <div id="forthstep" class="shhot hide">
<h4 class="heading-shooting newh">Previous Party</h4><br>
                        <div>
                        
                        </div>
<div id="shootingLounges" class="shootingLounges main-container">

    <div class="column-left" id="LeftGroup">

    </div>

    <div class="column-center" id="MiddleGroup">

    </div>

    <div class="column-right" id="RightGroup">

    </div>

</div>
</div><div id="fifthstep" class="hide">
           <div class="sidebar">
               <div class="sidebar__header">
				<h4 class="purchase">Purchase Confirmation</h4>
               </div>
               <div class="sidebar__content">
                   <div class="payment" data-order-summary="">
                       <div class="order">
                       </div>

                       <div id="showinfo"></div>
                   </div>
               </div>
               <div class="bs-example">
                   <!--<a href="javascript:;" id="backBtnPC"><button type="button" id="nextbtn" class="btn btn-default">Back</button></a>-->
                   <a href="javascript:;" id="lastContinueBtn"><button type="button" id="nextbtn" class="btn btn-default">Continue</button></a></div>
           </div>
       </div>
                </div>
                
            </div>
        </div>
<a href="#qrcodes" data-toggle="modal" id="clickqrcodes"></a>
<a href="#addmoreplayes" data-toggle="modal" id="clickaddmoreplayes"></a>
<a href="#addtoparty" data-toggle="modal" id="showaddpartypopup"></a>
<a href="#addtopartyovermember" data-toggle="modal" id="addtopartyover"></a>
<a href="#timingpop" data-toggle="modal" id="showtimingpop"></a>
<a href="#purshspop" data-toggle="modal" id="showpurshspop"></a>
 <a href="#focuspop" data-toggle="modal" id="focutpop"></a>
</div>
<script type="text/javascript">
$(document).on("click", ".periouspartyassign", function () {
bayRelease();
});	
function baySelection() {
    var searchingresults = $('#searchingresults').val();
    var searchArray = searchingresults.substring(1);
    var members = searchArray.split(",");
    var bayID = '<?php if(isset($_GET['action'])) { echo $_GET['action']; } else { echo ""; } ?>';
	var expId = $('#expId').val();
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_SELECTION.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1", bayid:bayID, expid:expId, gamertag:members,waitingid:'0' }
    }).done(function (data) {
		if(data.issuccessful == true){
			document.getElementById('reservationId').value = data.reservation_code;
			purchaseInformation();
		}
    });
}
function purchaseInformation(){
var bayid = '<?php if(isset($_GET['action'])) { echo $_GET['action']; } else { echo ""; } ?>';
$.ajax({
url: api_url+api_version+"PurchaseInformation",
headers: {apicode:apiCode,token:user_token},
data: {bayid:bayid},
type: 'GET',
crossDomain: true,
dataType: 'json',
beforeSend: function(){
show_load();
},
success: function (result) {
var showmemberInfo = '';
var junior_div = '';

if(result.member_info.length >0){	
var a = 1;
for (var i = 0; i < result.member_info.length; i++) {
	if(result.member_info[i].juniors != null){
	//junior_div = '<h5 class="heading-h5"><span>Juniors</span></h5>';
	for (var j = 0; j < result.member_info[i].juniors.length; j++) {
		if(!result.member_info[i].juniors[j].membershippaid){
			var jfee = 5.00;
			if(result.member_info[i].juniors[j].IsWaived){
				jfee = 0.00
			}
			junior_div += '<tr><td>$'+jfee+'</td><td>'+result.member_info[i].juniors[j].firstname+'&nbsp;'+result.member_info[i].juniors[j].lastname+' Junior Membership</td></tr>';
		}
		//junior_div += '<tr><td>$5.00</td><td>'+result.member_info[i].juniors[j].firstname+'&nbsp;'+result.member_info[i].juniors[j].lastname+' Junior Membership</td></tr>';
	}
	}else{
	junior_div = '';	
	}
	if(result.member_info[i].membership_price == null && result.member_info[i].membership_type == null && result.member_info[i].bay_price == '0.0' && result.member_info[i].bay_name == null && result.member_info[i].total_tax == null && result.member_info[i].total_amount == null){}else{
	showmemberInfo += '<div class="order" data-order-summary-section="payment-lines">';
	showmemberInfo += '<h5 class="heading-h5">'+a+'.&nbsp;<span>'+result.member_info[i].firstname+'&nbsp;'+result.member_info[i].lastname+'</span></h5>';
	showmemberInfo += '<table class="purchasetable">';
	showmemberInfo += '<tr><th class="cost">Cost</th><th class="desc">Description</th></tr>';
	if(result.member_info[i].membership_price == null && result.member_info[i].membership_type == null){}else{
	var membershiptype = result.member_info[i].membership_type;	
	var AFee = result.member_info[i].membership_price.toFixed(2);
        if(result.member_info[i].IsWaived){ AFee = 0.00; }
	showmemberInfo += '<tr><td>$'+ AFee +'</td><td>'+membershiptype.replace("*", " ")+' Membership</td></tr>';
	//showmemberInfo += '<tr><td>$'+result.member_info[i].membership_price.toFixed(2)+'</td><td>'+membershiptype.replace("*", " ")+' Membership</td></tr>';
	}
	if(result.member_info[i].bay_price == '0.0' && result.member_info[i].bay_name == null){}else{
	// showmemberInfo += '<tr><td>$'+result.member_info[i].bay_price.toFixed(2)+'</td><td>'+result.member_info[i].bay_name+'</td></tr>';
        showmemberInfo += '<tr><td>Refer to POS machine</td><td>'+result.member_info[i].bay_name+'</td></tr>';
	}
	showmemberInfo += junior_div;
	if(result.member_info[i].total_tax == null){}else{
	//showmemberInfo += '<tr><td>$'+result.member_info[i].total_tax.toFixed(2)+'</td><td>Tax</td></tr>';
	}
	showmemberInfo += '</table>';
	//showmemberInfo += '';
        showmemberInfo += '<br><h5 class="dot"></h5>';
	//showmemberInfo += '<h5 class="heading-h5"><span>'+result.member_info[i].firstname+'&nbsp;'+result.member_info[i].lastname+'&nbsp;Total:&nbsp;$'+result.member_info[i].total_amount.toFixed(2)+'</h5>';
	//showmemberInfo += '';
        showmemberInfo += '<br><h5 class="line"></h5><br>';
	showmemberInfo += '</div>';
	}
a++;	
}
$("#showinfo").html(showmemberInfo);
$("#firststep").removeClass("show");
$("#firststep").addClass("hide");
$("#secondstep").removeClass("show");
$("#secondstep").addClass("hide");
$("#thirdstep").removeClass("show");
$("#thirdstep").addClass("hide");
$("#forthstep").removeClass("show");
$("#forthstep").addClass("hide");
$("#fifthstep").removeClass("hide");
$("#fifthstep").addClass("show");
$('#thirdmenu').attr('onclick', 'thirdstep();');
$("#thirdmenu").css("cursor", "pointer");
}else{
}
hide_load();	
},
error: function(){
hide_load();
}
});	
}
function updatePurchaseInformation2() {
    var bayid = '<?php echo $_GET['action']; ?>';
	var membername = $("#membername").val();
    $.ajax({
        url: api_url + api_version + "PurchaseInformation",
        headers: {apicode: apiCode, token: user_token},
        data: {bayid: bayid},
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        beforeSend: function () {
            show_load();
        },
        success: function (result) {
//window.location.href = baseUrl;	
//hide_load();
            var chk = $.urlParam('rcode');
            //alert(chk);
            if(chk != null)
                reservationCheckInWaitList("Check-In");
				
            lastFocus(bayid);
			$(".memNameagain1").html(membername);
			$(".memNameagain2").html(membername);

        },
        error: function () {
            hide_load();
        }
    });
}
function bayRelease() {
    var bayID = '<?php echo $_GET['action']; ?>';
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_RELEASE.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { bayid:bayID,releaseby:'Previous Party' }
    }).done(function (data) {
		baySelection();
    });
}
$(document).ready(function (){
	
    /*getShootingLounges();
    fill_wait_list_grid();*/
    $(document).on("mouseover", ".loungeBox", function(){
        var bayID = $(this).data("id");
        //var color = $(this).closest(".col-md-4").css("background-color");
		var color = $(this).closest(".col-md-11").css("background-color");		//alert(color);
        if(color == "rgb(43, 120, 228)" || color == "rgb(255, 255, 0)") {
            $(this).css("background-color",color);
            $(this).addClass("hoverl");
            $( "span#timeStart"+bayID ).parent().removeClass( "hide" );
            $( "span#timeEnd"+bayID ).parent().removeClass( "hide" );
            $( "span#timeExtend"+bayID ).parent().removeClass( "hide" );
        }else if(color == "rgb(255, 255, 0)"){
			 $(this).css("background-color",color);
             $(this).addClass("hoverl");
		}else if(color == "rgb(207, 42, 39)"){
			 $(this).css("background-color",color);
             $(this).addClass("hoverl");
		}
    });
    $(document).on("mouseout", ".loungeBox", function () {
        var bayID = $(this).data("id");
        var color = $(this).closest(".col-md-11").css("background-color");
        if (color == "rgb(43, 120, 228)" || color == "rgb(255, 255, 0)") {
            $(this).removeClass("hoverl");
            $( "span#timeStart"+bayID ).parent().addClass( "hide" );
            $( "span#timeEnd"+bayID ).parent().addClass( "hide" );
            $( "span#timeExtend"+bayID ).parent().addClass( "hide" );
        } else if (color == "rgb(255, 255, 0)") {
            $(this).removeClass("hoverl");
        } else if (color == "rgb(207, 42, 39)") {
            $(this).removeClass("hoverl");
        }
    });

    $("#mobNumber").mask("(999) 999-9999");

    $("#mobNumber").on("blur", function() {
        var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

        if( last.length == 3 ) {
            var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
            var lastfour = move + last;

            var first = $(this).val().substr( 0, 9 );

            $(this).val( first + '-' + lastfour );
        }
    });

    $("#closeBtnStatusopen").click(function(){
        var boxID = $("#boxIDforColorChange").val();

        $("#box"+boxID).addClass("open");
        $("#box"+boxID).removeClass("assigned");
        $("#baystatus"+boxID).html("Open");
        if(everyinterval == 0) {
            everyinterval = setInterval(function(){
                getShootingLounges(); // this will run after every 10 seconds
                fill_wait_list_grid();
            }, 10000);
        }
    });

    $("#addMemToList").click(function(){
        clearInterval(everyinterval);
        everyinterval = 0;
        $('#addMemToListModal').modal();                     // initialized with defaults
        $('#addMemToListModal').modal({ keyboard: false });   // initialized with no keyboard
        $('#addMemToListModal').modal('show');                // initializes and invokes show immediately
    });
	
	function add_to_wait_list() {
    var searchingresults = $('#memberids').val();
    var searchArray = searchingresults.substring(1);
    var members = searchArray.split(",");
    var phone_number = $('#mobNumber').val();
	var expId = $('#expId').val();
    $('#mobNumber').val("");
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_POST_WAITING_QUEUE.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1",phone_number: phone_number,members: members, expid:expId }
    }).done(function (data) {
        window.location.href = '<?php echo base_url(); ?>';
    });
	}
    $("#submitPhoneBtn").click(function(){
		var checkMob = /^\(?\d{3}\)?[-\.\s]?\d{3}[-\.\s]?\d{4}$/;
		var mobNumber = $("#mobNumber").val();
		if(mobNumber == ''){
		$("#mobilerror").html('<p style="color:#F00;">Please enter phone number in a valid format(xxx-xxx-xxxx).</p>');	
		}else if(checkMob.test(mobNumber)){
		$("#mobilerror").html('');		
        add_to_wait_list();
        if(everyinterval == 0) {
            everyinterval = setInterval(function(){
                getShootingLounges(); // this will run after every 10 seconds
                fill_wait_list_grid();
            }, 10000);
        }
		$('#addMemToListModal').modal('hide');
		//window.location.href = '<?php //echo base_url(); ?>';
		}
    });

    $("#finishBtnStatusopen").click(function(){
		//updatePurchaseInformation();
        window.location.href = '<?php echo base_url(); ?>';
    });

    $("#backBtnPC").click(function(){
        $("#fifthstep").removeClass("show");
        $("#fifthstep").addClass("hide");
        $("#forthstep").removeClass("hide");
        $("#forthstep").addClass("show");
        $( "ul.resp-tabs-list li:nth-child(4)" ).removeClass("");
        $( "ul.resp-tabs-list li:nth-child(3)" ).addClass("gobackstep3");
        $( "ul.resp-tabs-list li:nth-child(3)" ).addClass("resp-tab-active");
		back_bayRelease();
        getShootingLounges();
    });

});
</script>

<style>

    .loungeBox { transition: all .2s ease-in-out; }/*
    .loungeBox:hover { -webkit-transform: scale(1.1);
        transform: scale(1.1); height: 172px;
        background-color: red; margin: -30px 0 0 -15px; padding-top: 0px; position: absolute; text-align: center; width: 32%;}*/
	
		
</style>
<!--Plug-in Initialisation-->
	<script type="text/javascript">
	var everyinterval = "";
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

        // Child Tab
        $('#ChildVerticalTab_1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
            active_border_color: '#c1c1c1', // border color for active tabs heads in this group
            active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        });

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
		
		$("#lastContinueBtn").click(function(){
			updatePurchaseInformation2();

        });
		$(".focuscontinue").click(function(){
			//updatePurchaseInformation();
            //baySelection();           // API call for bay selection
			var txt_focus = $('#txt_focus').val();
			var txt_focusbayid = $('#txt_focusbayid').val();
			var txt_focusreservation = $('#txt_focusreservation').val();
			if(txt_focus == ''){
				$("#errorfocustxt").html('<p style="color:#F00;">Please enter your employee number.</p>');
			}else{
			focusTracking(txt_focusreservation,txt_focus,txt_focusbayid);
			}
        });
		function focusTracking(reservation_id,membershipnumber,bayid){
		show_load();	
		var reservation_id = reservation_id;
		var membershipnumber = membershipnumber;
		var bayid = bayid;
		$.ajax({
		url: api_url+api_version+"FocusTracking",
		headers: {apicode:apiCode,token:user_token},
		data: {reservation_code:reservation_id,bayid:bayid,membershipnumber:membershipnumber,error_message:'Could not find Start Session Return File'
		},
		type: 'POST',
		crossDomain: true,
		dataType: 'json',
		beforeSend: function(){
		show_load();
		},
		success: function (result) {
			if(result.success == true){
			$("#errorfocustxt").html('');	
			$('#focuspop').modal('hide');
            $(".modal-header").css("display","block");
            $("#heading_modal_open").css("display","block");
            $("#heading_modal_open").html("Check-In Completed");
            $("#heading_member_line").css("display","none");
            $("#finishBtnStatusopen").css("display","inline-block");
            $(".modal-footer").css("text-align","center");
            $("#thirdscreen").css("display","none");
            $("#fourthscreen").css("display","block");
            $("#backBtn").css("display","none");
            $("#lastContinueBtnold").css("display","none");
			$("#assignBtn").css("display","none");
			$("#deactivatBtn").css("display","none");
			$("#firstscreen").css("display","none");
			$("#closeBtnStatusopen").css("display","none");
			membername = $("#membername").val();
            clearInterval(everyinterval);
            everyinterval = 0;
			$(".memNameagain1").html(membername);
			$(".memNameagain2").html(membername);
            $('#openStatusModal').modal();                     // initialized with defaults
            $('#openStatusModal').modal({ keyboard: false });   // initialized with no keyboard
            $('#openStatusModal').modal('show');                // initializes and invokes show immediately	
			hide_load();	
			}else{
			$("#errorfocustxt").html('<p style="color:#F00;">Please enter a valid membership number</p>');	
			hide_load();
			}
		
		},
		error: function(){
		$("#errorfocustxt").html('<p style="color:#F00;">Please enter a valid membership number</p>');	
			hide_load();
		}
		});
		}
		
        $( "ul.resp-tabs-list li:nth-child(1)" ).removeClass("resp-tab-active");
           
    });

</script>
</body>
</html>