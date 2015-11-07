
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <div class="ipapalogo">
                    <a class="hidden-xs" href="<?php echo base_url();?>blog/home"><img src="<?php echo base_url();?>assets/ipapa/images/img/ipapalogo.png" alt="logo"></a>
                    <a class="hidden-lg hidden-md hidden-sm" href=""><img src="<?php echo base_url();?>assets/ipapa/images/img/logo_mobile.png" alt="logo"></a>
                </div>
                 <?php echo form_open('blog/search/index');?>
                <div class="ipapasearchbox">
                    <form action="#">
                    <input class="searchbox" type="text" name="keyword" placeholder="Search...">
                    <button class="btn-search" type="submit"> <img src="<?php echo base_url();?>assets/ipapa/images/img/icon-search.png" alt="search"></button>
                    </form>
                </div>
				<?php echo form_close();?><!-- end search form -->

            </header>
        </div>

		
        <div class="main-container">
            <div class="main wrapper clearfix">
                <div class="content-left">
                	<h1 class="arsip">Archives : <?php
					// get list of blog-items
					$last_year_month = "";	
					// traverse items in foreach loop
					foreach($tglarchive as $arc) {
					  $arc = get_object_vars($arc);
					  // extract year and month
					  $year_month = substr($arc["t_added"], 0, 7);
					  $date = date("Y-m", strtotime($arc["t_added"]));				
					  // if year and month has changed
					  if($year_month != $last_year_month) {
						 $last_year_month = $year_month;				
						 echo date("F", mktime(0, 0, 0, intval(substr($year_month, 5, 2)) - 0, 1, 1970)) . ", " . substr($year_month, 0, -3);
					  }
					}
				?></h1>
                	<?php foreach($archive as $post): ?>
                    <div class="content-article">
                        <div class="img-article">
                            <img alt="<?php $filename = array('.jpg','.jpeg','.png','.gif'); echo str_replace($filename,'',$post->picture); ?>" src="<?php if($post->picture){ echo base_url()."assets/uploads/files/".$post->picture; }else{ echo base_url()."assets/uploads/files/default-no-img.png"; }?>" width="250" height="200" class="fancybox">
                        </div>
                        <div class="isi-article">
                            <h1><a class="judul" href="<?php echo base_url();?>blog/detail/index/<?php 
							//$invalid = array(":","?",","," ");
							//echo str_replace($invalid,"_",$post->title);
							$title = $post->title;
							$lowcaps = strtolower($title);
							$underscr = str_replace(' ', '-', $lowcaps);
							echo $underscr;?>-<?php echo $post->pk_posting_id;?>"><?php echo $post->title;?></a></h1>
                            <p class="isi-artikel"><?php echo substr($post->description,0,240);?></p>
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
                                <a class="readmore" href="<?php echo base_url();?>blog/detail/index/<?php echo $post->pk_posting_id;?>">Read more</a>
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
					foreach($archives as $arc) {
					  $arc = get_object_vars($arc);
					  // extract year and month
					  $year_month = substr($arc["t_added"], 0, 7);
					  $date = date("Y-m", strtotime($arc["t_added"]));				
					  // if year and month has changed
					  if($year_month != $last_year_month) {
						 $last_year_month = $year_month;				
						 echo "<li><a class='list-archive' href='".base_url()."blog/home/archives/".$date."'>" . date("F", mktime(0, 0, 0, intval(substr($year_month, 5, 2)) - 0, 1, 1970)) . " " . substr($year_month, 0, -3) . "</a></li>\n";
					  }
					}
				?>
                </ul>
             </div>
                <div class="mailing-list">
                    <h1 class="text-mailing">Newsletter</h1>
                    <p class="text-intro">Enter your email address to subscribe to our newsletter:</p>
                    <input class="form-mailing" type="email" placeholder="Email address">
                    <button class="btn-mailing" type="submit">Subcribe Now</button>
                </div>
              </div> <!-- End Sidebar-Right -->
            </div> <!-- #main -->
        </div> <!-- #main-container -->
