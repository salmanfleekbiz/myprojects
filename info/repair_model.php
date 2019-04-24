<?php
/*
	Template Name: Repair Model
*/
get_header(); ?>
	<?php $king->breadcrumb(); ?>



  <style type="text/css">
.showdevices li {
    float: left;
    list-style: outside none none;
    margin: 0 53px;
    text-align: center;
} 
#careir .showdevices li {
    margin: 45px 1px;
}
.titles {
    font-size: 25px;
    text-align: center;
    color:black;
}
ul.tabs{
      margin: 0px;
      padding: 0px;
      list-style: none;
    }
    ul.tabs li{
      background: none;
      color: #222;
      display: inline-block;
     cursor: pointer;
    
      text-align: center;
    }

   

    .tab-content{
      display: none;
      background: #ededed;
      padding: 15px;
    }

    .tab-content.current{
      display: inherit;
    }
    .showprodcut {
    float: left;
    margin: 55px 0;
    text-align: center;
    width: 15%;
    }
    .cart_items_show {
    
    position: fixed;
    width:25%;
    top:170px;
    
    margin: 0 1000px;
    }
    .cart_items_show > h1 {
    background: #ba1515;
    color: #ffffff;
    font-size: 15px;
    font-weight: bold;
    text-align: center;
  }

</style>
	<?php 
  global $con; 
  $modelId= $_GET['catId']; 
  $currency = '$';
  ?>

<div class="modal fade " id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close settingthecloseicon-fame" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
     
          

  <div class="cart_items_show">
      <h1>Shopping Cart Item</h1>
      <div id="items"> </div>
      <div id="removeItem"></div>
    </div>          
      </div>
     
    </div>
  </div>
</div>




