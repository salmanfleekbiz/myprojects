@extends('admin.layouts.default.start-minified')
@section('contents')
<form action="{{ url('/admin/properties/create') }}" method="post">
  @include('admin.properties._form')
</form>
<script type="text/javascript">
               window.onbeforeunload = function() {
                   var Ans = confirm("This page is asking you to confirm that you want to leave - data you have entered may not be saved.");
                   if(Ans==true)
                       return true;
                   else
                       return false;
               };
    </script>
@endsection
