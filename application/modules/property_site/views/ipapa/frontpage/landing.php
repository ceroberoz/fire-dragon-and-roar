    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/ipapa/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Style CSS -->
    <link href="<?php echo base_url();?>assets/ipapa/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/ipapa/ipapa.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url();?>assets/ipapa/assets/js/html5shiv.js"></script>
      <script src="<?php echo base_url();?>assets/ipapa/assets/js/respond.min.js"></script>
    <![endif]-->

    <script language="javascript">
      var max_time = 5;
      var cinterval;
       
      function countdown_timer(){
      // decrease timer
      max_time--;
      document.getElementById('countdown').innerHTML = max_time;
      if(max_time == 0){
      //clearInterval(cinterval);
      var url = "http://beta.ipapa.co.id";    
      $(location).attr('href',url);
      }
      }
      // 1,000 means 1 second.
      cinterval = setInterval('countdown_timer()', 1000);
</script>

</head>
<body> 

		         
<section>  
      <div class="landing landing-box">

              <center>  
                <img src="<?php echo base_url();?>assets/ipapa/images/logo-square.png"><br><br>
                
                <p>You are now registed member of IPAPA, please confirm your membership by clicking the link that we sent to your email address.<br>
                <a href="<?php echo base_url();?>">Click here if your browser does not automatically redirect you</a></p>
                <p>Redirecting in <span id="countdown">5</span> seconds.</p>
                <p><img src="<?php echo base_url();?>assets/ipapa/images/loading.gif"></p>


              </center>
       
      </div>
            
  </section>

 
    
    <!-- Bootstrap core and JavaScript's
    ================================================== -->
     <script src="<?php echo base_url();?>assets/ipapa/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/bootstrap.js"></script>
   
</body>
</html>