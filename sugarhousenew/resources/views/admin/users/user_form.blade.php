<div class="panel-body">
<section id="unseen">
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">First Name</label>
<div class="col-md-3">
<input class="form-control " id="f_name" name="f_name" type="text" value="@if(isset($userdata)) {{$userdata->f_name}} @endif" disabled>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Last Name</label>
<div class="col-md-3">
<input class="form-control " id="l_name" name="l_name" type="text" value="@if(isset($userdata)) {{$userdata->l_name}} @endif" disabled>
</div>
</div>

</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Email</label>
<div class="col-md-3">
<input class="form-control " id="email" name="email" type="text" value="@if(isset($userdata)) {{$userdata->email}} @endif" disabled>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Phone</label>
<div class="col-lg-3">
<input class="form-control " id="phone" name="phone" type="text" value="@if(isset($userdata)) {{$userdata->phone}} @endif" disabled>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Role</label>
<div class="col-md-3">
<input class="form-control " id="role" name="role" type="text" value="@if(isset($userdata)) {{$userdata->name}} @endif" disabled>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">City</label>
<div class="col-lg-3">
<input class="form-control " id="city" name="city" type="text" value="@if(isset($userdata)) {{$userdata->city}} @endif" disabled>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">State</label>
<div class="col-md-3">
<input class="form-control " id="state" name="state" type="text" value="@if(isset($userdata)) {{$userdata->state}} @endif" disabled>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Country</label>
<div class="col-lg-3">
<input class="form-control " id="country" name="country" type="text" value="@if(isset($userdata)) {{$userdata->country}} @endif" disabled>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Address 1</label>
<div class="col-md-3">
<textarea class="form-control"  id="address1" name="address1"rows="3"  disabled col="3">@if(isset($userdata)) {{$userdata->address1}} @endif</textarea>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Address 2</label>
<div class="col-lg-3">
<textarea class="form-control"  id="address1" name="address1"rows="3"  disabled col="3">@if(isset($userdata)) {{$userdata->address2}} @endif</textarea>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Zip / Portal</label>
<div class="col-md-3">
<input class="form-control " id="zip" name="zip" type="text" value="@if(isset($userdata)) {{$userdata->zip}} @endif" disabled>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Phone (guaranteed delivery)</label>
<div class="col-lg-3">
<input class="form-control " id="phone_guranted" name="phone_guranted" type="text" value="@if(isset($userdata)) {{$userdata->phone_guranted}} @endif" disabled>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Reseller Code</label>
<div class="col-md-3">
<input class="form-control " id="reseller_code" name="reseller_code" type="text" value="@if(isset($userdata)) {{$userdata->reseller_code}} @endif" disabled>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Tax Exempt (<small>Applies to Utah Residents Only</small>)</label>
<div class="col-lg-3">
<input class="form-control " id="tax" name="tax" type="text" value="@if(isset($userdata)) {{$userdata->tax}} @endif" disabled>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label for="password" class="control-label col-lg-2">Sales/Specials (<small>Would you like to receive notification of specials and sales? Your email address will not be given or sold to anyone else or used for any other purposes</small>)</label>
<div class="col-md-3">
<input class="form-control " id="sale_notification" name="sale_notification" type="text" value="@if(isset($userdata)) {{$userdata->sale_notification}} @endif" disabled>

</div>
</div>
</div>
<div class="clearfix"></div><br>
<h4><b>Shipping Information</b></h4><br>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Company Name</label>
<div class="col-md-3">
<input class="form-control " id="shipping_company" name="shipping_company" type="text" value="@if(isset($userdata)) {{$userdata->shipping_company}} @endif" disabled>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">First Name</label>
<div class="col-lg-3">
<input class="form-control " id="shipping_f_name" name="shipping_f_name" type="text" value="@if(isset($userdata)) {{$userdata->shipping_f_name}} @endif" disabled>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Last Name</label>
<div class="col-md-3">
<input class="form-control " id="shipping_l_name" name="shipping_l_name" type="text" value="@if(isset($userdata)) {{$userdata->shipping_l_name}} @endif" disabled>

</div>
</div>

<div class="form-group ">
<label for="password" class="control-label col-lg-2">City</label>
<div class="col-lg-3">
<input class="form-control " id="shipping_city" name="shipping_city" type="text" value="@if(isset($userdata)) {{$userdata->shipping_city}} @endif" disabled>
</div>
</div>
</div>
<div class="col-md-12">

<div class="form-group ">
<label for="password" class="control-label col-lg-2">Address 1</label>
<div class="col-lg-3">

<textarea class="form-control"  id="shipping_address1" name="shipping_address1"rows="3"  disabled col="3">@if(isset($userdata)) {{$userdata->shipping_address1}} @endif</textarea>
</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Address 2 </label>
<div class="col-md-3">
<textarea class="form-control"  id="shipping_address2" name="shipping_address2" rows="3"  disabled col="3">@if(isset($userdata)) {{$userdata->shipping_address2}} @endif</textarea>

</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">State  </label>
<div class="col-md-3">
<input class="form-control " id="shipping_state" name="shipping_state" type="text" value="@if(isset($userdata)) {{$userdata->shipping_state}} @endif" disabled>

</div>
</div>
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Zip / Portal</label>
<div class="col-lg-3">
<input class="form-control " id="shipping_zip" name="shipping_zip" type="text" value="@if(isset($userdata)) {{$userdata->shipping_zip}} @endif" disabled>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Country</label>
<div class="col-md-3">
<input class="form-control " id="shipping_country" name="shipping_country" type="text" value="@if(isset($userdata)) {{$userdata->shipping_country}} @endif" disabled>

</div>
</div>
</div>
<div class="clearfix"></div><br>
<div class="col-lg-offset-3 col-lg-6">
<a href="{{url('/admin/user/allusers')}}" class="btn btn-danger" >Back</a>
	
</div>



</section>
</div>

