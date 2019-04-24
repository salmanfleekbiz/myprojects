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
		/*#example_filter{display:none;}*/
		#example_info{display:none;}
		/*#example2_length{display:none;}*/
		/*#example2_filter{display:none;}*/
		#example2_info{display:none;}
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
    <div class="container">
        

    </div>
</div>
<!--logoend-->
<?php echo $this->load->view('modals/modal_assign_shooting_lounges'); ?>
<?php echo $this->load->view('modals/modal_in_use'); ?>
<div id="container">
<!--Horizontal Tab-->
<div id="fancybox-loading"><div><img src="<?php echo base_url(); ?>images/loading.gif" alt="Loading" /></div></div>

<div id="fancybox-overlay"></div>
<div id="nested-tabInfo">
    <span class="tabName"></span>
</div>
<!--Vertical Tab-->
<div id="parentVerticalTab">
<ul class="resp-tabs-list hor_1">
    <li><a id="onemenu">Member Select</a></li>
    <li><a id="secondmenu">Time Select</a></li>
</ul>
<div class="resp-tabs-container hor_1">
	<input type="hidden" name="totalmember" id="totalmember" value="" />
    <input type="hidden" name="expId" id="expId" value="3" />
    <input type="hidden" name="expTime" id="expTime" value="" />
    <input type="hidden" name="exist" id="exist" value="0" />
    <input type="hidden" name="bayids" id="bayids" value="<?php echo $_GET['action']; ?>" />
    <input type="hidden" name="reservationId" id="reservationId">
     <input type="hidden" name="first_junior" id="first_junior" value="no">
     <input type="hidden" name="purchasemember_name" id="purchasemember_name" value="no">
     <input type="hidden" name="paid_unpaid" id="paid_unpaid">
    <div>
    <div id="firststep" name="member">
        <h4>How Many In Your Party?</h4><br>
        <p class="headingp">Note: A maximum of 6 members can be in 1 shooting lounge, with a maximum of 2 members playing at a time.</p>
        <br>
        <div class="bs-example">
            <a class="member" rel="1"><button type="button" id="nextbtn" class="btn btn-default active1">1 Member</button></a>
            <a class="member" rel="2"><button type="button" id="nextbtn" class="btn btn-default active2">2 Members</button></a>
            <a class="member" rel="3"><button type="button" id="nextbtn" class="btn btn-default active3">3 Members</button></a></div>
        <br>
        <div class="bs-example">
            <a class="member" rel="4"><button type="button" id="nextbtn" class="btn btn-default active4">4 Members</button></a>
            <a class="member" rel="5"><button type="button" id="nextbtn" class="btn btn-default active5">5 Members</button></a>
            <a class="member" rel="6"><button type="button" id="nextbtn" class="btn btn-default active6">6 Members</button></a></div>
        <br>
        <h4 id="showmemberselect" class="heading">0 Member(s) have been selected</h4>
        <br>
        <div class="bs-example-bottom">
            <a href="<?php echo base_url(); ?>"><button type="button" id="nextbtn" class="btn btn-default">Cancel</button></a>
            <!--<a id="secsteptwo" onclick="addExistingMethod();"><button type="button" id="nextbtnexit" class="btn btn-default">Add to Existing Party</button></a>-->
            <a id="secstep" onclick="secondstep();"><button type="button" id="nextbtn" class="btn btn-default">Continue</button></a></div>
    </div>
    <div id="secondstep" class="hide">
<div style="clear:both;"></div>
<h4 style="text-align:center; height:25px;">Scan Membership ID</h4>
<div class="bs-example">
    <form>
        
    </form>
    <hr>
</div>

<div id="alreadyadded"></div>
<form name="searchqrcode" id="searchqrcode" method="post" action="" style="text-align:center; margin-top:-15px; height:60px;" onSubmit="qRcode_validate(); return false;">

        <div class="input-group">
        	<input type="hidden" name="action" id="action" value="searchqrcode" />
			<input type="hidden" name="searchingresults" id="searchingresults" value="" />
            <input type="text" name="qrcode" id="qrcode" class="form-control" placeholder="Type Membership ID" onBlur="show_tabsearch_result();" />
            <input type="hidden" name="memberids" id="memberids" value="" />
             <div id="notqr"></div>
            <span class="input-group-btn">
                <button type="button" name="submit" id="submit" class="btn btn-default searchbtn" onClick="qRcode_validate();">Search</button>
            </span>
        </div>
        <br>
