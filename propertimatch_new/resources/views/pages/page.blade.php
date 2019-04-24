@extends('layouts.default.start')
<!-- Goes to html>head>title -->
@section('metatits')
{{$page->meta_title}}
@endsection
@section('metadesc')
{{$page->meta_descript}}
@endsection
@section('metakeys')
{{$page->meta_keyword}}
@endsection
@section('title')
{{$page->title}} - {{$settings->site_title}}
@endsection
<!-- Yields body of the page inside the template -->
@section('contents')
<script type="text/javascript">
   $(document).ready(function() {
      $("#top_nav_33").addClass("active");
});
</script>

	<div class="breadcrumbs-area bread-bg-about bg-opacity-black-70 page{{$page->id}}">    
		<div class="container">         
			<div class="row">        
				<div class="col-xs-12">     
					<div class="breadcrumbs">        
						<h2 class="breadcrumbs-title">{{$page->title}}</h2>  
						<ul class="breadcrumbs-list">           	
							<li><a href="{{url()}}">Home</a></li>   
							<li>{{$page->title}}</li>        
						</ul>                  
					</div>         
				</div>         
			</div>
        </div>
    </div>


	<div class="container page-body ptb-115">
		<!-- Welcome Contents Section -->
		<div class="row">
		@if(isset($page->images->first()->image) and is_file($page->images->first()->image))
			<div class="col-md-6 col-xs-12">
				<img class="test img-responsive" src="{{asset($page->images->first()->image)}}" alt="{{$page->title}}"> <br/>
			</div>
			<div class="col-md-6 col-xs-12">
				{!!$page->contents!!}   
			</div>
		@else
			<div class="col-md-12 col-xs-12">
				{!!$page->contents!!}   
			</div>
		@endif	
		</div>
		<!-- /.row -->
		<!-- /.row -->
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function() {
    $('#light-gallery').lightGallery({
      selector: '.light-gallery-item'
    });
  });
</script>

<!-- Picture Gallery -->

    <!-- jQuery already included @ jquery-2.1.0.js -->

    <link type="text/css" rel="stylesheet" href="{{ asset('resources/plugins/lightGallery-master/dist/css/lightgallery.css')}}" />

    <!-- /. Picture Gallery -->
<!-- Picture Gallery/lightGallery -->

    <!-- jQuery required >= 1.8.0  | jQuery already included in the head jquery-2.1.0.js -->

    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lightgallery.js')}}"></script>

    <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <!-- lightgallery plugins -->

    <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>

    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lg-fullscreen.js')}}"></script>

    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lg-thumbnail.js')}}"></script>

    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lg-video.js')}}"></script>

    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lg-autoplay.js')}}"></script>

    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lg-zoom.js')}}"></script>

    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lg-hash.js')}}"></script>

    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lg-pager.js')}}"></script>

    <!-- End of Picture Gallery/lightGallery -->

@endsection
