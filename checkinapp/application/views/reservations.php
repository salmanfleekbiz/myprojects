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
		#example_length{display:none;}
		#example_filter{display:none;}
		#example_info{display:none;}
		/*#example2_length{display:none;}*/
		#example2_filter{display:none;}
		#example2_info{display:none;}
		
		#example3_filter{display:none;}
		#example3_info{display:none;}
    </style>
    <style type="text/css">
table.scroll {width: 100%;border-spacing: 0;border: 2px solid black;}
table.scroll tbody,table.scroll thead { display: block; }
thead tr th {}
table.scroll tbody {height: 100px;overflow-y: auto;overflow-x: hidden;}
tbody td, thead th {width: 2%;border-right: 1px solid black; border-left: 1px solid #000000; text-align:center;}
tbody td:last-child, thead th:last-child {}
.green_row{ background:#95bcf2 !important;}
.second tbody tr {background: #fff; }
#example3 thead tr {
    background: rgb(0, 255, 255) none repeat scroll 0 0;
}
table.dt-rowReorder-float{position:absolute !important;opacity:0.8;table-layout:static;outline:2px solid #888;outline-offset:-2px;z-index:2001}tr.dt-rowReorder-moving{outline:2px solid #555;outline-offset:-2px}body.dt-rowReorder-noOverflow{overflow-x:hidden}table.dataTable td.reorder{text-align:center;cursor:move}
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
<div class="logout2"><a href="<?php echo base_url(); ?>main/logout" class="logout-btn">Logout</a></div></div>
    <div class="container">
        

    </div>
</div>
<?php echo $this->load->view('modals/modal_assign_shooting_lounges'); ?>
<?php echo $this->load->view('modals/modal_in_use'); ?>
<?php echo $this->load->view('modals/modal_reservations_waitlist'); ?>
<script type="text/javascript">
    function getTimeHourMinuteFromDateTime(datetimestring) {
        var d = new Date(datetimestring);
        var hou = d.getHours(); // => 9
        var min = d.getMinutes(); // =>  30
        var ampm = "";
        if (datetimestring.indexOf('AM') === -1) {
            ampm = "p";
        } else {
            ampm = "a";
        }
        if (min < 10) {
            min = ("0" + min).toString();
        }
        var timeString = hou + ":" + min + ampm;
        return timeString;
    }
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>,'token':user_token },
        url:<?php echo '"'.API_URL_WAITING_QUEUE.'"'; ?>,
        type: 'GET',
        dataType: 'json',
        crossDomain: true,
        beforeSend: function () {
            show_load();
        },
        data: { siteid: "1" }
    }).done(function (data) {
        var resulthtml = '<div class="shootingtablefull"><h4 class="shootingwaitlist">Wait List</h4><div class="header-button"><a id="nextbtn" href="<?php echo base_url(); ?>waitinglist?action=waiting" class="btn btn-default">Add to Wait List</a><div><br><table id="example2" class="display nowrap">';
        resulthtml += '<thead>';
        resulthtml += '<tr><th class="hide">&nbsp;</th><th class="hide">&nbsp;</th><th>Name</th><th>Party Size</th><th>Time In</th><th>Text Message</th><th>Add to Party</th><th>Shooting Lounge</th><th>Remove Party</th></tr>';
        resulthtml += '</thead><tbody>';
        for (var i = 0; i < data["waitingqueue"].length; i++) {
            resulthtml += '<tr class="active"><td class="hide">' + data["waitingqueue"][i].waitingseq + '</td><td class="hide">'+data["waitingqueue"][i].memberid+'</td><td>' + data["waitingqueue"][i].membername + '</td><td>' + data["waitingqueue"][i].partymembers + '</td><td>' + getTimeHourMinuteFromDateTime(data["waitingqueue"][i].checkintime) + '</td><td class="table-alignment"><a id=' + data["waitingqueue"][i].waitingid + ' href="#addtext" name="' + data["waitingqueue"][i].membername + '" tel="' + data["waitingqueue"][i].phone + '" data-toggle="modal" class="admobile"><span id="mobile" class="label label-default addtomobile">Text</span></a></td><td class="table-alignment"><a href="<?php echo base_url(); ?>waitinglist?id=' + data["waitingqueue"][i].waitingid + '&partysize=' + data["waitingqueue"][i].partymembers + '&expid=' + data["waitingqueue"][i].expid + '&memName=' + data["waitingqueue"][i].membername + '" id=' + data["waitingqueue"][i].waitingid + ' class="adsparty prti' + data["waitingqueue"][i].waitingid + '"><span id="party" class="label label-default addtopartys">Add to Party</span></a></td><td class="table-alignment"><a id=' + data["waitingqueue"][i].waitingid + ' class="adassign" href="<?php echo base_url(); ?>assign?id=' + data["waitingqueue"][i].gamertag[0] + '&waitid=' + data["waitingqueue"][i].waitingid + '&expid=' + data["waitingqueue"][i].expid + '"><span id="assign" class="label label-default addtoassign">Assign</span></a></td><td class="table-alignment"><a id=' + data["waitingqueue"][i].waitingid + ' class="removepartyone"><span id="remove" class="label label-default removepartys">Remove</span></a></td></tr>';
        }
        resulthtml += '</tbody></table></div><div id="clearmsg"></div><span class="label label-default allclear"><a class="clear2" href="#clearWaitlistModal" data-toggle="modal">Clear Wait List</a></span></div><br><br>';
        $("#waitingListall").html(resulthtml);

        var waitlisttable = $('#example2').DataTable({
            //"bSort" : false,
            /*"aoColumns": [
                { "bSortable": false }, // hidden column
                { "bSortable": false }, // hidden column
                { "bSortable": false },
                { "bSortable": false },
                { "bSortable": false },
                null,
                null,
                null,
                null
            ],*/
            aLengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            rowReorder: {
                selector: 'td:nth-child(3),td:nth-child(4),td:nth-child(5)'
            },
            responsive: true
        })/*.rowReordering({
            sURL: baseUrl+'reservations/waitlistReorder', fnSuccess: function (message) {
            fill_wait_list_grid();
        },
            fnAlert: function(message) {
                alert("Server Error: Please Re-Login"); // Error message if an server error occured during the process
            }
        })*/;
        waitlisttable.on( 'row-reorder', function ( e, diff, edit ) {
            //alert(edit.triggerRow.data()[1]);
            var old_pos; var new_pos;
            var memberid = edit.triggerRow.data()[1];
            //var result = 'Reorder started on row: '+edit.triggerRow.data()[1]+'<br>';

            for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
                var rowData = waitlisttable.row( diff[i].node ).data();

                if(rowData[1] == memberid) {
                    old_pos = diff[i].oldData;
                    new_pos = diff[i].newData;
                    break;
                }

                /*result += rowData[1]+' updated to be in position '+
                    diff[i].newData+' (was '+diff[i].oldData+')<br>';*/
            }
            if(old_pos != undefined && new_pos != undefined)
                waitlist_reorder(new_pos, old_pos);
                //alert('Old: '+old_pos+' New: '+new_pos );
            //alert( 'Event result:<br>'+result );
        } );
//$('#example3').dataTable( {"aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]});

        hide_load();
        checkMemberwaitnQue();
    });

