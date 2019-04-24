<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Boxers';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-container">
<div class="page-content">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Ring Reminders <small>Boxers Page</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Boxers Page</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Add New Boxers</div>
</div>
<div class="portlet-body form">
<div id="showsucess"></div>
<div id="showerror"></div>
<?php $form = ActiveForm::begin(['id' => 'eventform']); ?>
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
<?= $form->field($model, 'total_no_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of Match','value' => '0'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid" style="display: none;">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Total No of Win Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_win_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of Win Match','value' => '0'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Total No of Loss Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_loss_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of Loss Match','value' => '0'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="row-fluid" style="display: none;">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Total No of NR Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_nr_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of NR Match','value' => '0'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Total No of Knockout Match</label>
<div class="controls">
<?= $form->field($model, 'total_no_konckout_match')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Total No of Knockout Match','value' => '0'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="form-actions" style="padding: 13px;">
<?= Html::submitButton('Add Boxer', ['class' => 'btn yellow', 'name' => 'addboxer-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
$('body').on('beforeSubmit', 'form#eventform', function () {
var form = $(this);
if (form.find('.has-error').length) {
    return false;
}
var boxersName = $("#boxerform-name").attr('value');
var knockoutmatch = $("#boxerform-total_no_match").attr('value');
var lossmatch = $("#boxerform-total_no_win_match").attr('value');
var nrmatch = $("#boxerform-total_no_loss_match").attr('value');
var totalmatch = $("#boxerform-total_no_nr_match").attr('value');
var winmatch = $("#boxerform-total_no_konckout_match").attr('value');
var status = '1';
$.ajax({
//url:form.attr('action'),	
url: '<?php echo Yii::$app->MyComponent->add_boxers(); ?>',
type: 'post',
data: {boxersName:boxersName,knockoutmatch:knockoutmatch,lossmatch:lossmatch,nrmatch:nrmatch,totalmatch:totalmatch,winmatch:winmatch,status:status},
//data: form.serialize(),
success: function (response) {
	if(response.data == 'Boxer Name Already exist.'){
		$("#showsucess").html('');
		$("#showerror").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong>Error!</strong> Boxer name already exist !!!.</div>');
	}else{
		$("#showerror").html('');
		$("#showsucess").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>Success!</strong> Boxer added successfully !!!.</div>');
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