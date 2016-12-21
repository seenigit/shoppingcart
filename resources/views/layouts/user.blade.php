<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Welcome to Shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<link href="/css/app.css" rel="stylesheet">
<link href="{{ url("css/frontendstyle.css") }}" rel="stylesheet" type="text/css" media="all">
<link href="{{ url("css/megamenu.css") }}" rel="stylesheet" type="text/css" media="all">

    </head>

    <body>
        <div class="header-top">
	   <div class="wrap"> 
	   <!---728x90--->
			  <div class="header-top-left">
			  	   
   				    <div class="clear"></div>
   			 </div>
			 <div class="cssmenu">
				<ul>
                                    @if (!Auth::guest())
                                        <li><a href="#">Welcome {{ Auth::user()->name }}</a></li> |
					<li><a href="#">Checkout</a></li> |
                                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                                    @else
					<li><a href="/login">Log In</a></li> |
					<li><a href="/signup">Sign Up</a></li>
                                    @endif
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="#">Shopping Cart</a>
				</div>
				<div class="menu">
	            <ul class="megamenu skyblue">
			<li class="grid" style="display: inline-block;"><a href="#">Home</a></li>
			<li style="display: inline-block;"><a class="color4" href="#">women</a></li>				
				<li style="display: inline-block;"><a class="color5" href="#"">Men</a>
				</li>
				<li style="display: inline-block;"><a class="color6" href="#">Other</a></li>
				<li style="display: inline-block;"><a class="color7" href="#">Purchase</a></li>
			</ul>
			</div>
		</div>
	   <div class="header-bottom-right">
	  <div class="tag-list" style="float:right">
	    <ul class="last"><li><a href="#">Cart(0)</a></li></ul>
	  </div>
    </div>
     <div class="clear"></div>
     </div>
	</div>
      @yield('content')
     <div class="footer">
		<div class="footer-bottom">
			<div class="wrap">
	             <div class="copy">
			        <p>© 2016 shop. All rights reserved</p>
		         </div>
				<div class="f-list2">
				 <ul>
					<li class="active"><a href="#">About Us</a></li> |
					<li><a href="#">Delivery &amp; Returns</a></li> |
					<li><a href="#">Terms &amp; Conditions</a></li> |
					<li><a href="#">Contact Us</a></li> 
				 </ul>
			    </div>
			    <div class="clear"></div>
		      </div>
	     </div>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </body>
  </html>
