@extends('layouts.user')

@section('content')
<div class="banner-slider">
    <div class="callbacks_container">
            <img src="{{ url("images/banner1.jpg") }}">
    </div>
</div>
<div class="main">
	<div class="wrap">
	<!---728x90--->
		<div class="section group">
                  <div class="cont span_2_of_3">
		  	<h2 class="head">Featured Products</h2>

                        <div id="product_section">	
                        </div>
		  </div>
             </div>
	   <div class="clear"></div>
	</div>
	</div>
<script>
            $( document ).ready(function() {
                $.ajax({
                    url: "/getproducts",
                    type: "GET",
                    dataType : "json",
                })
                .done(function( data ) {
                     $( "#product_section").html( data.html );
                })
            });
        </script>
        @endsection
        