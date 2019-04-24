
var rate_per_kwh_bill;
var rate_per_kwh_size;
var system_price_arr;
	
jQuery(document).ready(function() {
    // jQuery("#testimonial").owlCarousel({
        // items: 1,
        // lazyLoad: true,
        // slideSpeed: 2000,
        // paginationSpeed: 2000,
        // lazyLoad: true,
        // stopOnHover: true,
        // autoPlay: true,
        // itemsDesktop: [1170, 1], //5 items between 1000px and901px 
        // itemsDesktopSmall: [900, 1], // betweem 900px and 601px 
        // itemsTablet: [600, 1], //2 items between 600 and 0 
        // itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option       
    // });
    // wow = new WOW({
        // animateClass: 'animated',
        // offset: 50,
        // callback: function(box) {
            // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        // }
    // });
    // wow.init();
    // /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
    // particlesJS.load('particles-js', 'frontassets/js/particles.json', function() {
        // console.log('callback - particles.js config loaded');
    // });
	
	$.ajax({
		url: "get_rates",
		dataType: "JSON",
		data: {type:'On Bill Selection'},
        type: 'GET',
        success: function(result) {
			rate_per_kwh_bill=result;
        }
	});
	
	$.ajax({
		url: "get_rates",
		dataType: "JSON",
		data: {type:'On Size Selection'},
        type: 'GET',
        success: function(result) {
			rate_per_kwh_size=result;
        }
	});
	
	$.ajax({
		url: "get_rates",
		dataType: "JSON",
		data: {type:'For System Price'},
        type: 'GET',
        success: function(result) {
			system_price_arr=result;
        }
	});
});


  


// function userregister() {
    // var _token = $("input[name*='_token']").val();
    // var fname = $("#fname").val();
    // var lname = $("#lname").val();
    // var email = $("#email").val();
    // var phone = $("#phone").val();
    // $.ajax({
        // url: "userregister",
        // data: {
            // _token: _token,
            // fname: fname,
            // lname: lname,
            // email: email,
            // phone: phone
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#register").removeClass("show");
            // $("#register").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(result) {
            // if (result == 'emailexist') {
                // $("#register").removeClass("hide");
                // $("#register").addClass("show");
                // $("#phoneerror").html('');
                // $("#emailerror").html('Email address already exists');
                // jQuery("#showloading").html('');
            // } else if (result == 'phonexist') {
                // $("#register").removeClass("hide");
                // $("#register").addClass("show");
                // $("#emailerror").html('');
                // $("#phoneerror").html('Phone number already exists');
                // jQuery("#showloading").html('');
            // } else if (result == 'doneregistration') {
                // $("#sucessregister").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Your Account details have been emailed to you and an activation code was just sent to your phone! ' + phone + '.</div>');
                // $(".entry-title").html('Activate Account');
                // $(".entry-sub-title").html('Fill in the registration code and activate your account');
                // $("#emailerror").html('');
                // $("#phoneerror").html('');
                // $("#register").removeClass("show");
                // $("#register").addClass("hide");
                // $("#confirmationcode").removeClass("hide");
                // $("#confirmationcode").addClass("show");
                // jQuery("#showloading").html('');
            // }
        // },
        // error: function() {}
    // });
// }

// function userconfirmationcode() {
    // var _token = $("input[name*='_token']").val();
    // var confirm_code = $("#confirm_code").val();
    // $.ajax({
        // url: "usercode",
        // data: {
            // _token: _token,
            // confirm_code: confirm_code
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#confirmationcode").removeClass("show");
            // $("#confirmationcode").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(result) {
            // if (result.title == 'codenotexist') {
                // $("#confirmationcode").removeClass("hide");
                // $("#confirmationcode").addClass("show");
                // $("#codeerror").html('Invalid Verification Code');
                // jQuery("#showloading").html('');
                // jQuery("#sucessregister").html('');
            // } else if (result.title == 'codeexist') {
                // $("#confirmationcode").removeClass("show");
                // $("#confirmationcode").addClass("hide");
                $("#sucessregister").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Your account your activate now. Please check your email with the given login credentials.</div>');
                // $("#sucessregister").html('');
                // $("#codeerror").html('');
                // jQuery("#showloading").html('');
                // $(".entry-title").html('Address Confirmation');
                // $(".entry-sub-title").html('Enter your address below or select a pin from the map to your location.');
				// if(result.pass){
					// userautologin(result.username, result.pass);
				// }
                // else{
					// useraddrsel(result.username);
				// }
            // }
        // },
        // error: function() {}
    // });
