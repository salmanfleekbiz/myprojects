jQuery(document).ready(function() {
$("#phone").intlTelInput();
$('.navbar-toggle').click(function(){
	$('#navbar-collapse-1').removeClass('collapse');
	$('#navbar-collapse-1').toggleClass('fixed');
})
});
function showPrice(pid,pvariation,qty,classid){
var _token = $( "input[name*='_token']" ).val();
var pid = pid;
var pvariation = pvariation;
var qty = qty;	
var clsid = classid;
$.ajax({
url: "showpricing",
data: {pid:pid,pvariation:pvariation,qty:qty,_token:_token},
type: 'POST',
beforeSend: function () {
},
success: function (result) {
total = result * qty;
$("#showprice"+clsid).html('$'+result);
$("#showpricetotal"+clsid).html('$'+total);
document.getElementById('producttotal'+clsid).value = total;
showtotal();
},
error: function () {
}
});
}
function showtotal(){
var values = $("input[name='producttotal[]']").map(function(){return $(this).val();}).get();
var total = 0;
$.each(values,function() {
    total += parseInt(this, 10);
});
$("#showsubtotal").html('$'+total);
$("#finaltotal").html('$'+total);
}
$(document).on("click", ".deleproduct", function () {
var _token = $( "input[name*='_token']" ).val();	
var arrnum = $(this).attr("arrnum");
var pname = $(this).attr("pname");
var pvariation = $(this).attr("pvariation");
var graphicwidth = $(this).attr("graphicwidth");
var graphicheight = $(this).attr("graphicheight");
var framecolor = $(this).attr("framecolor");
$.ajax({
url: "deleteproduct",
data: {arrnum:arrnum,pname:pname,pvariation:pvariation,graphicwidth:graphicwidth,graphicheight:graphicheight,framecolor:framecolor,_token:_token},
type: 'POST',
beforeSend: function () {
},
success: function (result) {
	if(result == 'delete'){
		location.reload();
	}
},
error: function () {
}
});
});	

$(document).on("click", ".updateproduct", function () {
var _token = $( "input[name*='_token']" ).val();	
var arrnum = $(this).attr("arrnum");
var quantity = $('#quantity'+arrnum).val();
$.ajax({
url: "updateproduct",
data: {arrnum:arrnum,quantity:quantity,_token:_token},
type: 'POST',
beforeSend: function () {
},
success: function (result) {
	if(result == 'update'){
		location.reload();
	}
},
error: function () {
}
});
});	