<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Match';
//$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
$( document ).ready(function() {
$.ajax({
url: '<?php echo Yii::$app->MyComponent->show_boxer(); ?>',
data: {},
type: 'POST',
beforeSend: function(){
},
success: function (result) {
 var options = "<option value=''>Select Boxer</option>";
len = result.data.length; 
for(var i = 0; i < len; i++) {
 options = options + "<option value='"+result.data[i].id+"'>"+result.data[i].name+"</option>";	
}	
$("#matchform-boxernameone").html(options);
$("#matchform-boxernametwo").html(options);
//$("#matchform-winner").html(options);
},
error: function(){
}
});

$.ajax({
url: "<?php echo Yii::$app->MyComponent->show_tournament(); ?>",
data: {},
type: 'POST',
beforeSend: function(){
},
success: function (result) {
 var options = "<option value=''>Select Tournament</option>";
len = result.data.length; 
for(var i = 0; i < len; i++) {
 options = options + "<option value='"+result.data[i].id+"'>"+result.data[i].name+"</option>";	
}	
$("#matchform-tournament").html("<select id='tournament' name='tournament'>"+options+"</select>");
},
error: function(){
}
});

var today = new Date();
var tomorrow = new Date(today.getTime() + 24 * 60 * 60 * 1000);
$('#matchform-startdate').datetimepicker({timeFormat: 'HH:mm:ss',stepHour: 2,stepMinute: 10,stepSecond: 10,minDate:0,dateFormat: 'yy-mm-dd',onSelect: function (date) {
                var dt2 = $('#matchform-enddate');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                dt2.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 30);
                dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }});
$('#matchform-enddate').datetimepicker({timeFormat: 'HH:mm:ss',stepHour: 2,stepMinute: 10,stepSecond: 10,minDate:0,dateFormat: 'yy-mm-dd'});
//$( "#matchform-startdate" ).datetimepicker({dateFormat: 'yy-mm-dd',minDate: tomorrow,timeFormat:  "hh:mm:ss"});
//$( "#matchform-enddate" ).datepicker({dateFormat: 'yy-mm-dd',minDate: tomorrow});
});	
</script>
<div class="page-container">
<div class="page-content">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Ring Reminders <small>Match Page</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Match Page</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Add New Match</div>
</div>
<div class="portlet-body form">
<div id="showsucess"></div>
<div id="showerror"></div>
<?php $form = ActiveForm::begin(['id' => 'matchform']); ?>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Boxer Name</label>
<div class="controls">
<?= $form->field($model, 'boxernameone')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Boxer Name</label>
<div class="controls">
<?= $form->field($model, 'boxernametwo')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Tournament</label>
<div class="controls">
<?= $form->field($model, 'tournament')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Featured</label>
<div class="controls">
<?= $form->field($model, 'featured')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option','class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid" style="display: none;">
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
<div class="row-fluid" style="display: none;">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Venu</label>
<div class="controls">
<?= $form->field($model, 'venu')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Venu'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Reminder Note</label>
<div class="controls">
<?= $form->field($model, 'remindernote')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Reminder Note'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid" style="display: none;">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Pre Match Summary</label>
<div class="controls">
<?= $form->field($model, 'prematchsummary')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Pre Match Summary'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Post Match Summary</label>
<div class="controls">
<?= $form->field($model, 'postsummary')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Post Match Summary'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Sort Number</label>
<div class="controls">
<?= $form->field($model, 'sortnumber')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Sort Number'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 " style="display: none;">
<div class="control-group">
<label for="firstName" class="control-label">Winner</label>
<div class="controls">
<?= $form->field($model, 'winner')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="form-actions" style="padding: 13px;">
<?= Html::submitButton('Add Match', ['class' => 'btn yellow', 'name' => 'addboxer-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
$('body').on('beforeSubmit', 'form#matchform', function () {
var form = $(this);
if (form.find('.has-error').length) {
    return false;
}
var boxer_first = $("#matchform-boxernameone").attr('value');
var boxer_second = $("#matchform-boxernametwo").attr('value');
var tournament = $("#matchform-tournament").attr('value');
var featured_match = $("#matchform-featured").attr('value');
var start_date = $("#matchform-startdate").attr('value');
var end_date = $("#matchform-enddate").attr('value');
var venu = $("#matchform-venu").attr('value');
var reminder_note = $("#matchform-remindernote").attr('value');
var pre_match_summary = $("#matchform-prematchsummary").attr('value');
var post_match_summary = $("#matchform-postsummary").attr('value');
var winner = $("#matchform-winner").attr('value');
var sortnumber = $("#matchform-sortnumber").attr('value');
$.ajax({
url: '<?php echo Yii::$app->MyComponent->add_match(); ?>',
type: 'post',
data: {boxer_first:boxer_first,boxer_second:boxer_second,tournament:tournament,featured_match:featured_match,start_date:start_date,end_date:end_date,venu:venu,reminder_note:reminder_note,pre_match_summary:pre_match_summary,post_match_summary:post_match_summary,winner:winner,sortnumber:sortnumber},
success: function (response) {
	if(response.data == 'Select diffrenet boxers name'){
		$("#showsucess").html('');
		$("#showerror").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong>Error!</strong> Please Choose diffrenet boxer name !!!.</div>');
	}else{
		$("#showerror").html('');
		$("#showsucess").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>Success!</strong> Match added successfully !!!.</div>');
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