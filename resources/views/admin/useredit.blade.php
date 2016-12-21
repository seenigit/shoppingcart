@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit User</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Edit User</h3>
         @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
         @endif
        <form class="form-horizontal" role="form" method="post" action="{{ url("/admin/edituser") }}/{{ $user->id }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
                <input class="form-control" value="{{ $user->name }}" type="text" name="name" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
                <input class="form-control" value="{{ $user->email }}" type="text" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <input class="form-control" value="{{ $user->id }}" type="hidden" name="id">  
                <input class="btn btn-primary" value="Save Changes" type="submit">
              <span></span>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection

