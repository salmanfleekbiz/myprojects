<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'All Matches';
//$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
$( document ).ready(function() {	
$.ajax({
url: '<?php echo Yii::$app->MyComponent->viewall_matches(); ?>',
data: {tid:'<?php echo $_GET['id']; ?>'},
type: 'POST',
beforeSend: function(){
},
success: function (result) {
len = result.data.length; 
var options = '';
var match_html = '';
match_html += '<table class="table table-striped table-bordered table-hover" id="sample_1">';
match_html += '<thead>';
match_html += '<tr>';
match_html += '<th class="hidden-480">Order</th>';
match_html += '<th class="hidden-480">Matches</th>';
match_html += '<th class="hidden-480">Action</th>';
match_html += '</tr>';
match_html += '</thead>';
match_html += '<tbody>';
for(var i = 0; i < len; i++) {
match_html += '<tr class="odd gradeX">';
match_html += '<td class="hidden-480">'+result.data[i].sort_number+'</td>';
match_html += '<td class="hidden-480">'+result.data[i].FistBoxerName+' <strong>VS</strong> '+result.data[i].SecondBoxerName+'</td>';
match_html += '<td class="hidden-480"><a href="?r=site/editmatch&id='+result.data[i].id+'" class="btn yellow"><i class="icon-pencil"></i> Edit</a>&nbsp;<a id="'+result.data[i].id+'" href="javascript:void(0);"" class="btn red deletecls">Delete</a></td>';
match_html += '</tr>';	
 //options = options + "<tr class='odd gradeX'><td class='hidden-480'>"+result.data[i].first_boxer+" <strong>VS</strong> "+result.data[i].second_boxer+"</td><td class='hidden-480'>"+result.data[i].start_date+"</td><td class='hidden-480'>"+result.data[i].finish_date+"</td><td class='hidden-480'><a href='?r=site/editmatch&id="+result.data[i].matchId+"' class='btn yellow'><i class='icon-pencil'></i> Edit</a>&nbsp;<a id="+result.data[i].matchId+" href='javascript:void(0);' class='btn red deletecls'>Delete</a></td></tr>";
}
match_html += '</tbody>';
match_html += '</table>';
$("#matchdata").html(match_html);
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
Ring Reminders <small>All Matches</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">All Matches</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>All Matches</div>
</div>
<div id="matchdata" class="portlet-body form">
</div>
<script type="text/javascript">
$(document).on("click", ".deletecls", function () {
var r = confirm("Do you want to delete this match ?");
if (r == true) { 	
var matchid = $(this).attr("id");	
$.ajax({
url: "<?php echo Yii::$app->MyComponent->deletematch(); ?>",
data: {matchid: matchid},
type: 'POST',
beforeSend: function () {
},
success: function (result) {
window.location.href = '<?php echo Yii::$app->MyComponent->get_redirecturlmatchdelete($_GET['id']); ?>';
},
error: function () {
}
});
}else{
    event.preventDefault();
}
});	

</script>
</div>
</div>
</div>
</div>