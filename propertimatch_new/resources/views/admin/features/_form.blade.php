<input type="hidden" name="_token" value="{{ csrf_token() }}">
@if(isset($feature->id))
<input type="hidden" name="id" value="{{ $feature->id }}">
@endif
<div class="form-group">
  <label class="col-sm-3 col-xs-12 control-label">Title/Name<font color="#FF0000">*</font></label>
  <div class="col-sm-9 col-xs-12">
    <input 
      type="text"
      name = "title"
      placeholder="Enter title here"
      value="@if(old('title')){!! old('title') !!}@elseif(isset($feature->title)){!!$feature->title!!}@endif"
      class="form-control"
      />
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 col-xs-12 control-label">Display Order</label>
  <div class="col-sm-9 col-xs-12">
    <input name="display_order" type="text" class="form-control" 
      value="@if(old('display_order')){!! old('display_order') !!}@elseif(isset($feature->display_order)){!!$feature->display_order!!}@endif"
      />
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3 col-xs-12"></div>
  <div class="col-sm-9 col-xs-12">
    <label>
    <input name="is_active" type="checkbox" value="1"
    @if(old('is_active')){{'checked="checked"'}}
    @elseif(isset($feature->is_active) and ($feature->is_active=='1')){{'checked="checked"'}}@endif />
    Active</label>
  </div>
</div>