// }

// $(document).on("click", ".forget", function() {
    // $("#forgetpanel").removeClass("hide");
    // $("#forgetpanel").addClass("show");
    // $("#loginpanel").removeClass("show");
    // $("#loginpanel").addClass("hide");
// });

// function usersendinpass() {
    // var _token = $("input[name*='_token']").val();
    // var email = $("#email").val();
    // $.ajax({
        // url: "submitchangepassword",
        // data: {
            // _token: _token,
            // email: email
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#forgetpanel").removeClass("show");
            // $("#forgetpanel").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(result) {
            // if (result == 'passwordnotmatch') {
                // $("#forgetmessages").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Invalid Email Address.</div>');
                // jQuery("#showloading").html('');
                // $("#forgetpanel").removeClass("hide");
                // $("#forgetpanel").addClass("show");
            // } else if (result == 'passwordsend') {
                // $("#forgetmessages").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Please check your email and login with new credentials.</div>');
                // jQuery("#showloading").html('');
                // $("#forgetpanel").removeClass("show");
                // $("#forgetpanel").addClass("hide");
                // $("#loginpanel").removeClass("hide");
                // $("#loginpanel").addClass("show");
            // }
        // },
        // error: function() {}
    // });
// }

// function getCookie(cname) {
    // var name = cname + "=";
    // var decodedCookie = decodeURIComponent(document.cookie);
    // var ca = decodedCookie.split(';');
    // for (var i = 0; i < ca.length; i++) {
        // var c = ca[i];
        // while (c.charAt(0) == ' ') {
            // c = c.substring(1);
        // }
        // if (c.indexOf(name) == 0) {
            // return c.substring(name.length, c.length);
        // }
    // }
    // return "";
// }

// function resendconfirmcode() {
    // var _token = $("input[name*='_token']").val();
    // var register_email = getCookie("register_email");
    // $.ajax({
        // url: "usercoderesend",
        // data: {
            // _token: _token,
            // register_email: register_email
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#confirmationcode").removeClass("show");
            // $("#confirmationcode").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(result) {
            // if (result == 'codenotsend') {
                // $("#confirmationcode").removeClass("hide");
                // $("#confirmationcode").addClass("show");
                // jQuery("#showloading").html('');
            // } else if (result == 'coderesend') {
                // $("#confirmationcode").removeClass("hide");
                // $("#confirmationcode").addClass("show");
                // jQuery("#showloading").html('');
                // $("#sucessregister").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>An activation code was just sent to your phone!.</div>');
            // }
        // },
        // error: function() {}
    // });
// }

// function useraddrsel(username) {
	// $("#confirmationcode").removeClass("show");
	// $("#confirmationcode").addClass("hide");
	// $("#useraddress").removeClass("hide");
	// $("#useraddress").addClass("show");
	// $("#sucessregister").html('');
	// $("#codeerror").html('');
	// jQuery("#showloading").html('');
	// $(".entry-title").html('Address Confirmation');
	// $(".entry-sub-title").html('Enter your address below or select a pin from the map to your location.');
	// $("#loginpanel").load(location.href + " #loginpanel");
// }