</form>
<h4 style="text-align:center; margin-top: -15px; height:25px;">OR</h4>
<h4 style="text-align:center; height:25px;">Search For Member</h4>
<style type="text/css">
table.scroll {width: 100%;border-spacing: 0;border: 2px solid black;}
table.scroll tbody,table.scroll thead { display: block; }
thead tr th {}
table.scroll tbody {height: 100px;overflow-y: auto;overflow-x: hidden;}
tbody { border-top: 2px solid black; }
tbody td, thead th {width: 2%;border-right: 1px solid black; border-left: 1px solid #000000; text-align:center;}
tbody td:last-child, thead th:last-child {}
.green_row{ background:#95bcf2 !important;}
</style>
<script type="text/javascript">
function phoneClick(){
$('#srchby').mask('000-000-0000');	
}
function dateClick(){
$('#srchby').mask('00/00/0000');	
}
function removeClick(){
$('#srchby').unmask('000-000-0000');
$('#srchby').unmask('00/00/0000');		
}
function searchMemberFormValidate(){
var searchby = $('#searchby:checked').val();
var srchby = $('#srchby').val();	
var checkemail = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
var date_regex = /^\d{2}\/\d{2}\/\d{4}$/ ;
var phoneRe = /^\(?\d{3}\)?[-\.\s]?\d{3}[-\.\s]?\d{4}$/;
if(searchby == 'email'){
if(checkemail.test(srchby)){
$("#alreadyadded").html('');		
$("#showsrcherror").html('');
$("#againsrch").html('');
$("#notqr").html('');
userSearchBy();
}else{
$("#alreadyadded").html('');	
$("#showallsearchby_assign").html('');
$("#againsrch").html('');
$("#notqr").html('');
$("#showsrcherror").html('<p style="color:#F00;">Please enter email in a valid format.</p>');
}}else if(searchby == 'phone'){
if(phoneRe.test(srchby)){
$("#alreadyadded").html('');	
$("#showsrcherror").html('');
$("#againsrch").html('');
$("#notqr").html('');
userSearchBy();
}else{
$("#alreadyadded").html('');	
$("#showallsearchby_assign").html('');
$("#againsrch").html('');	
$("#notqr").html('');
$("#showsrcherror").html('<p style="color:#F00;">Please enter phone number in a valid format(xxx-xxx-xxxx).</p>');
}	
}else if(searchby == 'dob'){	
if(date_regex.test(srchby)){
$("#showsrcherror").html('');
$("#alreadyadded").html('');
$("#againsrch").html('');
$("#notqr").html('');
userSearchBy();
}else{
$("#alreadyadded").html('');	
$("#showallsearchby_assign").html('');
$("#againsrch").html('');	
$("#notqr").html('');
$("#showsrcherror").html('<p style="color:#F00;">Please enter Date of Birth in MM/DD/YYYY format.</p>');
}		
}else{
if(srchby == ''){
$("#alreadyadded").html('');	
$("#showallsearchby_assign").html('');
$("#againsrch").html('');
$("#notqr").html('');	
$("#showsrcherror").html("<p style='color:#F00;'>You can't leave this empty</p>");	
}else{
$("#alreadyadded").html('');	
$("#showsrcherror").html('');
$("#againsrch").html('');
$("#notqr").html('');
userSearchBy();
}
}
}
function getPlayers(){
    var showSrch = '';
    showSrch += '<div class="overflow"><table id="example" class="display">';
    showSrch += '<thead>';
    showSrch += '<tr>';
    showSrch += '<th>First Name</th>';
    showSrch += '<th>Last Name</th>';
    showSrch += '<th>Email</th>';
    showSrch += '<th>Nickname</th>';
    showSrch += '<th>Phone</th>';
    showSrch += '<th>DOB</th>';
    showSrch += '</tr>';
    showSrch += '</thead>';
    showSrch += '</table></div>';

    var checkMem = parseInt($('#addmembertotal').val())-1;
    var hideClass = "hide";
    if(checkMem > 0) {  // atleast one member is selected
        hideClass = "";
    }

    showSrch += '<div class="footer-button"><input type="hidden" name="primarymember_gamertag" id="primarymember_gamertag" value=""><input type="hidden" name="isauthorizeds" id="isauthorizeds" value=""><input type="hidden" name="isjunior" id="isjunior" value=""><a id="nextbtn" class="btn btn-default active1 addsearchingmembers">Add Selected Member</a><a href="javascript:;" class="btn btn-default showtime '+hideClass+'" id="nextbtnad2">Continue</a></div>';
    $("#showsrcherror").html('');
    $("#showallsearchby_assign").html(showSrch);
    
    window.oTable =  $('#example').dataTable({
        "bServerSide": true,
        "pagingType": "full_numbers",
        "sAjaxSource": api_url_get_memberlist,
        "dataType": 'jsonp',
        "crossDomain": true,
        "bProcessing": true,
        "aoColumns": [

            { "sName": "firstname", "bSearchable": true, "bSortable": true, },
            { "sName": "lastname", "bSearchable": true, "bSortable": true },
            { "sName": "email", "bSearchable": true, "bSortable": true },
            { "sName": "gamertag", "bSearchable": true, "bSortable": true },
            { "sName": "phone", "bSearchable": true, "bSortable": true },
            { "sName": "dob", "bSearchable": true, "bSortable": true },

        ],
        "fnServerData": function ( sSource, aoData, fnCallback ) {

            $.ajax({
                "dataType": 'json',
                "type": "POST",
                "url": sSource,
                "data": aoData,
                "success": function (json) {

                    setTimeout(
                        function () {
                            for (var i = 0; i < json.aaData.length; i++) {
                                var result = json.aaData[i];
                                $("tbody tr:eq(" + i + ")").attr("onclick", "single_click_function(" + result[6] + ");")
                                $("tbody tr:eq(" + i + ")").attr("ondblclick", "double_click_function(" + result[6] + ");")
                                $("tbody tr:eq(" + i + ")").attr("id", "memlist" + result[6])
                                $("tbody tr:eq(" + i + ")").attr("primary_gamertag", result[10]!=null?result[10]:"null")
                                $("tbody tr:eq(" + i + ")").attr("authoriz", result[8] != "" ? result[8].toLowerCase() : "null")
                                $("tbody tr:eq(" + i + ")").attr("gamertag", result[3]!=null?result[3]:"null")
                                $("tbody tr:eq(" + i + ")").attr("junior", result[7].toLowerCase())
                                $("tbody tr:eq(" + i + ")").attr("name", result[0] + " " + result[1])
                            }
                        }, 500);
                    fnCallback(json)
                }
            });
        }
		
    });
	$('#example_filter input').unbind();
        	$('#example_filter input').bind('keyup', function (e) {
            if (e.keyCode == 13) {
                window.oTable.fnFilter(this.value);
            }
        	});
}
$(document).on("click", ".searchbtncenter", function () {
			var srchField = $(".input2search").val();
			window.oTable.fnFilter(srchField);
    	});
/*function getPlayers(){
    show_load();
    var action = $('#searchmembers #action').val();
    var srchby = $('#searchmembers #srchby').val();
    var searchby = $('#searchmembers #searchby:checked').val();

    $.ajax({
        url: api_url+api_version+"GetPlayers",
        headers: {apicode:apiCode,token:user_token},
        data: {
        },
        type: 'GET',
        crossDomain: true,
        dataType: 'json',
        beforeSend: function(){
            show_load();
        },
        success: function (result) {
            if(result.members.length > 0){
                var showSrch = '';
                showSrch += '<div class="overflow"><table id="example" class="display">';
                showSrch += '<thead>';
                showSrch += '<tr>';
                showSrch += '<th>First Name</th>';
                showSrch += '<th>Last Name</th>';
                showSrch += '<th>Email</th>';
                showSrch += '<th>Nickname</th>';
                showSrch += '<th>Phone</th>';
                showSrch += '<th style="display:none;">Phone Set</th>';
                showSrch += '<th>DOB</th>';
                showSrch += '</tr>';
                showSrch += '</thead>';
                showSrch += '<tbody>';
                for (var i = 0; i < result.members.length; i++) {
                    showSrch += '<tr id=memlist'+i+' class="addmembs" primary_gamertag='+result.members[i].primary_gamertag+' authoriz='+result.members[i].isauthorized+' junior='+result.members[i].isjunior+' gamertag="'+result.members[i].gamertag+'" name='+result.members[i].firstname+'&nbsp;'+result.members[i].lastname+' onclick="single_click_function('+i+');" ondblclick="double_click_function('+i+');">';
                    showSrch += '<td>'+result.members[i].firstname+'</td>';
                    showSrch += '<td>'+result.members[i].lastname+'</td>';
                    showSrch += '<td>'+result.members[i].email+'</td>';
                    showSrch += '<td>'+result.members[i].gamertag+'</td>';
                    showSrch += '<td>'+result.members[i].phone+'</td>';
                    showSrch += '<td style="display:none;">'+((result.members[i].phone.replace(/\(|\)/g, "")).replace('-','')).replace(' ','')+'</td>';
                    showSrch += '<td>'+result.members[i].dob+'</td>';
                    showSrch += '</tr>';
                }
                showSrch += '</tbody>';
                showSrch += '</table></div>';

                var checkMem = parseInt($('#addmembertotal').val())-1;
                var hideClass = "hide";
                if(checkMem > 0) {  // atleast one member is selected
                    hideClass = "";
                }

                showSrch += '<div class="footer-button"><input type="hidden" name="primarymember_gamertag" id="primarymember_gamertag" value=""><input type="hidden" name="isauthorizeds" id="isauthorizeds" value=""><input type="hidden" name="isjunior" id="isjunior" value=""><a id="nextbtn" class="btn btn-default active1 addsearchingmembers">Add Selected Member</a><a href="javascript:;" class="btn btn-default showtime '+hideClass+'" id="nextbtnad2">Continue</a></div>';
                $("#showsrcherror").html('');
                $("#showallsearchby").html(showSrch);
                $('#example').DataTable();
            }else{
                $("#showallsearchby").html('');
                $("#showsrcherror").html('<p>Unable to find any members with this criteria</p>');
            }
            hide_load();
        },
        error: function(){
            $("#showallsearchby").html('');
            $("#showsrcherror").html('<p>Unable to find any members with this criteria</p>');
            hide_load();
        }
    });
}*/
</script>

<input type="hidden" name="addmembertotal" id="addmembertotal" value="1" />
<input type="hidden" name="selectmemid" id="selectmemid">
<input type="hidden" name="selectmemname" id="selectmemname">
<input type="hidden" name="realeasebckid" id="realeasebckid" value="<?php echo $_GET['action']; ?>">
<div id="againsrch"></div>
<div id="showallsearchby_assign"></div>
<footer id="footer-barcode"><a id="bckfs" class="btn btn-default active1 bckfst">Back</a><br><br>
<p>To Add More Members, Please Scan Membership ID</p>
</footer>
<div class="footer-bottom"> 
	<div class="footer-row">
		
<!-- end .footer-bottom-copyright -->

		<div id="showallmembers"></div>
<!-- end .footer-bottom-social -->
	</div><!-- end .footer-row -->
</div>
</div>

	<div id="thirdstep" class="hide">
        <h4>How Many Hours Would You Like To Shoot?</h4><br>
        <p class="headingp">Based on your selection of <b><span id="showqty">2</span></b> player(s), we recommend <b><span id="showtim"></span></b> for an optimal experience.</p>
        <br>
        <div id="timetoshow"></div>
        <br>
        <h4 id="showtimeselect" class="heading">1 has been selected, please click Continue</h4>
        <br>
        <div class="bs-example">
            <a class="bckfirst"><button type="button" id="nextbtn" class="btn btn-default">Back</button></a>
            <a id="addMemToList" class="addmemberwaitinglist"><button type="button" id="nextbtn" class="btn btn-default">Continue</button></a></div>
            <footer id="footer-barcode"></footer>
<div class="footer-bottom"> 
	<div class="footer-row">
		<div class="footer-bottom-copyright">
		</div><!-- end .footer-bottom-copyright -->

		<div id="showallmemberstwo"></div>
<!-- end .footer-bottom-social -->
	</div><!-- end .footer-row -->
</div>
    </div>
    <div id="fifthstep" class="hide">
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
       <a href="#qrcodes" data-toggle="modal" id="clickqrcodes"></a>
	<a href="#addmoreplayes" data-toggle="modal" id="clickaddmoreplayes"></a>
    <a href="#addtoparty" data-toggle="modal" id="showaddpartypopup"></a>
    <a href="#addtopartyovermember" data-toggle="modal" id="addtopartyover"></a>
    <a href="#firstjuniorspop" data-toggle="modal" id="juniorfirstpop"></a>
    <a href="#primarymemberrequire" data-toggle="modal" id="primarymemberpop"></a>
     <a href="#focuspop" data-toggle="modal" id="focutpop"></a>
    <a href="#checkinmemberbay" data-toggle="modal" id="checkinmemberbaypop"></a>
</div>

<!--Plug-in Initialisation-->
<script type="text/javascript">
    function show_tabsearch_result(){
        qRcode_validate();
    }
function qRcode_validate(){
var qrcode = $('#qrcode').val();	
if(qrcode == ''){
$("#showsrcherror").html('');	
$("#notqr").html('Please enter search criteria below.');		
}else{
$("#notqr").html('');	
$("#showsrcherror").html('');
getMemberInfo();	
}
}
</script>
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
			$("#closeBtnStatusopen").css("display","none");
			$("#deactivatBtn").css("display","none");
			$("#assignBtn").css("display","none");
			$("#firstscreen").css("display","none");

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
    });
