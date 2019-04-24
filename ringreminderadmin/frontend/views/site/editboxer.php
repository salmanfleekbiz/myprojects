<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit Boxers';
//$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
$( document ).ready(function() {
$.ajax({
url: '<?php echo Yii::$app->MyComponent->get_boxer($_GET['id']); ?>',
data: {},
type: 'GET',
beforeSend: function(){
},
success: function (result) {
document.getElementById('boxerform-name').value = result.data.name;
document.getElementById('boxerform-total_no_match').value = result.data.match_count;
document.getElementById('boxerform-total_no_win_match').value = result.data.win_count;
document.getElementById('boxerform-total_no_loss_match').value = result.data.loss_count;
document.getElementById('boxerform-total_no_nr_match').value = result.data.nr_count;
document.getElementById('boxerform-total_no_konckout_match').value = result.data.knockout_count;
},
error: function(){
}
});
});	
</script>
<div class="page-container">
<div class="page-content">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Ring Reminders <small>Edit Boxers</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Edit Boxers</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Edit Boxers</div>
</div>
<div class="portlet-body form">
<div id="showsucess"></div>
<?php $form = ActiveForm::begin(['id' => 'eventform']); ?>
<?= $form->field($model, 'id')->hiddenInput(['value'=> $_GET['id']])->label(false); ?>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Boxers Name</label>
<div class="controls">
<?= $form->field($model, 'name')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Boxers Name'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 " style="display: none;">
<div class="control-group">
<label class="control-label">Total No of Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of Match'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid" style="display: none;">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Total No of Win Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_win_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of Win Match'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Total No of Loss Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_loss_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of Loss Match'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid" style="display: none;">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Total No of NR Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_nr_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of NR Match'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Total No of Knockout Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_konckout_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of Knockout Match'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="form-actions" style="padding: 13px;">
<?= Html::submitButton('Update Boxer', ['class' => 'btn yellow', 'name' => 'addboxer-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
$('body').on('beforeSubmit', 'form#eventform', function () {
var form = $(this);
if (form.find('.has-error').length) {
    return false;
}
var id = $("#boxerform-id").attr('value');
var boxersName = $("#boxerform-name").attr('value');
var knockoutmatch = $("#boxerform-total_no_match").attr('value');
var lossmatch = $("#boxerform-total_no_win_match").attr('value');
var nrmatch = $("#boxerform-total_no_loss_match").attr('value');
var totalmatch = $("#boxerform-total_no_nr_match").attr('value');
var winmatch = $("#boxerform-total_no_konckout_match").attr('value');
$.ajax({
url: '<?php echo Yii::$app->MyComponent->update_boxer(); ?>',
type: 'post',
data: {name:boxersName,matchcount:totalmatch,wincount:winmatch,losscount:lossmatch,nrcount:nrmatch,knockoutcount:knockoutmatch,id:id},
success: function (response) {
$("#showsucess").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>Success!</strong> '+response.data.message+'</div>');
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