// function userautologin(username, pass) {
    // var username = username;
    // var pass = pass;
    // var _token = $("input[name*='_token']").val();
    // $.ajax({
        // url: "user/autologin",
        // data: {
            // _token: _token,
            // useremail: username,
            // userpassword: pass
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#confirmationcode").removeClass("show");
            // $("#confirmationcode").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(result) {
            // if (result == 'notlogin') {
                // $("#confirmationcode").removeClass("hide");
                // $("#confirmationcode").addClass("show");
                // $("#codeerror").html('Code does not exists');
                // jQuery("#showloading").html('');
                // jQuery("#sucessregister").html('');
            // } else if (result == 'loginsuccess') {
                // $("#confirmationcode").removeClass("show");
                // $("#confirmationcode").addClass("hide");
                // $("#useraddress").removeClass("hide");
                // $("#useraddress").addClass("show");
                $("#sucessregister").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Your account your activate now. Please check your email with the given login credentials.</div>');
                // $("#sucessregister").html('');
                // $("#codeerror").html('');
                // jQuery("#showloading").html('');
                // $(".entry-title").html('Address Confirmation');
                // $(".entry-sub-title").html('Enter your address below or select a pin from the map to your location.');
                // $("#loginpanel").load(location.href + " #loginpanel");
            // }
        // },
        // error: function() {}
    // });
// }

// function addressconfirm() {
    // var _token = $("input[name*='_token']").val();
    // $.ajax({
        // url: "useraddressconfirm",
        // data: {
            // _token: _token
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#useraddress").removeClass("show");
            // $("#useraddress").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(result) {
            // if (result == 'addressconfirm') {
                // $("#usermap").removeClass("hide");
                // $("#usermap").addClass("show");
                // jQuery("#showloading").html('');
                // saveaddress();
            // }
        // },
        // error: function() {}
    // });
// }

// $(function() {
	// if (navigator.geolocation) {
        // navigator.geolocation.getCurrentPosition(showPosition);
    // } else {
        // alert("Geolocation is not supported by this browser.");
    // }
	
    // $('.phone_us').mask('(000) 000-0000');
    
// });

// function showPosition(position) {
    // $.get('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ',' + position.coords.longitude + '&key=AIzaSyDDUCHzlUnF7YwDC_OfKHAuHNkJ_BzIjoA&sensor=true', function(data) {
        // $("#formatted_address").val(data.results[0].formatted_address);
        // $("#geocomplete").val(data.results[0].formatted_address);
		// $("#geocomplete").geocomplete({
			// map: ".map_canvas",
			// location: data.results[0].formatted_address,
			// markerOptions: {
				// draggable: true
			// }
		// });
		// $("#geocomplete").bind("geocode:dragged", function(event, latLng) {
			// $("input[name=lat]").val(latLng.lat());
			// $("input[name=lng]").val(latLng.lng());
			// $("input[name=formatted_address]").geocomplete("find", latLng.lat() + "," + latLng.lng());
			// setaddress();
		// });
		
    // });
// }

// function setaddress() {
    // var formatted_address = $("#formatted_address").val();
    // if (formatted_address != ''){
        // document.getElementById('geocomplete').value = formatted_address;
    // }
// }

// function saveaddress() {
    // var _token = $("input[name*='_token']").val();
    // var geocomplete = $("#geocomplete").val();
    // $.ajax({
        // url: "saveaddress",
        // data: {
            // _token: _token,
            // geocomplete: geocomplete
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#usermap").removeClass("show");
            // $("#usermap").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
            // $("#sucessregister").html('');
        // },
        // success: function(result) {
            // if (result == 'addressdone') {
                // $(".entry-title").html('SYSTEM SELECTION');
                // $(".entry-sub-title").html('Select your desired solar system from the option below');
                // $("#sucessregister").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Excellent! </strong>Your address has been confirmed!</div>');
                // jQuery("#showloading").html('');
                // $("#systemselection").removeClass("hide");
                // $("#systemselection").addClass("show");
                // $(window).scrollTop(0);
            // }
        // },
        // error: function() {}
    // });
// }

// function backtoaddress() {
    // $("#usermap").removeClass("show");
    // $("#usermap").addClass("hide");
    // $("#useraddress").removeClass("hide");
    // $("#useraddress").addClass("show");
// }

