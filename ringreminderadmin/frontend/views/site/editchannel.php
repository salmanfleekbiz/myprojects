<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit Channel';
//$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
$( document ).ready(function() {
$.ajax({
url: '<?php echo Yii::$app->MyComponent->get_channel($_GET['id']); ?>',
data: {},
type: 'GET',
beforeSend: function(){
},
success: function (result) {
var active = '';
if(result.data.is_active == true){
	active = 1;
}else{
	active = 0;
}	
document.getElementById('channelform-channelname').value = result.data.name;
$("select option[value='"+active+"']").attr("selected","selected");
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
Ring Reminders <small>Edit Channel</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Edit Channel</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Edit Channel</div>
</div>
<div class="portlet-body form">
<div id="showsucess"></div>
<?php $form = ActiveForm::begin(['id' => 'channelform']); ?>
<?= $form->field($model, 'id')->hiddenInput(['value'=> $_GET['id']])->label(false); ?>
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
<?= Html::submitButton('Update Channel', ['class' => 'btn yellow', 'name' => 'addboxer-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
$('body').on('beforeSubmit', 'form#channelform', function () {
var form = $(this);
if (form.find('.has-error').length) {
    return false;
}
var id = $("#channelform-id").attr('value');
var name = $("#channelform-channelname").attr('value');
var active = $("#channelform-actives").attr('value');
$.ajax({
url: '<?php echo Yii::$app->MyComponent->update_channel(); ?>',
type: 'post',
data: {id:id,name:name,active:active},
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