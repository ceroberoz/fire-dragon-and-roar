
<!DOCTYPE HTML>
<head>
<title>Register - iFurniture</title>
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
<h1 class="account_header"> Create an account </h1>
<div class="caption">Already have one? <a class="goldlink" href="<?php echo base_url(); ?>ifurniture/login">Login</a></div>
</div>
				<div class="col kiri">
				 	<div class="register-form">
				<form action="">
					<span><label class="required" for="name" title="Enter your name">
						<input type="text" id="name" name="name" />Name</label></span>
					<span><label class="required" for="email" title="Enter your email address">
						<input type="text" id="email" name="email" />Email</label></span>
					<span><label class="required" for="phone" title="Enter your phone number">
						<input type="text" id="phone" name="phone" />Telephone</label></span>
					<span><label for="mobile" title="Enter your mobile phone number">
					<span>	<input type="text" id="mobile" name="mobile" />Mobile</label></span>
					<span><label class="required" for="username" title="Choose a username">
						<input type="text" id="username" name="username" />Username</label></span>
					<span><label class="required" for="password" title="Choose a password">
						<input type="password" id="password" name="password" />Password</label></span>
					<span><label class="required" for="verpassword" title="Verify your password">
						<input type="password" id="verpassword" name="verpassword" />Password confirmation</label></span>
					<span><label for="formsubmit" class="nocontent">
						<input type="submit" id="formsubmit" value="Create an Account" />
						<strong>Note:</strong> Items marked <img src="<?php echo base_url(); ?>/assets/ifurniture/images/required.gif" alt="Required marker" width="12" height="12" /> are required fields</label></span>
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
	<script type="text/javascript">

			$(function(){
				// Grab each form element
				$("label[title]").each(function(){
					$(this).append("<div class=\"infopop\">");	
					titletext = $(this).attr("title");
					$(this).removeAttr("title");
					$(".infopop",this).css({opacity:0}).html(titletext);
					$("input",this).focus(function(){
						// Mouseover
						doFocus(this);
					}).blur(function(){
						// MouseOut
						doBlur(this);
					});
				});
			});

			function doFocus(obj) {
				$(obj).addClass("active").parents("label").addClass("active").find(".infopop").animate({opacity:1,left:492},500);
			}
			
			function doBlur(obj) {
				if (validate(obj)) {
					isGood(obj);
				}
			}
			
			function reportErr(obj, message) {
				$(obj).addClass("error").parents("label").removeClass("isgood").addClass("required").addClass("error").find(".infopop").html(message).addClass("errorpop").animate({opacity:1,left:492},500);
			}
			
			function isGood(obj) {
				$(obj).removeClass("error").removeClass("active").parents("label").addClass("isgood").removeClass("error").removeClass("active").find(".infopop").removeClass("errorpop").animate({opacity:0,left:513},500);
			} 	

			function validate(obj) {
				// Extend jQuery object to include Regular expression masks assigned to properties
				mask = jQuery.extend({textfieldmask: /^[a-z\.\s-]{5,}$/i,phonemask: /^[0-9\(\)\+\.\s-]{8,}$/i,passwordmask: /^\w{5,}$/, emailmask:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/});
				// Extend jQuery object to include error messages assigned to properties
				errmsg = jQuery.extend({textfielderr:"5 or more letters",phoneerr: "Include dialling code",passworderr:"Minimum 5 characters",emailerr:"Invalid address",matcherr: "Must match"});
			
				// Set up variables to hold details of which mask to use and whether the field should match another field
				var masktouse = null;
				var mustmatch = null;
				// Determine the type of mask we're going to validate against
				switch(obj.name) {
					case "name": 		masktouse="textfieldmask"; 		errtouse="textfielderr"; 	break;
					case "phone": 		masktouse="phonemask"; 			errtouse="phoneerr"; 		break;
					case "username": 	masktouse="textfieldmask"; 		errtouse="textfielderr"; 	break;
					case "email": 		masktouse="emailmask"; 			errtouse="emailerr"; 		break;
					case "password": 	masktouse="passwordmask"; 		errtouse="passworderr"; 	mustmatch="verpassword"; 	break;
					case "verpassword": masktouse="passwordmask"; 		errtouse="passworderr"; 	mustmatch="password"; 		break;
				}
				// Check that the element is a required field before validating against it.
				if($(obj).parents("label").hasClass("required") && masktouse) {
					// Set up a quick way of accessing the object we're validating
					pointer = $(obj);
					// Test the value of the field against the Regular Expression
					if (mask[masktouse].test(pointer.val())) {
						// The field validated successfully!
						
						// Check to see if the field needs to match another field in the form
						if (mustmatch) {
							// It does need to match, so grab the object it needs to match
							matchobj = $("#"+mustmatch);
							if (matchobj.val()!='' && matchobj.val()!=pointer.val()) {
								// The fields don't match, so report an error on both of them
								reportErr(obj,errmsg["matcherr"]);	
								reportErr(matchobj,errmsg["matcherr"]);
							}
							else {
								// Either the fields match, or the other field hasn't been completed yet
								// If the other field has been completed, call the isGood function to clear any error message showing
								if (matchobj.val()!='') { isGood(matchobj);}
								return true;
							}
						}
						else {
							// No match is required, so return true - validation passed!
							return true;
						} 
					}
					else { 
						// The field failed to validate against the Regular Expression
						reportErr(obj,errmsg[errtouse]);
						return false; 
					}
				} 
				else {	
					// This isn't a required field, so we won't validate it against anything			
					return true;
				}
			}
		</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

