<div class="modal fade modal-creator openstatusmodal" id="openStatusModal">
    <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">×</button>-->
        <h3 id="heading_modal_open" style="text-align: center;"></h3>
        <h3 id="heading_member_line" style="text-align: center; display: none;"></h3>
    </div>
    <div class="modal-body">

        <div class="row" id="firstscreen">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <label class="bigstatus baystatus">Status: Open</label>

                </div>
                <!-- /control-group -->
            </div>
            <!--/span5-->
        </div>
        <!--/row-->

        <div class="row" id="secondscreen" style="display: none;">
            <div class="span5">
                <div class="control-group" style="text-align: center; margin: 0 auto;">
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png"/>
                    <input type="hidden" id="boxIDforColorChange" value="" />
                    <input type="hidden" id="memberNameOnModal" value="" />
                </div>
                <!-- /control-group -->
            </div>
            <!--/span5-->
        </div>

        <div class="row" id="thirdscreen" style="display: none;">
            <div class="span5">
                <div class="control-group" style="margin: 0 auto;">
                    <div style="text-align: center;">Purchase Confirmation</div>
                    <div>
                        <ol>
                            <li>
                                <span class="memName"></span> <br/>
                                $5.00 &nbsp;&nbsp; Life Time Memebership<br/>
                                $25.00 &nbsp; Shooting Lounge 1 hour<br/>
                                $0.39 &nbsp;&nbsp; Tax<br/>
                            </li>
                        </ol>
                    </div>
                    <div>----------------------------------------------------------------------</div>
                    <div class="heading-h5"><span class="memName"></span> Total $30.39</div>
                </div>
                <!-- /control-group -->
            </div>
            <!--/span5-->
        </div>

        <div class="row" id="fourthscreen" style="display: none;">
            <div class="span5">
                <div style="text-align: center;">Collect payment from <span class="memNameagain1"></span>. After collecting payment, advise <span class="memNameagain2"></span> to proceed to the Shooting Lounge. Time will begin in 2 minutes after collecting payment.</div>
                <div class="control-group" style="text-align: center; margin: 0 auto;">
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png"/>
                </div>
                <!-- /control-group -->
            </div>
            <!--/span5-->
        </div>
    </div>
    <!-- /modal-body -->

    <div class="modal-footer">
        <!-- <p class="span3 resize">The following images are sized incorrectly. Click to edit</p> -->
        <a href="javascript:;" class="btn btn-default nextbtn" id="closeBtnStatusopen" data-dismiss="modal">Close</a>
        <a class="btn btn-default nextbtn" id="assignBtn" href="javascript:;">Assign</a>
        <a class="btn btn-default nextbtn" id="deactivatBtn" href="javascript:;" data-dismiss="modal">Deactivate</a>
<!--        <a class="btn btn-default nextbtn" id="deactivatBtn" href="javascript:;" data-dismiss="modal">Deactivate</a>-->
        <a class="btn btn-default nextbtn" style="display: none;" id="backBtn" href="javascript:;">Back</a>
        <a class="btn btn-default continurassing nextbtn" style="display: none;" id="continueBtn" href="javascript:;" data-dismiss="modal">Continue</a>
        <a class="btn btn-default nextbtn" style="display: none;" id="lastContinueBtnold" href="javascript:;">Continue</a>
        <a href="javascript:;" class="btn btn-default nextbtn" style="display: none;" id="finishBtnStatusopen" data-dismiss="modal">Finish</a>
    </div>
</div>

