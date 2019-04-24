@extends('admin.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
Sugar Home - Admin Dashboard
@endsection
@section('contents')
@include('admin.layout.sidebar')
<section id="main-content">
<section class="wrapper">
<div class="row">
<div class="col-md-3">
<div class="mini-stat clearfix">
<span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
<div class="mini-stat-info">
<span>0</span>
Categories
</div>
</div>
</div>
<div class="col-md-3">
<div class="mini-stat clearfix">
<span class="mini-stat-icon orange"><i class="fa fa-tag"></i></span>
<div class="mini-stat-info">
<span>0</span>
Sub Categories
</div>
</div>
</div>
<div class="col-md-3">
<div class="mini-stat clearfix">
<span class="mini-stat-icon pink"><i class="fa fa-anchor"></i></span>
<div class="mini-stat-info">
<span>0</span>
Products
</div>
</div>
</div>
<div class="col-md-3">
<div class="mini-stat clearfix">
<span class="mini-stat-icon green"><i class="fa fa-eye"></i></span>
<div class="mini-stat-info">
<span>0</span>
Variations Categories
</div>
</div>
</div>
<div class="col-md-3">
<div class="mini-stat clearfix">
<span class="mini-stat-icon tar"><i class="fa fa-eye"></i></span>
<div class="mini-stat-info">
<span>0</span>
Variations Title
</div>
</div>
</div>
</div>
</section>
</section>
@endsection