</script>

<style>

    .loungeBox { transition: all .2s ease-in-out; }/*
    .loungeBox:hover { -webkit-transform: scale(1.1);
        transform: scale(1.1); height: 172px;
        background-color: red; margin: -30px 0 0 -15px; padding-top: 16px; position: absolute; text-align: center; width: 32%;}*/
    .hoverl { 
    
    	-webkit-transform: scale(1.1);
        transform: scale(1.1); 
        height: 175px;
        margin: -30px 0 0 -15px; 
        padding-top: 16px;
		padding-left: 16px; 
        position: absolute; 
        text-align: left; 
        width: 32%; 
        border: 2px solid #000;
        font-size:12px;}
</style>
<script>
	
	function toTitleCase(str)
	{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	}
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
        var func = "";
        for (var i = 0; i < data.length; i++) {
            switch (data[i].status) {
                case "Res":
                    statuschanged = "Assigned";
                    colorclass = "assigned";
                    func = "yclicked";
                    break;
                case "Busy":
                    statuschanged = "In Use";
                    colorclass = "use";
                    func = "rclicked";
                    break;
                case "Avail":
                    statuschanged = "Open";
                    colorclass = "open";
                    func = "gclicked";
                    break;
                case "ActionNeeded":
                    statuschanged = "Action Needed";
                    colorclass = "inactive";
                    func = "rclicked";
                    break;
                default :
                    statuschanged = "Inactive";
                    colorclass = "inactive";
                    func = "bclicked";

            }
            resulthtml += '<a href="javascript:;" onclick="'+func+'('+data[i].bayid+')" data-id="'+data[i].bayid+'">';
            resulthtml += '<div style="position:static; margin:0 auto;" class="col-md-4 team-grid '+colorclass+'" id="box'+data[i].bayid+'" data-id="'+data[i].bayid+'"><div class="loungeBox">';
            if (data[i].bayname != null) {
                resulthtml += '<div style="text-align: center;" id="bayname' + data[i].bayid + '">' + data[i].bayname + '</div>';
            }
            resulthtml += '<div id="baystatus' + data[i].bayid + '">Status: ' + statuschanged + '</div>';
            if (data[i].membername != null && data[i].membername != "") {
                resulthtml += '<div>Member: <span id="membername' + data[i].bayid + '">' + toTitleCase(data[i].membername) + '</span></div>';
            }
            if (data[i].starttime != null) {
                var timeStart = convertDateTo12HourTime(data[i].starttime);
                resulthtml += '<div>Start Time: <span id="timeStart' + data[i].bayid + '">' + timeStart + '</span></div>';
            }
            if (data[i].endtime != null) {
                var timeEnd = convertDateTo12HourTime(data[i].endtime);
                resulthtml += '<div>End Time: <span id="timeEnd' + data[i].bayid + '">' + timeEnd + '</span></div>';
            }
            if (data[i].endtime != null) {
                var timeEnd = convertDateTo12HourTime(data[i].endtime);
                resulthtml += '<div>Extended Time: <span id="timeExtend' + data[i].bayid + '">00:00</span></div>';
            }
            if (data[i].remainingtime != null && data[i].remainingtime != "") {
                //var remaintime = convertDateTo12HourTime(data[i].endtime);
                resulthtml += '<div>Remaining Time: <span id="timeRemain' + data[i].bayid + '">' + data[i].remainingtime + '</span></div>';
            }
            resulthtml += '</div></div></a>';

        }
        $("#shootingLounges").html(resulthtml);

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
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
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
        resulthtml += '</tbody></table></div>';

        $("#waitlist").html(resulthtml);
		$("#example2").DataTable({"pageLength": 50});
    });
}

