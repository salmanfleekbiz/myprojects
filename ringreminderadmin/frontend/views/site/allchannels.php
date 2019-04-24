<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'All Channel';
//$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
$( document ).ready(function() {	
$.ajax({
url: '<?php echo Yii::$app->MyComponent->show_channel(); ?>',
data: {},
type: 'POST',
beforeSend: function(){
},
success: function (result) {
len = result.data.length; 
var options = '';
for(var i = 0; i < len; i++) {
 options = options + "<tr class='odd gradeX'><td class='hidden-480'>"+result.data[i].name+"</td><td class='hidden-480'><a href='?r=site/editchannels&id="+result.data[i].id+"' class='btn yellow'><i class='icon-pencil'></i> Edit</a></td></tr>";
}	
$("#channeldata").html(options);
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
Ring Reminders <small>All Channel</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">All Channel</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>All Channel</div>
</div>
<div class="portlet-body form">
<table class="table table-striped table-bordered table-hover" id="sample_1">
<thead>
<tr>
<th class="hidden-480">Channel Name</th>
<th class="hidden-480">Action</th>
</tr>
</thead>
<tbody id="channeldata">
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>