$(document).on('input', '#elec_bill', function() {
	var monthly_bill = $(this).val();
    var yearly_bill = monthly_bill * 12;
	for (var i = 0; i < rate_per_kwh_bill.length; i++) {
		if (rate_per_kwh_bill[i].min_fac < monthly_bill && rate_per_kwh_bill[i].max_fac >= monthly_bill) {
			var rate_per_kwh=rate_per_kwh_bill[i].rate;
			var electricity_need = Math.ceil(yearly_bill / rate_per_kwh);
			var sys_size = Math.ceil(electricity_need / 1.5); //system production
			document.getElementById('sys_size').value = sys_size;
			$('#elec_bill_val').html(monthly_bill);
			$('#sys_size_val').html(sys_size);
			slider_calc(sys_size, monthly_bill);
		}
	}

    // $('#elec_bill_val').html(avg_monthly_static);
    // $('#totlprc').html('<small>ESTD. PRICE</small> <br />$'+sum);
    // $('#numyrs').html('$ '+sum);	
    // document.getElementById('electric_bill').value = sum;
    //document.getElementById('sys_size').value = avg_monthly_static;
});

$(document).on('input', '#sys_size', function() {
	var sys_size = $(this).val();
    var electricity_need = sys_size * 1.5;
	for (var i = 0; i < rate_per_kwh_size.length; i++) {
		if (rate_per_kwh_size[i].min_fac < sys_size && rate_per_kwh_size[i].max_fac >= sys_size) {
			var rate_per_kwh=rate_per_kwh_size[i].rate;
			var yearly_bill = electricity_need * rate_per_kwh;
			var monthly_bill = Math.ceil(yearly_bill / 12);
			document.getElementById('elec_bill').value = monthly_bill;
			$('#elec_bill_val').html(monthly_bill);
			$('#sys_size_val').html(sys_size);
			slider_calc(sys_size, monthly_bill);
		}
	}	
});



function slider_calc(sys_size, monthly_bill) {
    var no_of_solar_panel = Math.ceil(sys_size / 300);
    var size_kw = (parseInt(no_of_solar_panel) * 300);
    var system_size_kw = parseInt(size_kw) / 1000;
    var system_production = (size_kw * 1.5);
	
	for (var i = 0; i < system_price_arr.length; i++) {
		if (system_price_arr[i].min_fac < system_size_kw && system_price_arr[i].max_fac >= system_size_kw) {
			var system_price=system_price_arr[i].rate;
			var total_system_price = Math.ceil(size_kw * system_price);
			var tax_credit = Math.ceil(((total_system_price * 30) / 100));
			var incentives_rebates = parseInt(total_system_price) - parseInt(tax_credit);
			var monthly_payment = Math.round(parseInt(total_system_price) * 0.0048092);

			var year_total = 25;
			var multiplier = 1.06;
			var avg_monthly_dynamic = monthly_bill;
			var arr_monthly = [];
			var arr_yearly = [];
			for (var i = 1; i <= year_total; i++) {
				arr_monthly.push(avg_monthly_dynamic);
				var yearly = avg_monthly_dynamic * 12;
				arr_yearly.push(yearly);
				var avg_monthly_dynamic = avg_monthly_dynamic * multiplier;
			}
			var sum = 0;
			for (var j = 0; j < arr_yearly.length; j++) {
				sum += arr_yearly[j]
			}


			$('#kwatt').html(system_production + ' kWh');
			$('#numyrs').html('$' + Math.round(sum).toLocaleString());
			$('#incent').html('$' + incentives_rebates.toLocaleString());
			$('#tax').html('$' + tax_credit.toLocaleString());
			$('#size').html(system_size_kw);
			$('#panel').html(no_of_solar_panel);
			// $('#invert').html('SE6000H-US');

			document.getElementById('electric_bill').value = total_system_price;
			document.getElementById('electric_kwatt').value = sys_size;
			document.getElementById('estyrs').value = Math.round(sum);
			document.getElementById('incentives').value = incentives_rebates;
			document.getElementById('oldincentives').value = incentives_rebates;
			document.getElementById('taxes').value = tax_credit;
			document.getElementById('systemsize').value = system_size_kw;
			document.getElementById('numberpanel').value = no_of_solar_panel;
			$('#totlprc').html('<small>ESTD. PRICE</small> <br />$' + total_system_price.toLocaleString());
        }
	}
}

