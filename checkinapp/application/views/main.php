<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php require_once("head.inc.php"); ?>
<script type="text/javascript">
$(document).ready(function() {
        user_permission();
 });		
</script>    
</head>
<body class="header" style="overflow-x:hidden; overflow-y:hidden;">
<!--header-->
<?php echo $this->load->view('modals/modal_in_use'); ?>
<div class="header2">
    <div class="header-top">
        <div class="social-icons">

            <img src="<?php echo base_url(); ?>images/logo.png" alt="">
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="banner-center">
    	<div class="logount homelogout">Welcome&nbsp;<?php echo $this->session->userdata('username'); ?>&nbsp;</div>
        <div class="logout"><a href="<?php echo base_url(); ?>main/logout" class="logout-btn">Logout</a></div>
        <div class="container">
            <div class="logo">
                <h1><img src="<?php echo base_url(); ?>images/lo.png" alt=""></h1>
            </div>

        </div>
    </div>
    <!--services-->
    <div class="content">
        <div class="service">
            <div class="container">
                <h2></h2>
                <div class="service-grids">
                <a class="checkpermision" id="userpermission_checkinmemberpage" href="javascript:;" permission="notallow">
                    <div class="col-md-3 service-grid bg checkinmemberhome">
                        <h4><span class="glyphicon" aria-hidden="true"></span>Check-In Member</h4>
                        <span class="img-icon"><img src="<?php echo base_url(); ?>images/right-icon.png" class="img-responsive" alt="music theme"></span>
                        <p><img src="<?php echo base_url(); ?>images/icon.png" class="img-responsive img" alt="music theme"></p>

                    </div></a>
                    <a class="checkpermision" id="userpermission_assign" href="javascript:;" permission="notallow">
                    <div class="col-md-3 service-grid bg position2">
                        <h4><span class="glyphicon" aria-hidden="true"></span>Shooting Lounges</h4>
                        <span class="img-icon"><img src="<?php echo base_url(); ?>images/left-icon.png" class="img-responsive" alt="music theme"></span>
                        <p><img src="<?php echo base_url(); ?>images/icon.png" class="img-responsive img" alt="music theme"></p>
                    </div></a>
                    <a class="checkpermision" id="userpermission_reservation" href="javascript:;" permission="notallow">
                    <div class="col-md-3 service-grid bg ">
                        <h4><span class="glyphicon" aria-hidden="true"></span>Wait List</h4>
                        <span class="img-icon"><img src="<?php echo base_url(); ?>images/left-icon.png" class="img-responsive" alt="music theme"></span>
                        <p><img src="<?php echo base_url(); ?>images/icon.png" class="img-responsive img" alt="music theme"> </p>
                    </div></a>
                    <?php /*?><a href="<?php echo ADMIN_URL_CHECKINAPP; ?>" target="_blank">
                    <div class="col-md-3 service-grid bg">
                        <h4><span class="glyphicon" aria-hidden="true"></span>Admin</h4>
                        <span class="img-icon"><img src="<?php echo base_url(); ?>images/right-icon.png" class="img-responsive" alt="music theme"></span>
                        <p><img src="<?php echo base_url(); ?>images/icon.png" class="img-responsive img" alt="music theme"></p>
                       
                    </div> </a><?php */?>
                    
                    <div class="clearfix"></div>
                    <a href="#permisionpop" data-toggle="modal" id="permisionpopup"></a>
                </div>
            </div>

        </div>
        <!--services-->
    </div>

</div>
<!--header-->

</body>
</html>