<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php require_once("head.inc.php"); ?>
    <style>
#preloader {
	position:fixed;
	left:0;
	right:0;
	top:0;
	bottom:0;
	width:100%;
	height:100%;
	z-index:10;
	background:#fff;display:none;
	opacity:.7;
}
#status {
	width:16px;
	height:16px;
	position:absolute;
	left:50%;
	top:50%;
	margin:-8px 0px 0px -8px;
	z-index:20; display:none;
}
</style>
</head>
<body class="header" style="overflow-x:hidden; overflow-y:hidden;">
<!--header-->
<div id="preloader">
    <div id="status"><img src="<?php echo base_url(); ?>images/ajax-loader.gif" alt="spin"> </div>
  </div>
<div class="header2">
    <div class="header-top">
        <div class="social-icons">

            <img src="<?php echo base_url(); ?>images/logo.png" alt="">
        </div>
        <div class="clearfix"></div>
    </div>
    
    <!--services-->
    <div class="login">
      <div class="login__check"><img src="<?php echo base_url(); ?>images/lo.png" alt=""></div>
      <div class="login__form">
      <div class="panel panel-info">
        <div class="login__row">
        <div id="loginerror" class="loginerror"></div>
         <form name="loginForm" id="loginForm" action="" method="post">
 		 <input type="hidden" name="action" id="action" value="loogin">

          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" name="username" id="username" class="login__input name form-control-login" placeholder="Enter user name" autocomplete="off" value="<?php if(isset($_COOKIE['user'])){ echo $_COOKIE['user']; }else{ echo ''; } ?>"/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" name="userpassword" id="userpassword" class="login__input pass form-control-login" placeholder="Enter Password" autocomplete="off" value="<?php if(isset($_COOKIE['passw'])){ echo $_COOKIE['passw']; }else{ echo ''; } ?>"/>
        </div>
        <div class="input-group">
<div class="checkboxlogin">
<label><input type="checkbox" name="remember" id="remember" value="1" <?php if(isset($_COOKIE['passw'])){ ?> checked="checked" <?php }else{ echo ''; } ?>>Remember Me</label>
</div>
</div>
</div>
        <input type="submit" name="submit" class="login__submit" id="submit" value="Login">
		</form>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="login" style="display:none;">
    <div class="content">
        <div class="service">
            <div class="login__check">
                <h1><img src="<?php echo base_url(); ?>images/lo.png" alt=""></h1>
            </div>
                <div class="service-grids">
                <div id="loginerror"></div>
                <form name="loginForm" id="loginForm" action="" method="post">
                <input type="hidden" name="action" id="action" value="loogin">
                	<table>
                    <tr>
                    <td>User Name</td>
                    <td><input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                    <td>User Password</td>
                    <td><input type="password" name="userpassword" id="userpassword"></td>
                    </tr>
                    <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" id="submit" value="Login"></td>
                    </tr>
                    </table>
                 </form>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        </div>
        <!--services-->
    </div>

</div>
<!--header-->
<script type="text/javascript">
$("#loginForm").validate({
/*rules: {
	username: "required",
	userpassword: "required"
},
messages: {
	username: "Enter user name",
	userpassword: "Enter your password"
},*/
submitHandler: function() {
	$('#status').show();$('#preloader ').show();
	
    
check_loginDb();
},
success: function(label) {
	label.remove();
}
});
</script>
</body>
</html>