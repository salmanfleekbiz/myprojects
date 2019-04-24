<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Tournament';
//$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
$( document ).ready(function() {
$.ajax({
url: '<?php echo Yii::$app->MyComponent->show_tournament_channel(); ?>',
data: {},
type: 'POST',
beforeSend: function(){
},
success: function (result) {
 var options = "<option value=''>Select Channel</option>";
len = result.data.length; 
for(var i = 0; i < len; i++) {
 options = options + "<option value='"+result.data[i].id+"'>"+result.data[i].name+"</option>";	
}	
$("#tournamentform-channel").html(options);
},
error: function(){
}
});
var today = new Date();
var tomorrow = new Date(today.getTime() + 24 * 60 * 60 * 1000);
$( "#tournamentform-startdate" ).datepicker({dateFormat: 'yy-mm-dd',minDate: tomorrow,onSelect: function (date) {
                var dt2 = $('#tournamentform-enddate');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                dt2.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 30);
                //sets dt2 maxDate to the last day of 30 days window
                dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }});
$( "#tournamentform-enddate" ).datepicker({dateFormat: 'yy-mm-dd',minDate: tomorrow});
});	
</script>
<div class="page-container">
<div class="page-content">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Ring Reminders <small>Tournament Page</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Tournament Page</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Add New Tournament</div>
</div>
<div class="portlet-body form">
<div id="showsucess"></div>
<div id="showerror"></div>
<?php $form = ActiveForm::begin(['id' => 'tournamenform']); ?>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Tournament Name</label>
<div class="controls">
<?= $form->field($model, 'name')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Tournament Name'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Channel</label>
<div class="controls">
<?= $form->field($model, 'channel')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Start Date</label>
<div class="controls">
<?= $form->field($model, 'startdate')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Start Date'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">End Date</label>
<div class="controls">
<?= $form->field($model, 'enddate')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'End Date'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label class="control-label">&nbsp;</label>
<div class="controls" style="display: none;">
<?= $form->field($model, 'tournamenttype')->dropDownList(['individual' => 'Individual'],['class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="form-actions" style="padding: 13px;">
<?= Html::submitButton('Add Tournament', ['class' => 'btn yellow', 'name' => 'addboxer-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
$('body').on('beforeSubmit', 'form#tournamenform', function () {
var form = $(this);
if (form.find('.has-error').length) {
    return false;
}
var tournament_name = $("#tournamentform-name").attr('value');
var tournament_type = $("#tournamentform-tournamenttype").attr('value');
var start_date = $("#tournamentform-startdate").attr('value');
var end_date = $("#tournamentform-enddate").attr('value');
var channel = $("#tournamentform-channel").attr('value');
var status = 1;
$.ajax({
url: '<?php echo Yii::$app->MyComponent->add_tournament(); ?>',
type: 'post',
data: {tournament_name:tournament_name,tournament_type:tournament_type,start_date:start_date,end_date:end_date,channel:channel,status:status},
success: function (response) {
if(response.data == 'Tournament Already exist.'){
		$("#showsucess").html('');
		$("#showerror").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong>Error! </strong>This Tournament already exist !!!.</div>');
	}else{
		$("#showerror").html('');
		$("#showsucess").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>Success!</strong> Tournament added successfully !!!.</div>');
	}
}
});
return false;
});
</script>
</div>
</div>
</div>
</div>
</div>