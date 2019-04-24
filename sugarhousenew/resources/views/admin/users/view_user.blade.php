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
@if(session()->has('message'))
<div class="bs-example">
<div class="alert alert-success fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Success!</strong> {{ session()->get('message') }}
</div>
</div>
@endif		
<div class="row">
<div class="col-sm-12">
<section class="panel">
<header class="panel-heading">
View User Detail
</header>		
@include('admin.users.user_form')
</section>
</div>
</div>	
</section>
</section>
@endsection