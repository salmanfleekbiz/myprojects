<!DOCTYPE HTML>
<html>
<head>

    <?php require_once("head.inc.php"); ?>
    <script>
        //api_check_user_permission();
    </script>
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
}
</style>
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
<input type="hidden" name="expId" id="expId" value="<?php if(isset($_GET['expid'])){ echo $_GET['expid']; }?>" />
<input type="hidden" name="expTime" id="expTime" value="" />
<input type="hidden" name="waitingid" id="waitingid" value="<?php if(isset($_GET['waitid'])){ echo $_GET['waitid']; }else{} ?>">
<div id="parentVerticalTab">
            <ul class="resp-tabs-list hor_1">
                <!--<li><a href="<?php echo base_url(); ?>" id="home">Home</a></li>-->
				<li><a href="<?php echo base_url(); ?>reservations" id="addtomember">Wait List</a></li>
				<li class="resp-tab-active"><a href="<?php echo base_url(); ?>assign" id="shootinglounges">Shooting Lounges</a></li>
            </ul>
            <div class="resp-tabs-container hor_1 fullwidth">
                <div>
                    <div id="forthstep" class="shhot">
<h4 class="heading-shooting newh">Shooting Lounges</h4><br>
                        <div>
                        <div class="column-left">
                            <input type="text" style="text-align: center; width:100%;" maxlength="25" value="" class="leftBayGroup shooting-editable" />
                        </div>

                        <div class="column-center">
                            <input type="text" style="text-align: center; width:100%;" maxlength="25" value="" class="middleBayGroup shooting-editable" />
                        </div>

                        <div class="column-right">
                            <input type="text" style="text-align: center; width:100%;" maxlength="25" value="" class="rightBayGroup shooting-editable" />
                        </div>
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
                   <a href="javascript:;" id="backBtnPC"><button type="button" id="nextbtn" class="btn btn-default">Back</button></a>
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
<?php if(isset($_GET['id'])){ ?>
$.ajax({	
headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
url:<?php echo '"'.API_URL_WAITING_QUEUE.'"'; ?>,
type: 'GET',
dataType: 'json',
crossDomain: true,
beforeSend: function(){
show_load();
},
data: { siteid: "1" }
}).done(function (data) {
for (var i = 0; i < data["waitingqueue"].length; i++) {
	if(data["waitingqueue"][i].waitingid == '<?php if(isset($_GET['waitid'])){ echo $_GET['waitid']; }else{} ?>'){
		document.getElementById('memberids').value = ','+data["waitingqueue"][i].gamertag;
		document.getElementById('searchingresults').value = ','+data["waitingqueue"][i].membername;
	}else{
	}
}	
hide_load();	
});
<?php }else{} ?>
function toTitleCase(str) {
    return str.replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}
//api_check_user_permission();
getShootingLounges();
getBayHeaders();
setInterval(function(){
getShootingLounges();

}, 10000);

function timeoutReleasebay(id) {
    var bayID = id;
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_RELEASE.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { bayid:bayID,releaseby:'API' }
    }).done(function (data) {
		document.getElementById('realeasebckid').value = bayID;
        getShootingLounges();
    });
}

var ONCEFOREACH = 0;

