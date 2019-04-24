<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Notification';
//$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
$( document ).ready(function() {	
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
$("#notificationform-tournament").html("<select id='tournament' name='tournament'>"+options+"</select>");
},
error: function(){
}
});
});

function showmatches(id){
var tid = id;	
$.ajax({
url: "<?php echo Yii::$app->MyComponent->get_matchesbytournamentid(); ?>",
data: {tid:tid},
type: 'POST',
beforeSend: function(){
},
success: function (result) {
var options = "<option value=''>Select Match</option>";
len = result.data.length; 
for(var i = 0; i < len; i++) {
 options = options + "<option value='"+result.data[i].id+"'>"+result.data[i].FistBoxerName+" VS "+result.data[i].SecondBoxerName+"</option>";	
}	
$("#notificationform-match").html("<select id='tournament' name='tournament'>"+options+"</select>");	
},
error: function(){
}
});	
}
</script>
<div class="page-container">
<div class="page-content">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Ring Reminders <small>Notification Page</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Notification Page</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Add New Notification</div>
</div>
<div class="portlet-body form">
<div id="showsucess"></div>
<div id="showerror"></div>
<?php $form = ActiveForm::begin(['id' => 'notificationform']); ?>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Tournament</label>
<div class="controls">
<?= $form->field($model, 'tournament')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option','class'=>'m-wrap span12','onchange'=>'showmatches(this.value)'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Match</label>
<div class="controls">
<?= $form->field($model, 'match')->dropDownList([],['prompt'=>'Select Match','class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid">
<div class="control-group">
<label class="control-label">Message</label>
<div class="controls">
<textarea class="span12 m-wrap" name="message" id="message" rows="6"></textarea>
</div>
</div>
</div>
<div class="form-actions" style="padding: 13px;">
<?= Html::submitButton('Send Notification', ['class' => 'btn yellow', 'name' => 'addboxer-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
$('body').on('beforeSubmit', 'form#notificationform', function () {
var form = $(this);
if (form.find('.has-error').length) {
    return false;
}
var tournamentId = $("#notificationform-tournament").attr('value');
var matchId = $("#notificationform-match").attr('value');
var message = $('#message').val();
$.ajax({
url: '<?php echo Yii::$app->MyComponent->get_userdeviceIds(); ?>',
type: 'post',
data: {tournamentid:tournamentId,matchid:matchId},
success: function (result) {
len = result.data.length; 
var deivs = new Array();
for(var i = 0; i < len; i++) {
	deivs[i] = result.data[i].device;
}
sendnotification(deivs,message);
}
});
return false;
});

function sendnotification(arr,message){

console.log(arr);
console.log(message);

var arry = arr;	
var messages = message;
$.ajax({
url: '<?php echo Yii::$app->MyComponent->notificationurl(); ?>',
type: 'post',
data: {arry:arry,messages:messages},
success: function (response) {
	$("#showsucess").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>Success!</strong> Notification Send</div>');
}
});
}
</script>
</div>
</div>
</div>
</div>
</div>