function post_to_wait_list() {
    var searchingresults = $('#memberids').val();
    var searchArray = searchingresults.substring(1);
    var members = searchArray.split(",");
    var phone_number = $('#mobNumber').val();
    $('#mobNumber').val("");
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_POST_WAITING_QUEUE.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1",phone_number: phone_number,members: members }
    }).done(function (data) {
        fill_wait_list_grid();
    });
}

function baySelection() {
    var searchingresults = $('#memberids').val();
    var searchArray = searchingresults.substring(1);
    var members = searchArray.split(",");
    var bayID = '<?php echo $_GET['action']; ?>';
	var expId = $('#expId').val();
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_SELECTION.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1", bayid:bayID, expid:expId, gamertag:members,waitingid: '0' }
    }).done(function (data) {
		if(data.issuccessful == true){
			document.getElementById('reservationId').value = data.reservation_code;
			purchaseInformation();
		}
    });
}
function purchaseInformation(){
var bayid = '<?php echo $_GET['action']; ?>';	
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
	//showmemberInfo += '<tr><td>$'+result.member_info[i].membership_price.toFixed(2)+'</td><td>'+membershiptype.replace("*", " ")+' Membership</td></tr>';
	}
	
	if(result.member_info[i].bay_price == '0.0' && result.member_info[i].bay_name == null){}else{
	//showmemberInfo += '<tr><td>$'+result.member_info[i].bay_price.toFixed(2)+'</td><td>'+result.member_info[i].bay_name+'</td></tr>';
	showmemberInfo += '<tr><td>Refer to POS machine</td><td>'+result.member_info[i].bay_name+'</td></tr>';
	}
	showmemberInfo += junior_div;
	if(result.member_info[i].total_tax == null){}else{
	//showmemberInfo += '<tr><td>$'+result.member_info[i].total_tax.toFixed(2)+'</td><td>Tax</td></tr>';
	}
	showmemberInfo += '</table>';
	}
