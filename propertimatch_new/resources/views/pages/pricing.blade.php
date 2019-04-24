@extends('layouts.default.start')

<!-- Goes to html>head>title -->
<?php $page_metas = \App\Pages::where('id', 42)->where('is_active', 1)->first(); ?>
@section('metatits')
{{$page_metas->meta_title}}
@endsection
@section('metadesc')
{{$page_metas->meta_descript}}
@endsection
@section('metakeys')
{{$page_metas->meta_keyword}}
@endsection
@section('title')
	Pricing - {{$settings->site_title}}
@endsection

<!-- Yields body of the page inside the template -->

@section('contents')

	<div class="breadcrumbs-area bread-bg-pricing bg-opacity-black-70">    
		<div class="container">         
			<div class="row">        
				<div class="col-xs-12">     
					<div class="breadcrumbs">        
						<h2 class="breadcrumbs-title">Pricing</h2>  
						<ul class="breadcrumbs-list">           	
							<li><a href="{{url()}}">Home</a></li>   
							<li>Pricing</li>        
						</ul>                  
					</div>         
				</div>         
			</div>
        </div>
    </div>
	<section id="page-content" class="page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 pt-80 pb-80 pricing-content">
					<h3>Pricing Plans tailored<br>for your needs.</h3>
					<p>We would like to invite you to use MatchPropertyDirect™. This site introduces buyer and seller together for direct communication, No Commission ! You choose your own attorney, You set the price , You are in charge of your sale. You will have the ability through email and on line chat to work out showings, describe your property the way only you can do ! You can fill in information about your favorite pets, your hobbies, and why you love where you live ! That way when you connect you will be in contact with each other and then start the conversation reaching a worldwide audience! Simple and easy to use. Created for anyone buying a property or selling a property!</p>
					<div class="pricingArea">
						<div class="pricingWrap">
							<div class="duration"><p>1 Month</p></div>
							<div class="aboutPackage">
								<p class="pricing">$59</p>
								<p class="duration">/month per listing</p>
								<!-- <p class="trialDuration">30 DAYS TRIAL</p> -->
								<?php 
								if (Auth::check() && Auth::user()->role=='owner') { 
									if (isset($_GET['pid'])){
								?>
								<form action="http://propertimatch.craftedium.xyz/stripe/charge.php" method="POST">
									<input type="hidden" name="pid" id="pid" value="<?php if (isset($_GET['pid'])){ echo $_GET['pid']; } ?>">
									<input type="hidden" name="pckg_amount" id="pckg_amount" value="5900">
									<input type="hidden" name="pckg_decp" id="pckg_decp" value="/Month per listing ($59.00)">
								  <script
								    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								    data-key="pk_test_mhnm7FqotaVFcWyDopUDaLGd"
								    data-image="http://propertimatch.craftedium.xyz/img/site-logo-default-dark.png"
								    data-name="PropertiMatch.com"
								    data-description="/Month per listing ($59.00)"
								    data-amount="5900">
								  </script>
								</form>
								<?php }else{ ?>
								<a href="http://propertimatch.craftedium.xyz/owner/properties" class="pricingBtn">Select Property</a>
								<?php } }else{ ?>
								<a href="http://propertimatch.craftedium.xyz/register" class="pricingBtn">Sign Up</a>
								<?php } ?>
							</div>
						</div>
						<div class="pricingWrap">
							<div class="duration"><p>6 Months</p></div>
							<div class="aboutPackage">
								<p class="pricing">$159</p>
								<p class="duration">/6 month per listing</p>
								<!-- <p class="trialDuration">30 DAYS TRIAL</p> -->
								<?php 
								if (Auth::check() && Auth::user()->role=='owner') { 
									if (isset($_GET['pid'])){
								?>
								<form action="http://propertimatch.craftedium.xyz/stripe/charge.php" method="POST">
									<input type="hidden" name="pid" id="pid" value="<?php if (isset($_GET['pid'])){ echo $_GET['pid']; } ?>">
									<input type="hidden" name="pckg_amount" id="pckg_amount" value="15900">
									<input type="hidden" name="pckg_decp" id="pckg_decp" value="/6 month per listing ($159.00)">
								  <script
								    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								    data-key="pk_test_mhnm7FqotaVFcWyDopUDaLGd"
								    data-image="http://propertimatch.craftedium.xyz/img/site-logo-default-dark.png"
								    data-name="PropertiMatch.com"
								    data-description="/6 month per listing ($159.00)"
								    data-amount="15900">
								  </script>
								</form>
								<?php }else{ ?>
								<a href="http://propertimatch.craftedium.xyz/owner/properties" class="pricingBtn">Select Property</a>
								<?php } }else{ ?>
								<a href="http://propertimatch.craftedium.xyz/register" class="pricingBtn">Sign Up</a>
								<?php } ?>
							</div>
						</div>
						<div class="pricingWrap">
							<div class="duration"><p>1 Year</p></div>
							<div class="aboutPackage">
								<p class="pricing">$259</p>
								<p class="duration">/year per listing</p>
								<!-- <p class="trialDuration">30 DAYS TRIAL</p> -->
								<?php 
								if (Auth::check() && Auth::user()->role=='owner') { 
									if (isset($_GET['pid'])){
								?>
								<form action="http://propertimatch.craftedium.xyz/stripe/charge.php" method="POST">
									<input type="hidden" name="pid" id="pid" value="<?php if (isset($_GET['pid'])){ echo $_GET['pid']; } ?>">
									<input type="hidden" name="pckg_amount" id="pckg_amount" value="25900">
									<input type="hidden" name="pckg_decp" id="pckg_decp" value="/Year per listing ($259.00)">
								  <script
								    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								    data-key="pk_test_mhnm7FqotaVFcWyDopUDaLGd"
								    data-image="http://propertimatch.craftedium.xyz/img/site-logo-default-dark.png"
								    data-name="PropertiMatch.com"
								    data-description="/Year per listing ($259.00)"
								    data-amount="25900">
								  </script>
								</form>
								<?php }else{ ?>
								<a href="http://propertimatch.craftedium.xyz/owner/properties" class="pricingBtn">Select Property</a>
								<?php } }else{ ?>
								<a href="http://propertimatch.craftedium.xyz/register" class="pricingBtn">Sign Up</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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