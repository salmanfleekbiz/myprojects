@extends('front.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
Sugar House Banners
@endsection
@section('contents')
</div>
<section class="title-bar ">
<div class="text-center">
<h3>Change Password</h3>
</div>
</section>
<section class="login_sec form_theme">
<div class="container">	
<div class="col-md-3"></div>
<div class="col-md-6">
<form name="formCheckPassword" id="formCheckPassword" method="post" action="{{url('/submitchangepassword')}}" enctype="multipart/form-data">
{{csrf_field()}}
@if (Session::has('errors'))
<div class="bs-example">
<div class="alert alert-danger fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Error!</strong> Email address does not exists.
</div>
</div>
@endif	
@if(session()->has('message'))
<div class="bs-example">
<div class="alert alert-success fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Success!</strong> {{ session()->get('message') }}
</div>
</div>
@endif
<input placeholder="Enter the activation code" value="{{$acccode}}" type="text" name="code" id="code" class="txt_theme" />
<input placeholder="Enter the new password" type="password" name="npass" id="npass" class="txt_theme" />
<input placeholder="Enter the confirm password" type="password" name="cpass" id="cpass" class="txt_theme" />
<input value="Change Password" class="btn btn-red btn-form" type="submit" name="submit" id="submit">
</form>
</div>
<div class="col-md-3"></div>
</div>
</section>
<script type="text/javascript">

$("#formCheckPassword").validate({
           rules: {
               npass: { 
                 required: true,
                    minlength: 6

               } , 
			   code:"required", 

                   cpass: { 
                    equalTo: "#npass",
                     minlength: 6
               }


           },
     messages:{
		 code: "Enter the activation code",
         npass: { 
                 required:"the password is required"

               }
     }

});

</script>
@endsection