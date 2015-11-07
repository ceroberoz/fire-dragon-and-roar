<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Developer" content="Ipapa Developer Team #Joss">
    <meta name="robots" content="index, follow, noodp, noydir">
    <meta name="google-site-verification" content="2LwPzUA8YvjL-8_73a0xOx-UNLpbZEwbxha-bB10UJo" />
    <!-- test searchbox result -->
    <script type="application/ld+json">
        {
           "@context": "http://schema.org",
           "@type": "WebSite",
           "url": "https://www.ipapa.co.id/",
           "potentialAction": {
             "@type": "SearchAction",
             "target": "http://ipapa.co.id/search/keyword/?={search_term_string}",
             "query-input": "required name=search_term_string"
           }
        }
</script>
<!-- test -->
    <?php 
    if($this->uri->segment(3) == "detail"){

        if(!$metas){ ;?>
        <meta name="description" content="Ipapa - City in your hands">

        <title>Ipapa - City in Your hands</title>
        <?php }else{ ;?>
        <?php foreach($metas as $meta):?>
            <meta name="description" content="<?php echo $meta->s_seo_meta_description_id;?>">
            <meta name="keywords" content="<?php echo $meta->s_building_name.','.$meta->s_city.','."Rent office space,
office space for lease,jakarta,design interior,office decor,building,business location";?>">

            <title>Ipapa - Rent Office Space <?php echo $meta->s_building_name;?></title>
            <link rel="canonical" href="<?php echo base_url();?>id/building/detail/<?php $name = $meta->s_building_name;
                            $lowcaps = strtolower($name);
                            $underscr = str_replace(' ', '-', $lowcaps);

                            echo $underscr;?>-<?php echo $meta->pk_building_id;?>" />
        <?php endforeach;?>
    <?php } }
    elseif($this->uri->segment(2) == "furniture"){
        ;?>

        <title>Ipapa : Detailed furniture list </title>
        <meta name="description" content="Find furniture for office space at a low price.
        Ipapa also provide a wide selection of furniture table, chairs or even wallpaper to beautifully cover up your wall.
        With Ipapa you will get a free consultation with our design interior contractor" />
        <meta name="keyword" content="rent office space,architecture,architect,office decoration,interior design,
        Available Office Space,table,wallpaper,chairs,business location,contractor" />
        <link rel="canonical" href="<?php echo base_url();?>furniture" />

<?php } elseif($this->uri->segment(2) == "decoration"){ ;?>
        <title>Ipapa : Fit Out Services</title>
    <meta name="description" content="Ipapa provides wide range of fit out services including reuse your old furnitures.
    We also provide office interior consultation for free more than that we have the best contractor team and reputable architect for perfecting your office decoration" />
    <meta name="keyword" content="rent office space,architecture,architect,office decoration, interior design, 
    Available Office Space,kitchen,bath,modern,traditional,contemporary,business location,contractor" />
    <link rel="canonical" href="<?php echo base_url();?>decoration" />
 
 <?php } elseif($this->uri->segment(2) == "services"){ ;?>
        <title>Ipapa - City in your hands | Consultation Service</title>
    <meta name="description" content="On Ipapa, our team is updating the information on a daily basis,
    we also provide a feature which allows the Building Managements or architect interior design to update the
    information of their particular buildings on the website and applications" />
    <meta name="keyword" content="rent office space,office space for lease,architect interior design,office decoration,business location,furniture
    ,contractor,architect,wallpaper,business location" />
    <link rel="canonical" href="<?php echo base_url();?>services" />
 <?php } elseif($this->uri->segment(2) == "faqs"){ ;?>

 <title>Ipapa - Frequent Ask Question</title>
<meta name="description" content="We provide detailed information regarding the office buildings and also the direct contact information of the building managements for you.
You can check the availability of the office space in any particular building on our website" />
<meta name="keyword" content="rent office space,office space for lease,architect interior design,office decoration,business location,furniture
,contractor,architect,wallpaper,business location" />
<link rel="canonical" href="<?php echo base_url();?>faqs" />
 <?php } elseif($this->uri->segment(2) == "about") { ;?>
<title>Ipapa - About this website</title>
<meta name="description" content="Ipapa is an E-Building Marketing and Consultancy, at this prelimanary stage,
we are focusing in searching for available office spaces in Jakarta. Ipapa also provide funiture and free consultation for the interior design of your office space" />
<meta name="keyword" content="available office space,rent office space,building management,office space in jakarta,furniture,ipapa,business,office decoration,interior design" />
<link rel="canonical" href="<?php echo base_url();?>about" />
 <?php } else  { ;?>
    
    <title>Ipapa : Office Space for Rent | Office Decoration</title>
    <meta name="description" content="Search office space for rent or lease on Ipapa, or in need of fit out services such as; renovation, redesign, move out, or buying office funitures.
    Find Office Space listings and than Ipapa also offer for office space available in the world" />
    <meta name="keyword" content="office space for rent,lease office space,virtual office, Available Office Space, executive suites, furniture, Office Space listings,
    office decorating,interior design" />
<link rel="canonical" href="<?php echo base_url();?>/id/home" />
   <?php } ;?>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/ipapa/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/ipapa/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Style CSS -->
    <link href="<?php echo base_url();?>assets/ipapa/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/ipapa/ipapa.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/ipapa/css/menumobile/jquery.sidr.light.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php echo base_url();?>assets/ipapa/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url();?>assets/ipapa/css/tooltip.css" rel="stylesheet" type="text/css"  />
    <link href="<?php echo base_url();?>assets/ipapa/css/jquery-ui.css" rel="stylesheet">
    <!--
    <link href="<?php echo base_url();?>assets/ipapa/css/rangeslider/rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/ipapa/css/rangeslider/skinFlat.css" rel="stylesheet">

    -->
    <link href="<?php echo base_url();?>assets/ipapa/css/iCheck/minimal/blue.css" rel="stylesheet">
    <?php if($this->uri->segment(3) == "map"){?>
    <link href="<?php echo base_url();?>assets/ipapa/css/iCheck/minimal/green.css" rel="stylesheet">
    <?php };?>
    <?php if($this->uri->segment(2) == "sitemap"){?>
    <link href="<?php echo base_url();?>assets/ipapa/css/sitemap.css" rel="stylesheet">
    <?php };?>
    
    <?php if($this->uri->segment(2) == "about"){?>
    <link href="<?php echo base_url();?>assets/ipapa/about/css/marketing.css" rel="stylesheet" media="screen" type="text/css">
    <link href="<?php echo base_url();?>assets/ipapa/about/css/jquery.css" rel="stylesheet" media="screen" type="text/css">
    <link href="<?php echo base_url();?>assets/ipapa/about/css/careers.css" rel="stylesheet" media="screen" type="text/css">
    <?php };?>
    <?php if($this->uri->segment(2) == "furniture" || $this->uri->segment(2) == "fit-out"){ ;?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/ipapa/css/furniture.css" />
    <script src="<?php echo base_url();?>assets/ipapa/js/furniture/modernizr.custom.js"></script> 
    <?php } ;?>
    <!--[if lt IE 7]>
    <style type="text/css">
    #cvi_tooltip {
      width:expression(this.offsetWidth>240?'240px':'auto');
    }
    </style>
    <![endif]-->
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'> -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url();?>assets/ipapa/assets/js/html5shiv.js"></script>
      <script src="<?php echo base_url();?>assets/ipapa/assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/ipapa/assets/ico/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/ipapa/assets/ico/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/ipapa/assets/ico/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/ipapa/assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/ipapa/assets/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/ipapa/assets/ico/apple-touch-icon-144x144.png">


    <?php if($this->uri->segment(1) == "about"){?>
    <script src="<?php echo base_url();?>assets/ipapa/about/js/enquire.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/about/js/marketing.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/about/js/careers.js"></script>
    <?php };?>

	<script>
    	function fbShare(url, title, summary, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[url]=' + url + '&p[title]=' + title + '&p[summary]=' + summary + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
		</script>
        <script>
    	function twShare(url, text, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.twitter.com/share?s=100&p[url]=' + url + '&p[text]=' + text + '&p[summary]=' + descr + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
		</script>
        <script>
    	function gogShare(url, text, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://plus.google.com/share?url=' + url + '&p[text]=' + text + '&p[summary]=' + descr + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
		</script>
        <script>
    	function linkShare(url, title, source, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + url + '&p[title]=' + title + '&p[source]=' + source + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
		</script>
</head>
<body>