// $(document).on("click", ".gobackaddress", function() {
    // $("#systemselection").removeClass("show");
    // $("#systemselection").addClass("hide");
    // $("#useraddress").removeClass("hide");
    // $("#useraddress").addClass("show");
// });

// $(document).on("click", ".addcart", function() {
    // var _token = $("input[name*='_token']").val();
    // var electric_bill = $("#electric_bill").val();
    // var electric_kwatt = $("#electric_kwatt").val();
    // var estyrs = $("#estyrs").val();
    // var incentives = $("#incentives").val();
    // var taxes = $("#taxes").val();
    // var systemsize = $("#systemsize").val();
    // var panelmake = $("#panelmake").val();
    // var panelmodel = $("#panelmodel").val();
    // var numberpanel = $("#numberpanel").val();
    // var inverter = $("#inverter").val();
    // var numberinverter = $("#numberinverter").val();
    // if (electric_bill == 0) {
        // $("#sucessregister").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Select average electricity bill before add to cart.</div>');
    // } else {
        // $.ajax({
            // url: "addcarts",
            // data: {
                // _token: _token,
                // electric_bill: electric_bill,
                // electric_kwatt: electric_kwatt,
                // estyrs: estyrs,
                // incentives: incentives,
                // taxes: taxes,
                // systemsize: systemsize,
                // panelmake: panelmake,
                // panelmodel: panelmodel,
                // numberpanel: numberpanel,
                // inverter: inverter,
                // numberinverter: numberinverter
            // },
            // type: 'POST',
            // beforeSend: function() {
                // $("#systemselection").removeClass("show");
                // $("#systemselection").addClass("hide");
                // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
                // $("#sucessregister").html('');
            // },
            // success: function(result) {
                // if (result == 'cartadd') {
                    // $(".entry-title").html('PAYMENT INFORMATION');
                    // $(".entry-sub-title").html('Review your cart and pay via your desired payment method');
                    // $("#sucessregister").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Item add in your cart.</div>');
                    // jQuery("#showloading").html('');
                    // $("#timer").removeClass("hide");
                    // $("#timer").addClass("show");
                    // startTimer();
                    $("#cartpanel").load(location.href + " #cartpanel");
                    $("#cartpanel").removeClass("hide");
                    $("#cartpanel").addClass("show");
                    // getcartitems();
                // }
            // },
            // error: function() {}
        // });
    // }
// });

// $(document).on("click", ".gobackcartpanel", function() {
    // $("#cartpanel").removeClass("show");
    // $("#cartpanel").addClass("hide");
    // $("#systemselection").removeClass("hide");
    // $("#systemselection").addClass("show");
    // $("#timer").removeClass("show");
    // $("#timer").addClass("hide");
// });

// function getcartitems() {
    // var _token = $("input[name*='_token']").val();
    // $.ajax({
        // url: "showcartitems",
        // data: {
            // _token: _token
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#systemselection").removeClass("show");
            // $("#systemselection").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
            // $("#sucessregister").html('');
        // },
        // success: function(result) {
            // $(".entry-title").html('PAYMENT INFORMATION');
            // $(".entry-sub-title").html('Review your cart and pay via your desired payment method');
            // jQuery("#showloading").html('');
            // $("#cartpanel").removeClass("hide");
            // $("#cartpanel").addClass("show");
            // $("#cartpanel").html(result);
        // },
        // error: function() {}
    // });
// }

// $(document).on("click", ".cart_product_delete", function() {
    // var id = $(this).attr("id");
    // var _token = $("input[name*='_token']").val();
    // $.ajax({
        // url: "deleteitem",
        // data: {
            // _token: _token,
            // id: id
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#cartpanel").removeClass("show");
            // $("#cartpanel").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
            // $("#sucessregister").html('');
        // },
        // success: function(result) {
            // if (result == 'delete') {
                // $("#sucessregister").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Item delete in your cart.</div>');
                // jQuery("#showloading").html('');
                // $("#cartpanel").removeClass("hide");
                // $("#cartpanel").addClass("show");
                // getcartitems();
            // }
        // },
        // error: function() {}
    // });
// });

