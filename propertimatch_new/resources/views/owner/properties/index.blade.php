@extends('owner.layouts.default.start')
@section('heading')
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" />
<style>
h4{margin:0 0 5px 0;}
.form-control { margin-bottom: 0 !important;}

</style>

<h1>
  Properties/Listings
  <small>Your properties to be displayed for booking, sale and/or other purposes.</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{url('/owner/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Properties</li>
</ol>
<br/>
@endsection
@section('contents')
@include('owner.layouts.objects.iframe-modal')
<div class="box">
  <div class="box-header">
    <button rel="{{url('owner/properties/create')}}" type="button" 
      class="btn btn-info make-modal-large iframe-form-open" 
      data-toggle="modal" data-target="#iframeModal" title="Add Property">
    <span class="glyphicon glyphicon-plus"></span>Add
    </button>
    <button class="btn btn-success reload-page">
    <span class="glyphicon glyphicon-refresh"></span>
    </button>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped datatable-first-column-asc seller-properties-list">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $properties as $property )
        <tr>
          <td>
            @if(isset($property->images->first()->image))
            <img class="image-100 img-responsive" src="{{asset($property->images->first()->image)}}" alt="{{$property->title}}">
            ({{count($property->images)}})
            @endif<br/>
          </td>
          <td data-label="Name">
            <h4 class="margin-left">
              {{$property->title}}
            </h4>
            <p  class="margin-left">{{$property->category->title}}</p>
              <div class="margin-left"><i class="fa fa-bed"></i> Bedrooms:
              <?= $property->bedrooms ?>
              </div> <div class="margin-left"><i class="fa fa-bath"></i> Bathrooms:
              <?= $property->bathrooms ?>
              </div> 
          </td>
                    
          <td class="margin-left">
          <?php if($property->is_sold=='0') { ?>
          <a onclick="return confirm('Are you sure want to mark it as sold?');" href="{{url('/owner/properties/sold/'.$property->id.'?_token='.csrf_token())}}" class="btn btn-success buttons-padding" title="Mark as Sold">
            <span class="fa fa-shopping-cart"></span>
            </a>
            <?php if($property->monthly_subscription=='0' && $property->pay_subscription=='0' && $property->days_counter=='0') { ?>
            <button class="btn btn-error buttons-padding" onclick="location.href='http://propertimatch.craftedium.xyz/pricing?pid={{$property->id}}';">Pay Now</button>
            <?php }else if($property->pay_subscription=='0' && $property->days_counter=='0'){ ?>
            <button class="btn btn-error buttons-padding" onclick="location.href='http://propertimatch.craftedium.xyz/pricing?pid={{$property->id}}';">Pay Now</button>
            <?php }else{

            } ?>
            <?php } else { ?>
            <button disabled class="btn btn-success buttons-padding">SOLD</button>
            <?php } ?>
            <a href="#" rel="{{url('owner/properties/edit/'.$property->id)}}" 
              class="iframe-form-open make-modal-large buttons-padding btn btn-default" 
              data-toggle="modal" data-target="#iframeModal" 
              title="Edit Property: {{$property->title}}">
            <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="javascript:confirmDelete('{{url('/owner/properties/delete/'.$property->id.'?_token='.csrf_token())}}')" class="btn buttons-padding btn-danger">
            <span class="glyphicon glyphicon-remove"></span>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </tfoot>
    </table>

  </div>
  <!-- /.box-body -->
</div>
@endsection
