<div class="modal fade modal-creator" id="qrcodes"
     style="display: none; background-color: white; width: 50%; height:342px; margin: auto auto;text-align:center;"
     aria-hidden="true">
    <div class="modal-header">
        <h3 id="memname"></h3>

    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5">
                <div class="control-group">
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <p id="totalmemberadd"></p>
        <a href="javascript:;" class="btn btn-default" id="nextbtn" data-dismiss="modal">Search More Members</a>
        <a href="#addno" data-toggle="modal" data-dismiss="modal" id="nextbtnad" class="btn btn-default"
           onclick="shownextPop();">Continue</a>
    </div>
</div>
<div class="modal fade modal-creator" id="addmoreplayes"
     style="display: none; background-color: white; width: 50%; height:330px; margin: auto auto;text-align:center;"
     aria-hidden="true">
    <div class="modal-header">
        <h3 id="outofname"></h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5">
                <div class="control-group">
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <p id="outofchecking"></p>
        <a href="javascript:;" class="btn btn-primary addmoreplayes" id="nextbtn2" data-dismiss="modal">Add More
            Members</a>
        <a href="javascript:;" class="btn btn-primary showtime" id="nextbtnad2" data-dismiss="modal">Continue</a>
    </div>
</div>
<div class="modal fade modal-creator" id="addno"
     style="display: none; background-color: white; width: 50%; height:278px; margin: auto auto;text-align:center;"
     aria-hidden="true">

    <div class="modal-body">
        <div class="row">
            <div class="span5">
                <div class="control-group">
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <p>Remaining members must check-in at front desk prior to proceeding to shooting lounge.</p>
        <a href="javascript:;" class="btn btn-default" id="nextbtn" data-dismiss="modal">Check-In Next Member</a>
        <a href="javascript:;" class="btn btn-default timeselect" id="timeseldt" data-dismiss="modal">Continue</a>
    </div>
</div>
<div class="modal fade modal-creator waitlistaddtoparty" id="addtoparty">
<div class="modal-header">
<p><span id="partymembername"></span></p>
</div>
<div class="modal-body">
<div class="row">
<div class="span5">
<div class="control-group">
<img src="<?php echo base_url(); ?>images/modernroundlogo.png">
</div>
</div>
</div>
</div>
<div class="modal-footer">
<a href="<?php echo base_url(); ?>" class="btn btn-default gohome" id="nextbtn">HOME</a>
</div>
</div>
<div class="modal fade modal-creator" id="addtopartyovermember"
     style="display: none; background-color: white; width: 50%; height:316px; margin: auto auto;text-align:center;"
     aria-hidden="true">
    <div class="modal-header">
        <p><span>A maximum of 6 members can be added to a party</span></p>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5">
                <div class="control-group">
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>
</div>
<div class="modal fade modal-creator addtext" id="addtext" aria-hidden="true">
    <div class="modal-header">
        <h3>Wait List Text</h3>

        <p><span id="textname"></span></p>

        <p><span>Mobile Number:</span><span id="mobiletel"></span></p>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5" id="waitlistpop">
                <div class="control-group">
                    <input type="hidden" name="waitID" id="waitID"/>
                    <input type="radio" name="sendtext" id="sendtext" value="PROCEED" checked="checked"/><label
                        class="waitlistpop">Modern Round: Your shooting lounge will be available shortly. Please proceed
                        to Check-In to be assigned your shooting lounge.</label> <br/><br/>
                    <input type="radio" name="sendtext" id="sendtext" value="NEARLY"/><label class="waitlistpop">Modern
                        Round: Welcome! You will receive a text message when your shooting lounge is ready. In the
                        meantime, enjoy the dining and bar area!</label><br/><br/>
                    <input type="radio" name="sendtext" id="sendtext" value="REMOVED"/><label class="waitlistpop">Modern
                        Round: Your party has been removed from the wait list. Please come visit Modern Round again
                        soon.</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default bckfst" data-dismiss="modal">Cancel</a>
        <a href="javascript:;" class="btn btn-default sendtextmsg bckfst">Send</a>
    </div>
