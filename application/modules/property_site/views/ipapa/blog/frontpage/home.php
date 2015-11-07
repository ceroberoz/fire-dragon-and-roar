
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <div class="ipapalogo">
                    <a class="hidden-xs" href="<?php echo base_url();?>blog"><img src="<?php echo base_url();?>assets/ipapa/images/img/ipapalogo.png" alt="logo"></a>
                    <a class="hidden-lg hidden-md hidden-sm" href=""><img src="<?php echo base_url();?>assets/ipapa/images/img/logo_mobile.png" alt="logo"></a>
                </div>
                <?php echo form_open('blog/search/');?> 
                <div class="ipapasearchbox">
                    <form action="#">
                    <input class="searchbox" type="text" name="keyword" placeholder="Search...">
                    <button class="btn-search" type="submit"> <img src="<?php echo base_url();?>assets/ipapa/images/img/icon-search.png" alt="search"></button>
                    </form>
                </div>
				<?php echo form_close();?><!-- end search form -->
            </header>
        </div>

<div class="bannercontainer centerme">
<ul>
<!-- THE 1. SLIDE -->
<li data-transition="fade" data-startalign="right,bottom" data-endAlign="center,top" data-panduration="12" data-colortransition="4">
    <img alt="" src="<?php echo base_url();?>assets/uploads/files/slider/img2.jpg"/>
<div class="creative_layer">
    <div class="cp-left faderight">
<p class="cp-title">Find Office For Lease</p>
<p>ipapa<br/><i><strong>Lorem ipsum dolor sit amet,</strong></i></p>                               
<p> consectetuer adipiscing elit,<br/>laoreet dolore magna aliquam erat volutpat<br/>is fully-responsive and offering cutting-edge</p>

    <div class="clear"></div>
    </div>                                   
</div>
</li>
<!-- THE 2. SLIDE -->
<li data-startalign="left,right" data-endAlign="center,top" data-panduration="12" data-colortransition="4">
    <img alt="" src="<?php echo base_url();?>assets/uploads/files/slider/img1.png"/>
<div class="creative_layer">
    <div class="cp-left faderight">
<p class="cp-title">asdfasdfasdf</p>
<p>intro text here<br/><i><strong>Lorem ipsum dolor sit amet,</strong></i></p>                               
<p> consectetuer adipiscing elit,<br/>laoreet dolore magna aliquam erat volutpat<br/>is fully-responsive and offering cutting-edge</p>


    <div class="clear"></div>
    </div>                                   
</div>
</li>

</ul>


</div>