<!-- Button trigger modal -->
<button type="button" class="btn btn-default btn-lg managinpopup_rigth-fame" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-shopping-cart"> </i><span id="totalcart">(0)</span> View Cart
</button>



	<div id="primary" class="site-content">
		<div id="content" class="container">
            <div class="titles">SELECT PROBLEM</div>
            
      <div class="container settingthewidth_container">
      <ul class="tabs">
        <li class="tab-link current" data-tab="tab-1">Diagnostics</li>
        <li class="tab-link" data-tab="tab-2">Internal Replacements</li>
        <li class="tab-link" data-tab="tab-3">External Replacements</li>
      </ul>
      <div id="tab-1" class="tab-content current">
          
          <h5 class="text-center">We offer free Diagnostics services both walk-in and mail-in reapir services </h5> 
          <?php 
           $model_name = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `wp_repair_model` where id =".$modelId));
           $check_name = $model_name['model_name'];
           $services = mysqli_query($con,"SELECT * FROM `wp_repair_services` ORDER BY id");
           ?>
          
          
           <ul class="show_product   text-center list-inline">
           <?php
              while ($show_services = mysqli_fetch_array($services)) { 
              $check_services = json_decode($show_services['services_prices'], true);
              //echo '<pre>'; print_r($check_services);
              //echo 'Name '.$check_name;
              if (array_key_exists($check_name, $check_services) && $show_services['service_type'] == 'diagnostics'){
              //if (array_key_exists($check_name, $check_services) && $show_services['service_type'] == 'diagnostics'){
              $price = $check_services[$check_name];
              if($price == ''){}else{
            ?>
            <li class="widthing_fame" >
              <div class="product_img ">
              <img src="<?php echo site_url(); ?>/wp-content/themes/linstar/uploads/serviceimages/<?php echo $show_services['service_image']; ?>" alt="">   
              </div>
              <div class="product_title  managingthemdown_fame"><?php echo $show_services['service_name']; ?></div>
              <div class="product_price  managingthemdown_fame"><?php echo $currency.$price; ?></div>
              <div class="addtoCart  managingthemdown_fame"><a id="<?php echo $show_services['id']; ?>" class="repairingcart" href="javascript:void(0);" price="<?php echo $price; ?>" service="<?php echo $show_services['id']; ?>" modelname="<?php echo $check_name; ?>"><i class="fa fa-shopping-cart "></i> Add To Cart</a>
                <div id="loadcarts<?php echo $show_services['id']; ?>"></div>
              </div>
            </li>
               
               
           
            <?php   
              }  
                  }else{}
              }
            ?>
           </ul> 
      </div>
          
      <div id="tab-2" class="tab-content">
            <?php 
           $model_name = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `wp_repair_model` where id =".$modelId));
           $check_name = $model_name['model_name'];
           $services = mysqli_query($con,"SELECT * FROM `wp_repair_services` ORDER BY id");
           ?>
           <ul class="show_product text-center list-inline">
           <?php
              while ($show_services = mysqli_fetch_array($services)) { 
              $check_services = json_decode($show_services['services_prices'], true);
              if (array_key_exists($check_name, $check_services) && $show_services['service_type'] == 'internal_replacement'){
              $price = $check_services[$check_name];
              if($price == ''){}else{
            ?>
            <li class="widthing_fame removingborder_fame">
              <div class="product_img">
              <img src="<?php echo site_url(); ?>/wp-content/themes/linstar/uploads/serviceimages/<?php echo $show_services['service_image']; ?>" alt="">   
              </div>
              <div class="product_title managingthemdown_fame changinthepricesarea" ><?php echo $show_services['service_name']; ?></div>
              <div class="product_price managingthemdown_fame changinthepricesarea"><?php echo $currency.$price; ?></div>
              <div class="addtoCart managingthemdown_fame "><a id="<?php echo $show_services['id']; ?>" class="repairingcart colorchanger_fame" href="javascript:void(0);" price="<?php echo $price; ?>" service="<?php echo $show_services['id']; ?>" modelname="<?php echo $check_name; ?>"> <i class="fa fa-shopping-cart "></i> Add To Cart</a>
                <div id="loadcarts<?php echo $show_services['id']; ?>"></div>
              </div>
            </li>
            <?php    
              } 
                  }else{}
              }
            ?>
           </ul> 
      </div>
      <div id="tab-3" class="tab-content">
           <?php 
           $model_name = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `wp_repair_model` where id =".$modelId));
           $check_name = $model_name['model_name'];
           $services = mysqli_query($con,"SELECT * FROM `wp_repair_services` ORDER BY id");
           ?>
           <ul class="show_product row text-center list-inline">
           <?php
              while ($show_services = mysqli_fetch_array($services)) { 
              $check_services = json_decode($show_services['services_prices'], true);
              if (array_key_exists($check_name, $check_services) && $show_services['service_type'] == 'external_replacement'){
              $price = $check_services[$check_name];
              if($price == ''){}else{
            ?>
            <li class="col-md-2 settingthecolorcol_fame">
              <div class="product_img">
              <img src="<?php echo site_url(); ?>/wp-content/themes/linstar/uploads/serviceimages/<?php echo $show_services['service_image']; ?>" alt="">   
              </div>
              <div class="product_title managingthemdown_fame"><?php echo $show_services['service_name']; ?></div>
              <div class="product_price managingthemdown_fame"><?php echo $currency.$price; ?></div>
              <div class="addtoCart managingthemdown_fame"><a id="<?php echo $show_services['id']; ?>" class="repairingcart" href="javascript:void(0);" price="<?php echo $price; ?>" service="<?php echo $show_services['id']; ?>" modelname="<?php echo $check_name; ?>"> <i class="fa fa-shopping-cart "></i> Add To Cart</a>
              <div id="loadcarts<?php echo $show_services['id']; ?>"></div>
              </div>
            </li>
            <?php 
                }    
                  }else{}
              }
            ?>
           </ul> 
      </div>
      </div>
      <!-- <a href="<?php //echo site_url(); ?>/?page_id=4101">Proceed to Checkout</a> -->
             <div class="managinthecenter_fame">
                <a href="<?php echo site_url(); ?>/?page_id=4099" class="settingthebutton_famecontinue">View Cart</a>
                  <a href="<?php echo site_url(); ?>/?page_id=3480" class="settingthebutton_famecontinue">Continue Shopping</a>
             </div><!--managinthecenter-->     
     <script type="text/javascript">
          $(document).ready(function(){
          
          $('ul.tabs li').click(function(){
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#"+tab_id).addClass('current');
          })
          showcartItem();
        });
          function timeOut(name,pId){
          setTimeout(
          function () {
          document.getElementById(name+pId).innerHTML=''; 
          }, 2000);
          }
          $(document).on("click", ".repairingcart", function () {
           var action = 'repairaddtocart';
           var Id = $(this).attr("id");
           var price = $(this).attr("price");
           var service = $(this).attr("service");
           var modelname = $(this).attr("modelname");
           jQuery.ajax({
            url: '<?php echo site_url(); ?>/wp-content/themes/linstar/repairing_process.php',
            data: {action: action, price: price, service: service, modelname: modelname},
            type: 'POST',
            beforeSend: function () {
              document.getElementById('loadcarts'+Id).innerHTML='<img src="<?php echo site_url(); ?>/wp-content/themes/linstar/images/cartloading.gif">';
            },
            success: function (result) {
                  document.getElementById('loadcarts'+Id).innerHTML='Item Add Successfully';
                  showcartItem();
                  timeOut('loadcarts',Id);
            },
            error: function () {
            }
            });
         });
        function showcartItem(){
          var action = 'showcartItems'; 
          jQuery.ajax({
            url: '<?php echo site_url(); ?>/wp-content/themes/linstar/repairing_process.php',
            data: {action: action},
            type: 'POST',
            beforeSend: function () {
            },
            success: function (result) {
              cartcountItem();
              document.getElementById('items').innerHTML=result;
            },
            error: function () {
            }
            });
        }
        function cartcountItem(){
          var action = 'countItems'; 
          jQuery.ajax({
            url: '<?php echo site_url(); ?>/wp-content/themes/linstar/repairing_process.php',
            data: {action: action},
            type: 'POST',
            beforeSend: function () {
            },
            success: function (result) {
              document.getElementById('totalcart').innerHTML=result;
            },
            error: function () {
            }
            });
        }  
        $(document).on("click", ".removeItem", function () {
           var action = 'remove_item';
           var service = $(this).attr("service");
           var modle = $(this).attr("modle");
           var price = $(this).attr("price");
           jQuery.ajax({
            url: '<?php echo site_url(); ?>/wp-content/themes/linstar/repairing_process.php',
            data: {action: action, service: service, modle: modle, price: price},
            type: 'POST',
            beforeSend: function () {
              document.getElementById('removeItem').innerHTML='<img src="<?php echo site_url(); ?>/wp-content/themes/linstar/images/cartloading.gif">';
            },
            success: function (result) {
                  showcartItem();
                  document.getElementById('removeItem').innerHTML='';
            },
            error: function () {
            }
            });
         });
    </script>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>