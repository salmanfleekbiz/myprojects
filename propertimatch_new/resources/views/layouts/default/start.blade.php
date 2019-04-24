<!-- 
  | Template Main File 
  | Contains commonly required scripts and files
  | - Bootstrap
  | - jQuery
  | - Datepicker
  | - Preloader
  | - Navigation: Drop Down Menu
  | - LightGallery
  | - Application CSS (property.css)
  | - Common CSS code (style.css)
  | - Header: Reserve Online - Commonly included everywhere on the site
  | - Footer - Commonly included everywhere on the site
  | Includes partial files and pieces of results
  | - Browser Title as per the page opened
  | - Main Contents as per the page opened
  | - Javascript as per the page opened
-->
<?php ob_start("ob_gzhandler"); ?> 
<!DOCTYPE html>
<html lang="en">
	<head>
	    
	    
	    
	    
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    	<meta name="description" content="@yield('metadesc')"/>
    	<meta name="keywords" content="@yield('metakeys')"/>
    	<title>@yield('metatits')</title>
    	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries @yield('title')-->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    	<link rel="stylesheet" href="{{ asset('resources/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}">
    	<link rel="stylesheet" href="{{ asset('resources/font-awesome-4.3.0/css/font-awesome.min.css') }}">
    	<link rel="stylesheet" href="{{ asset('resources/plugins/pace/themes/green/pace-theme-flat-top.css')}}" />
    	<link rel="stylesheet" href="{{ asset('resources/plugins/datepicker-eyecon/css/datepicker.css') }}">
		<link rel="stylesheet" href="{{ asset('css/all-main.css') }}">
		<link rel="stylesheet" href="{{ asset('css/core.css') }}">
		<link rel="stylesheet" href="{{ asset('css/shortcode/shortcodes.css') }}">
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('css/colorbox.css') }}">
    	<link rel="stylesheet" href="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/css/unite-gallery.css')}}" type="text/css" />
    	<link rel="stylesheet" href="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/themes/default/ug-theme-default.css')}}" type="text/css" />
    	<link id="themefile" rel="stylesheet" type="text/css" href="<?= (null !== @$_COOKIE['themefile'])?$_COOKIE['themefile']:asset('/css/property-theme-001.css')?>" media="screen" />
		
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
		<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{asset('resources/plugins/pace/pace.js')}}"></script>
	<script src="{{ asset('resources/plugins/datepicker-eyecon/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/main-menu-script.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('resources/plugins/unveil-master/jquery.unveil.js')}}"></script>
	<script type="text/javascript" src="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/js/ug-common-libraries.js')}}"></script> 
    <script type="text/javascript" src="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/js/ug-functions.js')}}"></script>
    <script type="text/javascript" src="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/js/ug-slider.js')}}"></script>
    <script type="text/javascript" src="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/js/ug-gallery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/themes/compact/ug-theme-compact.js')}}"></script>
    <script type="text/javascript" src="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/js/jquery.colorbox.js')}}"></script>
    
 	
	<style type="text/css">
		.show{display: block !important;}
	body, html, .main {
	    height: 100%;
	}

	section {
	    min-height: 100%;
	}
	.main-menu ul{
margin-bottom:0px ;
}

