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
		#example_info{display:none;}
		#example2_filter{display:none;}
		#example2_info{display:none;}
    </style>
    <script type="text/javascript">
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
            $("#showallsearchby_checkin").html(showSrch);

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
										//alert(result);
										$("tbody tr:eq(" + i + ")").attr("onclick", "single_click_function(" + result[6] + ");")
                                        $("tbody tr:eq(" + i + ")").attr("ondblclick", "double_click_function(" + result[6] + ");")
                                        $("tbody tr:eq(" + i + ")").attr("id", "memlist" + result[6])
                                        $("tbody tr:eq(" + i + ")").attr("class", "addmembs")
                                        $("tbody tr:eq(" + i + ")").attr("primary_gamertag", result[10]!=null?result[10]:"null")
                                        $("tbody tr:eq(" + i + ")").attr("authoriz", result[8] != "" ? result[8].toLowerCase() : "null")
                                        $("tbody tr:eq(" + i + ")").attr("gamertag", result[3]!=null?result[3]:"null")
                                        $("tbody tr:eq(" + i + ")").attr("junior", result[7].toLowerCase())
                                        $("tbody tr:eq(" + i + ")").attr("name", result[0] + " " + result[1])
										$("tbody tr:eq(" + i + ")").attr("istraningcompleted",result[13] != "" ? result[13].toLowerCase() : "false")
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
        /*function getPlayers() {
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
                        showSrch += '<th style="display:none;">Phone set</th>';
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
                        $("#showallsearchby_checkin").html(showSrch);
                        $('#example').DataTable();
                        //$(".input2search").val("nazem");
                        //$(".input2search").keyup();
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
<div class="logout2"><a href="<?php echo base_url(); ?>main/logout" class="logout-btn">Logout</a></div>


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
    <li><a id="thirdmenu">Shooting Lounge</a></li>
    <li><a id="forthmenu">Billing</a></li>
</ul>
<div class="resp-tabs-container hor_1">
	<input type="hidden" name="totalmember" id="totalmember" value="" />
    <input type="hidden" name="expId" id="expId" value="3" />
    <input type="hidden" name="expTime" id="expTime" value="" />
    <input type="hidden" name="exist" id="exist" value="0" />
     <input type="hidden" name="first_junior" id="first_junior" value="no">
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
            <a id="secsteptwo" onclick="addExistingMethod();"><button type="button" id="nextbtnexit" class="btn btn-default">Add to Existing Party</button></a>
            <a id="secstep" onclick="secondstep();"><button type="button" id="nextbtn" class="btn btn-default">Continue</button></a></div>
    </div>


    <?php if(isset($_GET["psize"]) && isset($_GET["rcode"])) { ?>
        <script type="application/javascript">
            $('.member[rel=<?php echo $_GET["psize"]; ?>]').click();
        </script>

        <input type="hidden" id="ResFirstNameTxt" name="ResFirstNameTxt" value="<?php echo $_GET["fname"]; ?>" />
        <input type="hidden" id="ResLastNameTxt" name="ResLastNameTxt" value="<?php echo $_GET["lname"]; ?>" />
        <input type="hidden" id="ResPhoneTxt" name="ResPhoneTxt" value="<?php echo $_GET["phone"]; ?>" />
        <input type="hidden" id="ResCodeTxt" name="ResCodeTxt" value="<?php echo $_GET["rcode"]; ?>" />
        <input type="hidden" id="ResEmailTxt" name="ResEmailTxt" value="<?php echo $_GET["email"]; ?>" />

    <?php } ?>


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
            <input type="text" name="qrcode" id="qrcode" class="form-control" placeholder="Type Membership ID" onBlur="show_tabsearch_result();">
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

<script type="text/javascript">
function show_tabsearch_result(){
	var qcode = $('#qrcode').val();
	if(qcode == ''){
	}else{
		getMemberInfo();
	}
}
function show_tabsearch2_result(){
	var srchby = $('#srchby').val();
	if(srchby == ''){
	}else{
		searchMemberFormValidate();
	}
}
function phoneClick(){
document.getElementById('srchby').value = '';	
$('#srchby').mask('(000) 000-0000');	
}
function dateClick(){
document.getElementById('srchby').value = '';	
$('#srchby').mask('00/00/0000');	
}
function removeClick(){
document.getElementById('srchby').value = '';	
$('#srchby').unmask('(000) 000-0000');
$('#srchby').unmask('00/00/0000');		
}
function searchMemberFormValidate(){
var searchby = $('#searchby:checked').val();
var srchby = $('#srchby').val();	
var checkemail = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
var date_regex = /^\d{2}\/\d{2}\/\d{4}$/ ;
//var phoneRe = /^(()?\d{3}())?(-|\s)?\d{3}(-|\s)\d{4}$/;
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
$("#showallsearchby_checkin").html('');
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
$("#showallsearchby_checkin").html('');
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
$("#showallsearchby_checkin").html('');
$("#againsrch").html('');	
$("#notqr").html('');
$("#showsrcherror").html('<p style="color:#F00;">Please enter Date of Birth in MM/DD/YYYY format.</p>');
}		
}else{
if(srchby == ''){
$("#alreadyadded").html('');	
$("#showallsearchby_checkin").html('');
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
</script>

<input type="hidden" name="addmembertotal" id="addmembertotal" value="1" />
<input type="hidden" name="selectmemid" id="selectmemid">
<input type="hidden" name="selectmemname" id="selectmemname">
<input type="hidden" name="realeasebckid" id="realeasebckid">
<input type="hidden" name="reservationId" id="reservationId">
<div id="againsrch"></div>
<div id="showallsearchby_checkin"></div>
<footer id="footer-barcode"><a id="bckfs" class="btn btn-default active1 bckfst">Back</a><br><br>
<p style="display:none;">To Add More Members, Please Scan Membership ID</p>
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
            <a id="shoot" class="showshooting"><button type="button" id="nextbtn" class="btn btn-default">Continue</button></a></div>
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
    <div id="forthstep" class="hide">
    <div class="whatweoffer">
            <div class="container">
                <div class="offer-grids">
                    <div class="col-md-7 offer-grid">
                        <h4 class="heading-shooting newh">Shooting Lounges</h4><br>
                        <div>
                            <div class="column-left">
                                <input type="text" style="text-align: center; width:100%;" maxlength="25" value="" class="leftBayGroup ipad-1 shooting-editable" />
                            </div>

                            <div class="column-center">
                                <input type="text" style="text-align: center; width:100%;" maxlength="25" value="" class="middleBayGroup ipad-2 shooting-editable" />
                            </div>

                            <div class="column-right">
                                <input type="text" style="text-align: center; width:100%;" maxlength="25" value="" class="rightBayGroup ipad-3 shooting-editable" />
                            </div>
                        </div>
                        <div id="shootingLounges"  class="shootingLounges main-container">

                            <div class="column-left" id="LeftGroup">

                            </div>

                            <div class="column-center" id="MiddleGroup">

                            </div>

                            <div class="column-right" id="RightGroup">

                            </div>
                            
                        </div>
                    </div>

                </div>
                
                <div class="col-md-10 offer-grid1">
                <div class="tablewaitlist">
                    <h4 class="heading-waitlist memberlist">Wait List</h4>
                    <a href="#" id="addMemToList"><span id="nextbtnshoot" class="label label-default addmember">Add Member to Wait List</span></a>
                    <div id="waitlist">

                    </div>
                </div>

                <!--What We Offer?-->
            </div>
        </div>

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
    <a href="#timingpop" data-toggle="modal" id="showtimingpop"></a>
    <a href="#purshspop" data-toggle="modal" id="showpurshspop"></a>
    <a href="#firstjuniorspop" data-toggle="modal" id="juniorfirstpop"></a>
    <a href="#focuspop" data-toggle="modal" id="focutpop"></a>
    <a href="#primarymemberrequire" data-toggle="modal" id="primarymemberpop"></a>
<a href="#trainingnotcompleted" data-toggle="modal" id="trainingnotcompletedpop"></a>
    <a href="#checkinmemberbay" data-toggle="modal" id="checkinmemberbaypop"></a>
    <a href="#partymax" data-toggle="modal" id="partymaxpop"></a>
    <a href="#shootingpop" data-toggle="modal" id="shootpopup"></a>
</div>

<!--Plug-in Initialisation-->
<script type="text/javascript">
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
        //api_check_user_permission();

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
			var exist = $('#exist').val();
			if(exist == 1){
				existingupdatePurchaseInformation();
			}else{
				updatePurchaseInformation();
			}

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
    });
</script>

<style>

    .loungeBox { transition: all .2s ease-in-out; }
		
</style>
<script>
	
	function toTitleCase(str)
	{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
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
                    //countdownTimerVishal(data[i].bayid,Hours,Minutes,Seconds);
                    var secondCalculate = (parseInt(Hours)*3600)+(parseInt(Minutes)*60)+parseInt(Seconds);
                    if(ONCEFOREACH < data.length) {
                        timercountdown(data[i].bayid,secondCalculate);
                    }
                    if(secondCalculate <= 300 && secondCalculate > 0) {
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

            if(data[i].groupId == 1) {

                gamerTags = data[i].gamertag;

                LeftGroupHTML += '<a href="javascript:;" onclick="'+func+'('+data[i].bayid+')" data-id="'+data[i].bayid+'">';
				LeftGroupHTML += '<input type="hidden" name="revcode'+data[i].bayid+'" id="revcode'+data[i].bayid+'" value="'+data[i].reservation_code+'">';
				LeftGroupHTML += '<input type="hidden" name="partymember'+data[i].bayid+'" id="partymember'+data[i].bayid+'" value="'+partymem+'">';
                LeftGroupHTML += '<div style="position:static; margin:0 auto;" class="col-md-11 team-grid '+colorclass+' '+flashClass+'" id="box'+data[i].bayid+'" data-id="'+data[i].bayid+'"><div class="loungeBox" data-id="'+data[i].bayid+'">';
                if (data[i].bayname != null) {
                    LeftGroupHTML += '<div style="text-align: center;" id="bayname' + data[i].bayid + '">' + data[i].bayname + '</div>';
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
                    LeftGroupHTML += '<div class="'+hideClass+'">Extended Time: <span id="timeExtend' + data[i].bayid + '">' + show_extendtiming + '</span></div>';
                }
                if (data[i].remainingtime != null && data[i].remainingtime != "" && data[i].status != "Avail" && data[i].status != "NotOper") {
                    if(data[i].isunlimited == true){
                        LeftGroupHTML += '<div>Remaining Time: <span id="timeRemainss' + data[i].bayid + '"><span id="first99' + data[i].bayid + '">'+first99+'</span>:<span id="second99' + data[i].bayid + '">'+second99+'</span>:<span id="third99' + data[i].bayid + '">'+third99+'</span>:<span id="fourth99' + data[i].bayid + '">'+fourth99+'</span></span></div>';

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
                        LeftGroupHTML += '<div>Remaining Time: <span id="timeRemain' + data[i].bayid + '">' + remaintiming + '</span></div>';

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
				MiddleGroupHTML += '<input type="hidden" name="revcode'+data[i].bayid+'" id="revcode'+data[i].bayid+'" value="'+data[i].reservation_code+'">';
				MiddleGroupHTML += '<input type="hidden" name="partymember'+data[i].bayid+'" id="partymember'+data[i].bayid+'" value="'+partymem+'">';
                MiddleGroupHTML += '<div style="position:static; margin:0 auto;" class="col-md-11 team-grid '+colorclass+' '+flashClass+'" id="box'+data[i].bayid+'" data-id="'+data[i].bayid+'"><div class="loungeBox" data-id="'+data[i].bayid+'">';
                if (data[i].bayname != null) {
                    MiddleGroupHTML += '<div style="text-align: center;" id="bayname' + data[i].bayid + '">' + data[i].bayname + '</div>';
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
                    MiddleGroupHTML += '<div class="'+hideClass+'">Extended Time: <span id="timeExtend' + data[i].bayid + '">' + show_extendtiming + '</span></div>';
                }
                if (data[i].remainingtime != null && data[i].remainingtime != "" && data[i].status != "Avail" && data[i].status != "NotOper") {
                    if(data[i].isunlimited == true){
                        MiddleGroupHTML += '<div>Remaining Time: <span id="timeRemainss' + data[i].bayid + '"><span id="first99' + data[i].bayid + '">'+first99+'</span>:<span id="second99' + data[i].bayid + '">'+second99+'</span>:<span id="third99' + data[i].bayid + '">'+third99+'</span>:<span id="fourth99' + data[i].bayid + '">'+fourth99+'</span></span></div>';

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
                        partymemnamecomasep += '<li>'+item.firstname+"&nbsp;"+item.lastname+'</li>';
                        othermemwithchkbox += '<li>	<input type="checkbox" id="'+data[i].bayid+(j+1)+'" membertype="'+membType+'" bayid="'+data[i].bayid+'" name="memberchkbox'+data[i].bayid+'[]" value="'+item.gamertag+'" primary_gamertag="'+item.primary_gamertag+'" junior_isauthorize="'+item.junior_isauthorize+'"><label for="'+data[i].bayid+(j+1)+'">'+item.firstname+" "+item.lastname+'</label></li>';
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
				RightGroupHTML += '<input type="hidden" name="revcode'+data[i].bayid+'" id="revcode'+data[i].bayid+'" value="'+data[i].reservation_code+'">';
				RightGroupHTML += '<input type="hidden" name="partymember'+data[i].bayid+'" id="partymember'+data[i].bayid+'" value="'+partymem+'">';
                RightGroupHTML += '<div style="position:static; margin:0 auto;" class="col-md-11 team-grid '+colorclass+' '+flashClass+'" id="box'+data[i].bayid+'" data-id="'+data[i].bayid+'"><div class="loungeBox" data-id="'+data[i].bayid+'">';
                if (data[i].bayname != null) {
                    RightGroupHTML += '<div style="text-align: center;" class="bayname" id="bayname' + data[i].bayid + '">' + data[i].bayname + '</div>';
                }
                RightGroupHTML += '<div id="baystatus' + data[i].bayid + '">Status: ' + statuschanged + '</div>';
                if (data[i].membername != null && data[i].membername != "" && data[i].status != "ActionNeeded") {
                    RightGroupHTML += '<div>Member: <span id="membername' + data[i].bayid + '">' + toTitleCase(data[i].membername) + '</span></div>';
                }
                if (data[i].starttime != null && data[i].status != "ActionNeeded") {
                    var timeStart = convertDateTo12HourTime(data[i].starttime && data[i].status != "ActionNeeded");
                    RightGroupHTML += '<div class="'+hideClass+'">Start Time: <span id="timeStart' + data[i].bayid + '">' + timeStart + '</span></div>';
                    selectBoxInuseSL += '<option value="'+data[i].bayid+'">'+data[i].bayname+'</option>';
                }
                if (data[i].endtime != null && data[i].status != "ActionNeeded") {
                    var timeEnd = convertDateTo12HourTime(data[i].endtime && data[i].status != "ActionNeeded");
                    RightGroupHTML += '<div class="'+hideClass+'">End Time: <span id="timeEnd' + data[i].bayid + '">' + timeEnd + '</span></div>';
                }
                if (data[i].endtime != null && data[i].status != "Avail" && data[i].status != "NotOper" && data[i].status != "ActionNeeded") {
                    var extendtiming = data[i].extendedtime;
                    var show_extendtiming = extendtiming.slice(0, -3);
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
                    RightGroupHTML += othermemwithchkbox;
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

    });
}


function unlimitedTimer(bayid){
var id = bayid;	
var everyinterval = 0;
everyinterval = setInterval(function(){
var fourth99 = $("#fourth99"+id).html();
fourth99--;
if(fourth99 < 10) {
fourth99 = "0"+fourth99;
}
$("#fourth99"+id).html(fourth99);
var newfourth99 = $("#fourth99"+id).html();
if(newfourth99 == 0) {
minusthird99(id);
$("#fourth99"+id).html("99");
}
}, 1000);
}
function minusthird99(bayid) {
var id = bayid;	
var third99 = $("#third99"+id).html();
third99--;
if(third99 < 10) {
third99 = "0"+third99;
}
$("#third99"+id).html(third99);
var newthird99 = $("#third99"+id).html();
if(newthird99 == 0) {
minussecond99(id);
$("#third99"+id).html(99);
}
}
function minussecond99(bayid) {
var id = bayid;	
var second99 = $("#second99"+id).html();
second99--;
if(second99 < 10) {
second99 = "0"+second99;
}
$("#second99"+id).html(second99);
var newsecond99 = $("#second99"+id).html();
if(second99 == 0) {
minusfirst99(id);
$("#second99"+id).html(99);
}
}
function minusfirst99(bayid) {
var id = bayid;	
var first99 = $("#first99"+id).html();
first99--;
if(first99 < 10) {
first99 = "0"+first99;
}
$("#first99"+id).html(first99);
}
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
        type: 'GET',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1" }
    }).done(function (data) {
        var resulthtml = '<div class="shootingtable"><div id="adpartymsg"></div><table id="example2" class="display">';
        resulthtml +=    '<thead>';
        resulthtml +=    '<tr><th>Name</th><th>Party Size</th><th>Time In</th><th>Action </th></tr>';
        resulthtml +=    '</thead><tbody>';

        for (var i = 0; i < data["waitingqueue"].length; i++) {

            resulthtml += '<tr class="active"><td>'+data["waitingqueue"][i].membername+'</td><td>'+data["waitingqueue"][i].partymembers+'</td><td>'+getTimeHourMinuteFromDateTime(data["waitingqueue"][i].checkintime)+'</td><td><a id='+data["waitingqueue"][i].waitingid+' name="'+data["waitingqueue"][i].membername+'" class="adparty"><span id="nextbtn3" class="label label-default addtoparty">Add to Party</span></a><input type="hidden" name="partymembercheck'+data["waitingqueue"][i].waitingid+'" id="partymembercheck'+data["waitingqueue"][i].waitingid+'" value="'+data["waitingqueue"][i].gamertag+'" /></td></tr>';

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
	var expId = $('#expId').val();
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
        url:<?php echo '"'.API_URL_BAY_SELECTION.'"'; ?>,
        type: 'POST',
        dataType: 'json',
        crossDomain: true,
        data: { siteid: "1", bayid:bayID, expid:expId,gamertag:members,waitingid: '0' }
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
	if(result.member_info[i].juniors != null ){
		
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
	showmemberInfo += '<tr><td>Refer to POS machine</td><td>'+result.member_info[i].bay_name+'</td></tr>';
	}
	showmemberInfo += junior_div;
	if(result.member_info[i].total_tax == null){}else{
	}
	showmemberInfo += '</table>';
	showmemberInfo += '<br><h5 class="dot"></h5>';
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
function existingpurchaseInformation(){
var bayid = $('#boxIDforColorChange').val();	
$.ajax({
url: api_url+api_version+"PartyPurchaseInformation",
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
	for (var j = 0; j < result.member_info[i].juniors.length; j++) {
		junior_div += '<tr><td>$5.00</td><td>'+result.member_info[i].juniors[j].firstname+'&nbsp;'+result.member_info[i].juniors[j].lastname+' Junior Membership</td></tr>';
	}
	}else{
	junior_div = '';	
	}
	if(result.member_info[i].membership_price == null && result.member_info[i].membership_type == null && result.member_info[i].bay_price == '0.0' && result.member_info[i].bay_name == null && result.member_info[i].total_tax == null && result.member_info[i].total_amount == null){}else if(result.member_info[i].membership_type != null || result.member_info[i].juniors != null){
	showmemberInfo += '<div class="order" data-order-summary-section="payment-lines">';
	showmemberInfo += '<h5 class="heading-h5">'+a+'.&nbsp;<span>'+result.member_info[i].firstname+'&nbsp;'+result.member_info[i].lastname+'</span></h5>';
	showmemberInfo += '<table class="purchasetable">';
	showmemberInfo += '<tr><th class="cost">Cost</th><th class="desc">Description</th></tr>';
	if(result.member_info[i].membership_price == null && result.member_info[i].membership_type == null){}else{
	var membershiptype = result.member_info[i].membership_type;	
	showmemberInfo += '<tr><td>$'+result.member_info[i].membership_price.toFixed(2)+'</td><td>'+membershiptype.replace("*", " ")+' Membership</td></tr>';
	}
	showmemberInfo += junior_div;
	if(result.member_info[i].total_tax == null){}else{
	}
	showmemberInfo += '</table>';
	showmemberInfo += '<br><h5 class="dot"></h5>';
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
    $(document).on("mouseover", ".loungeBox", function(){
        if(screen.width != "768") {
            var bayID = $(this).data("id");
            var color = $(this).closest(".col-md-11").css("background-color");
            if(color == "rgb(43, 120, 228)" || color == "rgb(255, 255, 0)") {
                $(this).css("background-color",color);
                $(this).addClass("hover2");
                $( "span#timeStart"+bayID ).parent().removeClass( "hide" );
                $( "span#timeEnd"+bayID ).parent().removeClass( "hide" );
                $( "span#timeExtend"+bayID ).parent().removeClass( "hide" );
                $( "div.othermem"+bayID ).removeClass( "hide" );
            }else if(color == "rgb(255, 255, 0)"){
                $(this).css("background-color",color);
                $(this).addClass("hover2");
            }else if(color == "rgb(207, 42, 39)"){
                $(this).css("background-color",color);
                $(this).addClass("hover2");
            }
        }
    });
    $(document).on("mouseout", ".loungeBox", function(){
        if(screen.width != "768") {
            var bayID = $(this).data("id");
            var color = $(this).closest(".col-md-11").css("background-color");
            if (color == "rgb(43, 120, 228)" || color == "rgb(255, 255, 0)") {
                $(this).removeClass("hover2");
                $( "span#timeStart"+bayID ).parent().addClass( "hide" );
                $( "span#timeEnd"+bayID ).parent().addClass( "hide" );
                $( "span#timeExtend"+bayID ).parent().addClass( "hide" );
                $( "div.othermem"+bayID ).addClass( "hide" );
            } else if (color == "rgb(255, 255, 0)") {
                $(this).removeClass("hover2");
            } else if (color == "rgb(207, 42, 39)") {
                $(this).removeClass("hover2");
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
        $("#baystatus"+boxID).html("Status: Open");
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
        data: { siteid: "1",phone_number: phone_number,gamertag: members, expid:expId }
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
	var exist = $('#exist').val();
	if(exist == 1){
	document.getElementById('realeasebckid').value = id;
    $("#firstscreen").css("display","block");
    $("#heading_modal_open").css("display","block");
    $("#heading_member_line").css("display","none");
    $("#secondscreen").css("display","none");
    $("#fourthscreen").css("display","none");
    $("#thirdscreen").css("display","none");
    $("#openStatusModal").css("height","auto");
    $("#assignBtn").css("display","none");
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
    $(".memName").html(membername);
	$(".memNameagain1").html(membername);
	$(".memNameagain2").html(membername);
    $('#openStatusModal').modal();                     // initialized with defaults
    $('#openStatusModal').modal({ keyboard: false });   // initialized with no keyboard
    $('#openStatusModal').modal('show'); 
	}else{
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
    membername = $("#memberNameOnModal").val();
        var baystatus = $("#baystatus"+id).html();
        $(".baystatus").html(baystatus);
        //var membername = $("#membername"+id).html();
    $("#heading_modal_open").html(bayname);
	$("#loungeName1").html(bayname);
    $("#heading_member_line").html(membername+" Assigned to "+bayname);
    $(".memName").html(membername);
	$(".memNameagain1").html(membername);
	$(".memNameagain2").html(membername);
    $('#openStatusModal').modal();                     // initialized with defaults
    $('#openStatusModal').modal({ keyboard: false });   // initialized with no keyboard
    $('#openStatusModal').modal('show');    
	}            // initializes and invokes show immediately
}

function rclicked(id) {
	var exist = $('#exist').val();
	if(exist == 1){
	var bayname = $("#bayname"+id).html();
    var membername = $("#membername"+id).html();
    var timeStart = $("#timeStart"+id).html();
    var timeEnd = $("#timeEnd"+id).html();
    var timeExtend = $("#timeExtend"+id).html();
    var timeRemain = $("#timeRemain"+id).html();
	var partymemb = $("#mem"+id).html();
        var partymembchkbox = $(".othermemchkbox" + id).html();
	//var partymemb = $(".additionalmembers").html();
	if($("#mem"+id).text().length > 0) {
		$(".addMemTitle").html('Addtional Members:');
	}else{
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
	$('#adextingparty').attr('bay_name', bayname);
	$("#adextingparty").css("display","inline-block");
	$("#adtiming").css("display","none");
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
	} else{
	var bayname = $("#bayname"+id).html();
    var membername = $("#membername"+id).html();
    var timeStart = $("#timeStart"+id).html();
    var timeEnd = $("#timeEnd"+id).html();
    var timeExtend = $("#timeExtend"+id).html();
    var timeRemain = $("#timeRemain"+id).html();
	var partymemb = $("#mem"+id).html();
        var partymembchkbox = $(".othermemchkbox" + id).html();
	//var partymemb = $(".additionalmembers").html();
	if($("#mem"+id).text().length > 0) {
		$(".addMemTitle").html('Addtional Members:');
	}else{
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
	$("#adextingparty").css("display","none");
	$("#adtiming").css("display","none");
	var totalpartymembers = document.getElementById('partymember' + id).value;
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
            //$("#adextingparty").css("display", "inline-block");   // Don't show add to party button when check-in member process runs
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
	var exist = $('#exist').val();
	if(exist == 1){
	$('#adextingpartyellow').attr('by_id', id);
	$("#adextingpartyellow").css("display","inline-block");	
	$("#boxIDforColorChange").val(id);
	$("#boxIDforColorChange").val(id);
	var bayname = $("#bayname"+id).html();
        var baystatus = $("#baystatus"+id).html();
	$("#heading_modal_inassing").html(bayname);
        $(".baystatus").html(baystatus);
	$('#inassigned').modal();	
	}else{
	$("#adextingpartyellow").css("display","none");	
    $("#boxIDforColorChange").val(id);
	$("#boxIDforColorChange").val(id);
	var bayname = $("#bayname"+id).html();
        var baystatus = $("#baystatus"+id).html();
	$("#heading_modal_inassing").html(bayname);
        $(".baystatus").html(baystatus);
	$('#inassigned').modal();
	}
}
function bclicked(id) {
    $("#boxIDforColorChange").val(id);
	var bayname = $("#bayname"+id).html();
    var baystatus = $("#baystatus"+id).html();
	$("#heading_modal_inactive").html(bayname);
    $(".baystatus").html(baystatus);
	$('#inactiveto').modal(); 
}

    getBayHeaders();

</script>
</body>
</html>