
<!DOCTYPE HTML>
<head>
<title>iFurniture</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url(); ?>/assets/ifurniture/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>/assets/ifurniture/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/ifurniture/css/amazonmenu.css">
   <!-- Favicons -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/ifurniture/images/ico/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="<?php echo base_url(); ?>/assets/ifurniture/images/ico/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>/assets/ifurniture/images/ico/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>/assets/ifurniture/images/ico/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>/assets/ifurniture/images/ico/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>/assets/ifurniture/images/ico/apple-touch-icon-144x144.png">

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/ifurniture/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/ifurniture/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/ifurniture/js/easing.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/ifurniture/js/startstop-slider.js"></script>
<script src="<?php echo base_url(); ?>/assets/ifurniture/js/amazonmenu.js"></script>
<script> 
jQuery(function(){
	amazonmenu.init({
		menuid: 'mysidebarmenu'
	})
})
</script>

</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <p>
                            <span><i class="icon-envelope"></i> info@ipapa.co.id</span>&nbsp; &nbsp; 
                            <span><i class="icon-phone-sign"></i> +6221 300 66 511</span>
                            </p>
			</div>
			<div class="account_desc">
				<ul>
					<li><a href="<?php echo base_url(); ?>ifurniture/register">Register</a></li>
					<li><a href="<?php echo base_url(); ?>ifurniture/login">Login</a></li>
					<li><a href="<?php echo base_url(); ?>ifurniture/login">Checkout</a></li>
					<li><a href="<?php echo base_url(); ?>ifurniture/login">My Wishlist</a></li>
					<li><a href="<?php echo base_url(); ?>ifurniture/login">My Account</a></li>
					<li><a href=""><img src="<?php echo base_url(); ?>/assets/ifurniture/images/en.png" alt="english"></a></li>
					<li><a href=""><img src="<?php echo base_url(); ?>/assets/ifurniture/images/id.png" alt="bahasa"></a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="<?php echo base_url(); ?>ifurniture"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/logo.png" alt="logo" /></a>
			</div>
			<div class="cart">
			  	   <p>Welcome to our Online Store! <span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> 0 item(s) - Rp. 0
			  	   	<ul class="dropdown">
							<li>you have no items in your Shopping cart</li>
					</ul></div></p>
			  </div>

	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="<?php echo base_url(); ?>ifurniture/index">Home</a></li>
			    	<li><a href="<?php echo base_url(); ?>ifurniture/furniture">Furniture</a></li>
			    	<li><a href="<?php echo base_url(); ?>ifurniture/decoration">Decoration</a></li>
			    	<li><a href="<?php echo base_url(); ?>ifurniture/maintenance">About</a></li>
			    	<li><a href="<?php echo base_url(); ?>ifurniture/maintenance">News</a></li>
			    	<li><a href="<?php echo base_url(); ?>ifurniture/maintenance">Contact</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>	     
	<div class="header_slide hidden-xs">
			<div class="header_bottom_left">
				<div class="categories">
				<nav id="mysidebarmenu" class="amazonmenu">
				  <ul>
				  	<h3>Furniture</h3>
				      <li><a href="#">Table &amp; Workstation</a>
				      	<div>
						<p class="intro-submenu">Browse Our Table &amp; Workstation</p>
						  <ul>
							  <li><a href="#">Executive Desk</a></li>
							  <li><a href="#">Staff Desk</a></li>
							  <li><a href="#">Corner Desks</a></li>
							  <li><a href="#">Workstation</a></li>
							  <li><a href="#">Coffee &amp; side table</a></li>
							  <li><a href="#">Conference Table</a></li>
							  <li><a href="#">Receiption Desk</a></li>
							  <li><a href="#">Classroom Desks &amp; Tables</a></li>
						  </ul>
						</div>
					  </li>
				      <li><a href="#">Chair/Couch</a>
				      	<div>
						<p class="intro-submenu">Browse Our Chair/Couch</p>
						  <ul>
							  <li><a href="#">Executive Chair</a></li>
							  <li><a href="#">Staff Chair</a></li>
							  <li><a href="#">Visitor Chair</a></li>
							  <li><a href="#">Folding Chair</a></li>
							  <li><a href="#">School/Lecture Chair</a></li>
							  <li><a href="#">Conference Chair</a></li>
							  <li><a href="#">Recliner</a></li>
							  <li><a href="#">Club Chair & Couches</a></li>
							  <li><a href="#">Chair Accessories</a></li>
						  </ul>
						</div>
				      </li>
				      <li><a href="#">Filling Cabinet</a>
				      	<div>
						<p class="intro-submenu">Browse Our Filling Cabinet</p>
						  <ul>
							  <li><a href="#">Drawer Cabinet</a></li>
							  <li><a href="#">Shelving Cabinet/Rack</a></li>
							  <li><a href="#">Display Cabinet</a></li>
							  <li><a href="#">Storage Cabinet</a></li>
						  </ul>
						</div>
				      </li>
				      <li><a href="#">Sceen &amp; Door</a>
				      	<div>
						<p class="intro-submenu">Browse Our Sceen &amp; Door</p>
						  <ul>
							  <li><a href="#">Glass Door</a></li>
							  <li><a href="#">Sliding Door</a></li>
							  <li><a href="#">Folding Door</a></li>
							  <li><a href="#">Rolling Door</a></li>
							  <li><a href="#">Internal Door</a></li>
							  <li><a href="#">External Door</a></li>
							  <li><a href="#">Sceens</a></li>
						  </ul>
						</div>
				      </li>
				      <li><a href="#">Safes</a></li>
				  </ul>
				</nav>
				</div>
				<div class="categories">
				  <ul>
				  	<h3>Decoration</h3>
				      <li><a href="#">Office</a></li>
				      <li><a href="#">Store</a></li>
				      <li><a href="#">Bank</a></li>
				      <li><a href="#">Clinic</a></li>
				      <li><a href="#">School</a></li>
				  </ul>
				</div>					
	  	     </div>
					 <div class="header_bottom_right">					 
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    	<div id="slide-1" class="slide">			                    
									 <div class="slider-img">
									     <a href="#"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/img-slider1.png" alt="learn more" /></a>									    
									  </div>
						             	<div class="slider-text">
		                                 <h1>Living Room<br><span>SALE</span></h1>
		                                 <h2>UPTo 20% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="<?php echo base_url(); ?>ifurniture/furniture" class="button">Shop Now</a>
					                   </div>			               
									  <div class="clear"></div>				
				                  </div>	
						            <div class="slide">
						             <div class="slider-text">
		                                 <h1>Office Decoration<br><span>IDEAS</span></h1>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services</h4>							               
							            </div>
							             <a href="<?php echo base_url(); ?>ifurniture/furniture" class="button">Shop Now</a>
					                   </div>		
						             	<div class="slider-img">
									     <a href="#"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/img-slider2.png" alt="learn more" /></a>
									  	</div>						             					                 
									  <div class="clear"></div>				
				                  	</div>
				                  <div class="slide">						             	
					                  <div class="slider-img">
									     <a href="#"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/img-slider1.png" alt="learn more" /></a>
									  </div>
									  <div class="slider-text">
		                                 <h1>Home Design<br><span>SALE</span></h1>
		                                 <h2>UPTo 10% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="<?php echo base_url(); ?>ifurniture/furniture" class="button">Shop Now</a>
					                   </div>	
									  <div class="clear"></div>				
				                  </div>												
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>New Furniture Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="<?php echo base_url(); ?>ifurniture/furniture">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="<?php echo base_url(); ?>ifurniture/detail"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/products/chairs/1_1.jpg" alt="" /></a>
					 <h2>Eames Style Aluminium</h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo base_url(); ?>ifurniture/detail">View Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="<?php echo base_url(); ?>ifurniture/detail"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/products/tables/table1.jpg" alt="" /></a>
					 <h2>Saarinen Style 48</h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo base_url(); ?>ifurniture/detail">View Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				    
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="<?php echo base_url(); ?>ifurniture/detail"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/products/office/1.jpg" alt="" /></a>
					 <h2>Circular Office Table </h2>
					 <div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo base_url(); ?>ifurniture/detail">View Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="<?php echo base_url(); ?>ifurniture/detail"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/products/office/2.jpg" alt="" /></a>
					 <h2>Modern Office Furniture </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo base_url(); ?>ifurniture/detail">View Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>				     
				</div>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Office Decorations</h3>
    		</div>
    		<div class="see">
    			<p><a href="<?php echo base_url(); ?>ifurniture/furniture">See all Decorations</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="#"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/decorations/generali/1.jpg" alt="" /></a>					
					 <h2>Generali Boss Room</h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo base_url(); ?>ifurniture/detail">View Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="#"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/decorations/generali/2.jpg" alt="" /></a>
					 <h2>Generali Staff Room</h2>
					 <div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo base_url(); ?>ifurniture/detail">View Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="#"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/decorations/teradata/1.jpg" alt="" /></a>
					 <h2>Teradata Staff Room</h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo base_url(); ?>ifurniture/detail">View Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <a href="#"><img src="<?php echo base_url(); ?>/assets/ifurniture/images/decorations/teradata/5.jpg" alt="" /></a>
					 <h2>Teradata meeting Room</h2>					 
					 <div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo base_url(); ?>ifurniture/detail">View Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
			</div>
    </div>
 </div>
</div>
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="#">Delivery</a></li>
						<li><a href="#">Customer Care</a></li>
						<li><a href="#">FAQs</a></li>
						<li><a href="#">Orders and Returns</a></li>
						<li><a href="#">Site Feedback</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Company Info</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Employment</a></li>
						<li><a href="#">Employee Benefits</a></li>
						<li><a href="#">Sitemap</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Legal</h4>
						<ul>
							<li><a href="#">Disclaimer</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Copyrights</a></li>
							<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+6221 300 66 511</span></li>
							<li><span>info@ipapa.co.id </span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
							<ul><a href=""><img src="<?php echo base_url(); ?>/assets/ifurniture/images/social.png"></a></ul>
					   		 <!-- <ul>
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul> -->
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>iFurniture © All rights Reseverd </p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

