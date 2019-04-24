
<!--Remove Reservation Popup-->

<style>

    .reservationpop {
        text-align: center;
    }
    .reservationpop p#modal_ResName {
        font-size: 18px;
    }

</style>

<div class="modal fade modal-creator addtext" id="removeReservation" aria-hidden="true">
    <div class="modal-header">
        <h3>Remove Reservation</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5 reservationpop">
                <div class="control-group">
                    <br/>

                    <p id="modal_ResName"></p>
                    <p id="modal_pSize"></p>
                    <p id="modal_ResTime"></p>
                    <p id="modal_ResPhone"></p>
                    <p id="modal_ResOccasion"></p>

                    <p id="modal_ResError" style="color: red;"></p>

                    <input type="hidden" name="restId" id="restId" />
                    <input type="hidden" name="resCode" id="resCode" />
                    <input type="hidden" name="fName" id="fName" />
                    <input type="hidden" name="lName" id="lName" />
                    <input type="hidden" name="ReserEmail" id="ReserEmail" />
                    <input type="hidden" name="ReserPhone" id="ReserPhone" />

                    <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">

        <a href="javascript:;" class="btn btn-default bckfst" id="resIsNoShowBtn">No Show</a>
        <a href="javascript:;" class="btn btn-default bckfst" id="resIsCancelledBtn">Cancelled</a>
        <a href="javascript:;" class="btn btn-default bckfst" data-dismiss="modal">Go Back</a>
    </div>
</div>



<!-- Clear Reservation List Popup -->

<div class="modal fade modal-creator addtext" id="clearReservationModal" aria-hidden="true">
    <div class="modal-header">
        <h3>Clear Reservation List</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5 reservationpop">
                <div class="control-group">
                    <br/>

                    <p>Are you sure you want to clear the Reservations list?</p>

                    <p id="modal_ResListError" style="color: red;"></p>

                    <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">

        <a href="javascript:;" class="btn btn-default bckfst" id="clearReservationListYesBtn">Yes</a>
        <a href="javascript:;" class="btn btn-default bckfst" data-dismiss="modal">No</a>
    </div>
</div>


<!-- Clear Wait List Popup -->

<div class="modal fade modal-creator addtext" id="clearWaitlistModal" aria-hidden="true">
    <div class="modal-header">
        <h3>Clear Wait List</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="span5 reservationpop">
                <div class="control-group">
                    <br/>

                    <p>Are you sure you want to clear the Wait list?</p>

                    <p id="modal_WaitListError" style="color: red;"></p>

                    <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">

        <a href="javascript:;" class="btn btn-default bckfst" id="clearWaitlLstYesBtn">Yes</a>
        <a href="javascript:;" class="btn btn-default bckfst" data-dismiss="modal">No</a>
    </div>
</div>