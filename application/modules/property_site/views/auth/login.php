<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Ipapa - User Login</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/ipapa/bm_login/styleFRU.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/ipapa/bm_login/font/css/fontello.css" />

<link rel="shortcut icon" href="<?php echo base_url();?>assets/ipapa/bm_login/img/favicon.ico" type="image/x-icon">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"></link>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--Login Section-->
<div class="section" id="section1">
  <div class="login-form">
    <h1>Login</h1>
    <p><img src="<?php echo base_url();?>assets/ipapa/bm_login/img/icon-fru.jpg"></p>
    <div>
      <?php
      $attribute = array(
            'class' => 'form-wrapper-01'
          );

      echo form_open("auth/login",$attribute);?>
         <?php   echo $message; ?>
      

      <!-- <form class="form-wrapper-01"> -->
        <input id="" name="identity" class="inputbox email" type="text" placeholder="Email id" />
        <input id="" name="password" class="inputbox password" type="password" placeholder="Password" />
        <p><button type="submit" class="button">Login</button></p>
      <?php echo form_close();?><br>
      Forget password? It's ok. <a class="scroll" href="#section3">Recover here &raquo;</a>
    </div>
    <hr />
    <!--
    <p>Or you can Sign up with one of the following</p>
  <a class="facebookBtn smGlobalBtn" href="social-media-profile-url" ></a>
<a class="twitterBtn smGlobalBtn" href="social-media-profile-url" ></a>
<a class="googleplusBtn smGlobalBtn" href="social-media-profile-url" ></a>
-->
    <p><a class="scroll" href="#section2">Register Now</a></p>
  </div>
</div>
<!--END: Login Section-->
<!--Signup Section-->
<div class="section" id="section2">
  <div class="login-form">
    <h1>Sign Up in Seconds!</h1>
    <p>Signup using your Email address</p>
    <div>
      <?php
      $attribute = array(
            'class' => 'form-wrapper-01',
            'id'  => 'register-form'
          );

      echo form_open("management/register",$attribute);?>
      <!-- <form class="form-wrapper-01"> -->
        <input id="" name="identity" class="inputbox email" type="text" placeholder="Email id" />
        <input id="" class="inputbox password" name="password" type="password" placeholder="Password" />
        <div id="errors"></div>
        <p><button type="submit" class="button">Create my account</button></p>
      <?php echo form_close();?>
    </div>
    <hr />
    <!--
    <p>Or you can Sign up with one of the following</p>
  <a class="facebookBtn smGlobalBtn" href="social-media-profile-url" ></a>
<a class="twitterBtn smGlobalBtn" href="social-media-profile-url" ></a>
<a class="googleplusBtn smGlobalBtn" href="social-media-profile-url" ></a>
-->
    <p>Already have an account? <a class="scroll" href="#section1">Login Here! &raquo;</a></p>

  </div>
</div>
<!--END: Signup Section-->
<!--Forget Password Section-->
<div class="section" id="section3">
  <div class="login-form">
    <h1>Lost password?</h1>
    <p>Ohk, don't panic. You can recover it here.</p>
    <div>
      <!-- <form class="form-wrapper-01"> -->
        <?php
          $attribute = array(
            'class' => 'form-wrapper-01',
            'id'  => 'forgot-form'
          );

         echo form_open("auth/forgot_password",$attribute);?>
        <input id="" name="email" class="inputbox email" type="text" placeholder="Email id" />
        <div id="errors"></div>
        <p><button type="submit" class="button">Send me</button></p>
      <?php echo form_close();?>
    </div>
    <hr />
    <p>You remember your Password? Brilliant!</p>
    <p><a class="scroll" href="#section1">&laquo; Login here</a></p>
  </div>
</div>
<!--END: Forget Password Section-->
<!--Script for Horizontal Scrolling-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/ipapa/bm_login/js/jquery.easing.1.3.js"></script>
<script type="text/javascript">
            $(function() {
                $('a.scroll').bind('click',function(event){
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollLeft: $($anchor.attr('href')).offset().left
                    }, 500,'easeInOutExpo');
                     /* Uncomment this for another scrolling effect */
					 /*
                    $('html, body').stop().animate({
                        scrollLeft: $($anchor.attr('href')).offset().left
                    }, 1000);*/
                    event.preventDefault();
                });
            });
        </script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript">
    (function($,W,D)
{
    var JQUERY4U = {};
 
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
               //set this to false if you don't what to set focus on the first invalid input
                    focusInvalid: true,
                    //by default validation will run on input keyup and focusout
                    //set this to false to validate on submit only
                    onkeyup: false,
                    onfocusout: false,
                    //by default the error elements is a <label>
                    errorElement: "div",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        error.appendTo("div#errors");
                    }, 
                rules: {
                    identity: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    password: {
                        required: "<div class='error-login'><small><font color='red'>*Please provide a password</font></small></div>",
                        minlength: "<div class='error-login'><small><font color='red'>*Your password must be at least 5 characters long</font></small></div>"
                    },
                    identity: "<div class='error-login'><small><font color='red'>*Please enter a valid email address</font></small></div>",
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
 
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
})(jQuery, window, document);
</script>
<script type="text/javascript">
    (function($,W,D)
{
    var JQUERY4U = {};
 
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#forgot-form").validate({
               //set this to false if you don't what to set focus on the first invalid input
                    focusInvalid: true,
                    //by default validation will run on input keyup and focusout
                    //set this to false to validate on submit only
                    onkeyup: false,
                    onfocusout: false,
                    //by default the error elements is a <label>
                    errorElement: "div",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        error.appendTo("div#errors");
                    }, 
                rules: {
                    email: {
                        required: true,
                        email: true
                    },

                },
                messages: {
                    email: "<div class='error-login'><small><font color='red'>*Please enter a valid email address</font></small></div>",
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
 
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
})(jQuery, window, document);
</script>

</body>
</html>