// $(document).on("click", ".paymentsmethods", function() {
    // $("#cartpanel").removeClass("show");
    // $("#cartpanel").addClass("hide");
    // $("#paymentpayment").removeClass("hide");
    // $("#paymentpayment").addClass("show");
    // var totalamount = $('#totalamount').val();
    // document.getElementById('amount').value = totalamount;
    // document.getElementById('stripamount').value = totalamount;
    // $("#paypal-button-container").html('');
    // $("#timer").removeClass("show");
    // $("#timer").addClass("hide");
    // paypalops(totalamount);
// });

// $(document).on("click", ".gobackpayments", function() {
    // $("#paymentpayment").removeClass("show");
    // $("#paymentpayment").addClass("hide");
    // $("#cartpanel").removeClass("hide");
    // $("#cartpanel").addClass("show");
    // $("#timer").removeClass("hide");
    // $("#timer").addClass("show");
// });

// function startTimer() {
    // var timer2 = "10:01";
    // var interval = setInterval(function() {
        // var timer = timer2.split(':');
        // var minutes = parseInt(timer[0], 10);
        // var seconds = parseInt(timer[1], 10);
        // --seconds;
        // minutes = (seconds < 0) ? --minutes : minutes;
        // seconds = (seconds < 0) ? 59 : seconds;
        // seconds = (seconds < 10) ? '0' + seconds : seconds;
        // $('.countdown').html(minutes + ':' + seconds);
        // if (minutes < 0) clearInterval(interval);
        // if ((seconds <= 0) && (minutes <= 0)) clearInterval(interval);
        // timer2 = minutes + ':' + seconds;
    // }, 1000);
// }

// $(document).on("click", ".viewcart", function() {
    // $("#timer").removeClass("hide");
    // $("#timer").addClass("show");
    // startTimer();
    // getcartitems();
// });

// function setSheduleDate() {
    // $("#scheduledate").removeClass("show");
    // $("#scheduledate").addClass("hide");
    // $("#utilitybill").removeClass("hide");
    // $("#utilitybill").addClass("show");
// }

// function userbillupload() {
    // var _token = $("input[name*='_token']").val();
    // var formid = document.getElementById('userutilitybillForm');
    // var loading = '';
    // var formElem = jQuery("#userutilitybillForm");
    // var formdata = new FormData(formElem[0]);
    // jQuery.ajax({
        // url: 'userbillupload',
        // processData: false,
        // contentType: false,
        // data: formdata,
        // timeout: 10000,
        // type: "POST",
        // beforeSend: function() {
            // $("#utilitybill").removeClass("show");
            // $("#utilitybill").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(data) {
            // if (data == 'invalidimage') {
                // $("#utilitybill").removeClass("hide");
                // $("#utilitybill").addClass("show");
                // jQuery("#showloading").html('');
                // jQuery("#fileerror").html('Please upload image only');
            // } else if (data == 'done') {
                // jQuery("#showloading").html('');
                // window.location.href = ''+site_url+'/orderconfirmation';
            // }
        // },
        // error: function() {
            // $("#showloading").html('');
            // $("#utilitybill").removeClass("hide");
            // $("#utilitybill").addClass("show");
            // jQuery("#fileerror").html('Please upload image only');
        // }
    // });
// }

