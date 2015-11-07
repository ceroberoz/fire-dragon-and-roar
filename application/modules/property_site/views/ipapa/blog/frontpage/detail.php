
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <div class="ipapalogo">
                    <a class="hidden-xs" href="<?php echo base_url();?>blog"><img src="<?php echo base_url();?>assets/ipapa/images/img/ipapalogo.png" alt="logo"></a>
                    <a class="hidden-lg hidden-md hidden-sm" href=""><img src="<?php echo base_url();?>assets/ipapa/images/img/logo_mobile.png" alt="logo"></a>
                </div>
                 <?php echo form_open('blog/search');?>
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
                	<?php foreach($posting as $post): ?>
                    <h1><a class="judul" href=""><?php echo $post->title;?></a></h1>
                    <div class="authorpost-detail">By: <?php if($post->fk_users_id == 1){ echo "Ilham S"; }?> | 
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
                    <?php if($post->picture){ ?>
                    <div class="img-detail-article">
                        <img alt="<?php echo $post->alt_picture; ?>" src="<?php echo base_url()."assets/uploads/files/".$post->picture; ?>" width="665" height="400" class="fancybox">
                    </div>
                    <?php } ?>
                    <div class="detail-article">
                        <p class="isi-artikel-detail">
                            <?php echo $post->description;?>
                        </p>                  
                    </div>
                    <div class="social-share">
							 <a href="javascript:fbShare('<?php echo base_url();?>blog/detail/<?php $title = $post->title; $lowcaps = strtolower($title); $underscr = str_replace(' ', '-', $lowcaps); echo $underscr;?>-<?php echo $post->pk_posting_id;?>', '<?php echo $post->title;?>', '<?php echo strip_tags(substr($post->description,0,180));?>', '', 520, 350)"><img src="<?php echo base_url();?>assets/uploads/files/facebook.png"></a>
                             <a href="javascript:twShare('<?php echo base_url();?>blog/detail/<?php $title = $post->title; $lowcaps = strtolower($title); $underscr = str_replace(' ', '-', $lowcaps); echo $underscr;?>-<?php echo $post->pk_posting_id;?>', '<?php echo strip_tags(substr($post->description,0,180));?>', '', '', 520, 350)"><img src="<?php echo base_url();?>assets/uploads/files/twitter.png"></a>
                             <a href="javascript:gogShare('<?php echo base_url();?>blog/detail/<?php $title = $post->title; $lowcaps = strtolower($title); $underscr = str_replace(' ', '-', $lowcaps); echo $underscr;?>-<?php echo $post->pk_posting_id;?>', '', '<?php echo strip_tags(substr($post->description,0,180));?>', '', 520, 350)"><img src="<?php echo base_url();?>assets/uploads/files/gplus.png"></a>
                             <a href="javascript:linkShare('<?php echo base_url();?>blog/detail/<?php $title = $post->title; $lowcaps = strtolower($title); $underscr = str_replace(' ', '-', $lowcaps); echo $underscr;?>-<?php echo $post->pk_posting_id;?>', '<?php echo strip_tags($post->title);?>', 'Ipapa Blog', '', 520, 350)"><img src="<?php echo base_url();?>assets/uploads/files/linkedin.png"></a>
                    </div>
                    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'ipapablog'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments.</a></noscript>
    
					<?php endforeach;?>
                    
                         <div class="bottom-border"></div> 

                         <div class="related-post">
                            <h1 class="related-post">Related Post</h1>
                            <?php foreach($related as $related_post): ?>
                            <div class="related-box">
                                <a  class="title-related-post" href="<?php echo base_url();?>blog/detail/<?php 
							//$invalid = array(":","?",","," ");
							//echo str_replace($invalid,"_",$post->title);
							$title = $related_post->title;
							$lowcaps = strtolower($title);
							$underscr = str_replace(' ', '-', $lowcaps);
							echo $underscr;?>-<?php echo $related_post->pk_posting_id;?>"><?php echo $related_post->title;?></a>
                                <div class="author-related-post">
								<?php echo date("d/m/y", strtotime($related_post->t_added));?>  By: <?php if($post->fk_users_id == 1){ echo "Ilham S"; }?>
                                </div>
                                <p class="content-related-post">
                                <?php
									$words_limit = 20; 
									echo limit_words($related_post->description, $words_limit, ' ... ');
									//echo substr($related_post->description,0,180);
								?>
										<a class="link-readmore" href="<?php echo base_url();?>blog/detail/<?php 
										//$invalid = array(":","?",","," ");
										//echo str_replace($invalid,"_",$post->title);
										$title = $related_post->title;
										$lowcaps = strtolower($title);
										$underscr = str_replace(' ', '-', $lowcaps);
										echo $underscr;?>-<?php echo $related_post->pk_posting_id;?>">Read more</a>
                                </p>
                            </div>
                            <?php endforeach;?>

                         </div>

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
						 echo "<li><a class='list-archive'  href='".base_url()."blog/archive/".$date."'>" . date("F", mktime(0, 0, 0, intval(substr($year_month, 5, 2)) - 0, 1, 1970)) . " " . substr($year_month, 0, -3) . "</a></li>\n";
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

              <!--  <div class="tagcloud hidden-xs">
                    <a href="">Office For Lease</a><a href="">Building</a><a href="">South jakarta</a>
                    <a href="">Business District</a><a href="">Available Office Space</a><a href="">Office Space in Sudirman</a>
                    <a href="">Global Office</a><a href="">Good Bussiness</a><a href="">Hottest market</a>
                    <a href="">Office</a><a href="">Office</a><a href="">Office</a>
                </div> -->

                   <div class="recent-post hidden-xs">
                            <h1 class="recent-post">Recent Post</h1>
                            <?php foreach($recent as $rec): ?>
                            <div class="recent-box">
                                <a class="title-related-post" href="<?php echo base_url();?>blog/detail/<?php 
							//$invalid = array(":","?",","," ");
							//echo str_replace($invalid,"_",$post->title);
							$title = $rec->title;
							$lowcaps = strtolower($title);
							$underscr = str_replace(' ', '-', $lowcaps);
							echo $underscr;?>-<?php echo $rec->pk_posting_id;?>"><?php echo $rec->title;?></a>
                                <div class="author-recent-post">
                                	<?php echo date("d/m/y", strtotime($rec->t_added));?>  By: <?php if($post->fk_users_id == 1){ echo "Ilham S"; }?>
                                    </div>
                                <p class="content-recent-post">
                               	<?php
									$words_limit = 21; 
									echo limit_words($rec->description, $words_limit, ' ... ');
									//echo substr($rec->description,0,180);
								?>
                                    <a class="link-readmore" href="<?php echo base_url();?>blog/detail/<?php 
									//$invalid = array(":","?",","," ");
									//echo str_replace($invalid,"_",$post->title);
									$title = $rec->title;
									$lowcaps = strtolower($title);
									$underscr = str_replace(' ', '-', $lowcaps);
									echo $underscr;?>-<?php echo $rec->pk_posting_id;?>">Read more</a>
                                </p>
                            </div>
                            <?php endforeach; ?>
                         </div>

              </div> <!-- End Sidebar-Right -->
            </div> <!-- #main -->
        </div> <!-- #main-container -->