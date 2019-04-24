<!-- Calendar for showing property availability and clicking and booking the desired dates of reservation -->
<div class="row">
	<h3 class="text-center">Send a buying offer!</h3>
</div>
<div class="row">
	<div class="col-md-12">
		<form id="select-the-dates-form" class="form-horizontal" role="form" action="{{url('send-buying-offer/'.$property->slug)}}/redirect" method="get">
			<!--Let the user fill the form and start booking a reservation-->
			<div class="form-group">
				<label for="firstname">First Name:</label>
				<input class="form-control" type="text" id="firstname" name="firstname" value="@if(old('firstname')){!! old('firstname') !!}@endif" placeholder="Enter your first name" required />
			</div>
			<div class="form-group">
				<label for="firstname">Last Name:</label>
				<input class="form-control" type="text" id="lastname" name="lastname" value="@if(old('lastname')){!! old('lastname') !!}@endif" placeholder="Enter your last name" required />
			</div>
			<div class="form-group">
				<label for="firstname">Email:</label>
				<input class="form-control" type="email" id="email" name="email" value="@if(old('email')){!! old('email') !!}@endif" placeholder="Enter your email" required />
			</div>
			<div class="form-group">
				<label for="message">Message:</label>
				<textarea class="form-control" id="message" name="message" placeholder="I want to buy this property..." />@if(old('message')){!! old('message') !!}@endif</textarea>
			</div>
			<div class="pull-right">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-info btn-block"> Send <span class="glyphicon glyphicon-chevron-right"></span> </button>
			</div>
		</form>
	</div>
</div>


