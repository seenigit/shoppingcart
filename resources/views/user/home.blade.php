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


			<div class="top-box">
			 <div class="col_1_of_3 span_1_of_3"> 
			   <a href="#">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="{{ url("images/pic.jpg") }}" alt="">
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
				</div>
			   <div class="col_1_of_3 span_1_of_3">
			   	 <a href="#">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="{{ url("images/pic.jpg") }}" alt="">
					</div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="#">
				  <div class="inner_content clearfix">
					<div class="product_image">
						<img src="{{ url("images/pic.jpg") }}" alt="">
					</div>
                    <div class="sale-box1"><span class="on_sale title_shop">Sale</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="reducedfrom">$66.00</span>
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="clear"></div>
			</div>			 			    
		  </div>
			<div class="rsidebar span_1_of_left">
             </div>
             </div>
	   <div class="clear"></div>
	</div>
	</div>
	</div>@endsection
