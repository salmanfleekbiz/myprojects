<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Events';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-container">
<div class="page-content">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Ring Reminders <small>Events Page</small>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="index">Home</a> 
<i class="icon-angle-right"></i>
</li>
<li><a href="#">Events Page</a></li>
</ul>
</div>
</div>
<div class="portlet box yellow">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Add New Events</div>
</div>
<div class="portlet-body form">
<div id="emailerror"></div>
<div id="packagesucess"></div>
<form class="horizontal-form" action="" name="eventForm" id="eventForm" method="post">
<input type="hidden" name="action" id="action"/>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label for="firstName" class="control-label">Event Name</label>
<div class="controls">
<input type="text" placeholder="Event Name" class="m-wrap span12" id="eventname" name="eventname" value="">
</div>
</div>
</div>
<div class="span6 ">
<div class="control-group">
<label class="control-label">Event Date</label>
<div class="controls">
<input type="text" placeholder="Event Date" class="m-wrap span12" id="eventdate" name="eventdate" value="">
</div>
</div>
</div>
</div>
<div class="form-actions">
<button class="btn yellow" type="submit"><i class="icon-ok"></i> Add Event</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>