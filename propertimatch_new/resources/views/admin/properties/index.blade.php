@extends('admin.layouts.default.start')
@section('heading')
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" />
<style>
h4{margin:0 0 5px 0;}
.form-control { margin-bottom: 0;}
</style>
<h1>
  Properties/Listings
  <small>Your properties to be displayed for booking, sale and/or other purposes.</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Properties</li>
</ol>
<br/>
@endsection
@section('contents')
@include('admin.layouts.objects.iframe-modal')
<div class="box">
  <div class="box-header">
    <button rel="{{url('admin/properties/create')}}" type="button" 
      class="btn btn-info make-modal-large iframe-form-open tst" 
      data-toggle="modal" data-target="#iframeModal" title="Add Property">
    <span class="glyphicon glyphicon-plus"></span>Add
    </button>
    <button class="btn btn-success reload-page">
    <span class="glyphicon glyphicon-refresh"></span>
    </button>
    <?php 
      $counter = 0;
      foreach( $properties as $property ){
        $items['id'][$counter] = $property->id;
        $items['display_order'][$counter] = $property->display_order;
        $items['image'][$counter] = @$property->images->first()->image;
        $items['title'][$counter] = $property->title;
        $counter++;
      }
      ?>
    @if(isset($items))
    <?php
      session(['model'=>'Properties']);
      session(['counter' => $counter]);
      session(['items' => http_build_query($items, '$item_')]);
      ?>
    <button rel="{{url('admin/sortable')}}" type="button" 
      class="btn btn-default make-modal-large iframe-form-open" 
      data-toggle="modal" data-target="#iframeModal" title="Update Display Order">
    <span class="glyphicon glyphicon-sort"></span>Sort
    </button>
    @endif
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-responsive table-bordered table-striped datatable-first-column-asc">
      <thead>
        <tr>
          <th scope="col" class="display-none">Order#</th>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col" class="status-width">Status</th>
          <th scope="col" class="owner-width">Owner</th>
          <th scope="col" class="action-width">Action</th>
        </tr>
      </thead>
      <tbody>
       @foreach( $properties as $property )
       <tr>
       <td data-label="Order#" class="display-none">{{$property->display_order}}</td>
       <td>
         @if(isset($property->images->first()->image_small))
            <img class="image-100 img-responsive" src="{{asset($property->images->first()->image_small)}}" alt="{{$property->title}}">
            @endif<br/>
       </td>
       <td data-label="Name">
            <h4 class="margin-left">
              {{$property->title}} <small>#{{$property->code}}</small>
            </h4>
            <p class="margin-left"> <div class="margin-left"><i class="fa fa-bed"></i> Bedrooms:
              <?= $property->bedrooms ?>
              </div> <div class="margin-left"><i class="fa fa-bath"></i>  Bathrooms:
              <?= $property->bathrooms ?>
              </div> <div class="margin-left"><i class="fa fa-user"></i>  Sleeping Capacity:
              <?= $property->sleeps ?>
              </div> 
            </p>
       </td>
       <td data-label="Status">
         <ul class="margin-left-60">
              @if($property->is_active=='1')
              <li>Active</li>
              @endif
              @if($property->is_featured=='1')
              <li>Featured</li>
              @endif
              @if($property->is_new=='1')
              <li>New</li>
              @endif
              @if($property->is_sale=='1')
              <li>Sale</li>
              @endif
            </ul>
       </td>
       <td data-label="Owner" class="owner-width">
         <?php 
           $owner_id = $property->user_id;
           //echo $owner_id;
           //$owner_details = DB::table('users')->where('id',$owner_id)->first();
           $owner_details = DB::table('users')->where('id',$owner_id)->get();
            //echo '<pre>'; print_r($owner_details).'<br>';
            foreach ($owner_details as $key => $object) {
                echo '<div class="margin-left">'.$object->firstname.' '.$object->lastname.'</div><div class="margin-left owner-email">'.$object->email.'</div>';
            }
          // echo $owner_details->firstname.' '.$owner_details->lastname.'<br>'.$owner_details->email;
          ?>
       </td>
       <td class="margin-left">
         <?php if($property->is_sold=='0') { ?>
          <a onclick="return confirm('Are you sure want to mark it as sold?');" href="{{url('/admin/properties/sold/'.$property->id.'?_token='.csrf_token())}}" class="btn btn-success buttons-padding" title="Mark as Sold">
            <span class="fa fa-shopping-cart"></span>
            </a>
            <?php } else { ?>
            <button disabled class="btn btn-success buttons-padding">SOLD</button>
            <?php } ?>
            <a href="#" rel="{{url('admin/properties/edit/'.$property->id)}}" 
              class="buttons-padding iframe-form-open make-modal-large btn btn-default ediprop" 
              data-toggle="modal" data-target="#iframeModal" 
              title="Edit Property: {{$property->title}}">
            <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="javascript:confirmDelete('{{url('/admin/properties/delete/'.$property->id.'?_token='.csrf_token())}}')" class="btn buttons-padding btn-danger">
            <span class="glyphicon glyphicon-remove"></span>
            </a>
       </td>
       </tr>
       @endforeach
      </tbody>
     <!-- <tfoot>
        <tr>
          <th>Order#</th>
          <th></th>
          <th>Name</th>
          <td>Status</td>
          <th></th>
          <th></th>
        </tr>
      </tfoot>-->
    </table>
    <span class="bg-danger">Note:</span> Maximum 6 featured properties can show on the home page.<br/>
    Only active properties will be available for frontend use.
  </div>
  <!-- /.box-body -->
</div>
@endsection
