@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Edit Product</h3>
         @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}x
            </div>
         @endif
        <form class="form-horizontal" role="form" method="post" action="{{ url("/admin/editproduct") }}/{{ $product->id }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
                <input class="form-control" value="{{ $product->name }}" type="text" name="name" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Description:</label>
            <div class="col-lg-8">
                <input class="form-control" value="{{ $product->description }}" type="text" name="description" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Price:</label>
            <div class="col-lg-8">
                <input class="form-control" value="{{ $product->price }}" type="text" name="price" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <input class="form-control" value="{{ $product->id }}" type="hidden" name="id">  
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