<!-- End HTML Slider --> 
		
        <div class="main-container">
            <div class="main wrapper clearfix">
                <div class="content-left">
                	<?php foreach($posting as $post): ?>
                    <div class="content-article">
                        <div class="img-article hidden-xs">
                            <img alt="<?php echo $post->alt_picture; ?>" src="<?php if($post->picture){ echo base_url()."assets/uploads/files/".$post->picture; }else{ echo base_url()."assets/uploads/files/default-no-img.png"; }?>" width="250" height="200" class="fancybox img-thumbnail">
                        </div>
                        <div class="isi-article"> 
                            <h1><a class="judul" href="<?php echo base_url();?>blog/detail/<?php 
							//$invalid = array(":","?",","," ");
							//echo str_replace($invalid,"_",$post->title);
							$title = $post->title;
							$lowcaps = strtolower($title);
							$underscr = str_replace(' ', '-', $lowcaps);
							echo $underscr;?>-<?php echo $post->pk_posting_id;?>"><?php echo $post->title;?></a></h1>
                            <p class="isi-artikel">
							<?php
								$words_limit = 25; 
								echo limit_words($post->description, $words_limit, ' ... ');
								//echo substr($post->description,0,180);
							?>
                            </p>
                            <div class="clearfix"> </div>
                            <div class="authorpost">
                               By: <?php if($post->fk_users_id == 1){ echo "Ilham S"; }?> | 
								<?php 
									date_default_timezone_set('Asia/Jakarta');
									$time_difference = time() - strtotime($post->t_added) ; 
 
									$seconds = $time_difference ; 
									$minutes = round($time_difference / 60 );
									$hours = round($time_difference / 3600 ); 
									$days = round($time_difference / 86400 ); 
									$weeks = round($time_difference / 604800 ); 
									$months = round($time_difference / 2419200 ); 
									$years = round($time_difference / 29030400 ); 
									// Seconds
									if($seconds <= 60){
										echo "$seconds seconds ago"; 
									}
									//Minutes
									else if($minutes <=60){
										if($minutes==1){
									   		echo "1 minute ago"; 
									   	}else{
											echo "$minutes minutes ago"; 
									    }
									}
									//Hours
									else if($hours <=24){
									   if($hours==1){
									   		echo "1 hour ago";
									   }else{
									  		echo "$hours hours ago";
									   }
									}
									//Days
									else if($days <= 7){
										if($days==1){
									   		echo "1 day ago";
									  	}else{
									   		echo "$days days ago";
									    }
									}
									//Weeks
									else if($weeks <= 4){
										if($weeks==1){
									   		echo "1 week ago";
									    }else{
									   		echo "$weeks weeks ago";
									    }
									}
									//Months
									else if($months <=12){
										if($months==1){
									   		echo "1 month ago";
									   }else{
									   		echo "$months months ago";
									   }
									}
									//Years
									else{
									   if($years==1){
											echo "1 year ago";
									   }else {
											echo "$years years ago";
									   }
									}
								?>
                            </div>
                            <div class="readmore">
                                <a class="readmore" href="<?php echo base_url();?>blog/detail/<?php 
							//$invalid = array(":","?",","," ");
							//echo str_replace($invalid,"_",$post->title);
							$title = $post->title;
							$lowcaps = strtolower($title);
							$underscr = str_replace(' ', '-', $lowcaps);
							echo $underscr;?>-<?php echo $post->pk_posting_id;?>">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-border"></div>
                    <?php endforeach;?>
			<!--
                 <div class="pagination clearfix">
                    <ul class="pagination">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                        <li><a href="#">Last»</a></li>
                    </ul>
                 </div>
			-->
            	<?php echo $pagination;?>
                </div> <!-- End content-left -->

            <div class="sidebar-right">
                <div class="hidden-xs">
                <h1 class="arsip">Archives</h1>
                <ul class="archive">
				<?php
					// get list of blog-items
					$last_year_month = "";	
					// traverse items in foreach loop
					foreach($archives as $archive) {
					  $archive = get_object_vars($archive);
					  // extract year and month
					  $year_month = substr($archive["t_added"], 0, 7);
					  $date = date("Y-m", strtotime($archive["t_added"]));		
					  // if year and month has changed 
					  if($year_month != $last_year_month) {
						 $last_year_month = $year_month;				
						 echo "<li><a class='list-archive' href='".base_url()."blog/archive/".$date."'>" . date("F", mktime(0, 0, 0, intval(substr($year_month, 5, 2)) - 0, 1, 1970)) . " " . substr($year_month, 0, -3) . "</a></li>\n";
					  }
					}
				?> 
                </ul>
             </div>
                <div class="mailing-list">
                    <h1 class="text-mailing">Newsletter</h1>
                    <p class="text-intro">Enter your email address to subscribe to our newsletter:</p>
                    <?php
                         $attr = array(
                         	'class' => 'form-inline',
                    	 );
                    echo form_open('public/subscribe_blog',$attr);?>
                    <form class="form-inline" role="form">
                    <input class="form-mailing" type="email" placeholder="Email address" name="g_subscribe" id="email" required="">
                    <button class="btn-mailing" type="submit">Subscribe Now</button>
                    <?php echo form_close();?> 
                </div>
              </div> <!-- End Sidebar-Right -->
            </div> <!-- #main -->
        </div> <!-- #main-container -->
