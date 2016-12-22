@extends('layouts.user')

@section('content')
<div class="main">
<div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Home</a> / {{ $product->name }} </ul>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						
                            <img src="{{ url("/images/pic.jpg") }}" />

	            </div>
		         <div class="desc1 span_3_of_2">
		         	<h3 class="m_3">{{ $product->name }}</h3>
		             <p class="m_5">Rs. {{ $product->price }} 
		         	 <div class="btn_form">
                                                <form class="form-horizontal" role="form" id="buy_frm">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="button" class="btn-primary" value="buy" onclick="buyproduct({{ $product->id }})">
						</form>
					 </div>
					
				     <p class="m_text2">{{ $product->description }}</p>
			     </div>
			   <div class="clear"></div>	
     
      </div>
			</div></div>
<div class="clear"></div>
<script>
            function buyproduct(id) {
                $.ajax({
                    url: "/buyproduct",
                    type: "POST",
                    data: { id : id, _token: "{{ csrf_token() }}" },
                    dataType : "json",
                    success: function(data) {
                       alert(data.message);
                       window.location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.responseJSON.message);
                        window.location = '/login';
                    },
                })
            }
</script>
@endsection