function getShootingLounges() {
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_LIST.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1" }
    }).done(function (data) {
        var resulthtml = "";
        var statuschanged = "";
        var colorclass = "";
        var hideClass = "";
        var func = "";

        var LeftGroupHTML = "";
        var MiddleGroupHTML = "";
        var RightGroupHTML = "";

        var selectBoxInuseSL = '<div class="SLsInUseDiv hide"><select name="SLsInUse" id="SLsInUse"><option value="">Select SL</option>';

        for (var i = 0; i < data.length; i++) {

            var flashClass = "";    // blink_me
            var gamerTags = "";

            switch (data[i].status) {
                case "Res":
                    statuschanged = "Assigned";
                    colorclass = "assigned";
                    func = "yclicked";
                    break;
                case "Busy":
                    statuschanged = "In Use";
                    colorclass = "use";     // color blue
                    hideClass = "hide";
                    var remainingTimeInUse = data[i].remainingtime;
                    var splitRTIU = remainingTimeInUse.split(":");
                    var Seconds = splitRTIU[2], Minutes = splitRTIU[1], Hours = splitRTIU[0];
                    var secondCalculate = (parseInt(Hours)*3600)+(parseInt(Minutes)*60)+parseInt(Seconds);
                    if(ONCEFOREACH < data.length) {
                        timercountdown(data[i].bayid,secondCalculate);
                    }
                    //Timerstart(data[i].bayid,Hours,Minutes,Seconds);
                    if(secondCalculate <= 300 && secondCalculate > 0) {
                    //if(parseInt(Minutes) < 5 && parseInt(Minutes) >= 0 && parseInt(Hours) == 0) {
                        colorclass = "inUseYellow";     // color yellow
                    }
                    func = "rclicked";
                    break;
                case "Avail":
                    statuschanged = "Open";
                    colorclass = "open";
                    func = "gclicked";
                    break;
                case "ActionNeeded":
                    statuschanged = "Action Needed";
                    colorclass = "actionneeded";
                    func = "rclicked";
                    if(data[i].isflash == true) {
                        flashClass = "blink_me";
                    }
                    break;
                default :
                    statuschanged = "Inactive";
                    colorclass = "inactive";
                    func = "bclicked";

            }
            ONCEFOREACH++;
			var partymem = '';
			if (data[i].partymembers != null) {
				partymem = parseInt(data[i].partymembers.length) + parseInt(1);
			}else{
				partymem = '1';
			}

            if (data[i].groupId == 1) {

                gamerTags = data[i].gamertag;

                LeftGroupHTML += '<a href="javascript:;" onclick="'+func+'('+data[i].bayid+')" data-id="'+data[i].bayid+'">';
                LeftGroupHTML += '<input type="hidden" name="partymember'+data[i].bayid+'" id="partymember'+data[i].bayid+'" value="'+partymem+'">';

                LeftGroupHTML += '<input type="hidden" name="reserv'+data[i].bayid+'" id="reserv'+data[i].bayid+'" value="'+data[i].reservation_code+'">';
                LeftGroupHTML += '<input type="hidden" name="partymembergamertag'+data[i].bayid+'" id="partymembergamertag'+data[i].bayid+'" value="'+data[i].gamertag+'">';
                LeftGroupHTML += '<input type="hidden" name="partymembername'+data[i].bayid+'" id="partymembername'+data[i].bayid+'" value="'+data[i].membername+'">';

                LeftGroupHTML += '<div style="position:static; margin:0 auto;" class="col-md-11 team-grid '+colorclass+' '+flashClass+'" id="box'+data[i].bayid+'" data-id="'+data[i].bayid+'"><div class="loungeBox" data-id="'+data[i].bayid+'">';
                if (data[i].bayname != null) {
                    LeftGroupHTML += '<div style="text-align: center;" class="bayname" id="bayname' + data[i].bayid + '">' + data[i].bayname + '</div>';
                }
                LeftGroupHTML += '<div id="baystatus' + data[i].bayid + '">Status: ' + statuschanged + '</div>';
                if (data[i].membername != null && data[i].membername != "" && data[i].status != "ActionNeeded") {
                    LeftGroupHTML += '<div>Member: <span id="membername' + data[i].bayid + '">' + toTitleCase(data[i].membername) + '</span></div>';
                }
                if (data[i].starttime != null && data[i].status != "ActionNeeded") {
                    var timeStart = convertDateTo12HourTime(data[i].starttime);
                    LeftGroupHTML += '<div class="'+hideClass+'">Start Time: <span id="timeStart' + data[i].bayid + '">' + timeStart + '</span></div>';
                    selectBoxInuseSL += '<option value="'+data[i].bayid+'">'+data[i].bayname+'</option>';
                }
                if (data[i].endtime != null && data[i].status != "ActionNeeded") {
                    var timeEnd = convertDateTo12HourTime(data[i].endtime);
                    LeftGroupHTML += '<div class="'+hideClass+'">End Time: <span id="timeEnd' + data[i].bayid + '">' + timeEnd + '</span></div>';
                }
                if (data[i].endtime != null && data[i].status != "Avail" && data[i].status != "NotOper" && data[i].status != "ActionNeeded") {

                    var extendtiming = data[i].extendedtime;
                    var show_extendtiming = extendtiming.slice(0, -3);

                    //var timeEnd = convertDateTo12HourTime(data[i].endtime);
                    LeftGroupHTML += '<div class="'+hideClass+'">Extended Time: <span id="timeExtend' + data[i].bayid + '">' + show_extendtiming + '</span></div>';
                }
                if (data[i].remainingtime != null && data[i].remainingtime != "" && data[i].status != "Avail" && data[i].status != "NotOper") {
                    if(data[i].isunlimited == true){
                        LeftGroupHTML += '<div>Remaining Time: <span id="timeRemainss' + data[i].bayid + '"><span id="first99' + data[i].bayid + '">'+first99+'</span>:<span id="second99' + data[i].bayid + '">'+second99+'</span>:<span id="third99' + data[i].bayid + '">'+third99+'</span>:<span id="fourth99' + data[i].bayid + '">'+fourth99+'</span></span></div>';

                        if(ONCEFOREACH < data.length) {
                            unlimitedTimer(data[i].bayid);
                        }
                    }else{
                        //alert(data[i].remainingtime);
                        var remaintiming = data[i].remainingtime;
                        var splitTimeRemain = remaintiming.split(":");
                        var show_timeremaining = remaintiming;
                        var remaining_hours = splitTimeRemain[0];
                        var remaining_mints = splitTimeRemain[1];
                        var remaining_seconds = splitTimeRemain[2];

                        //LeftGroupHTML += '<input type="hidden" id="hoursText' + data[i].bayid + '" value="'+remaining_hours+'" /><input type="hidden" id="mintText' + data[i].bayid + '" value="'+remaining_mints+'" /><input type="hidden" id="secText' + data[i].bayid + '" value="'+remaining_seconds+'" />';
                        LeftGroupHTML += '<div id="'+data[i].bayid+'">Remaining Time: <span class="remain" id="timeRemain' + data[i].bayid + '">' + remaintiming + '</span></div>';

                    }
                }
                var partymemnamecomasep = "";
                var othermemwithchkbox = "";
                if(data[i].partymembers != null && data[i].status != "ActionNeeded"){
                    partymemnamecomasep += '<div class="'+hideClass+' othermem'+data[i].bayid+'">Other Members:<div id="mem'+data[i].bayid+'">';
                    partymemnamecomasep += '<ul class="additionalmembers">';
                    othermemwithchkbox += '<div class="'+hideClass+' othermemchkbox'+data[i].bayid+'"><ul><li>	<input type="checkbox" id="'+data[i].bayid+'0" membertype="primary" bayid="'+data[i].bayid+'" name="memberchkbox'+data[i].bayid+'[]" value="'+data[i].gamertag+'"><label for="'+data[i].bayid+'0">'+data[i].membername+'</label></li>';
                    $.each(data[i].partymembers, function(j, item) {

                        var membType = "adult";
                        if(item.isjunior != false) {
                            membType = "junior";
                        } else {
                            gamerTags += ","+item.gamertag;
                        }
                        //partymemnamecomasep += item.firstname+"&nbsp;"+item.lastname+",";
                        partymemnamecomasep += '<li>'+item.firstname+"&nbsp;"+item.lastname+'</li>';
                        othermemwithchkbox += '<li>	<input type="checkbox" id="'+data[i].bayid+(j+1)+'" membertype="'+membType+'" bayid="'+data[i].bayid+'" name="memberchkbox'+data[i].bayid+'[]" value="'+item.gamertag+'" primary_gamertag="'+item.primary_gamertag+'" junior_isauthorize="'+item.junior_isauthorize+'"><label for="'+data[i].bayid+(j+1)+'">'+item.firstname+" "+item.lastname+'</label></li>';

                    });
                    partymemnamecomasep += '</ul></div></div>';
                    othermemwithchkbox += '</ul></div>';
                    //resulthtml += '<input type="hidden" id="mem'+data[i].bayid+'" value="'+partymemnamecomasep+'" /> ';
                    LeftGroupHTML += partymemnamecomasep;
                    LeftGroupHTML += othermemwithchkbox;
                    //$(".addMemTitle").html("Additional Members:");
                } else {
                    partymemnamecomasep += '<div id="mem'+data[i].bayid+'">';
                    partymemnamecomasep += '<ul class="additionalmembers">';
                    partymemnamecomasep += '</ul></div>';
                    //resulthtml += '<input type="hidden" id="mem'+data[i].bayid+'" value="'+partymemnamecomasep+'" /> ';
                    LeftGroupHTML += partymemnamecomasep;
                    LeftGroupHTML += othermemwithchkbox;
                    //$(".addMemTitle").html("");
                }
                LeftGroupHTML += '<input type="hidden" id="gamerTags'+data[i].bayid+'" value="'+gamerTags+'" />';
                LeftGroupHTML += '</div></div></a>';
            }
            else if(data[i].groupId == 2) {

                gamerTags = data[i].gamertag;

                MiddleGroupHTML += '<a href="javascript:;" onclick="'+func+'('+data[i].bayid+')" data-id="'+data[i].bayid+'">';
                MiddleGroupHTML += '<input type="hidden" name="partymember'+data[i].bayid+'" id="partymember'+data[i].bayid+'" value="'+partymem+'">';

                MiddleGroupHTML += '<input type="hidden" name="reserv'+data[i].bayid+'" id="reserv'+data[i].bayid+'" value="'+data[i].reservation_code+'">';
                MiddleGroupHTML += '<input type="hidden" name="partymembergamertag'+data[i].bayid+'" id="partymembergamertag'+data[i].bayid+'" value="'+data[i].gamertag+'">';
                MiddleGroupHTML += '<input type="hidden" name="partymembername'+data[i].bayid+'" id="partymembername'+data[i].bayid+'" value="'+data[i].membername+'">';

                MiddleGroupHTML += '<div style="position:static; margin:0 auto;" class="col-md-11 team-grid '+colorclass+' '+flashClass+'" id="box'+data[i].bayid+'" data-id="'+data[i].bayid+'"><div class="loungeBox" data-id="'+data[i].bayid+'">';
                if (data[i].bayname != null) {
                    MiddleGroupHTML += '<div style="text-align: center;" class="bayname" id="bayname' + data[i].bayid + '">' + data[i].bayname + '</div>';
                }
                MiddleGroupHTML += '<div id="baystatus' + data[i].bayid + '">Status: ' + statuschanged + '</div>';
                if (data[i].membername != null && data[i].membername != "" && data[i].status != "ActionNeeded") {
                    MiddleGroupHTML += '<div>Member: <span id="membername' + data[i].bayid + '">' + toTitleCase(data[i].membername) + '</span></div>';
                }
                if (data[i].starttime != null && data[i].status != "ActionNeeded") {
                    var timeStart = convertDateTo12HourTime(data[i].starttime);
                    MiddleGroupHTML += '<div class="'+hideClass+'">Start Time: <span id="timeStart' + data[i].bayid + '">' + timeStart + '</span></div>';
                    selectBoxInuseSL += '<option value="'+data[i].bayid+'">'+data[i].bayname+'</option>';
                }
                if (data[i].endtime != null && data[i].status != "ActionNeeded") {
                    var timeEnd = convertDateTo12HourTime(data[i].endtime);
                    MiddleGroupHTML += '<div class="'+hideClass+'">End Time: <span id="timeEnd' + data[i].bayid + '">' + timeEnd + '</span></div>';
                }
                if (data[i].endtime != null && data[i].status != "Avail" && data[i].status != "NotOper" && data[i].status != "ActionNeeded") {

                    var extendtiming = data[i].extendedtime;
                    var show_extendtiming = extendtiming.slice(0, -3);

                    //var timeEnd = convertDateTo12HourTime(data[i].endtime);
                    MiddleGroupHTML += '<div class="'+hideClass+'">Extended Time: <span id="timeExtend' + data[i].bayid + '">' + show_extendtiming + '</span></div>';
                }
                if (data[i].remainingtime != null && data[i].remainingtime != "" && data[i].status != "Avail" && data[i].status != "NotOper") {
                    if(data[i].isunlimited == true){
                        MiddleGroupHTML += '<div>Remaining Time: <span id="timeRemainss' + data[i].bayid + '"><span id="first99' + data[i].bayid + '">'+first99+'</span>:<span id="second99' + data[i].bayid + '">'+second99+'</span>:<span id="third99' + data[i].bayid + '">'+third99+'</span>:<span id="fourth99' + data[i].bayid + '">'+fourth99+'</span></span></div>';

                        if(ONCEFOREACH < data.length) {
                            unlimitedTimer(data[i].bayid);
                        }
                    }else{
                        //alert(data[i].remainingtime);
                        var remaintiming = data[i].remainingtime;
                        var splitTimeRemain = remaintiming.split(":");
                        var show_timeremaining = remaintiming;
                        var remaining_hours = splitTimeRemain[0];
                        var remaining_mints = splitTimeRemain[1];
                        var remaining_seconds = splitTimeRemain[2];

                        MiddleGroupHTML += '<div>Remaining Time: <span id="timeRemain' + data[i].bayid + '">' + remaintiming + '</span></div>';

                    }
                }
                var partymemnamecomasep = "";
                var othermemwithchkbox = "";
                if(data[i].partymembers != null && data[i].status != "ActionNeeded"){ // commented by vishal as per requirement
                 partymemnamecomasep += '<div class="'+hideClass+' othermem'+data[i].bayid+'">Other Members:<div id="mem'+data[i].bayid+'">';
                 partymemnamecomasep += '<ul class="additionalmembers">';
                 othermemwithchkbox += '<div class="'+hideClass+' othermemchkbox'+data[i].bayid+'"><ul><li>	<input type="checkbox" id="'+data[i].bayid+'0" membertype="primary" bayid="'+data[i].bayid+'" name="memberchkbox'+data[i].bayid+'[]" value="'+data[i].gamertag+'"><label for="'+data[i].bayid+'0">'+data[i].membername+'</label></li>';
                 $.each(data[i].partymembers, function(j, item) {
                     var membType = "adult";
                     if(item.isjunior != false) {
                         membType = "junior";
                     } else {
                         gamerTags += ","+item.gamertag;
                     }
                 //partymemnamecomasep += item.firstname+"&nbsp;"+item.lastname+",";
                     partymemnamecomasep += '<li>'+item.firstname+" "+item.lastname+'</li>';
                     othermemwithchkbox += '<li><input type="checkbox" id="'+data[i].bayid+(j+1)+'" membertype="'+membType+'" bayid="'+data[i].bayid+'" name="memberchkbox'+data[i].bayid+'[]" value="'+item.gamertag+'" primary_gamertag="'+item.primary_gamertag+'" junior_isauthorize="'+item.junior_isauthorize+'"><label for="'+data[i].bayid+(j+1)+'">'+item.firstname+" "+item.lastname+'</label></li>';
                 });
                 partymemnamecomasep += '</ul></div></div>';
                    othermemwithchkbox += '</ul></div>';
                 //resulthtml += '<input type="hidden" id="mem'+data[i].bayid+'" value="'+partymemnamecomasep+'" /> ';
                    MiddleGroupHTML += partymemnamecomasep;
                    MiddleGroupHTML += othermemwithchkbox;
                 //$(".addMemTitle").html("Additional Members:");
                 } else {
                 partymemnamecomasep += '<div id="mem'+data[i].bayid+'">';
                 partymemnamecomasep += '<ul class="additionalmembers">';
                 partymemnamecomasep += '</ul></div>';
                 //resulthtml += '<input type="hidden" id="mem'+data[i].bayid+'" value="'+partymemnamecomasep+'" /> ';
                    MiddleGroupHTML += partymemnamecomasep;
                    MiddleGroupHTML += othermemwithchkbox;
                 //$(".addMemTitle").html("");
                 }

                MiddleGroupHTML += '<input type="hidden" id="gamerTags'+data[i].bayid+'" value="'+gamerTags+'" />';
                MiddleGroupHTML += '</div></div></a>';
            }
            else if(data[i].groupId == 3) {

                gamerTags = data[i].gamertag;

                RightGroupHTML += '<a href="javascript:;" onclick="'+func+'('+data[i].bayid+')" data-id="'+data[i].bayid+'">';
                RightGroupHTML += '<input type="hidden" name="partymember'+data[i].bayid+'" id="partymember'+data[i].bayid+'" value="'+partymem+'">';

                RightGroupHTML += '<input type="hidden" name="reserv'+data[i].bayid+'" id="reserv'+data[i].bayid+'" value="'+data[i].reservation_code+'">';
                RightGroupHTML += '<input type="hidden" name="partymembergamertag'+data[i].bayid+'" id="partymembergamertag'+data[i].bayid+'" value="'+data[i].gamertag+'">';
                RightGroupHTML += '<input type="hidden" name="partymembername'+data[i].bayid+'" id="partymembername'+data[i].bayid+'" value="'+data[i].membername+'">';

                RightGroupHTML += '<div style="position:static; margin:0 auto;" class="col-md-11 team-grid '+colorclass+' '+flashClass+'" id="box'+data[i].bayid+'" data-id="'+data[i].bayid+'"><div class="loungeBox" data-id="'+data[i].bayid+'">';
                if (data[i].bayname != null) {
                    RightGroupHTML += '<div style="text-align: center;" class="bayname" id="bayname' + data[i].bayid + '">' + data[i].bayname + '</div>';
                }
                RightGroupHTML += '<div id="baystatus' + data[i].bayid + '">Status: ' + statuschanged + '</div>';
                if (data[i].membername != null && data[i].membername != "" && data[i].status != "ActionNeeded") {
                    RightGroupHTML += '<div>Member: <span id="membername' + data[i].bayid + '">' + toTitleCase(data[i].membername) + '</span></div>';
                }
                if (data[i].starttime != null && data[i].status != "ActionNeeded") {
                    var timeStart = convertDateTo12HourTime(data[i].starttime);
                    RightGroupHTML += '<div class="'+hideClass+'">Start Time: <span id="timeStart' + data[i].bayid + '">' + timeStart + '</span></div>';
                    selectBoxInuseSL += '<option value="'+data[i].bayid+'">'+data[i].bayname+'</option>';
                }
                if (data[i].endtime != null && data[i].status != "ActionNeeded") {
                    var timeEnd = convertDateTo12HourTime(data[i].endtime);
                    RightGroupHTML += '<div class="'+hideClass+'">End Time: <span id="timeEnd' + data[i].bayid + '">' + timeEnd + '</span></div>';
                }
                if (data[i].endtime != null && data[i].status != "Avail" && data[i].status != "NotOper" && data[i].status != "ActionNeeded") {

                    var extendtiming = data[i].extendedtime;
                    var show_extendtiming = extendtiming.slice(0, -3);

                    //var timeEnd = convertDateTo12HourTime(data[i].endtime);
                    RightGroupHTML += '<div class="'+hideClass+'">Extended Time: <span id="timeExtend' + data[i].bayid + '">' + show_extendtiming + '</span></div>';
                }
                if (data[i].remainingtime != null && data[i].remainingtime != "" && data[i].status != "Avail" && data[i].status != "NotOper") {
                    if(data[i].isunlimited == true){
                        RightGroupHTML += '<div>Remaining Time: <span id="timeRemainss' + data[i].bayid + '"><span id="first99' + data[i].bayid + '">'+first99+'</span>:<span id="second99' + data[i].bayid + '">'+second99+'</span>:<span id="third99' + data[i].bayid + '">'+third99+'</span>:<span id="fourth99' + data[i].bayid + '">'+fourth99+'</span></span></div>';

                        if(ONCEFOREACH < data.length) {
                            unlimitedTimer(data[i].bayid);
                        }
                    }else{
                        var remaintiming = data[i].remainingtime;
                        var splitTimeRemain = remaintiming.split(":");
                        var show_timeremaining = remaintiming;
                        var remaining_hours = splitTimeRemain[0];
                        var remaining_mints = splitTimeRemain[1];
                        var remaining_seconds = splitTimeRemain[2];

                        RightGroupHTML += '<div>Remaining Time: <span id="timeRemain' + data[i].bayid + '">' + remaintiming + '</span></div>';

                    }
                }
                var partymemnamecomasep = "";
                var othermemwithchkbox = "";

                if(data[i].partymembers != null && data[i].status != "ActionNeeded"){ // commented by vishal as per requirement
                    partymemnamecomasep += '<div class="'+hideClass+' othermem'+data[i].bayid+'">Other Members:<div id="mem'+data[i].bayid+'">';
                    partymemnamecomasep += '<ul class="additionalmembers">';
                    othermemwithchkbox += '<div class="'+hideClass+' othermemchkbox'+data[i].bayid+'"><ul><li>	<input type="checkbox" id="'+data[i].bayid+'0" membertype="primary" bayid="'+data[i].bayid+'" name="memberchkbox'+data[i].bayid+'[]" value="'+data[i].gamertag+'"><label for="'+data[i].bayid+'0">'+data[i].membername+'</label></li>';
                    $.each(data[i].partymembers, function(j, item) {
                        var membType = "adult";
                        if(item.isjunior != false) {
                            membType = "junior";
                        } else {
                            gamerTags += ","+item.gamertag;
                        }
                        //partymemnamecomasep += item.firstname+"&nbsp;"+item.lastname+",";
                        partymemnamecomasep += '<li>'+item.firstname+"&nbsp;"+item.lastname+'</li>';
                        othermemwithchkbox += '<li>	<input type="checkbox" id="'+data[i].bayid+(j+1)+'" membertype="'+membType+'" bayid="'+data[i].bayid+'" name="memberchkbox'+data[i].bayid+'[]" value="'+item.gamertag+'" primary_gamertag="'+item.primary_gamertag+'" junior_isauthorize="'+item.junior_isauthorize+'"><label for="'+data[i].bayid+(j+1)+'">'+item.firstname+" "+item.lastname+'</label></li>';
                    });
                    partymemnamecomasep += '</ul></div></div>';
                    othermemwithchkbox += '</ul></div>';
                    //resulthtml += '<input type="hidden" id="mem'+data[i].bayid+'" value="'+partymemnamecomasep+'" /> ';
                    RightGroupHTML += partymemnamecomasep;
                    RightGroupHTML += othermemwithchkbox;
                    //$(".addMemTitle").html("Additional Members:");
                } else {
                    partymemnamecomasep += '<div id="mem'+data[i].bayid+'">';
                    partymemnamecomasep += '<ul class="additionalmembers">';
                    partymemnamecomasep += '</ul></div>';
                    //resulthtml += '<input type="hidden" id="mem'+data[i].bayid+'" value="'+partymemnamecomasep+'" /> ';
                    RightGroupHTML += partymemnamecomasep;
                    //$(".addMemTitle").html("");
                }

                RightGroupHTML += '<input type="hidden" id="gamerTags'+data[i].bayid+'" value="'+gamerTags+'" />';
                RightGroupHTML += '</div></div></a>';
            }
        }
        selectBoxInuseSL += '</select></div>';
        $("#LeftGroup").html(LeftGroupHTML+selectBoxInuseSL);
        $("#MiddleGroup").html(MiddleGroupHTML);
        $("#RightGroup").html(RightGroupHTML);
        //$("#shootingLounges").html(resulthtml);

    });
}
function convertDateTo12HourTime(datetimestring) {

    var d = new Date(datetimestring);
    var hou = d.getHours(); // => 9
    var min = d.getMinutes(); // =>  30
    var sec = d.getSeconds(); // => 51

    var timeString = hou+":"+min+":"+sec;

    if(min < 10) {
        min = "0"+min;
    }

    if(hou < 12 && hou != "00") {
        return (hou+":"+min+"a");
    } else if(hou > 12) {
        return ((hou-12)+":"+min+"p");
    } else if (hou == "00") {
        hou = 12;
        return ((hou)+":"+min+"a");
    }

    var H = +timeString.substr(0, 2);
    var h = (H % 12) || 12;
    var ampm = H < 12 ? "a" : "p";
    return (h + timeString.substr(2, 3) + ampm);
}
// e.g. "4/17/2015 10:59:59 AM" to "10:59a"
function getTimeHourMinuteFromDateTime(datetimestring) {
    var d = new Date(datetimestring);
    var hou = d.getHours(); // => 9
    var min = d.getMinutes(); // =>  30
    var ampm = "";

    if(datetimestring.indexOf('AM') === -1)
    {
        ampm = "p";
    } else{
        ampm = "a";
    }
    if(min < 10) {
        min = ("0"+min).toString();
    }
    var timeString = hou+":"+min+ampm;
    return timeString;
}

