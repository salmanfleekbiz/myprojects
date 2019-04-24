@extends('front.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
Sugar House Banners
@endsection
@section('contents')
</div>
	<section class="title-bar ">
		<div class="text-center">
			<h3>
			{{$subcategory->category_name}}
			</h3>
		</div>
	</section>

	
	<section class="banner_con">
		<div class="container">
		<?php $i=0; ?>
		@if(count($products) > 0)
		@foreach($products as $product)
			<div class="col-md-4 col-sm-4 col-xs-12 banner-pro-col">
				<div class="banner-pro-inner-col">
					<img src="{{url('/public/uploads/productimages')}}/{{$product->product_image}}" class="img-responsive" alt="" />
					<h4>
					{{$product->product_name}}
					</h4>
					<small>Width: {{$product->width}}</small><br>
					<small>Height: {{$product->height}}</small><br><br>
					<a href="{{url('/')}}/product_details/{{$product->id}}" class="btn btn-red">More Details</a>
				</div>
			</div>
			<?php $i++; ?>
			@endforeach
			@else 
				<h4>No Result Found
					</h4>
					@endif
			
			
		</div>	
	</section>
	<section class="footer_red_bar">
<div class="container">
<div class="col-md-8 col-sm-8 col-xs-12">
<h4>
<strong>on time</strong> or <strong>it’s free. <span>Guaranteed!</span></strong>
</h4>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 text-right">
<a href="javascript:void(0);" class="btn btn-white">let’s get started</a>
</div>
</div>
</section>
@endsection