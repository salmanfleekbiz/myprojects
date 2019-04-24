<form action="charge.php" method="POST" id="firstform">
<input type="hidden" name="pckg_amount" id="pckg_amount" value="2000">
<input type="hidden" name="pckg_month" id="pckg_month" value="1">
<input type="hidden" name="pckg_decp" id="pckg_decp" value="This is Monthly Subscription Plan">	
<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_eLg4IVsI9ESwYqIfjrmOEUvd"
data-name="Testing Payment" data-description="This is testing description">
</script>
</form>