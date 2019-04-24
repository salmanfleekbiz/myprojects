<?php session_start(); ?>
<?php include('assets/include/config.php'); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>5stardesigners | Admin</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />      
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/cmxform.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/css/pages/profile.css" rel="stylesheet" type="text/css" />
<link href="assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<script src="assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<!--[if lt IE 9]>
	
<script src="assets/plugins/excanvas.min.js"></script>
<script src="assets/plugins/respond.min.js"></script>  
<![endif]-->   
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>   
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>  
<script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>  
<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>  
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>  
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript" ></script>
<script src="assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript" ></script>
<script type="text/javascript" src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="assets/scripts/jquery.validate.js"></script>   
<script src="assets/scripts/jqueryfunction.js"></script>   
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<script src="assets/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/scripts/table-managed.js"></script>   
<script src="assets/scripts/form-components.js"></script> 
<script src="assets/scripts/zebra_datepicker.js"></script> 
<script src="assets/scripts/ui-modals.js"></script>  
<script src="assets/scripts/jquery-ui.js"></script>       
<script>
jQuery(document).ready(function() {    
App.init();
Index.init();
Index.initCalendar();
Index.initCharts();
Index.initChat();
Index.initMiniCharts();
Index.initDashboardDaterange();
Index.initIntro();
Tasks.initDashboardWidget();
TableManaged.init();
UIModals.init();
});
jQuery(document).ready(function() {
jQuery('#couponstartdate').Zebra_DatePicker({
direction: true,
pair: jQuery('#couponendate')
});
jQuery('#couponendate').Zebra_DatePicker({
direction: 1
});
$("#client_phone").inputmask("mask", {"mask": "(999) 999-9999"});
$("#userphone").inputmask("mask", {"mask": "(999) 999-9999"});
});
function client_chat(userId,clientId){
var action = 'clientchat';	
var message = jQuery('#message'+clientId).val();
var curdates = jQuery('#curenttime'+clientId).val();
if(message == ''){}else{
jQuery.ajax({
		url : 'assets/include/process.php',
		data: {action:action,userid:userId,clientid:clientId,message:message,curdates:curdates},
		timeout: 10000,
		type: 'POST',
		success : function(data) {
			document.getElementById('message'+clientId).value='';
			getAllchat(clientId);
		},
		error: function(){
			hide_load();
			showMessage('#fff', '#000000', 'There is a some error please again latter');
		}
	});
}
}
function getAllchat(clientId){
var action = 'getallChat';
jQuery.ajax({
		url : 'assets/include/process.php',
		data: {action:action,clientid:clientId},
		timeout: 10000,
		type: 'POST',
		success : function(data) {
			document.getElementById('clientchat'+clientId).innerHTML=data;
			document.getElementById('dateerror'+clientId).innerHTML='';
			document.getElementById('datesucess'+clientId).innerHTML='';
			currentTime(clientId);
		},
		error: function(){
			hide_load();
			showMessage('#fff', '#000000', 'There is a some error please again latter');
		}
	});	
}
function followDate(clientId){
var action = 'clientfollowdate';
var clientId = clientId;
var followDate = jQuery('#followupdate'+clientId).val();
if(followDate == ''){
document.getElementById('dateerror'+clientId).innerHTML='<div class="alert alert-error"><button data-dismiss="alert" class="close"></button><span>Enter a Date !!!</span></div>';
}else{
jQuery.ajax({
		url : 'assets/include/process.php',
		data: {action:action,clientId:clientId,followDate:followDate},
		timeout: 10000,
		type: 'POST',
		success : function(data) {
			if(data == 'datematch'){
			document.getElementById('dateerror'+clientId).innerHTML='<div class="alert alert-error"><button data-dismiss="alert" class="close"></button><span>This date is already followup please enter new date!!!</span></div>';
			document.getElementById('datesucess'+clientId).innerHTML='';
			}else{
			document.getElementById('dateerror'+clientId).innerHTML='';
			document.getElementById('datesucess'+clientId).innerHTML='<div class="alert alert-success"><button data-dismiss="alert" class="close"></button><strong>Success!</strong> Update Followup.</div>';
			document.getElementById('followupdate'+clientId).innerHTML='';
			}
		},
		error: function(){
			hide_load();
			showMessage('#fff', '#000000', 'There is a some error please again latter');
		}
	});	
}
}
function currentTime(clientid){
var now     = new Date(); 
var year    = now.getFullYear();
var month   = now.getMonth()+1; 
var day     = now.getDate();
var hour    = now.getHours();
var minute  = now.getMinutes();
var second  = now.getSeconds(); 
if(month.toString().length == 1) {
var month = '0'+month;
}
if(day.toString().length == 1) {
var day = '0'+day;
}   
if(hour.toString().length == 1) {
var hour = '0'+hour;
}
if(minute.toString().length == 1) {
var minute = '0'+minute;
}
if(second.toString().length == 1) {
var second = '0'+second;
}   
var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;
document.getElementById('curenttime'+clientid).value = dateTime;
}
</script>
<style type="text/css">
#fancybox-loading{position:fixed; top:50% ;left:50%; width:40px; height:40px; margin-top:-20px; margin-left:-20px; cursor:pointer; overflow:hidden; z-index:9999;display:none;}
#fancybox-loading div{position:absolute; top:0; left:0;}
#fancybox-overlay{position:absolute; top:0; left:0; width:100%; z-index:1100; display:none; background-color:#FFF; opacity:0.7; cursor:pointer; height:1695px;}
Zebra_DatePicker *,
.Zebra_DatePicker *:after,
.Zebra_DatePicker *:before  { -moz-box-sizing: content-box !important; -webkit-box-sizing: content-box !important; box-sizing: content-box !important }
.Zebra_DatePicker           { position: absolute; background: #666; border: 3px solid #666; z-index: 1200; font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 13px; top: 0 }
.Zebra_DatePicker *         { margin: 0; padding: 0; color: #000; background: transparent; border: none }
.Zebra_DatePicker table                      { border-collapse: collapse; border-spacing: 0; width: auto; table-layout: auto; }
.Zebra_DatePicker td,
.Zebra_DatePicker th                         { text-align: center; padding: 5px 0 }
.Zebra_DatePicker td                         { cursor: pointer }
.Zebra_DatePicker .dp_daypicker,
.Zebra_DatePicker .dp_monthpicker,
.Zebra_DatePicker .dp_yearpicker             { margin-top: 3px }
.Zebra_DatePicker .dp_daypicker td,
.Zebra_DatePicker .dp_daypicker th,
.Zebra_DatePicker .dp_monthpicker td,
.Zebra_DatePicker .dp_yearpicker td         { background: #E8E8E8; width: 30px; border: 1px solid #7BACD2 }
.Zebra_DatePicker,
.Zebra_DatePicker .dp_header .dp_hover,
.Zebra_DatePicker .dp_footer .dp_hover { -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px }
.Zebra_DatePicker.dp_visible               { visibility: visible; filter: alpha(opacity=100); -khtml-opacity: 1; -moz-opacity: 1; opacity: 1; transition: opacity 0.2s ease-in-out }
.Zebra_DatePicker.dp_hidden                { visibility: hidden; filter: alpha(opacity=0); -khtml-opacity: 0; -moz-opacity: 0; opacity: 0 }
.Zebra_DatePicker .dp_header td             { color: #FFF }

.Zebra_DatePicker .dp_header .dp_previous,
.Zebra_DatePicker .dp_header .dp_next       { width: 30px }

.Zebra_DatePicker .dp_header .dp_caption    { font-weight: bold }
.Zebra_DatePicker .dp_header .dp_hover      { background: #222; color: #FFF }
.Zebra_DatePicker .dp_daypicker th              { background: #FFCC33 }
.Zebra_DatePicker td.dp_not_in_month            { background: #F3F3F3; color: #CDCDCD; cursor: default }
.Zebra_DatePicker td.dp_not_in_month_selectable { background: #F3F3F3; color: #CDCDCD; cursor: pointer }
.Zebra_DatePicker td.dp_weekend                 { background: #D8D8D8 }
.Zebra_DatePicker td.dp_weekend_disabled        { color: #CCC; cursor: default }
.Zebra_DatePicker td.dp_selected                { background: #5A4B4B; color: #FFF !important }
.Zebra_DatePicker td.dp_week_number             { background: #FFCC33; color: #555; cursor: text; font-style: italic }
.Zebra_DatePicker .dp_monthpicker td    { width: 33% }
.Zebra_DatePicker .dp_yearpicker td     { width: 33% }
.Zebra_DatePicker .dp_footer            { margin-top: 3px }
.Zebra_DatePicker .dp_footer .dp_hover  { background: #222; color: #FFF }
.Zebra_DatePicker .dp_today { color: #FFF; padding: 3px }
.Zebra_DatePicker .dp_clear { color: #FFF; padding: 3px }
.Zebra_DatePicker td.dp_current             { color: #C40000 }
.Zebra_DatePicker td.dp_disabled_current    { color: #E38585 }
.Zebra_DatePicker td.dp_disabled            { background: #F3F3F3; color: #CDCDCD; cursor: default }
.Zebra_DatePicker td.dp_hover               { background: #482424; color: #FFF }
button.Zebra_DatePicker_Icon                { display: block; position: absolute; width: 16px; height: 16px; background: url('') no-repeat left top; text-indent: -9000px; border: none; cursor: pointer; padding: 0; line-height: 0; vertical-align: top }
button.Zebra_DatePicker_Icon_Disabled       { background-image: url('') }
button.Zebra_DatePicker_Icon                { margin: 0 0 0 3px }
button.Zebra_DatePicker_Icon_Inside         { margin: 0 3px 0 0 }
#ui-datepicker-div.ui-datepicker {
    z-index: 10060 !important;
}
</style>
<?php include('scriptfunctions.php'); ?>
</head>
<body class="page-header-fixed">
<div id="fancybox-loading"><div><img src="assets/img/loading.gif" alt="Loading" /></div></div>
<div id="fancybox-overlay"></div>
<div class="header navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container-fluid">
<a class="brand" href="index">
<img src="assets/img/logo1.png" alt="logo" width="60%" />
</a>
<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
<img src="assets/img/menu-toggler.png" alt="" />
</a>               
<ul class="nav pull-right">
<li class="dropdown user">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
<span class="username"><?php if(isset($_SESSION['member_name'])){ echo ucfirst($_SESSION['member_name']); }else{} ?></span>
<i class="icon-angle-down"></i>
</a>
<ul class="dropdown-menu">
<li><a href="logout"><i class="icon-key"></i> Log Out</a></li>
</ul>
</li>
</ul>
</div>
</div>
</div>