// function usersurvey() {
    // var _token = $("input[name*='_token']").val();
    // var formid = document.getElementById('usersurvey');
    // var loading = '';
    // var formElem = jQuery("#usersurvey");
    // var formdata = new FormData(formElem[0]);
    // jQuery.ajax({
        // url: 'usersurverysubmit',
        // processData: false,
        // contentType: false,
        // data: formdata,
        // timeout: 10000,
        // type: "POST",
        // beforeSend: function() {
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(data) {
            // $("#showloading").html('');
            // $("#sucesssurvey").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Thanks for the Survey.</div>');
        // },
        // error: function() {
            // $("#showloading").html('');
        // }
    // });
// }

// function updateinfo() {
    // var _token = $("input[name*='_token']").val();
    // var formid = document.getElementById('userinforform');
    // var loading = '';
    // var formElem = jQuery("#userinforform");
    // var formdata = new FormData(formElem[0]);
    // jQuery.ajax({
        // url: 'updateinfo',
        // processData: false,
        // contentType: false,
        // data: formdata,
        // timeout: 10000,
        // type: "POST",
        // beforeSend: function() {
            // $("#userinfopanel").removeClass("show");
            // $("#userinfopanel").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
        // },
        // success: function(data) {
            // if (data == 'updateinfo') {
                // $("#showloading").html('');
                // $("#passchange").removeClass("hide");
                // $("#passchange").addClass("show");
                // $("#profilemsg").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>User Info Updated.</div>');
            // } else {
                // $("#showloading").html('');
                // $("#userinfopanel").removeClass("hide");
                // $("#userinfopanel").addClass("show");
                // $("#profilemsg").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> UserInfo not updated try again.</div>');
            // }
        // },
        // error: function() {
            // $("#showloading").html('');
            // $("#userinfopanel").removeClass("hide");
            // $("#userinfopanel").addClass("show");
        // }
    // });
// }

// $(document).on("click", ".onetimeoffer", function() {
    // var _token = $("input[name*='_token']").val();
    // var amount = $(this).attr("amount");
    // var id = $(this).attr("id");
    // var size = $("#size" + id).val();
    // var color = $("#color" + id).val();
    // var title = $(this).attr("title");
    // $.ajax({
        // url: "addonetimeoffr",
        // data: {
            // _token: _token,
            // amount: amount,
            // id: id,
            // size: size,
            // color: color,
            // title: title
        // },
        // type: 'POST',
        // beforeSend: function() {},
        // success: function(result) {
            // if (result == 'adddone') {
                // $(".entry-title").html('ONE TIME OFFER SELECTION');
                // $(".entry-sub-title").html('Review your cart');
                // $("#orderconfirmationpanel").removeClass("show");
                // $("#orderconfirmationpanel").addClass("hide");
                // $("#otocartpanel").removeClass("hide");
                // $("#otocartpanel").addClass("show");
                // getcart_otoitems();
            // } else {

            // }
        // },
        // error: function() {}
    // });
// });

// $(document).on("click", ".backotopanel", function() {
    // $(".entry-title").html('ORDER CONFIRMATION');
    // $(".entry-sub-title").html('');
    // $("#otocartpanel").removeClass("show");
    // $("#otocartpanel").addClass("hide");
    // $("#orderconfirmationpanel").removeClass("hide");
    // $("#orderconfirmationpanel").addClass("show");
// });

// $(document).on("click", ".paynows", function() {
    // $(".entry-title").html('Payment Method');
    // $(".entry-sub-title").html('');
    // $("#otocartpanel").removeClass("show");
    // $("#otocartpanel").addClass("hide");
    // $("#paymentpanel").removeClass("hide");
    // $("#paymentpanel").addClass("show");
    // var totalamount = $('#totalamount').val();
    // document.getElementById('amount').value = totalamount;
    // document.getElementById('stripamount').value = totalamount;
    // $("#paypal-button-container").html('');
    // paypalops(totalamount);
// });

// $(document).on("click", ".backpaymentsoto", function() {
    // $(".entry-title").html('ONE TIME OFFER SELECTION');
    // $(".entry-sub-title").html('Review your cart');
    // $("#paymentpanel").removeClass("show");
    // $("#paymentpanel").addClass("hide");
    // $("#otocartpanel").removeClass("hide");
    // $("#otocartpanel").addClass("show");
// });

// function getcart_otoitems() {
    // var _token = $("input[name*='_token']").val();
    // $.ajax({
        // url: "showcart_otoitems",
        // data: {
            // _token: _token
        // },
        // type: 'POST',
        // beforeSend: function() {},
        // success: function(result) {
            // $("#otocartpanel").removeClass("hide");
            // $("#otocartpanel").addClass("show");
            // $("#otocartpanel").html(result);
        // },
        // error: function() {}
    // });
// }

// $(document).on("click", ".cart_otoproduct_delete", function() {
    // var id = $(this).attr("id");
    // var _token = $("input[name*='_token']").val();
    // $.ajax({
        // url: "deleteitem",
        // data: {
            // _token: _token,
            // id: id
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#otocartpanel").removeClass("show");
            // $("#otocartpanel").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
            // $("#sucessregister").html('');
        // },
        // success: function(result) {
            // if (result == 'delete') {
                // $("#sucessregister").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Item delete in your cart.</div>');
                // jQuery("#showloading").html('');
                // $("#otocartpanel").removeClass("hide");
                // $("#otocartpanel").addClass("show");
                // getcart_otoitems();
            // }
        // },
        // error: function() {}
    // });
// });

// function updateuserpassword() {
    // var _token = $("input[name*='_token']").val();
    // var hidepass = $("#hidepass").val();
    // var oldpass = $("#oldpass").val();
    // var newpass = $("#newpass").val();
    // $.ajax({
        // url: "updateuserpas",
        // data: {
            // _token: _token,
            // hidepass: hidepass,
            // oldpass: oldpass,
            // newpass: newpass
        // },
        // type: 'POST',
        // beforeSend: function() {
            // $("#passchange").removeClass("show");
            // $("#passchange").addClass("hide");
            // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
            // $("#profilemsg").html('');
        // },
        // success: function(result) {
            // if (result == 'oldpasswordnotmatch') {
                // $("#profilemsg").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Old Password does not match.</div>');
                // jQuery("#showloading").html('');
                // $("#passchange").removeClass("hide");
                // $("#passchange").addClass("show");
            // } else if (result == 'passdone') {
                // $("#profilemsg").html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Password Successfully updated.</div>');
                // jQuery("#showloading").html('');
                // window.location.href = ''+site_url+'/profile';
            // }
        // },
        // error: function() {
            // $("#profilemsg").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success! </strong>Password Successfully updated.</div>');
            // jQuery("#showloading").html('');
            // $("#passchange").removeClass("hide");
            // $("#passchange").addClass("show");
        // }
    // });
// }

// function userpurchase_options(val) {
    // var opt = val;
    // var oldincentives = $("#oldincentives").val();
    // if (opt != '' && oldincentives != 1) {
        // if (opt == 'cash') {
            // document.getElementById('incentives').value = oldincentives;
            // $('#sppr').text('System Price post rebates / Incentives');
            // $('#incent').html('$' + oldincentives);
            // $('#tax').parents('li').css('display', 'block');
        // } else if (opt == 'finance') {
            // var monthly_incen = Math.round(oldincentives / 12);
            // document.getElementById('incentives').value = monthly_incen;
            // $('#incent').html('$' + monthly_incen + ' (As low as $110)');
            // $('#tax').parents('li').css('display', 'none');
            // $('#sppr').text('Estimated Payments per Month');
        // }
    // } else if (opt == '' && oldincentives != 1) {
        // document.getElementById('incentives').value = oldincentives;
        // $('#incent').html('$' + oldincentives);
        // $('#tax').parents('li').css('display', 'block');
    // }
// }

// function paypalops(payamount) {
    // paypal.Button.render({
        // env: 'sandbox',
        // client: {
            // sandbox: 'AQdevkIiLL2H0Fl_V88qHI9J2VAq65Kq05PPoNPdw6uds_JUXvyRtFLyhp-hRfhBxumrXB0hQRzQPV6F',
            // production: 'OnlineSolar'
        // },
        // commit: true,
        // payment: function(data, actions) {
            // return actions.payment.create({
                // payment: {
                    // transactions: [{
                        // amount: {
                            // total: payamount,
                            // currency: 'USD'
                        // }
                    // }]
                // }
            // });
        // },
        // onAuthorize: function(data, actions) {
            // return actions.payment.execute().then(function() {
                // $("#paymentpayment").removeClass("show");
                // $("#paymentpayment").addClass("hide");
                // jQuery("#showloading").html('<img class="loading" src="'+site_url+'/frontassets/images/loading.gif">');
                // window.location.href = ''+site_url+'/ordersave/1/paypal';
            // });
        // }
    // }, '#paypal-button-container');
// }




