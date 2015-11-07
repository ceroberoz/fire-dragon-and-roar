<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ipapa Blog | Admin Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>/assets/ipapa/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome & Ionicons -->
        <link href="<?php echo base_url();?>/assets/ipapa/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/ipapa/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url();?>/assets/ipapa/admin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url();?>/assets/ipapa/admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>/assets/ipapa/admin/css/Ipapa.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <style type="text/css">
    body {
    background: linear-gradient(#226699, #f9f9f9) repeat scroll 0 0 rgba(0, 0, 0, 0);
}
    </style>
    <body >

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form accept-charset="utf-8" method="post" action="<?php echo base_url();?>auth/login" >
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="identity" class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                   <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div> 
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    
                   <!-- <p><a href="#">I forgot my password</a></p> -->
                    
                </div>
            </form>

        </div>
    

    </body>
</html>