<div class="modal fade modal-creator busyStatusModal" id="busyStatusModal">
    <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">×</button>-->
        <h3 id="heading_modal_inuse" class="inusePanel" style="text-align: center;"></h3>
        <h3 id="heading_modal_inuse_members_list" class="memberTransPanel hide" style="text-align: center;">Release/Transfer Members</h3>
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <div class="inusePanel">
                    <div class="bigstatus baystatus">Status: In Use</div>
                        <div>Member: <span class="memName"></span></div>
                        <div>Start Time: <span class="startTime"></span></div>
                        <div>End Time: <span class="endTime"></span></div>
                        <div>Extended Time: <span class="extendedTime"></span></div>
                        <div>Remaining Time: <span class="remainTime"></span></div>
                        <div><span class="addMemTitle"></span> <span class="jnuiors"></span></div>
                    </div>
                </div>
				<div class="main-member">
                <div id="members_list" class="control-group memberTransPanel hide">
                	<label class="left-heading" id="title17" for="Field17">Addtional Members:</label>
                    <div class="dynamicMemList">
                        <span class="jnuiorschkbox"></span>
                    </div>
                </div>
                <div id="inuseSLlistParentDiv" class="control-group memberTransPanel hide sl">
                <label class="right-heading" id="title18" for="Field17">Select SL:</label>
                    <div id="inuseSLlist"></div>
                </div></div>
                <div style="text-align: center; color: red;" id="memberTransferError"></div>
                <!-- /control-group -->
            </div>
            <!--/span5-->
        </div>
        <!--/row-->

    </div>
    <!-- /modal-body -->

    <div class="modal-footer">
        <div class="inusePanel">
            <a href="javascript:;" class="btn btn-default nextbtn" id="closeBtnStatusInUse" data-dismiss="modal">Close</a>
            <a class="btn btn-default nextbtn" id="releaseBtn" href="javascript:;" data-dismiss="modal">Release</a>
            <a class="btn btn-default nextbtn bsy2" id="deactivatBtn" href="javascript:;" data-dismiss="modal">Deactivate</a>
            <a class="btn btn-default nextbtn adtiming" id="adtiming" href="javascript:;" data-dismiss="modal">Add Time</a>
            <a class="btn btn-default nextbtn existingparty" id="adextingparty">Add to Party</a>
            <a style="display:none;" class="btn btn-default nextbtn" id="perviousparty">Previous Party</a>
            <a style="display:none;" class="btn btn-default nextbtn releasememberBtn" id="releasememberBtn">Members</a>
        </div>
        <div class="memberTransPanel hide">
            <a class="btn btn-default nextbtn backMemBtn" id="backMemBtn">Back</a>
            <a class="btn btn-default nextbtn removeMemBtn" id="removeMemBtn">Release</a>
            <a class="btn btn-default nextbtn transferMemBtn" id="transferMemBtn">Transfer</a>
        </div>
    </div>
</div>

<div class="modal fade modal-creator addMemToListModal" id="addMemToListModal">
    <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">×</button>-->
        <h4 style="text-align: center;">Add Mobile Number to be Notified When Shooting Lounge is Available</h4>
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">

                    <div style="text-align: center"><input type="text" id="mobNumber" name="mobNumber" class="placeholder" placeholder="(xxx) xxx-xxxx" />
                    <div id="mobilerror"></div>
                    </div>
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png"/>

                </div>
                <!-- /control-group -->
            </div>
            <!--/span5-->
        </div>
        <!--/row-->

    </div>
    <!-- /modal-body -->

    <div class="modal-footer">
        <a class="btn btn-default nextbtn" id="cancelPhoneBtn" href="javascript:;" data-dismiss="modal">Cancel</a>
        <a class="btn btn-default nextbtn" id="submitPhoneBtn" href="javascript:;">Submit</a>
    </div>
</div>
<div class="modal fade modal-creator inactiveto" id="inactiveto">
    <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">×</button>-->
        <h3 id="heading_modal_inactive" style="text-align: center;"></h3>
    </div>
    <div class="modal-body">

        <div class="row" id="firstscreen">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <label class="bigstatus baystatus">Status: Inactive</label>

                </div>
                <!-- /control-group -->
            </div>
            <!--/span5-->
        </div>
        <!--/row-->

    </div>
    <!-- /modal-body -->

    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" id="closeBtnStatusInactive" data-dismiss="modal">Close</a>
        <a class="btn btn-default nextbtn" id="activeBtn" href="javascript:;" data-dismiss="modal">Activate</a>
    </div>
