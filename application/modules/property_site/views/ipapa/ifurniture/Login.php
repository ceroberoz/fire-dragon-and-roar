
<!DOCTYPE HTML>
<head>
<title>Login - iFurniture</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url(); ?>/assets/ifurniture/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>/assets/ifurniture/css/register/registerpage.css" rel="stylesheet" type="text/css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
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
			    	<li class="active"><a href="<?php echo base_url(); ?>ifurniture">Home</a></li>
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
	 </div>
 <div class="main">
 	<div class="content">
    	<div class="content_top">
    	<div class="section group">
    		<div id="new-customer" class="account text-center">
<h1 class="account_header"> Login to your account </h1>
<div class="caption">Don't have one? <a class="goldlink" href="<?php echo base_url(); ?>ifurniture/register">Create an account</a></div>
</div>
				<div class="col kiri">
				 	<div class="register-form">
				<form action="">
					<span><label class="required" for="email" title="Enter your email address">
						<input type="text" id="email" name="email" required/>Email</label></span>
					<span><label class="required" for="password" title="Your password">
						<input type="password" id="password" name="password" required/>Password</label></span>
					<span><label for="formsubmit" class="nocontent">
						<input type="submit" id="formsubmit" value="Login" />
						<a class="goldlink" href="resetpass.html">Forgot your password?</a></label></span>
				</form>
					</div>
					<div class="clear"></div>

  				</div>
				<div style="float:right" class="col kanan">
				<a href=""><img src="<?php echo base_url(); ?>/assets/ifurniture/images/social-signup.png"></a>
				 </div>
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

