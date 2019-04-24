<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("head.inc.php"); ?>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::moz-selection {
            background-color: #E13300;
            color: white;
        }

        ::webkit-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            -webkit-box-shadow: 0 0 8px #D0D0D0;
        }

        /* Custom css to desing different boxes */
        .generalbox {
            border:1px solid black;
            min-height: 200px;
            padding-top: 15px;
            padding-bottom: 15px;
            color: white;
            font-size: 15px;
        }
        .greenbox {
             background-color: green;
        }
        .redbox {
             background-color: red;
        }
        .yellowbox {
             background-color: yellow; color: black !important;
        }
        .bluebox {
             background-color: blue;
        }
    </style>


    <script>
        function getShootingLounges() {
            $.ajax({
                headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
                url:<?php echo '"'.API_URL_BAY_LIST.'"'; ?>,
                type: 'POST',
                dataType: 'json',
                crossDomain: true,
                data: { siteid: "1" }
            }).done(function (data) {
                var resulthtml = "<h1>Shooting Lounges</h1>";
                var statuschanged = "";
                var colorclass = "";
                var func = "";
                for (var i = 0; i < data.length; i++) {

                    switch (data[i].status) {
                        case "Res":
                            statuschanged = "Assigned";
                            colorclass = "yellowbox";
                            func = "yclicked";
                            break;
                        case "Busy":
                            statuschanged = "In Use";
                            colorclass = "redbox";
                            func = "rclicked";
                            break;
                        case "Avail":
                            statuschanged = "Open";
                            colorclass = "greenbox";
                            func = "gclicked";
                            break;
                        default :
                            statuschanged = "Inactive";
                            colorclass = "bluebox";
                            func = "bclicked";

                    }

                    resulthtml += '<a href="javascript:;" onclick="'+func+'('+data[i].bayid+')" class="' + colorclass + 'a" data-id="'+data[i].bayid+'">';
                    resulthtml += '<div id="box'+data[i].bayid+'" data-id="'+data[i].bayid+'" class="col-xs-3 generalbox ' + colorclass + '">';
                    if (data[i].bayname != null) {
                        resulthtml += '<div class="title" id="bayname' + data[i].bayid + '">' + data[i].bayname + '</div>';
                    }
                    resulthtml += '<div id="baystatus' + data[i].bayid + '">Status: ' + statuschanged + '</div>';

                    if (data[i].membername != null && data[i].membername != "") {
                        resulthtml += '<div>Member: <span id="membername' + data[i].bayid + '">' + data[i].membername + '</span></div>';
                    }
                    if (data[i].starttime != null) {
                        var timeStart = convertDateTo12HourTime(data[i].starttime);
                        resulthtml += '<div>Start Time: ' + timeStart + '</div>';
                    }
                    if (data[i].endtime != null) {
                        var timeEnd = convertDateTo12HourTime(data[i].endtime);
                        resulthtml += '<div>End Time: ' + timeEnd + '</div>';
                    }
                    if (data[i].endtime != null) {
                        var timeEnd = convertDateTo12HourTime(data[i].endtime);
                        resulthtml += '<div>Extended Time: 00:00</div>';
                    }
                    if (data[i].remainingtime != null && data[i].remainingtime != "") {
                        //var remaintime = convertDateTo12HourTime(data[i].endtime);
                        resulthtml += '<div>Remaining Time: ' + data[i].remainingtime + '</div>';
                    }

                    resulthtml += '</div></a>';

                }

                $("#boxesResult").html(resulthtml);

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
                var resulthtml = '<table class="table table-striped">';
                resulthtml +=    '<thead>';
                resulthtml +=    '<tr><th>Name</th><th>Party Size</th><th>Time In</th></tr>';
                resulthtml +=    '</thead><tbody>';

                for (var i = 0; i < data["waitingqueue"].length; i++) {

                    resulthtml += '<tr><td>'+data["waitingqueue"][i].membername+'</td><td>'+data["waitingqueue"][i].partymembers+'</td><td>'+getTimeHourMinuteFromDateTime(data["waitingqueue"][i].checkintime)+'</td><td><a href="#" data-id="'+data["waitingqueue"][i].memberid+'">Add to Party</a></td></tr>';

                }
                resulthtml += '</tbody></table>';

                $("#waitlist").html(resulthtml);

            });
        }

        function baySelection() {
            var members = [562,563,564];
            var bayID = $("#boxIDforColorChange").val();
            $.ajax({
                headers: { 'apicode':<?php echo '"'.API_CODE.'"'; ?>, token:user_token },
                url:<?php echo '"'.API_URL_BAY_SELECTION.'"'; ?>,
                type: 'POST',
                dataType: 'json',
                crossDomain: true,
                data: { siteid: "1", bayId:bayID, expid:"1", members:members }
            }).done(function (data) {
                //alert(data.issuccessful);

                /*{
                    "issuccessful": true,
                    "minutes_to_reach_bay": 5
                }*/

                // Bay is not available

            });
        }
        /*clearInterval(handle);*/
        $(document).ready(function (){
            getShootingLounges();
            fill_wait_list_grid();

            $("#closeBtnStatusopen").click(function(){
                var boxID = $("#boxIDforColorChange").val();

                $("#box"+boxID).addClass("greenbox");
                $("#box"+boxID).removeClass("yellowbox");
                $("#baystatus"+boxID).html("Open");
                if(everyinterval == 0) {
                    everyinterval = setInterval(function(){
                        getShootingLounges(); // this will run after every 10 seconds
                        fill_wait_list_grid();
                    }, 10000);
                }
            });

            $("#finishBtnStatusopen").click(function(){
                getShootingLounges();
                if(everyinterval == 0) {
                    everyinterval = setInterval(function(){
                        getShootingLounges(); // this will run after every 10 seconds
                        fill_wait_list_grid();
                    }, 10000);
                }
            });



        });

        var everyinterval = setInterval(function(){
            getShootingLounges(); // this will run after every 10 seconds
            fill_wait_list_grid();
            //$("#chk").val(chk++);
        }, 10000);

        function gclicked(id) {

            // modal reset
            $("#firstscreen").css("display","block");
            $("#heading_modal_open").css("display","block");
            $("#heading_member_line").css("display","none");
            $("#secondscreen").css("display","none");
            $("#fourthscreen").css("display","none");
            $("#thirdscreen").css("display","none");
            $("#openStatusModal").css("height","auto");
            $("#assignBtn").css("display","inline-block");
            $("#continueBtn").css("display","none");
            $("#backBtn").css("display","none");
            $("#lastContinueBtn").css("display","none");
            $("#boxIDforColorChange").val(id);
            $("#closeBtnStatusopen").html("Close");
            $(".modal-footer").css("text-align","right");
            $(".modal-header").css("display","block");
            $("#finishBtnStatusopen").css("display","none");
            // end modal reset

            clearInterval(everyinterval);
            everyinterval = 0;
            var editid = $(this).data('id');
            var bayname = $("#bayname"+id).html();
            var membername = $("#membername"+id).html();
            $("#heading_modal_open").html(bayname);
            $("#heading_member_line").html(membername+" Assigned to "+bayname);
            $('#openStatusModal').modal();                     // initialized with defaults
            $('#openStatusModal').modal({ keyboard: false });   // initialized with no keyboard
            $('#openStatusModal').modal('show');                // initializes and invokes show immediately
        }
        function yclicked(id) {

        }
        function rclicked(id) {

        }
        function bclicked(id) {

        }
    </script>


</head>
<body>
<?php echo $this->load->view('modals/modal_in_use'); ?>
<div id="container">
    <div class="col-xs-12" id="three">

        <div class="col-xs-8" id="boxesResult">

        </div>

        <div class="col-xs-4">
            <h1>Wait List</h1>
            <input type="button" value="Add Member to Wait List" />
            <div id="waitlist">

            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>