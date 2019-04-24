@extends('owner.layouts.default.start-minified')
@section('contents')
<form action="{{ url('/owner/properties/update') }}" method="post">
  @include('owner.properties._form')
  <div class="modal-footer">

        <button type="submit" class="btn btn-primary btn-iframe-submit" id="myButtonId"><span class="glyphicon glyphicon-ok"></span> Save</button>

      </div>
</form>
@endsection
