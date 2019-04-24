@extends('admin.layouts.default.start')
@section('heading')
<h1>
  Dashboard
  <small>Control Panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{url()}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
</ol>



@endsection
@section('contents')
<div class="row">
  
  <!-- ./col -->
  <!-- <div class="col-lg-3 col-xs-6">

    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$dashboard->arrivals}}</h3>
        <p>Arrivals</p>
      </div>
      <div class="icon">
        <i class="ion-ios-download-outline"></i>
      </div>
      <a href="{{url('admin/reservations')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div> -->
  <!-- ./col -->
  <!-- <div class="col-lg-3 col-xs-6">

    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$dashboard->departures}}</h3>
        <p>Departures</p>
      </div>
      <div class="icon">
        <i class="ion-ios-upload-outline"></i>
      </div>
      <a href="{{url('admin/reservations')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div> -->
  <!-- ./col -->
</div>

<!--div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Note!</strong>
  The demo data is publicly accessed, we therefore refresh it every hour.
</div-->


<!-- <section>
  <div class="box" style="padding:10px 0;">
    <div class="box-body" style="padding:0 !important;">

      <div class="col-md-12 text-right">
        <a href="{{url('admin/reservations/search')}}" class="btn btn-info">
        <span class="glyphicon glyphicon-plus"></span> Add Reservation
        </a>
      </div>
    </div>
  </div>
</section> -->
<section>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Newest Properties</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-responsive table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Address</th>
            <th scope="col">Bedrooms</th>
            <th scope="col">Bathrooms</th>
            <th scope="col">Date Created</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_properties as $single)
            <td data-label="Title"><p class="margin-left">{{$single->title}}</p></td>
            <td data-label="Address"><p class="margin-left">{{$single->address}}<br>{{$single->city}},{{$single->zip}}</p></td>
            <td data-label="Bedrooms"><p class="margin-left">{{$single->bedrooms}}</p></td>
            <td data-label="Bathrooms"><p class="margin-left">{{$single->bathrooms}}</p></td>
            <td data-label="Date Created"><p class="margin-left"><?=date('m/d/Y h:i a',strtotime($single->created_at))?></p></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  
  <!-- PAGE BODY ENDS -->
</section>
@endsection