.main-header-area .logo-area {
    margin-top: 16px;
}
.main-header-area .main-menu ul li.active:after {
    bottom: 12px;
}
.main-header-area .logo-area {
    padding: 0px 0;
    }
	</style>
	</head>
 	<body class="wide-layout" cz-shortcut-listen="true"> 
		<div class="wrapper">
			<header>
				<div class="main-header-area">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-right">
								<ul class="list-inline list-unstyled list-login">
								    

									<?php if (Auth::check()){ ?>
									<li><a class="loginbutton" href="http://propertimatch.craftedium.xyz/auth/logout">Logout</a></li>
									<li>|</li>
									<li><a class="loginbutton" href="http://propertimatch.craftedium.xyz/owner/dashboard">Dashboard</a></li>
									<?php }else{ ?>
									<li><a class="loginbutton" href="http://propertimatch.craftedium.xyz/register">Sign Up</a></li>
									<li>|</li>
									<li><a class="loginbutton" href="http://propertimatch.craftedium.xyz/login">Buyer Login</a></li>
									<li>|</li>
									<li><a class="loginbutton" href="http://propertimatch.craftedium.xyz/login">Seller Login</a></li>
									<?php } ?>
								</ul>
							
							
							<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

							
							<div class="currency">
							<select name="from">
							<option value="AED">United Arab Emirates Dirham (AED)</option>
							<option value="AFN">Afghan Afghani (AFN)</option>
							<option value="ALL">Albanian Lek (ALL)</option>
							<option value="AMD">Armenian Dram (AMD)</option>
							<option value="ANG">Netherlands Antillean Guilder (ANG)</option>
							<option value="AOA">Angolan Kwanza (AOA)</option>
							<option value="ARS">Argentine Peso (ARS)</option>
							<option value="AUD">Australian Dollar (A$)</option>
							<option value="AWG">Aruban Florin (AWG)</option>
							<option value="AZN">Azerbaijani Manat (AZN)</option>
							<option value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</option>
							<option value="BBD">Barbadian Dollar (BBD)</option>
							<option value="BDT">Bangladeshi Taka (BDT)</option>
							<option value="BGN">Bulgarian Lev (BGN)</option>
							<option value="BHD">Bahraini Dinar (BHD)</option>
							<option value="BIF">Burundian Franc (BIF)</option>
							<option value="BMD">Bermudan Dollar (BMD)</option>
							<option value="BND">Brunei Dollar (BND)</option>
							<option value="BOB">Bolivian Boliviano (BOB)</option>
							<option value="BRL">Brazilian Real (R$)</option>
							<option value="BSD">Bahamian Dollar (BSD)</option>
							<option value="BTC">Bitcoin (à¸¿)</option>
							<option value="BTN">Bhutanese Ngultrum (BTN)</option>
							<option value="BWP">Botswanan Pula (BWP)</option>
							<option value="BYN">BYN (BYN)</option>
							<option value="BYR">Belarusian Ruble (BYR)</option>
							<option value="BZD">Belize Dollar (BZD)</option>
							<option value="CAD">Canadian Dollar (CA$)</option>
							<option value="CDF">Congolese Franc (CDF)</option>
							<option value="CHF">Swiss Franc (CHF)</option>
							<option value="CLF">Chilean Unit of Account (UF) (CLF)</option>
							<option value="CLP">Chilean Peso (CLP)</option>
							<option value="CNH">CNH (CNH)</option>
							<option value="CNY">Chinese Yuan (CNÂ¥)</option>
							<option value="COP">Colombian Peso (COP)</option>
							<option value="CRC">Costa Rican ColÃ³n (CRC)</option>
							<option value="CUP">Cuban Peso (CUP)</option>
							<option value="CVE">Cape Verdean Escudo (CVE)</option>
							<option value="CZK">Czech Republic Koruna (CZK)</option>
							<option value="DEM">German Mark (DEM)</option>
							<option value="DJF">Djiboutian Franc (DJF)</option>
							<option value="DKK">Danish Krone (DKK)</option>
							<option value="DOP">Dominican Peso (DOP)</option>
							<option value="DZD">Algerian Dinar (DZD)</option>
							<option value="EGP">Egyptian Pound (EGP)</option>
							<option value="ERN">Eritrean Nakfa (ERN)</option>
							<option value="ETB">Ethiopian Birr (ETB)</option>
							<option value="EUR">Euro (â‚¬)</option>
							<option value="FIM">Finnish Markka (FIM)</option>
							<option value="FJD">Fijian Dollar (FJD)</option>
							<option value="FKP">Falkland Islands Pound (FKP)</option>
							<option value="FRF">French Franc (FRF)</option>
							<option value="GBP">British Pound (Â£)</option>
							<option value="GEL">Georgian Lari (GEL)</option>
							<option value="GHS">Ghanaian Cedi (GHS)</option>
							<option value="GIP">Gibraltar Pound (GIP)</option>
							<option value="GMD">Gambian Dalasi (GMD)</option>
							<option value="GNF">Guinean Franc (GNF)</option>
							<option value="GTQ">Guatemalan Quetzal (GTQ)</option>
							<option value="GYD">Guyanaese Dollar (GYD)</option>
							<option value="HKD">Hong Kong Dollar (HK$)</option>
							<option value="HNL">Honduran Lempira (HNL)</option>
							<option value="HRK">Croatian Kuna (HRK)</option>
							<option value="HTG">Haitian Gourde (HTG)</option>
							<option value="HUF">Hungarian Forint (HUF)</option>
							<option value="IDR">Indonesian Rupiah (IDR)</option>
							<option value="IEP">Irish Pound (IEP)</option>
							<option value="ILS">Israeli New Sheqel (â‚ª)</option>
							<option value="INR">Indian Rupee (â‚¹)</option>
							<option value="IQD">Iraqi Dinar (IQD)</option>
							<option value="IRR">Iranian Rial (IRR)</option>
							<option value="ISK">Icelandic KrÃ³na (ISK)</option>
							<option value="ITL">Italian Lira (ITL)</option>
							<option value="JMD">Jamaican Dollar (JMD)</option>
							<option value="JOD">Jordanian Dinar (JOD)</option>
							<option value="JPY">Japanese Yen (Â¥)</option>
							<option value="KES">Kenyan Shilling (KES)</option>
							<option value="KGS">Kyrgystani Som (KGS)</option>
							<option value="KHR">Cambodian Riel (KHR)</option>
							<option value="KMF">Comorian Franc (KMF)</option>
							<option value="KPW">North Korean Won (KPW)</option>
							<option value="KRW">South Korean Won (â‚&copy;)</option>
							<option value="KWD">Kuwaiti Dinar (KWD)</option>
							<option value="KYD">Cayman Islands Dollar (KYD)</option>
							<option value="KZT">Kazakhstani Tenge (KZT)</option>
							<option value="LAK">Laotian Kip (LAK)</option>
							<option value="LBP">Lebanese Pound (LBP)</option>
							<option value="LKR">Sri Lankan Rupee (LKR)</option>
							<option value="LRD">Liberian Dollar (LRD)</option>
							<option value="LSL">Lesotho Loti (LSL)</option>
							<option value="LTL">Lithuanian Litas (LTL)</option>
							<option value="LVL">Latvian Lats (LVL)</option>
							<option value="LYD">Libyan Dinar (LYD)</option>
							<option value="MAD">Moroccan Dirham (MAD)</option>
							<option value="MDL">Moldovan Leu (MDL)</option>
							<option value="MGA">Malagasy Ariary (MGA)</option>
							<option value="MKD">Macedonian Denar (MKD)</option>
							<option value="MMK">Myanmar Kyat (MMK)</option>
							<option value="MNT">Mongolian Tugrik (MNT)</option>
							<option value="MOP">Macanese Pataca (MOP)</option>
							<option value="MRO">Mauritanian Ouguiya (MRO)</option>
							<option value="MUR">Mauritian Rupee (MUR)</option>
							<option value="MVR">Maldivian Rufiyaa (MVR)</option>
							<option value="MWK">Malawian Kwacha (MWK)</option>
							<option value="MXN">Mexican Peso (MX$)</option>
							<option value="MYR">Malaysian Ringgit (MYR)</option>
							<option value="MZN">Mozambican Metical (MZN)</option>
							<option value="NAD">Namibian Dollar (NAD)</option>
							<option value="NGN">Nigerian Naira (NGN)</option>
							<option value="NIO">Nicaraguan CÃ³rdoba (NIO)</option>
							<option value="NOK">Norwegian Krone (NOK)</option>
							<option value="NPR">Nepalese Rupee (NPR)</option>
							<option value="NZD">New Zealand Dollar (NZ$)</option>
							<option value="OMR">Omani Rial (OMR)</option>
							<option value="PAB">Panamanian Balboa (PAB)</option>
							<option value="PEN">Peruvian Nuevo Sol (PEN)</option>
							<option value="PGK">Papua New Guinean Kina (PGK)</option>
							<option value="PHP">Philippine Peso (PHP)</option>
							<option value="PKG">PKG (PKG)</option>
							<option value="PKR">Pakistani Rupee (PKR)</option>
							<option value="PLN">Polish Zloty (PLN)</option>
							<option value="PYG">Paraguayan Guarani (PYG)</option>
							<option value="QAR">Qatari Rial (QAR)</option>
							<option value="RON">Romanian Leu (RON)</option>
							<option value="RSD">Serbian Dinar (RSD)</option>
							<option value="RUB">Russian Ruble (RUB)</option>
							<option value="RWF">Rwandan Franc (RWF)</option>
							<option value="SAR">Saudi Riyal (SAR)</option>
							<option value="SBD">Solomon Islands Dollar (SBD)</option>
							<option value="SCR">Seychellois Rupee (SCR)</option>
							<option value="SDG">Sudanese Pound (SDG)</option>
							<option value="SEK">Swedish Krona (SEK)</option>
							<option value="SGD">Singapore Dollar (SGD)</option>
							<option value="SHP">St. Helena Pound (SHP)</option>
							<option value="SKK">Slovak Koruna (SKK)</option>
							<option value="SLL">Sierra Leonean Leone (SLL)</option>
							<option value="SOS">Somali Shilling (SOS)</option>
							<option value="SRD">Surinamese Dollar (SRD)</option>
							<option value="STD">SÃ£o TomÃ&copy; &amp; PrÃ­ncipe Dobra (STD)</option>
							<option value="SVC">Salvadoran ColÃ³n (SVC)</option>
							<option value="SYP">Syrian Pound (SYP)</option>
							<option value="SZL">Swazi Lilangeni (SZL)</option>
							<option value="THB">Thai Baht (THB)</option>
							<option value="TJS">Tajikistani Somoni (TJS)</option>
							<option value="TMT">Turkmenistani Manat (TMT)</option>
							<option value="TND">Tunisian Dinar (TND)</option>
							<option value="TOP">Tongan PaÊ»anga (TOP)</option>
							<option value="TRY">Turkish Lira (TRY)</option>
							<option value="TTD">Trinidad &amp; Tobago Dollar (TTD)</option>
							<option value="TWD">New Taiwan Dollar (NT$)</option>
							<option value="TZS">Tanzanian Shilling (TZS)</option>
							<option value="UAH">Ukrainian Hryvnia (UAH)</option>
							<option value="UGX">Ugandan Shilling (UGX)</option>
							<option value="USD">US Dollar ($)</option>
							<option value="UYU">Uruguayan Peso (UYU)</option>
							<option value="UZS">Uzbekistani Som (UZS)</option>
							<option value="VEF">Venezuelan BolÃ­var (VEF)</option>
							<option value="VND">Vietnamese Dong (â‚«)</option>
							<option value="VUV">Vanuatu Vatu (VUV)</option>
							<option value="WST">Samoan Tala (WST)</option>
							<option value="XAF">Central African CFA Franc (FCFA)</option>
							<option value="XCD">East Caribbean Dollar (EC$)</option>
							<option value="XDR">Special Drawing Rights (XDR)</option>
							<option value="XOF">West African CFA Franc (CFA)</option>
							<option value="XPF">CFP Franc (CFPF)</option>
							<option value="YER">Yemeni Rial (YER)</option>
							<option value="ZAR">South African Rand (ZAR)</option>
							<option value="ZMK">Zambian Kwacha (1968â€“2012) (ZMK)</option>
							<option value="ZMW">Zambian Kwacha (ZMW)</option>
							<option value="ZWL">Zimbabwean Dollar (2009) (ZWL)</option>
							</select>	
							</div>
							</div>
						</div>
						<div class="row nav-cos-xs">
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-8">
								<div class="logo-area"> 
									<a href="{{url()}}">
										<img src="{{asset('img/'.$settings->logo_dark)}}" alt="{{$settings->site_title}}" class="img-responsive" width="235px" />
									</a>
								</div>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 mobile-nav">
								@include('layouts.default._navigation')
							</div>
						</div>
					</div>
				</div>
			</header>
    
			<!-- Body: Page Contents -->
			<!-- Navigation: Top-bar -->
			<!-- Load/Execute the code for contents from the view page. -->
    
			@yield('contents')
		
		</div>
		<!-- Footer -->
		<footer id="footer" class="footer-area bg-2 bg-opacity-black-90"> 
			<div class="footer-bottom">
				<div class="container">
				    
				    
				    
				    <div class="row">
				    
				   <p class="text-left5">MatchPropertyDirect™ is proud to donate 1 percent of the net profits to an animal shelter. We will change each year and choose different areas where there is the need.</p>
				    
				    
				    </div>
				    
				    
					<div class="row main-footer">
						<div class="col-md-5 col-xs-12">
							<div class="copyright text-center">
								<p class="text-left"> Use of this website constitutes acceptance of the MatchPropertyDirect.com <br> &copy; Copyright 2017-Present <a href="#"><b>MatchPropertyDirect.com</b></a>. LLC All rights reserved.</p>
							</div>
						</div>
						<div class="col-md-3 col-xs-12 text-center">
							<ul class="social-icon mt-10 m-t-7">
								<li>  
									<a href="{{$settings->facebook}}"><i class="fa fa-facebook"></i></a>						   
								</li>
								<li>  
									<a href="{{$settings->twitter}}"><i class="fa fa-twitter"></i></a>						   
								</li>
								<li>  
									<a href="{{$settings->googleplus}}"><i class="fa fa-google"></i></a>						   
								</li>
								<li>  
									<a href="{{$settings->linkedin}}"><i class="fa fa-linkedin"></i></a>						   
								</li>
							</ul>
						</div>
						<div class="col-md-4 col-xs-12 sub-links-main">
							<div class="copyright copyr8-cs terms pull-right sub-links">
										<a href="{{url('terms')}}" class="ft-btm-link left-pull">Terms</a>
										<a href="{{url('privacy')}}" class="ft-btm-link">Privacy Policy</a>
										<a href="{{url('contentguidelines')}}" class="ft-btm-link">Content Guidelines</a>
									<!--	<a href="{{url('faq')}}" class="ft-btm-link left-pull">FAQ</a>--> 
									
									<p class="text-right text-com-cs">Designed By <a rel="nofollow" target="_blank" href="http://www.craftedium.com/"> Craftedium</a></p>
							</div>
						</div>
					</div>
					<div class="row disclaimer-row">
						<div class="col-xs-12">
							<div class="copyright text-center">
						<p class="text-left disclaimer-text"><span class="disclaimer-h4">Disclaimer : </span>Match Property Direct asks that the site users only use thesite for the purpose of connecting to buy or sell property. We ask that all of our users be completely honest in all representations and actions as well as abiding by all laws.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>   

