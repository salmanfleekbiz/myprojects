<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Channel';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-container">
<div class="page-content">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Ring Reminders <small>Channel Page</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Channel Page</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Add New Channel</div>
</div>
<div class="portlet-body form">
<div id="showsucess"></div>
<div id="showerror"></div>
<?php $form = ActiveForm::begin(['id' => 'channelform']); ?>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Channel Name</label>
<div class="controls">
<?= $form->field($model, 'channelname')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap span12', 'placeholder' => 'Channel Name'])->label(false); ?>
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Active</label>
<div class="controls">
<?= $form->field($model, 'actives')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option','class'=>'m-wrap span12'])->label(false); ?>
</div>
</div>
</div>
</div>
<div class="form-actions" style="padding: 13px;">
<?= Html::submitButton('Add Channel', ['class' => 'btn yellow', 'name' => 'addboxer-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
$('body').on('beforeSubmit', 'form#channelform', function () {
var form = $(this);
if (form.find('.has-error').length) {
    return false;
}
var channelname = $("#channelform-channelname").attr('value');
var is_active = $("#channelform-actives").attr('value');
$.ajax({
url: '<?php echo Yii::$app->MyComponent->add_channel(); ?>',
type: 'post',
data: {channelname:channelname,is_active:is_active},
success: function (response) {
	if(response.data == 'Name Already exist.'){
		$("#showsucess").html('');
		$("#showerror").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong>Error!</strong> Channel name already exist !!!.</div>');
	}else{
		$("#showerror").html('');
		$("#showsucess").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>Success!</strong> Channel added successfully !!!.</div>');
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