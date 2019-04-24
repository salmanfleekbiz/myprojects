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
<div class="col-sm-12">
<section class="panel">
<header class="panel-heading">
Users
</header>
<div class="panel-body">
<section id="unseen">
@if (Session::has('errors'))
<div class="bs-example">
<div class="alert alert-danger fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Error!</strong> Not Required yet
</div>
</div>
@endif
@if(session()->has('message'))
<div class="bs-example">
<div class="alert alert-success fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Success!</strong> {{ session()->get('message') }}
</div>
</div>
@endif		
<table  id="example2" class="table table-bordered table-striped table-condensed">
<thead>
<tr>
<th>Full Name</th>
<th>Email</th>
<th>Phone No.</th>
<th>Role</th>
<th></th>
</tr>
</thead>
<tbody>
@if(isset($allusers))
@foreach($allusers as $alluser)
<tr>
<td>{{ucfirst($alluser->f_name)}} {{ucfirst($alluser->l_name)}}</td>
<td>{{$alluser->email}}</td>
<td>{{$alluser->phone}}</td>
<td>{{ucfirst($alluser->name)}}</td>
<td><a class="btn btn-primary" href="{{url('admin/user/viewuser')}}/{{$alluser->user_id}}">User Details</a></td>
</tr>
@endforeach
@endif
</tbody>
</table>
</section>
</div>
</section>
</div>
</div>
</section>
</section>
@endsection