<script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/themes/default/ug-theme-default.js')}}"></script>
	<script type="text/javascript" src="{{ asset('resources/plugins/unitegallery-master/source/unitegallery/js/jquery.pajinate.js')}}"></script>
	<script type="text/javascript">
			$(document).ready(function(){
				$('#paging_container7').pajinate({
					num_page_links_to_display : 3,
					items_per_page : 6	
				});
			});	
		</script>



    <!-- End of Footer -->
    <script src="{{ asset('resources/bootstrap-3.3.5-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/toucheffects.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/jquery.nivo.slider.js') }}"></script> 
	<script src="{{ asset('js/ajax-mail.js') }}"></script> 
	<script src="{{ asset('js/plugins.js') }}"></script> 
	<script src="{{ asset('js/main.js') }}"></script>
    <!-- Sliders -->
    <script>
      $('.carousel').carousel({
      
      interval: 5000 //controls the slider speed
      
      })
      
    </script>
	<script>
		$(document).ready(function(){
			$('.main-menu ul li:last-child a').addClass('button-orange');
			$("#top_nav_43 a").attr("id","scroll-down");
			$("#top_nav_43 a").attr("href","http://propertimatch.craftedium.xyz/#page-content");
			 $(".main-menu ul li:last-child a").prepend("<span><i class='fa fa-sign-in'></i></span>");
		});
		$(document).on("click", ".more-filter", function () {
			$('.search-home').addClass('show');
			$(".search-home").fadeIn(300);
			if($(window).width() < 768)
				$(".button-1.btn-block.btn-hover-1").fadeOut(300);
				$(".button-1.btn-block.btn-hover-1.mobile-button").fadeIn(300);
			$(".more-filter").addClass("closefilter");
			$('.closefilter').removeClass('more-filter');
		});
		$(document).on("click", ".closefilter", function () {
			$(".closefilter").addClass("more-filter");
			$('.more-filter').removeClass('closefilter');
			$('.search-home').removeClass('show');
			if($(window).width() < 768)
				$(".button-1.btn-block.btn-hover-1").fadeIn(300);
				$(".button-1.btn-block.btn-hover-1.mobile-button").fadeOut(300);
		});
	</script>
	<script>
		$(function() {
			$(".img-preload").unveil(300);
		});
    </script>
    <!-- Customize Date Picker -->
   
    <!-- End of Customize Date Picker -->
    <!-- Picture Gallery -->
    <!-- jQuery required >= 1.8.0  | jQuery already included in the head jquery-2.1.0.js -->
    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lightgallery.js')}}"></script>
    <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
    <!-- lightgallery plugins -->
    <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script src="{{ asset('resources/plugins/lightGallery-master/dist/js/lg-video.js')}}"></script>
    <!-- End of Picture Gallery -->
    <!-- Load the javascript code defined in the view page. -->
    @yield('javascript')
	 <script>
      $(window).load(function(){
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var checkin = $('#checkin').datepicker({
			onRender: function(date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}
        }).on('changeDate', function(ev) {
      
        if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
		$('#checkout')[0].focus();
        }).data('datepicker');
      
        var checkout = $('#checkout').datepicker({
			onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
      
        }).on('changeDate', function(ev) {
      
          checkout.hide();
      
        }).data('datepicker');
      
      });
      
      
      /* Config Date Picker */
      
      $(window).load(function(){
      var nowTemp = new Date();
      var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
      var checkin = $('#arrival').datepicker({
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
      }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#departure')[0].focus();
      }).data('datepicker');
      var checkout = $('#departure').datepicker({
      onRender: function(date) {
      
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      
      }
      
      }).on('changeDate', function(ev) {
      
      checkout.hide();
      
      }).data('datepicker');
      
      });
      
      /* End Config Date Picker SET-2 */
      
    </script>
	<script type="text/javascript">
 $(document).ready(function(){
   $("#unite-gallery").unitegallery({
    gallery_autoplay:true
   });
 });
</script>

<script>
	$('a[href*="#"]')
  
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
	</script>
<script>
jQuery(document).ready(function($){ 	
			if($(window).width() < 768){
				$(".main-menu .has-sub").click(function(){
					$(this).children("ul").slideToggle();
				});
			}
		});
</script>
  </body>
</html>