function fill_wait_list_grid(){
    $.ajax({
        headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>,'token':user_token },
        url:<?php echo '"'.API_URL_WAITING_QUEUE.'"'; ?>,
        type: 'GET',
        dataType: 'json',
        crossDomain: true,
        beforeSend: function(){
            show_load();
        },
        data: { siteid: "1" }
    }).done(function (data) {
        var resulthtml = '<div class="shootingtablefull"><h4 class="shootingwaitlist">Wait List</h4><div class="header-button"><a id="nextbtn" href="<?php echo base_url(); ?>waitinglist?action=waiting" class="btn btn-default">Add to Wait List</a><div><br><table id="example2" class="display">';
        resulthtml +=    '<thead>';
        resulthtml +=    '<tr><th class="hide">&nbsp;</th><th class="hide">&nbsp;</th><th>Name</th><th>Party Size</th><th>Time In</th><th>Text Message</th><th>Add to Party</th><th>Shooting Lounge</th><th>Remove Party</th></tr>';
        resulthtml +=    '</thead><tbody>';
        for (var i = 0; i < data["waitingqueue"].length; i++) {
            resulthtml += '<tr class="active"><td class="hide">'+data["waitingqueue"][i].waitingseq+'</td><td class="hide">'+data["waitingqueue"][i].memberid+'</td><td>'+data["waitingqueue"][i].membername+'</td><td>'+data["waitingqueue"][i].partymembers+'</td><td>'+getTimeHourMinuteFromDateTime(data["waitingqueue"][i].checkintime)+'</td><td class="table-alignment"><a id='+data["waitingqueue"][i].waitingid+' href="#addtext" name="'+data["waitingqueue"][i].membername+'" tel="'+data["waitingqueue"][i].phone+'" data-toggle="modal" class="admobile"><span id="mobile" class="label label-default addtomobile">Text</span></a></td><td class="table-alignment"><a href="<?php echo base_url(); ?>waitinglist?id='+data["waitingqueue"][i].waitingid+'&partysize='+data["waitingqueue"][i].partymembers+'" id='+data["waitingqueue"][i].waitingid+' class="adsparty prti'+data["waitingqueue"][i].waitingid+'"><span id="party" class="label label-default addtopartys">Add to Party</span></a></td><td class="table-alignment"><a id='+data["waitingqueue"][i].waitingid+' class="adassign" href="<?php echo base_url(); ?>assign?id='+data["waitingqueue"][i].gamertag[0]+'&waitid='+data["waitingqueue"][i].waitingid+'"><span id="assign" class="label label-default addtoassign">Assign</span></a></td><td class="table-alignment"><a id='+data["waitingqueue"][i].waitingid+' class="removepartyone"><span id="remove" class="label label-default removepartys">Remove</span></a></td></tr>';
        }
        resulthtml += '</tbody></table></div><div id="clearmsg"></div><span class="label label-default allclear"><a class="clear2" href="#clearWaitlistModal" data-toggle="modal">Clear Wait List</a></span></div><br><br>';
        $("#waitingListall").html(resulthtml);

        /*$('#example2').dataTable( {
            "aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
        }).rowReordering({ sURL: baseUrl+'reservations/waitlistReorder', fnSuccess: function(message) { fill_wait_list_grid(); }
        ,fnAlert: function(message) {
                alert("Server Error: Please Re-Login"); // Error message if an server error occured during the process
            }
        });*/

        var waitlisttable = $('#example2').DataTable({
            //"bSort" : false,
                /*"aoColumns": [
                    { "bSortable": false },
                    { "bSortable": false },
                    { "bSortable": false },
                    { "bSortable": false },
                    { "bSortable": false },
                    null,
                    null,
                    null,
                    null
                ],*/
            aLengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            rowReorder: {
                selector: 'td:nth-child(3),td:nth-child(4),td:nth-child(5)'
            },
            responsive: true
        })/*.rowReordering({
         sURL: baseUrl+'reservations/waitlistReorder', fnSuccess: function (message) {
         fill_wait_list_grid();
         },
         fnAlert: function(message) {
         alert("Server Error: Please Re-Login"); // Error message if an server error occured during the process
         }
         })*/;
        waitlisttable.on( 'row-reorder', function ( e, diff, edit ) {
            var old_pos; var new_pos;
            var memberid = edit.triggerRow.data()[1];
            //var result = 'Reorder started on row: '+edit.triggerRow.data()[1]+'<br>';

            for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
                var rowData = waitlisttable.row( diff[i].node ).data();

                if(rowData[1] == memberid) {
                    old_pos = diff[i].oldData;
                    new_pos = diff[i].newData;
                    break;
                }

                /*result += rowData[1]+' updated to be in position '+
                 diff[i].newData+' (was '+diff[i].oldData+')<br>';*/
            }
            if(old_pos != undefined && new_pos != undefined)
                waitlist_reorder(new_pos, old_pos);
            //alert('Old: '+old_pos+' New: '+new_pos );
            //alert( 'Event result:<br>'+result );
        } );

//$('#example3').dataTable( {"aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]});

        hide_load();
        checkMemberwaitnQue();
    });
}
function getReservations() {
    $.ajax({
        type:"GET",
        url: '<?php echo base_url().'reservations/reservationData'?>',
        success: function(data) {
            //alert(data.length);
            //alert(data[0].time);

            var resulthtml = "";
            var countData = data.length;
            var maxRecords = 10;
            var startRecordCount = 1;

            var firstNameList = "", lastNameList = "", phoneList = "", emailList = "", resCodeList = "";

            resulthtml += '<table id="example3" class="display second"><thead><tr>';
            resulthtml += '<th>Name</th><th>Party Size</th><th>Reservation Time</th><th>Phone Number</th><th>Special Occasion</th><th>Check-In</th><th>Add to Wait List</th><th>Remove Reservation</th>';
            resulthtml += '</tr></thead><tbody>';

            for (var i = 0; i < countData; i++) {

                var fullname = "";
                if(data[i].lastName != "") {
                    fullname = data[i].firstName + ' ' + data[i].lastName;
                } else {
                    fullname = data[i].firstName;
                }

                firstNameList += data[i].firstName+",";
                lastNameList += data[i].lastName+",";
                phoneList += data[i].phone+",";
                emailList += data[i].email+",";
                resCodeList += data[i].code+",";

                resulthtml += '<tr>';
                resulthtml += '<td>' + fullname + '</td>';
                resulthtml += '<td>' + data[i].partySize + '</td>';
                resulthtml += '<td>' + data[i].time + '</td>';
                resulthtml += '<td class="table-alignment">' + data[i].phone + '</td>';
                resulthtml += '<td>' + data[i].occasion + '</td>';
                resulthtml += '<td class="table-alignment"><a id=' + data[i].code + ' class="checkIn" href="<?php echo base_url(); ?>checkinmember?rcode=' + data[i].code + '&psize=' + data[i].partySize + '&fname=' + data[i].firstName + '&lname=' + data[i].lastName + '&phone=' + data[i].phone + '&email=' + data[i].email + '"><span class="label label-default addtomobile" id="checkin">Check-In</span></a></td>';
                resulthtml += '<td class="table-alignment"><a href="<?php echo base_url(); ?>waitinglist?action=waiting&rcode=' + data[i].code + '&psize=' + data[i].partySize + '&fname=' + data[i].firstName + '&lname=' + data[i].lastName + '&phone=' + data[i].phone + '&email=' + data[i].email + '"><span class="label label-default addtomobile" id="mobile">Wait List</span></a></td>';
                resulthtml += '<td class="table-alignment"><a class="reservationRemoveBtn" href="#removeReservation" id="' + data[i].code + '" email="' + data[i].email + '" fname="' + data[i].firstName + '" lname="' + data[i].lastName + '" name="' + fullname + '" phone="' + data[i].phone + '" pSize="' + data[i].partySize + '" resTime="' + data[i].time + '" restId="' + data[i].restaurantId +'" restOcc="' + data[i].occasion +'" data-toggle="modal"><span class="label label-default addtomobile" id="mobile">Remove</span></a></td>';
                resulthtml += '</tr>';

                if (startRecordCount == maxRecords) {
                    break;
                }

                startRecordCount++;

            }

            resulthtml += '</tbody></table>';

            firstNameList = firstNameList.slice(0, -1);
            lastNameList = lastNameList.slice(0, -1);
            phoneList = phoneList.slice(0, -1);
            emailList = emailList.slice(0, -1);
            resCodeList = resCodeList.slice(0, -1);

            resulthtml += '<input type="hidden" name="ResFNameList" id="ResFNameList" value="'+firstNameList+'" />';
            resulthtml += '<input type="hidden" name="ResLNameList" id="ResLNameList" value="'+lastNameList+'" />';
            resulthtml += '<input type="hidden" name="ResPhoneList" id="ResPhoneList" value="'+phoneList+'" />';
            resulthtml += '<input type="hidden" name="ResEmailList" id="ResEmailList" value="'+emailList+'" />';
            resulthtml += '<input type="hidden" name="ResCodeList" id="ResCodeList" value="'+resCodeList+'" />';

            //$("body").append(JSON.stringify(data));
            $("#reservationDiv").html(resulthtml);
            $('#example3').dataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bPaginate": false,
                "aaSorting": [[ 2, "asc" ]] // Sort by first column descending
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //alert(jqXHR.status);
        },
        dataType: "json"
    });
}
getReservations();
setInterval(getReservations, 30000);

