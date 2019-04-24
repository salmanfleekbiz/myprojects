<div class="row">
<div id="unite-gallery" style="display:none;">
    @foreach ($property->images as $image)
      @if (is_file($image->image))
      <img alt="{{$property->title}}"
       src="{{asset( $image->image )}}"
       data-image="{{asset( $image->image )}}"
       data-description="{{$property->title}}">
      @endif
    @endforeach
  </div>
  <br/>

</div>