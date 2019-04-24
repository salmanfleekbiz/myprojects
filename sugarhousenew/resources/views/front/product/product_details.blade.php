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
<h3>{{$subcategory->category_name}}</h3>
</div>
</section>
<section class="single_product">
<div class="container">	
<div class="col-md-6 col-sm-6 product-thumbnail">
<img src="{{url('/public/uploads/productimages')}}/{{$products->product_image}}" class="img-responsive promo-pro-thumb" alt="24in. Promo Banner Stand" />
</div>
<form method="post" name="addtocartform" id="addtocartform" action="{{url('/cart')}}">
{{csrf_field()}}
<input type="hidden" name="product_id" id="product_id" value="{{$products->product_id}}">
<div class="col-md-6 col-sm-6 product-short-detail">
<h3 class="single-product-title">
{{$products->product_name}}
</h3>
@if(!empty($user))
@if($user->user_role == 2)
<h3 class="single-product-price">${{$products->wholesale_price}}</h3>
<input type="hidden" name="product_price" value="{{$products->wholesale_price}}">
@else
<h3 class="single-product-price">${{$products->variation_price}}</h3>
<input type="hidden" name="product_price" value="{{$products->variation_price}}">
@endif
@else
<h3 class="single-product-price">${{$products->variation_price}}</h3>
<input type="hidden" name="product_price" value="{{$products->variation_price}}">
@endif
<p>{{$products->product_description}}</p>
<input type="hidden" name="product_name" value="{{$products->product_name}}">
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-minus"></i> Description</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse in">
<div class="panel-body">
<p>Width: {{$products->width}}"
<br />
Height: {{$products->height}}
<br />
Graphic Attachment: {{$products->graphic_attachment}}
</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 product-form-left">
<input type="number" step="any" min="1" Placeholder="Quantity*" value="1" id="quantity"    name="quantity" class="txtpfield" />
<select class="txtpfield" id="graphicwidth" name="graphicwidth">
<option value="">Please Select Graphic Width*</option>
@for($i=$products->min_width; $i <= $products->max_width; $i++)
<option value="{{$i}}">{{$i}}"</option>
@endfor
</select>
<?php $frame=$products->frame_color;
$framearr=explode(',',$frame);
?>
<select class="txtpfield" id="frame" name="frame">
<option value="">Please Select Frame Color*</option>
<option value="{{$framearr[0]}}">{{$framearr[0]}}</option>
<option value="{{$framearr[1]}}">{{$framearr[1]}}</option>
</select>
<select class="txtpfield" id="accessoryid" name="accessoryid">
<option value="">Please Select Product's Accessories</option>
@foreach($accessories as $accessory)
<option value="{{$accessory->id}}">{{$accessory->title}}</option>
@endforeach
</select>
</div>
<div class="col-md-6 col-sm-6 product-form-left">
<select class="txtpfield" id="productvariation_price" name="productvariation_price">
<option value="">Please Select Product</option>
@foreach($arr1 as $key => $value)
<option value="{{$key}}">{{$key}}</option>
@endforeach
</select>
<select class="txtpfield" id="graphicheight" name="graphicheight">
<option value="">Please Select Graphic Height*</option>
@for($i=$products->min_height; $i <= $products->max_height; $i++)
<option value="{{$i}}">{{$i}}"</option>
@endfor
</select>
<select class="txtpfield"  id="proofid" name="proofid">
<option value="">Please Select Product's Proof</option>
@foreach($proofs as $proof)
<option value="{{$proof->id}}">{{$proof->title}}</option>
@endforeach
</select>
<select class="txtpfield" id="warrantyid" name="warrantyid">
<option value="">Please Select Product's Warranty</option>
@foreach($warranties as $warranty)
<option value="{{$warranty->id}}">{{$warranty->title}}</option>
@endforeach
</select>
</div>
<div class="col-md-12 col-sm-12 btn-add-car-div">
<input value="add to cart" class="btn btn-red btn-form single_add_cart" type="submit">
</div>
</form>
<div class="col-md-12 col-sm-12 table_single_product">
<table>
@if(count($arr) >0)
<tr>
<td></td>
@foreach($arr as $key => $value)
<td>{{$key}}</td>
@endforeach
</tr>
@foreach($arr1 as $key => $value)
<tr>
<td>{{$key}}</td>
@foreach($value as $k => $v)
<td>${{$v}}</td>
@endforeach
</tr>
@endforeach
@else 
<p>No Result Found</p>	
@endif
</table>
<table class="maroon-tbl" align="center"> 
<tr>
<td align="center">
*Graphic size is adjustable. Prices will vary depending on the size of graphic you choose.
</td>
</tr>
</table>
</div>
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
<script>
jQuery("#addtocartform").validate({
rules: {
quantity: "required",
frame: "required",
graphicwidth: "required",
graphicheight: "required",
productid: "required"
},
messages: {
quantity: "Enter quantity of the product",
frame: "Select frame color of the product",
graphicwidth: "Select graphic width of the product",
graphicheight: "Select graphic height of the product",
productid: "Select the product type"
}
// ,
// submitHandler: function() {
// },
// success: function(label) {
// 	label.remove();
// }
});
</script>
@endsection