<div class="panel-body">
<section id="unseen">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Product Name</label>
<div class="col-lg-3">
<select class="form-control m-bot15" name="productid" id="productid">
<option value="">Select Product</option>	
@if(isset($products))
@foreach($products as $product)
<option value="{{$product->id}}" @if (isset($productvariationdata->product_id) && $productvariationdata->product_id == $product->id) {!!'selected="selected"'!!} @endif>{{$product->product_name}}</option>
@endforeach
@endif
</select>	
</div>
<label for="password" class="control-label col-lg-2">Variation Category</label>
<div class="col-lg-3">
<select class="form-control m-bot15" name="variationid" id="variationid">
<option value="">Select Variation Category</option>	
@if(isset($products_variation_category))
@foreach($products_variation_category as $products_variation_categorys)
<option value="{{$products_variation_categorys->id}}" @if (isset($productvariationdata->variation_id) && $productvariationdata->variation_id == $products_variation_categorys->id) {!!'selected="selected"'!!} @endif>{{$products_variation_categorys->min_qty}} - {{$products_variation_categorys->max_qty}}</option>
@endforeach
@endif
</select>	
</div>
</div>
<div class="form-group ">

<label for="password" class="control-label col-lg-2">Variation Title</label>
<div class="col-lg-3">
<select class="form-control m-bot15" name="variationtitle" id="variationtitle">
<option value="">Select Variation Title</option>	
@if(isset($variations))
@foreach($variations as $variation)
<option value="{{$variation->id}}" @if (isset($productvariationdata->variation_title) && $productvariationdata->variation_title == $variation->id) {!!'selected="selected"'!!} @endif>{{$variation->title}}</option>
@endforeach
@endif
</select>	
</div>


<label for="confirm_password" class="control-label col-lg-2">Retail Price</label>
<div class="col-lg-3">
<input class="form-control " id="variationprice" placeholder="Enter the Retain Price" name="variationprice" type="text" value="@if(isset($productvariationdata)){{$productvariationdata->variation_price }}@endif">
</div>
</div>
<div class="form-group ">
<label for="confirm_password" class="control-label col-lg-2">Wholesale Price</label>
<div class="col-lg-3">
<input class="form-control " id="wholesaleprice" placeholder="Enter the Wholesale Price "  name="wholesaleprice" type="text" value="@if(isset($productvariationdata)){{$productvariationdata->wholesale_price }}@endif">
</div>
</div>
<div class="col-lg-offset-3 col-lg-6">
<a href="{{url('/admin/variation/allproductvariation')}}" class="btn btn-danger" >Back</a>
@if(isset($productvariationdata))
<button class="btn btn-primary" type="submit">Update</button>
@else
<button class="btn btn-primary" type="submit">Add</button>
@endif	
</div>
</section>
</div>