function checkMemberwaitnQue(){
$.ajax({	
headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>,'token':user_token },
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
	if(data["waitingqueue"][i].partymembers == 6){
		$('.prti'+data["waitingqueue"][i].waitingid).removeAttr('href');
		$('.prti'+data["waitingqueue"][i].waitingid).attr('href', 'javascript:;');
		$('.prti'+data["waitingqueue"][i].waitingid).addClass("disab");
		//alert('ok');
	}else{
	}
}
hide_load();
});
}

</script>
<div id="container">
<div id="fancybox-loading"><div><img src="<?php echo base_url(); ?>images/loading.gif" alt="Loading" /></div></div>
<div id="fancybox-overlay"></div>

<div id="parentVerticalTab">
            <ul class="resp-tabs-list hor_1">
                <!--<li><a href="<?php echo base_url(); ?>" id="home">Home</a></li>-->
				<li><a href="reservations/" id="addtomember">Wait List</a></li>
				<li><a href="<?php echo base_url(); ?>assign" id="shootinglounges">Shooting Lounges</a></li>
            </ul>
            <div class="resp-tabs-container hor_1">
                <div>
<div id="waitingListall">
</div>
</div>    
</div>


</div>
<div id="clearmsg"></div>
<div id="parentVerticalTab" class="position" style="border: 1px solid #fff;border-radius: 5px;clear: both;float: right;margin-top: 23px;width: 80.2%; position:relative; left:-12px;">
    <div class="resp-tabs-container hor_1">
        <div class="resp-tab-content hor_1 resp-tab-content-active">
            <div class="shootingtablefull"><h4 class="shootingwaitlist">Reservations</h4>

                <div class="header-button">
                    <div><br>

                        <div id="reservationDiv"></div>
                    </div>
                    <div id="clearmsgReservation"></div>
                    <span class="label label-default allclear"><a data-toggle="modal" href="#clearReservationModal" class="clear3">Clear Reservation List</a></span>
                </div>
                <br><br>
            </div>
        </div>
    </div>
                </div>
            
            </div>
        </div>
<a href="#partymax" data-toggle="modal" id="partymaxpop"></a>
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
    });
</script>
</body>
</html>