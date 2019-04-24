<div class="panel-body">
<section id="unseen">
<div class="form-group ">
<label for="password" class="control-label col-lg-2">Variation Title</label>
<div class="col-lg-3">

<input class="form-control " id="variationtitle" placeholder="Enter the Variation Title" name="variationtitle" type="text" value="@if(isset($variations)){{$variations->title}}@endif">
</div>
</div>
<div class="col-lg-offset-3 col-lg-6">
<a href="{{url('/admin/variation/allvariationtitle')}}" class="btn btn-danger" >Back</a>
@if(isset($variations))
<button class="btn btn-primary" type="submit">Update</button>
@else
<button class="btn btn-primary" type="submit">Add</button>
@endif	
</div>
</section>
</div>

