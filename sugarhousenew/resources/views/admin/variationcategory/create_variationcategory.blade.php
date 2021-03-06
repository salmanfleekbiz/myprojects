@extends('admin.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
Sugar Home - Admin Dashboard
@endsection
@section('contents')
@include('admin.layout.sidebar')
<section id="main-content">
<section class="wrapper">
@if (Session::has('errors'))
<div class="bs-example">
<div class="alert alert-danger fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Error!</strong> Category already exists.
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
<form class="form-horizontal" role="form" name="createvariationCategoryform" id="createvariationCategoryform" method="post" action="{{url('/admin/variation/storevariationcategory')}}" enctype="multipart/form-data">
{{csrf_field()}}	
<div class="row">
<div class="col-sm-12">
<section class="panel">
<header class="panel-heading">
Add Category
</header>	
@include('admin.variationcategory.variationcategory_form')
</section>
</div>
</div>
</form>	
</section>
</section>
<script type="text/javascript">
jQuery("#createvariationCategoryform").validate({
rules: {
	minimumqty: {
      required: true,
      digits: true
    },
	maximumqty: {
      required: true,
      digits: true
    }
},
messages: {
	minimumqty: { required: "Enter minimum quantity", digits:"Enter only number"},
	maximumqty: { required: "Enter maximum quantity", digits:"Enter only number"}
}
// ,
// submitHandler: function() {
// },
// success: function(label) {
// 	label.remove();
// }
});	
</script>
@endsection