</div>
<div class="modal fade modal-creator" id="timingpop"
     style="display: none; background-color: white; width: 56%; height:auto; margin: auto auto;text-align:center;"
     aria-hidden="true">
    <div class="modal-header">
        <h3 id="timingname"></h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5">
                <div class="control-group">
                    <div id="timetoshow2"></div>
                    <h4 class="heading" id="showtimeselect2"></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a id="shotingbckpop" href="javascript:;" class="btn btn-default shootingloungbackpop"
           data-dismiss="modal">Back</a>
        <a id="contpursh" href="javascript:;" class="btn btn-default gopurchs">Continue</a>
    </div>
</div>
<div class="modal fade modal-creator purshspop" id="purshspop" aria-hidden="true">
    <div class="modal-header">
        <h3 id="pushname"></h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5">
                <div class="control-group">
                    <div id="showinfopurshpop"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Back</a>
        <a id="finshpop" href="javascript:;" class="btn btn-default nextbtn fshpops">Continue</a>
    </div>
</div>
<div class="modal fade modal-creator inassigned" id="firstjuniorspop">
    <div class="modal-header">
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <p>Junior Members cannot play without an adult member assigned first</p>
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Close</a>
    </div>
</div>

<div class="modal fade modal-creator inassigned" id="focuspop">
    <div class="modal-header">
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <p id="focusmsg"></p>
                    <input type="text" name="txt_focus" id="txt_focus"/>
                    <input type="hidden" name="txt_focusbayid" id="txt_focusbayid"/>
                    <input type="hidden" name="txt_focusreservation" id="txt_focusreservation"/>

                    <p id="errorfocustxt"></p>
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn focuscontinue">Continue</a>
    </div>
</div>

<div class="modal fade modal-creator inassigned" id="trainingnotcompleted">
    <div class="modal-header">
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <p>This Junior Member has not completed required training.</p>
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Close</a>
    </div>
</div>
<div class="modal fade modal-creator inassigned" id="primarymemberrequire">
    <div class="modal-header">
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <p>This Junior Member is only authorized to play with the parent member</p>
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Close</a>
    </div>
</div>

<div class="modal fade modal-creator inassigned" id="checkinmemberbay">
    <div class="modal-header">
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <p id="baymsgmember"></p>
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Close</a>
    </div>
</div>

<div class="modal fade modal-creator inassigned" id="shotingdirectassign">
    <div class="modal-header">
        <h3 id="bayname_open" style="text-align: center;"></h3>
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <p id="directshotingmesg" class="bigstatus">Status: Open</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Close</a>
        <a class="btn btn-default nextbtn" id="directassignBtn">Assign</a>
        <a class="btn btn-default nextbtn" id="deactivatBtn2" href="javascript:;" data-dismiss="modal">Deactivate</a>
    </div>
</div>

<div class="modal fade modal-creator inassigned" id="partiespop">
<div class="modal-header">
</div>
<div class="modal-body">

<div class="row">
<div class="span5">
<div class="control-group" style="text-align: center;">
<p id="patrismsg"></p>
<img src="<?php echo base_url(); ?>images/modernroundlogo.png">
</div>
</div>
</div>
</div>
<div class="modal-footer">
<a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Close</a>
</div>
</div>

<div class="modal fade modal-creator inassigned" id="partymax">
<div class="modal-header">
</div>
<div class="modal-body">

<div class="row">
<div class="span5">
<div class="control-group" style="text-align: center;">
<p>Maximum Party Size is 6 members</p>
<img src="<?php echo base_url(); ?>images/modernroundlogo.png">
</div>
</div>
</div>
</div>
<div class="modal-footer">
<a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Close</a>
</div>
</div>

<div class="modal fade modal-creator inassigned" id="shootingpop">
    <div class="modal-header">
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <p>Manager Override Required</p>

                    <p><input type="password" name="userpass" id="userpass"/>

                    <div id="passerror"></div>
                    </p>
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Cancel</a>
        <a href="javascript:;" class="btn btn-default nextbtn checkpassword">Continue</a>
    </div>
</div>

<div class="modal fade modal-creator inassigned" id="permisionpop">
    <div class="modal-header">
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="span5">
                <div class="control-group" style="text-align: center;">
                    <p>You do not have permission to access this page. Please contact your Admin.</p>
                    <img src="<?php echo base_url(); ?>images/modernroundlogo.png">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default nextbtn" data-dismiss="modal">Close</a>
    </div>
</div>
