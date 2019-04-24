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
				My Cart
			</h3>
		</div>
	</section>
	
	<?php $acccart=Session::get('cartproduct');	?>
	{{csrf_field()}}
	<section class="cart_table">
		<div class="container">
			<table class="table" border="1">
				<thead class="thead-dark">
					<tr>
					  <th scope="col">Remove</th>
					  <th  scope="col">Quantity</th>
					  <th scope="col">Update</th>
					  <th scope="col" class="pro_tbl_des">Product Description</th>
					  <th scope="col">Price</th>
					  <th scope="col">Total</th>
					</tr>
				</thead>
				
				<tbody>

					
					@if(Session::has('cartproduct'))
					<?php $i = 0; ?>
					@foreach($acccart->items as $wkey =>$wvalue)
					<tr>
					  <td scope="col"><a class="deleproduct" href="javascript:void(0);" arrnum="{{$wkey}}" pname="{{$wvalue['product_name']}}" pvariation="{{$wvalue['product_variation_name']}}" graphicwidth="{{$wvalue['graphic_width']}}" graphicheight="{{$wvalue['graphic_height']}}" framecolor="{{$wvalue['frame_color']}}"><i class="fa fa-times"></i></a></td>
					  <td  scope="col"><input type="text" name="quantity{{$wkey}}" id="quantity{{$wkey}}" class="col-md-3" value="{{$wvalue['quantity']}}"></td>
					  <td scope="col"><button class="btn-red updateproduct" type="button" arrnum="{{$wkey}}" qty="{{$wvalue['quantity']}}">update</button></td>
					  <td scope="col" class="pro_tbl_des">{{$wvalue['product_name']}}<br> ({{$wvalue['product_variation_name']}}, Graphic Width: {{$wvalue['graphic_width']}}, Graphic Height: {{$wvalue['graphic_height']}}, Frame Color:{{$wvalue['frame_color']}})</td>
					  <td id="showprice{{$i}}" scope="col">$00.00</td>
					  <td id="showpricetotal{{$i}}" scope="col">$00.00</td>
					  <input type="hidden" name="producttotal[]" id="producttotal<?php echo $i; ?>" value="">
					</tr>
					<script type="text/javascript">
					  $( document ).ready(function() {
						showPrice('<?php echo $wvalue['product_id']; ?>','<?php echo $wvalue['product_variation_name']; ?>','<?php echo $wvalue['quantity']; ?>','<?php echo $i; ?>');
						});
					</script>
					<?php $i++; ?>
					@endforeach
					@endif
					<tr >
					  <td scope="col" colspan="4" rowspan="4">
					  
						<table style="color: #a0a0a0;">
							<tr>
								<td style="border:0 !important; width:45%;">
									<input type="text" class="txt_box" Placeholder="Zip/Postal Code:" />
								</td>
								<td style="border:0 !important; width:55%;">
									Enter zip/postal code, choose delivery date and click Select 
								</td>
							</tr>
							<tr>
								<td style="border:0 !important; width:45%;">
									<select class="ddl_box">
										<option>Method</option>
										<option>PayPal</option>
										<option>Credit Card</option>
									</select>
								</td>
								<td style="border:0 !important; width:55%;">
									<input type="submit" Value="select" class="btn btn-red" style="margin:0 !important; display:inline-block !important;"/>
									<span> &nbsp;&nbsp;&nbsp; Estimated Weight: 12 pounds</span>
								</td>
							</tr>
						</table>
						
					  </td>
					  <td scope="col" class="tbl_blk_bg">Subtotal</td>
					  <td id="showsubtotal" scope="col" class="tbl_red_font">$0</td>
					</tr>
					
					<tr>
					  <td scope="col" class="tbl_blk_bg">Shipping</td>
					  <td scope="col" class="tbl_red_font">$0.00</td>
					</tr>
					
					<tr>
					  <td scope="col" class="tbl_blk_bg">Tax</td>
					  <td scope="col" class="tbl_red_font">$0.00</td>
					</tr>
					
					<tr>
					  <td scope="col" class="tbl_blk_bg">Total</td>
					  <td id="finaltotal" scope="col" class="tbl_red_font">$232.00</td>
					</tr>
					
					
				</tbody>
			</table>
		</div>
	</section>
	
	<section class="imp_deadline">
		<div class="container">
			<img src="{{url('frontassets/images/deadline-img.jpg')}}" class="img-responsive" alt="" />
		</div>
	</section>
	
	<section class="other_rcommendation">
		<div class="container">
			<h3 class="text-center has-after">Other Recommendations</h3>
			<br />
			<div class="col-md-4 col-sm-4 col-xs-12 banner-pro-col">
				<div class="banner-pro-inner-col">
					<img src="{{url('frontassets/images/banner-pro-1.jpg')}}" class="img-responsive" alt="" />
					<h4>
						Outdoor
					</h4>
					<h5>From $150</h5>
					<a href="#" class="btn btn-red">Details</a>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12 banner-pro-col">
				<div class="banner-pro-inner-col">
					<img src="{{url('frontassets/images/banner-pro-2.jpg')}}" class="img-responsive" alt="" />
					<h4>
						Classic
					</h4>
					<h5>From $79</h5>
					<a href="#" class="btn btn-red">Details</a>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12 banner-pro-col">
				<div class="banner-pro-inner-col">
					<img src="{{url('frontassets/images/banner-pro-3.jpg')}}" class="img-responsive" alt="" />
					<h4>
						X-Style
					</h4>
					<h5>From $25</h5>
					<a href="#" class="btn btn-red">Details</a>
				</div>
			</div>
		</div>
	</section>
	<section class="contact-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3028.6836177074147!2d-111.89416688454875!3d40.61480357934255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8752884d84a93ccf%3A0x48d2b6421b248320!2s7526+State+St%2C+Midvale%2C+UT+84047!5e0!3m2!1sen!2s!4v1520667593669" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
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
<script type="text/javascript">
// $( document ).ready(function() {
// var _token = $( "input[name*='_token']" ).val();	
// showPrice(1,_token);
// });
</script>
@endsection