a++;	
	document.getElementById('purchasemember_name').value = result.member_info[i].firstname+' '+result.member_info[i].lastname;
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
    $(document).on("mouseover", ".loungeBox", function(){
        var color = $(this).closest(".col-md-4").css("background-color");
        if(color == "rgb(207, 42, 39)") {
            $(this).css("background-color",color);
            $(this).addClass("hoverl");
        }
    });
    $(document).on("mouseout", ".loungeBox", function(){
        var color = $(this).closest(".col-md-4").css("background-color");
        if(color == "rgb(207, 42, 39)") {
            $(this).removeClass("hoverl");
        }
    });

    $("#mobNumber").mask("999-999-9999");

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
		baySelection();
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
        data: { siteid: "1",phone_number: phone_number,gamertag: members, expid:expId }
    }).done(function (data) {
        window.location.href = '<?php echo base_url(); ?>';
    });
	}
    $("#submitPhoneBtn").click(function(){
		var checkMob = /^(()?\d{3}())?(-|\s)?\d{3}(-|\s)\d{4}$/;
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
		//updatePurchaseInformation2();
       window.location.href = '<?php echo base_url(); ?>';
    });

    $("#backBtnPC").click(function(){
        $("#fifthstep").removeClass("show");
        $("#fifthstep").addClass("hide");
        $("#thirdstep").removeClass("hide");
        $("#thirdstep").addClass("show");
        $( "ul.resp-tabs-list li:nth-child(4)" ).removeClass("resp-tab-active");
        $( "ul.resp-tabs-list li:nth-child(3)" ).addClass("gobackstep3");
        $( "ul.resp-tabs-list li:nth-child(3)" ).addClass("resp-tab-active");
		back_bayRelease();
        getShootingLounges();
    });

});

