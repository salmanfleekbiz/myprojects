<?php
/**
 * Stripe - Payment Gateway integration example (Stripe Checkout)
 * ==============================================================================
 * 
 * @version v1.0: stripe_pay_checkout_demo.php 2016/10/05
 * @copyright Copyright (c) 2016, http://www.ilovephp.net
 * @author Sagar Deshmukh <sagarsdeshmukh91@gmail.com>
 * You are free to use, distribute, and modify this software
 * ==============================================================================
 *
 */
global $con;
$localhost = 'localhost';
$user = 'craftedxyz';
$pass = 'bXg(9,BsLpF@';
$db = 'craftedx_propertimatch';
$con = mysqli_connect($localhost,$user,$pass,$db);

// Stripe library
require 'Stripe.php';
try {
  Stripe::setApiKey("sk_test_TAsVMbyXtzfVJZRn0HzNP8Xi"); //Replace with your Secret Key
 
  $charge = Stripe_Charge::create(array(
  "amount" => $_POST['pckg_amount'],
  "currency" => "usd",
  "card" => $_POST['stripeToken'],
  "description" => $_POST['pckg_decp']
));

  //header('Location: http://propertimatch.craftedium.xyz');
	//send the file, this line will be reached if no error was thrown above
	//echo "<h1>Your payment has been completed.</h1>";
 
 
//you can send the file to this email:
//echo $_POST['stripeEmail'].' properti Id'.$_POST['pid'];
$update = mysqli_query($con,"UPDATE `emt_properties` SET `monthly_subscription` = '1', `pay_subscription` = '1',`days_counter` = '1'  WHERE `id`='" . $_POST['pid'] . "'");
if($update){
  header('Location: http://propertimatch.craftedium.xyz/thanks');
}
}
//catch the errors in any way you like
 
catch(Stripe_CardError $e) {
	
}
 
 
catch (Stripe_InvalidRequestError $e) {
// Invalid parameters were supplied to Stripe's API
 
} catch (Stripe_AuthenticationError $e) {
// Authentication with Stripe's API failed
// (maybe you changed API keys recently)
 
} catch (Stripe_ApiConnectionError $e) {
// Network communication with Stripe failed
} catch (Stripe_Error $e) {
 
// Display a very generic error to the user, and maybe send
// yourself an email
} catch (Exception $e) {
 
// Something else happened, completely unrelated to Stripe
}