<div class="top-box">
                            
        @foreach ($products  as $key => $product)  
         <div class="col_1_of_3 span_1_of_3"> 
           <a href="{{url("/productdetails")}}/{{ $product->id }}">
                <div class="inner_content clearfix">
                        <div class="product_image">
                                <img src="{{ url("images/pic.jpg") }}" alt="">
                        </div>
                        <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                        <div class="price">
                           <div class="cart-left">
                                        <p class="title">{{ $product->name }}</p>
                                        <div class="price1">
                                          <span class="actual">Rs {{ $product->price }}</span>
                                        </div>
                                </div>
                                <div class="cart-right"> </div>
                                <div class="clear"></div>
                         </div>				
        </div>
      </a>
         </div>
        @if(!((++$key)%4)) 
            <div class="clear"></div>
            </div>
            <div class="top-box">
        @endif
        @endforeach
</div>