function fill_wait_list_grid() {
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token},
        url:<?php echo '"'.API_URL_WAITING_QUEUE.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1" }
    }).done(function (data) {
        var resulthtml = '<div class="shootingtable"><table id="example2" class="display">';
        resulthtml +=    '<thead>';
        resulthtml +=    '<tr><th>Name</th><th>Party Size</th><th>Time In</th><th>Action </th></tr>';
        resulthtml +=    '</thead><tbody>';

        for (var i = 0; i < data["waitingqueue"].length; i++) {

            resulthtml += '<tr class="active"><td>'+data["waitingqueue"][i].membername+'</td><td>'+data["waitingqueue"][i].partymembers+'</td><td>'+getTimeHourMinuteFromDateTime(data["waitingqueue"][i].checkintime)+'</td><td><a id='+data["waitingqueue"][i].waitingid+' name='+data["waitingqueue"][i].membername+' class="adparty"><span id="nextbtn3" class="label label-default addtoparty">Add to Party</span></a></td></tr>';

        }
        resulthtml += '</tbody></table><div id="clearmsg"></div><span class="label label-default allclear"><a class="clear">Clear Wait List</a></span></div>';

        $("#waitlist").html(resulthtml);
		//$('#example2').DataTable();
		$('#example2').dataTable( {
			"aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
		});
		
    });
}
function post_to_wait_list() {
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
        fill_wait_list_grid();
    });
}

