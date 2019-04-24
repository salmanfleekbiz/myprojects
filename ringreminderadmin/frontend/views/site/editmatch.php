<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit Match';
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
showdata();
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
//$( "#matchform-startdate" ).datepicker({dateFormat: 'yy-mm-dd',minDate: tomorrow});
//$( "#matchform-enddate" ).datepicker({dateFormat: 'yy-mm-dd',minDate: tomorrow});
});	


function showdata(){	
$.ajax({
url: '<?php echo Yii::$app->MyComponent->get_match($_GET['id']); ?>',
data: {},
type: 'GET',
beforeSend: function(){
},
success: function (result) {
var active = '';
if(result.data.is_featured == true){
	active = 1;
}else if(result.data.is_featured == false){
	active = 0;
}
winnerdata(result.data.first_boxer_id,result.data.second_boxer_id,result.data.match_winner);	
$("#matchform-boxernameone").val(result.data.first_boxer_id).find("option[value=" + result.data.first_boxer_id +"]").attr('selected', true);
//$('.first option:eq('+result.data.first_boxer_id+')').attr('selected', 'selected');
$("#matchform-boxernametwo").val(result.data.second_boxer_id).find("option[value=" + result.data.second_boxer_id +"]").attr('selected', true);
//$('.two option:eq('+result.data.second_boxer_id+')').attr('selected', 'selected');
$("#matchform-tournament").val(result.data.tournament_id).find("option[value=" + result.data.tournament_id +"]").attr('selected', true);
//$('.three option:eq('+result.data.tournament_id+')').attr('selected', 'selected');
$('.four option:eq('+active+')').attr('selected', 'selected');
document.getElementById('matchform-startdate').value = result.data.start_date;
document.getElementById('matchform-enddate').value = result.data.finish_date;
document.getElementById('matchform-venu').value = result.data.venue;
document.getElementById('matchform-remindernote').value = result.data.reminder_note;
document.getElementById('matchform-prematchsummary').value = result.data.pre_match_summary;
document.getElementById('matchform-postsummary').value = result.data.post_match_summary;
document.getElementById('matchform-sortnumber').value = result.data.sort_number;
//$("#matchform-winner").val(result.data.match_winner).find("option[value=" + result.data.match_winner +"]").attr('selected', true);
//$('.five option:eq('+result.data.match_winner+')').attr('selected', 'selected');
},
error: function(){
}
});
}

function winnerdata(idone,idtwo,winid){  
var boxerone = idone;
var boxertwo = idtwo;
var winnerid = winid;
$.ajax({
url: "<?php echo Yii::$app->MyComponent->get_matchwinner(); ?>",
data: {boxerone:boxerone,boxertwo:boxertwo},
type: 'POST',
beforeSend: function(){
},
success: function (result) {
var options = "<option value=''>Select Winner</option>";
len = result.data.length; 
for(var i = 0; i < len; i++) {
 options = options + "<option value='"+result.data[i].id+"'>"+result.data[i].name+"</option>";  
}   
$("#matchform-winner").html(options);
for(var j = 0; j < len; j++) {
if(winnerid == result.data[j].id){
$("#matchform-winner").val(winnerid).find("option[value=" + winnerid +"]").attr('selected', true);
}else{}
}
//$('.five option:eq('+winnerid+')').attr('selected', 'selected');
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
Ring Reminders <small>Edit Match</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Edit Match</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Edit Match</div>
</div>
<div class="portlet-body form">
 <?php if(isset($_GET['update']) == 'ok'){ ?>
<div id="showsucess"><div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>Success!</strong> Match update successfully</div></div>
<?php }else{ ?> 
<div id="showsucess"></div>
<?php } ?>
<?php $form = ActiveForm::begin(['id' => 'matchform']); ?>
<?= $form->field($model, 'id')->hiddenInput(['value'=> $_GET['id']])->label(false); ?>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Boxer Name One</label>
<div class="controls">
<?= $form->field($model, 'boxernameone')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12 first'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Boxer Name Two</label>
<div class="controls">
<?= $form->field($model, 'boxernametwo')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12 two'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Tournament</label>
<div class="controls">
<?= $form->field($model, 'tournament')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12 three'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Featured</label>
<div class="controls">
<?= $form->field($model, 'featured')->dropDownList(['0' => 'No','1' => 'Yes'],['class'=>'m-wrap span12 four'])->label(false); ?>
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
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Winner</label>
<div class="controls">
<?= $form->field($model, 'winner')->dropDownList(['championship' => 'Champion Ship', 'nation' => 'Nation', 'individual' => 'Individual'],['prompt'=>'Select Option','class'=>'m-wrap span12 five'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="form-actions" style="padding: 13px;">
<?= Html::submitButton('Update Match', ['class' => 'btn yellow', 'name' => 'addboxer-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
$('body').on('beforeSubmit', 'form#matchform', function () {
var r = confirm("Do you want to update this match ?");
    if (r == true) {    
var form = $(this);
if (form.find('.has-error').length) {
    return false;
}
var id = $("#matchform-id").attr('value');
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
url: '<?php echo Yii::$app->MyComponent->update_match(); ?>',
type: 'post',
data: {id:id,boxer_first:boxer_first,boxer_second:boxer_second,tournament:tournament,featured_match:featured_match,start_date:start_date,end_date:end_date,venu:venu,reminder_note:reminder_note,pre_match_summary:pre_match_summary,post_match_summary:post_match_summary,winner:winner,sortnumber:sortnumber},
success: function (response) {
    if(response.data.message == 'name match'){
    $("#showsucess").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong>Error!</strong> Please Choose diffrenet boxer name !!!.</div>');    
    }else{
        window.location.href = 'http://clients2.5stardesigners.net/ringreminderadmin/index.php?r=site/editmatch&id=<?php echo $_GET['id']; ?>&update=ok';
	//$("#showsucess").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>Success!</strong> '+response.data.message+'</div>');
    }
}
});
return false;
}else{
    event.preventDefault();
}
});
</script>
</div>
</div>
</div>
</div>
</div>