</div>
<div class="modal fade modal-creator inassigned" id="inassigned">
    <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">×</button>-->
        <h3 id="heading_modal_inassing" style="text-align: center;"></h3>
    </div>
    <div class="modal-body">

        <div class="row" id="firstscreen">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <label class="bigstatus baystatus">Status: Assigned</label>

                </div>
                <!-- /control-group -->
            </div>
            <!--/span5-->
        </div>
        <!--/row-->

    </div>
    <!-- /modal-body -->

    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" id="closeBtnStatusasing" data-dismiss="modal">Close</a>
        <a class="btn btn-default nextbtn" id="asignBtn" href="javascript:;" data-dismiss="modal">Release</a>
        <a class="btn btn-default nextbtn existingparty" id="adextingpartyellow">Add to Party</a>
    </div>
</div>
<script>
    $("#releasememberBtn").click(function(){
        $(".inusePanel").addClass("hide");
        $(".memberTransPanel").removeClass("hide");


        var chkinusesize = $("#SLsInUse option").size();
        if(chkinusesize < 3) {
            $("#transferMemBtn").addClass("hide");
            $("#inuseSLlistParentDiv").addClass("hide");
        } else {
            $("#transferMemBtn").removeClass("hide");
            $("#inuseSLlistParentDiv").removeClass("hide");
            $("#inuseSLlist").html($(".SLsInUseDiv").html());
        }

    });

    $("#removeMemBtn").click(function(){
        var arrChecked = [];
        var arrCheckedMemType = [];
        var arrUnCheckedMemType = [];
        var isPrimaryChecked = 0;   var isAdultExist = 0;

        var bayID = $("#boxIDforColorChange").val();

        var c = $('div.dynamicMemList span.jnuiorschkbox ul [name="memberchkbox'+bayID+'[]"]');

        for(var i=0; i< c.length; i++) {
            //alert($(c[i]).attr('membertype'));
            if (c[i].checked) {
                arrCheckedMemType.push($(c[i]).attr('membertype'));
                arrChecked.push(c[i].value);
            } else {
                arrUnCheckedMemType.push($(c[i]).attr('membertype'));
            }
        }

        var bayid = $(c).attr('bayid');

        // Check if Primary Member is Selected
        for(var u=0; u<arrCheckedMemType.length;++u){
            //alert(arrCheckedMemType[u]);
            if(arrCheckedMemType[u] == "primary") {
                isPrimaryChecked = 1;
                break;
            }
        }

        // Check if Adult Member is UnSelected
        for(var u=0; u<arrUnCheckedMemType.length;++u){
            //alert(arrUnCheckedMemType[u]);
            if(arrUnCheckedMemType[u] == "adult") {
                isAdultExist = 1;
                break;
            }
        }

        if(arrChecked.length < 1) {
            $("#memberTransferError").html("Select Member");
            $("#memberTransferError").show().delay(2000).fadeOut();
        } else if(arrChecked.length == c.length) {
            $("#memberTransferError").html("One member needs to be a Primary Member");
            $("#memberTransferError").show().delay(2000).fadeOut();
        } else if(isPrimaryChecked == 1) {
            if(isAdultExist == 0) {
                $("#memberTransferError").html("Junior member can not be a Primary Member");
                $("#memberTransferError").show().delay(2000).fadeOut();
            } else {
                //alert("chkboxbay: "+bayid+ "BayId: "+bayID+" array length: "+c.length+" checked: "+arrChecked.length );
                //alert(arr+"---"+bayid);
                removeMember(arrChecked,bayID);
            }
        } else {
            //alert("chkboxbay: "+bayid+ "BayId: "+bayID+" array length: "+c.length+" checked: "+arrChecked.length );
            //alert(arr+"---"+bayid);
            removeMember(arrChecked,bayID);
        }

    });

    $("#transferMemBtn").click(function(){
        var arrChecked = [];
        var arrCheckedMemType = [];
        var arrUnCheckedMemType = [];
        var arrIsAuth = [];
        var primaryGamerTag = [];
        var uncheckJuniorUnAuthArray = [];
        var isPrimaryChecked = 0;   var isAdultExist = 0;
        var juniorAuthFlag = 0;

        var bayID = $("#boxIDforColorChange").val();
        var slSelect = $("#SLsInUse");
        var toSLval = slSelect.val();

        var gamerTagsString = $("#gamerTags"+bayID).val();
        var gamerTagsArray = gamerTagsString.split(',');
        var countAdultGamerTagInCurrentBay = gamerTagsArray.length;


        var toSLgamerTagsArray; var toSLgamerTagsString;
        if(toSLval != "") {
            toSLgamerTagsString = $("#gamerTags" + toSLval).val();
            toSLgamerTagsArray = toSLgamerTagsString.split(',');
        }

        var c = $('div.dynamicMemList span.jnuiorschkbox ul [name="memberchkbox'+bayID+'[]"]');
        var bayid = $(c).attr('bayid');
        for(var i=0; i< c.length; i++) {
            if (c[i].checked) {
                arrCheckedMemType.push($(c[i]).attr('membertype'));
                arrIsAuth.push($(c[i]).attr('junior_isauthorize'));
                primaryGamerTag.push($(c[i]).attr('primary_gamertag'));
                arrChecked.push(c[i].value);
            } else {
                arrUnCheckedMemType.push($(c[i]).attr('membertype'));
                if($(c[i]).attr('membertype') == "junior" && $(c[i]).attr('junior_isauthorize') == "false") {
                    uncheckJuniorUnAuthArray.push($(c[i]).attr('primary_gamertag'));
                }
            }
        }

        if(uncheckJuniorUnAuthArray.length > 0 && arrChecked.length > 0) {
            // Check if checked gamer-tags are parent-gamer-tag of junior unauthorized member.
            // If true then don't allow transfer for that adult member.
            for(var u=0; u < arrChecked.length; ++u){
                var chkExist = $.inArray(arrChecked[u], uncheckJuniorUnAuthArray);
                if(chkExist >= 0) {
                    juniorAuthFlag = 1;
                    break;
                }
            }
        }

        // Check if Primary Member is Selected
        for(var u = 0; u < arrCheckedMemType.length; ++u){
            if(arrCheckedMemType[u] == "primary") {
                isPrimaryChecked = 1;
                break;
            }
        }

        // Check if Adult Member is UnSelected
        for(var u = 0; u < arrUnCheckedMemType.length; ++u){
            if(arrUnCheckedMemType[u] == "adult") {
                isAdultExist = 1;
                break;
            }
        }

        if(juniorAuthFlag != 1) {
            // Check if Junior Member is Authorized
            for (var u = 0; u < arrIsAuth.length; ++u) {
                //alert(arrCheckedMemType[u]);
                if (arrIsAuth[u] == "false") {
                    var chkExist = $.inArray(primaryGamerTag[u], toSLgamerTagsArray);
                    if (chkExist < 0) {
                        var chkParentSelected = $.inArray(primaryGamerTag[u], arrChecked);
                        if (chkParentSelected < 0) {
                            juniorAuthFlag = 1;
                            break;
                        }

                    }

                }
            }
        }

        if(arrChecked.length < 1) {
            $("#memberTransferError").html("Select Member");
            $("#memberTransferError").show().delay(3000).fadeOut();
        } else if(arrChecked.length == c.length) {
            $("#memberTransferError").html("One member needs to be a Primary Member");
            $("#memberTransferError").show().delay(3000).fadeOut();
        } else if(toSLval == "") {
            $("#memberTransferError").html("Select SL");
            $("#memberTransferError").show().delay(3000).fadeOut();
        }  else if(toSLval == bayid) {
            $("#memberTransferError").html("Already Assigned");
            $("#memberTransferError").show().delay(3000).fadeOut();
        } else if(juniorAuthFlag == 1) {
            $("#memberTransferError").html("Junior member is not authorized to play with another adult member.");
            $("#memberTransferError").show().delay(3000).fadeOut();
        } else if(isPrimaryChecked == 1) {
            if(isAdultExist == 0) {
                $("#memberTransferError").html("Junior member can not be a Primary Member");
                $("#memberTransferError").show().delay(3000).fadeOut();
            } else {
                //alert("chkboxbay: "+bayid+ "BayId: "+bayID+" array length: "+c.length+" checked: "+arrChecked.length );
                //alert(arr+"---"+bayid);
                assignMembertoBay(arrChecked, toSLval, bayid);
            }
        } else {
            //alert(arr+"---"+bayid);
            assignMembertoBay(arrChecked, toSLval, bayid);

        }

    });

    $("#backMemBtn").click(function(){
        $(".memberTransPanel").addClass("hide");
        $(".inusePanel").removeClass("hide");
    });
	$("#asignBtn").click(function(){
        bayRelease();
    });
	$("#activeBtn").click(function(){
        bayRelease();
    });
    $("#releaseBtn").click(function(){
        bayRelease();
    });
	$("#deactivatBtn").click(function(){
        var bayID = $("#boxIDforColorChange").val();
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
	$(".bsy2").click(function(){
        var bayID = $("#boxIDforColorChange").val();
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
    $("#assignBtn").click(function(){
        $("#firstscreen").css("display","none");
        $("#heading_modal_open").css("display","none");
        $("#heading_member_line").css("display","block");
        $("#secondscreen").css("display","block"); //openStatusModal
        $("#openStatusModal").css("height","auto");
        $("#assignBtn").css("display","none"); 
		$("#deactivatBtn").css("display","none");
        $("#continueBtn").css("display","inline-block");
        $("#closeBtnStatusopen").html("Cancel");

        var boxID = $("#boxIDforColorChange").val();
        var nameofmem = $("#memberNameOnModal").val();
        $("#box"+boxID).removeClass("open");
        $("#box"+boxID).addClass("assigned");
        $("#baystatus"+boxID).html("Assigned <br/>Member: "+nameofmem);
    });
    $("#continueBtn").click(function(){
// baySelection();           // API call for bay selection
        $(".modal-header").css("display","none");
        $("#secondscreen").css("display","none");
        $("#thirdscreen").css("display","block");
        $("#backBtn").css("display","inline-block");
        $("#closeBtnStatusopen").css("display","none");
        $("#continueBtn").css("display","none");
        $("#lastContinueBtn").css("display","inline-block");
        $("#fifthstep").removeClass("hide");
        $("#fifthstep").addClass("show");
        $("#forthstep").removeClass("show");
        $("#forthstep").addClass("hide");

        $( "ul.resp-tabs-list li:nth-child(3)" ).removeClass("resp-tab-active");
        $( "ul.resp-tabs-list li:nth-child(3)" ).addClass("gobackstep3");
        $( "ul.resp-tabs-list li:nth-child(4)" ).addClass("resp-tab-active");
        $( "ul.resp-tabs-list li:nth-child(4)" ).addClass("gobackstep4");

    });
	//$('#mobNumber').val("xxx-xxxx-xxxxx").css("text-align","center");

$('#text1').focus(function() {
    if($('#mobNumber').val() == "xxx-xxxx-xxxxx")
    $('#mobNumber').val("");
});

$('#mobNumber').focusout(function() {
    if($('#mobNumber').val() == "")
    $('#mobNumber').val("xxx-xxxx-xxxxx").css("text-align","center");
});
</script>