function baySelection() {
    var searchingresults = $('#memberids').val();
    var searchArray = searchingresults.substring(1);
    var members = searchArray.split(",");
    var bayID = $("#boxIDforColorChange").val();
	var waitingid = $("#waitingid").val();
	var expId = $("#expId").val();
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_SELECTION.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1", bayid:bayID, expid:expId, gamertag:members,waitingid: waitingid }
    }).done(function (data) {
		if(data.issuccessful == true){
			document.getElementById('reservationId').value = data.reservation_code;
			purchaseInformation();
		}
    });
}
function purchaseInformation(){
var bayid = $('#boxIDforColorChange').val();	
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
function bayRelease() {
    var bayID = $("#boxIDforColorChange").val();
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_RELEASE.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { bayid:bayID,releaseby:'API' }
    }).done(function (data) {
		document.getElementById('realeasebckid').value = bayID;
        getShootingLounges();
    });
}
function back_bayRelease() {
    var bayID = $("#realeasebckid").val();
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_RELEASE.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { bayid:bayID,releaseby:'API' }
    }).done(function (data) {
        getShootingLounges();
    });
}
$(document).ready(function (){
    /*getShootingLounges();
    fill_wait_list_grid();*/
    $(document).on("mouseover", ".loungeBox", function(){
        if(screen.width != "768") {
            var bayID = $(this).data("id");
            //var color = $(this).closest(".col-md-4").css("background-color");
            var color = $(this).closest(".col-md-11").css("background-color");  //alert(color);
            if(color == "rgb(43, 120, 228)" || color == "rgb(255, 255, 0)") {
                $(this).css("background-color",color);
                $(this).addClass("hoverl");
                $( "span#timeStart"+bayID ).parent().removeClass( "hide" );
                $( "span#timeEnd"+bayID ).parent().removeClass( "hide" );
                $( "span#timeExtend"+bayID ).parent().removeClass( "hide" );
                $( "div.othermem"+bayID ).removeClass( "hide" );

            }else if(color == "rgb(255, 255, 0)"){
                $(this).css("background-color",color);
                $(this).addClass("hoverl");

            }else if(color == "rgb(207, 42, 39)"){
                $(this).css("background-color",color);
                $(this).addClass("hoverl");

            }
        }
    });
    $(document).on("mouseout", ".loungeBox", function () {
        if(screen.width != "768") {
            var bayID = $(this).data("id");
            var color = $(this).closest(".col-md-11").css("background-color");
            if (color == "rgb(43, 120, 228)" || color == "rgb(255, 255, 0)") {
                $(this).removeClass("hoverl");
                $( "span#timeStart"+bayID ).parent().addClass( "hide" );
                $( "span#timeEnd"+bayID ).parent().addClass( "hide" );
                $( "span#timeExtend"+bayID ).parent().addClass( "hide" );
                $( "div.othermem"+bayID ).addClass( "hide" );
            } else if (color == "rgb(255, 255, 0)") {
                $(this).removeClass("hoverl");
            } else if (color == "rgb(207, 42, 39)") {
                $(this).removeClass("hoverl");
            }
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

var everyinterval = "";
<?php if(isset($_GET['id'])){ ?>
function gclicked(id) {

    // modal reset
	document.getElementById('realeasebckid').value = id;
    $("#firstscreen").css("display","block");
    $("#heading_modal_open").css("display","block");
    $("#heading_member_line").css("display","none");
    $("#secondscreen").css("display","none");
    $("#fourthscreen").css("display","none");
    $("#thirdscreen").css("display","none");
    $("#openStatusModal").css("height","auto");
    $("#assignBtn").css("display","inline-block");
	$("#deactivatBtn").css("display","inline-block");
    $("#continueBtn").css("display","none");
    $("#backBtn").css("display","none");
    $("#lastContinueBtnold").css("display","none");
    $("#boxIDforColorChange").val(id);
    $("#closeBtnStatusopen").html("Close");
    $("#closeBtnStatusopen").css("display","inline-block");
    $(".modal-footer").css("text-align","right");
    $(".modal-header").css("display","block");
    $("#finishBtnStatusopen").css("display","none");
    // end modal reset

    clearInterval(everyinterval);
    everyinterval = 0;
    var editid = $(this).data('id');
    var bayname = $("#bayname"+id).html();
    var searchingresults = $('#searchingresults').val();
    var searchArray = searchingresults.substring(1);
    var memberarray = searchArray.split(",");
    var membername = memberarray[0];
    $("#memberNameOnModal").val(membername);
    var baystatus = $("#baystatus"+id).html();
    $(".baystatus").html(baystatus);
    membername = $("#memberNameOnModal").val();
        //var membername = $("#membername"+id).html();
    $("#heading_modal_open").html(bayname);
	$("#loungeName1").html(bayname);
    $("#heading_member_line").html(membername+" Assigned to "+bayname);
	$(".memNameagain1").html(membername);
	$(".memNameagain2").html(membername);
    $(".memName").html(membername);
    $('#openStatusModal').modal();                     // initialized with defaults
    $('#openStatusModal').modal({ keyboard: false });   // initialized with no keyboard
    $('#openStatusModal').modal('show');                // initializes and invokes show immediately
}
<?php }else{ ?>
function gclicked(id) {

	var bayname = $("#bayname"+id).html();
	var baystatus = $("#baystatus"+id).html();
    $("#bayname_open").html(bayname);
	$("#directassignBtn").attr("href","<?php echo base_url(); ?>assignshooting?action="+id);
	$("#deactivatBtn2").attr("bayid",id);
    $('#shotingdirectassign').modal();                     // initialized with defaults
    $('#shotingdirectassign').modal({ keyboard: false });   // initialized with no keyboard
    $('#shotingdirectassign').modal('show');                // initializes and invokes show immediately
}
$("#deactivatBtn2").click(function(){
        var bayID = $(this).attr("bayid");
		$.ajax({
		  url: api_url+api_version+"BayDeactivate",
		  headers: {apicode:apiCode,token:user_token},
		  data: {bayid:bayID},
		  type: 'POST',
		  crossDomain: true,
		  dataType: 'json',
		  beforeSend: function(){
		  show_load();
		  },
		  success: function (result) {
		  getShootingLounges();		  
		  hide_load();	  
		  },
		  error: function(){
		  hide_load();
		  }
		  });
    });
<?php } ?>
function rclicked(id) {
    var exist = $('#exist').val();
    if (exist == 1) {
        var bayname = $("#bayname" + id).html();
        var membername = $("#membername" + id).html();
        var timeStart = $("#timeStart" + id).html();
        var timeEnd = $("#timeEnd" + id).html();
        var timeExtend = $("#timeExtend" + id).html();
        var timeRemain = $("#timeRemain" + id).html();
        var partymemb = $("#mem" + id).html();
        var partymembchkbox = $(".othermemchkbox" + id).html();
        //var partymemb = $(".additionalmembers").html();
        if ($("#mem" + id).text().length > 0) {
            $(".addMemTitle").html('Addtional Members:');
        } else {
            $(".addMemTitle").html('');
        }
        $('#adtiming').attr('byid', id);
        $("#heading_modal_inuse").html(bayname);
        $(".memName").html(membername);
        $(".startTime").html(timeStart);
        $(".endTime").html(timeEnd);
        $(".extendedTime").html(timeExtend);
        $(".remainTime").html(timeRemain);

        var chkmem = $("#mem" + id+" .additionalmembers li:first-child").html();
        if(typeof chkmem == 'undefined') {
            $("#releasememberBtn").css("display", "none");
        } else {
            $("#releasememberBtn").css("display", "inline-block");
        }

        $(".jnuiors").html(partymemb);
        $(".jnuiorschkbox").html(partymembchkbox);
        $("#boxIDforColorChange").val(id);
        $('#adextingparty').attr('by_id', id);
        $("#adextingparty").css("display", "inline-block");
        $("#adtiming").css("display", "none");
        var bayStatus = $("#baystatus" + id).html();
        if(bayStatus == "Status: Action Needed") {
            $("#adtiming").css("display", "none");
            $(".bsy2").css("display", "none");
            $("#adextingparty").css("display", "none");
            $("#releaseBtn").html("Cleaned");
            $("#closeBtnStatusInUse").html("Cancel");
            $( "span.memName" ).parent().css( "display", "none" );
            $( "span.startTime" ).parent().css( "display", "none" );
            $( "span.endTime" ).parent().css( "display", "none" );
            $( "span.extendedTime" ).parent().css( "display", "none" );
            $( "span.remainTime" ).parent().css( "display", "none" );
			$( "#perviousparty" ).css( "display", "inline-block" );
            $(".baystatus").html(bayStatus);
        } else {
            $("#adtiming").css("display", "inline-block");
            $(".bsy2").css("display", "inline-block");
            $("#adextingparty").css("display", "inline-block");
            $("#releaseBtn").html("Release");
            $("#closeBtnStatusInUse").html("Close");
            $( "span.memName" ).parent().css( "display", "inline-block" );
            $( "span.startTime" ).parent().css( "display", "inline-block" );
            $( "span.endTime" ).parent().css( "display", "inline-block" );
            $( "span.extendedTime" ).parent().css( "display", "inline-block" );
            $( "span.remainTime" ).parent().css( "display", "inline-block" );
            $(".baystatus").html(bayStatus);
        }
        $('#busyStatusModal').modal();                     // initialized with defaults
        $('#busyStatusModal').modal({ keyboard: false });   // initialized with no keyboard
        $('#busyStatusModal').modal('show');
    } else {
        var adultGamerTags = $('#gamerTags' + id).val();
        var bayname = $("#bayname" + id).html();
        var membername = $("#membername" + id).html();
        var timeStart = $("#timeStart" + id).html();
        var timeEnd = $("#timeEnd" + id).html();
        var timeExtend = $("#timeExtend" + id).html();
        var timeRemain = $("#timeRemain" + id).html();
        var partymemb = $("#mem" + id).html();
        var partymembchkbox = $(".othermemchkbox" + id).html();

        //var partymemb = $(".additionalmembers").html();
        if ($("#mem" + id).text().length > 0) {
            $(".addMemTitle").html('Addtional Members:');
        } else {
            $(".addMemTitle").html('');
        }
        var membername = $('#partymembername' + id).val();
        $('#adtiming').attr('byid', id);
        $("#heading_modal_inuse").html(bayname);
        $(".memName").html(membername);
        $(".startTime").html(timeStart);
        $(".endTime").html(timeEnd);
        $(".extendedTime").html(timeExtend);
        $(".remainTime").html(timeRemain);
        var chkmem = $("#mem" + id+" .additionalmembers li:first-child").html();
        //alert(chkmem);
        if(typeof chkmem == 'undefined') {
            $("#releasememberBtn").css("display", "none");
        } else {
            $("#releasememberBtn").css("display", "inline-block");
        }

        $(".jnuiors").html(partymemb);
        $(".jnuiorschkbox").html(partymembchkbox);
        $("#boxIDforColorChange").val(id);
        $('#adextingparty').attr('by_id', id);
        $("#adextingparty").css("display", "inline-block");
        var totalpartymembers = document.getElementById('partymember' + id).value;
		var revisioncode = document.getElementById('reserv' + id).value;
        $('#adtiming').attr('totalmembers', totalpartymembers);
        $('#adtiming').removeClass('adtiming');
        $('#adtiming').addClass('directadtiming');
        var partygame = $("#partymembergamertag" + id).val();
        var reservations = $("#reserv" + id).val();
        $('#adtiming').attr('reservation', reservations);
        $('#adextingparty').attr('gamer', partygame);
        $('#adextingparty').attr('totalmember', totalpartymembers);
        $(".memNameagain1").html(membername);
        $(".memNameagain2").html(membername);
        $("#adextingparty").attr("href", "<?php echo base_url(); ?>assigntiming?action=" + id + "&partysize=" + totalpartymembers+"&rev="+revisioncode+"&memb="+adultGamerTags);
        $('#adextingparty').removeClass('existingparty');
        $('#adextingparty').addClass('directexistingparty');
		$("#perviousparty").attr('style',  'display:none');
        //$("#releasememberBtn").css("display", "inline-block");
        var bayStatus = $("#baystatus" + id).html();
        if(bayStatus == "Status: Action Needed") {
            $("#adtiming").css("display", "none");
            $(".bsy2").css("display", "none");
            $("#adextingparty").css("display", "none");
            $("#releaseBtn").html("Cleaned");
            $("#closeBtnStatusInUse").html("Cancel");
            $( "span.memName" ).parent().css( "display", "none" );
            $( "span.startTime" ).parent().css( "display", "none" );
            $( "span.endTime" ).parent().css( "display", "none" );
            $( "span.extendedTime" ).parent().css( "display", "none" );
            $( "span.remainTime" ).parent().css( "display", "none" );
			$("#perviousparty").attr('style',  'display:inline-block');
            $("#releasememberBtn").css("display", "none");
			$("#perviousparty").attr("href", "<?php echo base_url(); ?>periviousparty?action=" + id + "&partysize=" + totalpartymembers);
            $(".baystatus").html(bayStatus);
        } else {
            $("#adtiming").css("display", "inline-block");
            $(".bsy2").css("display", "inline-block");
            $("#adextingparty").css("display", "inline-block");
            $("#releaseBtn").html("Release");
            $("#closeBtnStatusInUse").html("Close");
            $( "span.memName" ).parent().css( "display", "inline-block" );
            $( "span.startTime" ).parent().css( "display", "inline-block" );
            $( "span.endTime" ).parent().css( "display", "inline-block" );
            $( "span.extendedTime" ).parent().css( "display", "inline-block" );
            $( "span.remainTime" ).parent().css( "display", "inline-block" );
            $(".baystatus").html(bayStatus);
        }
        $('#busyStatusModal').modal();                     // initialized with defaults
        $('#busyStatusModal').modal({ keyboard: false });   // initialized with no keyboard
        $('#busyStatusModal').modal('show');
    }
}
function yclicked(id) {
	$('#adextingpartyellow').removeClass('existingparty');
	$("#adextingpartyellow").attr("href","<?php echo base_url(); ?>assigntiming?action="+id);
    $("#boxIDforColorChange").val(id);
	$("#boxIDforColorChange").val(id);
	var bayname = $("#bayname"+id).html();
    var baystatus = $("#baystatus"+id).html();
	$("#heading_modal_inassing").html(bayname);
    $(".baystatus").html(baystatus);
	$('#inassigned').modal();
}
function bclicked(id) {
    $("#boxIDforColorChange").val(id);
	var bayname = $("#bayname"+id).html();
	var baystatus = $("#baystatus"+id).html();
	$("#heading_modal_inactive").html(bayname);
	$(".baystatus").html(baystatus);
	$('#inactiveto').modal();
}
</script>

<style>

    .loungeBox { transition: all .2s ease-in-out; }/*
    .loungeBox:hover { -webkit-transform: scale(1.1);
        transform: scale(1.1); height: 172px;
        background-color: red; margin: -30px 0 0 -15px; padding-top: 0px; position: absolute; text-align: center; width: 32%;}*/
	
		
</style>
<!--Plug-in Initialisation-->
	<script type="text/javascript">
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
			updatePurchaseInformation();


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

            clearInterval(everyinterval);
            everyinterval = 0;
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