var everyinterval = "";
function gclicked(id) {

    // modal reset
    $("#firstscreen").css("display","block");
    $("#heading_modal_open").css("display","block");
    $("#heading_member_line").css("display","none");
    $("#secondscreen").css("display","none");
    $("#fourthscreen").css("display","none");
    $("#thirdscreen").css("display","none");
    $("#openStatusModal").css("max-height","23.2%");
    $("#assignBtn").css("display","inline-block");
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
    membername = $("#memberNameOnModal").val();
        //var membername = $("#membername"+id).html();
    $("#heading_modal_open").html(bayname);
	$("#loungeName1").html(bayname);
    $("#heading_member_line").html(membername+" Assigned to "+bayname);
    $(".memName").html(membername);
	$(".memNameagain1").html(membername);
	$(".memNameagain2").html(membername);
    $('#openStatusModal').modal();                     // initialized with defaults
    $('#openStatusModal').modal({ keyboard: false });   // initialized with no keyboard
    $('#openStatusModal').modal('show');                // initializes and invokes show immediately
}

function rclicked(id) {
	var exist = $('#exist').val();
	if(exist == 1){
	existingReservations(id);
	}else{
	var bayname = $("#bayname"+id).html();
    var membername = $("#membername"+id).html();
    var timeStart = $("#timeStart"+id).html();
    var timeEnd = $("#timeEnd"+id).html();
    var timeExtend = $("#timeExtend"+id).html();
    var timeRemain = $("#timeRemain"+id).html();

    $("#heading_modal_inuse").html(bayname);
    $(".memName").html(membername);
    $(".startTime").html(timeStart);
    $(".endTime").html(timeEnd);
    $(".extendedTime").html(timeExtend);
    $(".remainTime").html(timeRemain);

    $("#boxIDforColorChange").val(id);

    $('#busyStatusModal').modal();                     // initialized with defaults
    $('#busyStatusModal').modal({ keyboard: false });   // initialized with no keyboard
    $('#busyStatusModal').modal('show');	
	}

}
function yclicked(id) {
    $("#boxIDforColorChange").val(id);
	$("#boxIDforColorChange").val(id);
	var bayname = $("#bayname"+id).html();
	$("#heading_modal_inassing").html(bayname);
	$('#inassigned').modal();
}
function bclicked(id) {
    $("#boxIDforColorChange").val(id);
	var bayname = $("#bayname"+id).html();
	$("#heading_modal_inactive").html(bayname);
	$('#inactiveto').modal(); 
}
function updatePurchaseInformation2(){
	var bayid = $('#bayids').val();	
	$.ajax({
	url: api_url+api_version+"PurchaseInformation",
	headers: {apicode:apiCode,token:user_token},
	data: {bayid:bayid},
	type: 'POST',
	crossDomain: true,
	dataType: 'json',
	beforeSend: function(){
	show_load();
	},
	success: function (result) {
	var membername = $('#purchasemember_name').val();
	$(".memNameagain1").html(membername);
	$(".memNameagain2").html(membername);
	lastFocus(bayid);
	},
	error: function(){
	hide_load();
	}
	});	
}
</script>
</body>
</html>