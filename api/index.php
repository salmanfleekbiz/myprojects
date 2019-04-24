<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Test APIs</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
</head>
<body>
<form name="testingapi" id="testingapi" method="post" action="">
<table>
<tr>
<td>Enter domain</td>  
<td><input type="text" name="domain" id="domain"></td>
</tr>  
<tr>
<td></td> 
<td><input type="submit" name="submit" id="submit" value="Search Domain"></td>
</tr>
</table>  
</form>
<div id="result"></div>
<script type="text/javascript">
jQuery("#testingapi").validate({
rules: {
  domain: {required: true}
},
messages: {
  domain: { required: "Enter your domain name"}
},
submitHandler: function() {
srchDomain();
},
success: function(label) {
label.remove();
}
});
function srchDomain(){
var action = 'checkingdomain';  
var domain = $('#domain').val();
$.ajax({
url: "process.php",
data: {action:action,domain:domain},
type: 'POST',
beforeSend: function () {
  $("#result").html('');
},
success: function (result) {
  $("#result").html(result);
},
error: function () {
}
});  
}
</script>
</body>         
</html>