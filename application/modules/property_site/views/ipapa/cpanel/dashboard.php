<!-- CONTENT START -->

<div style="min-height:500px; padding-top:25px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
<ul class="info-blocks">
		<li class="bg-white">
			<div class="top-info">
				<a href="<?php
        $group = array(1, 2);
		if ($this->ion_auth->in_group($group)){
            echo base_url().'management/myprofile';
        }else{
            echo base_url().'members/myprofile';
        }
        ;?>">My Profile</a>
					</div>
					<a href="<?php
        $group = array(1, 2);
		if ($this->ion_auth->in_group($group)){
            echo base_url().'management/myprofile';
        }else{
            echo base_url().'members/myprofile';
        }
        ;?>"><i class="fa fa-user"></i></a>
					<span class="bottom-info bg-white">Update your profile</span>
				</li>
                <?php $group = array(1, 2); if ($this->ion_auth->in_group($group)){;?>
                <li class="bg-white">
                    <div class="top-info">
                        <a href="<?php echo base_url();?>management/building">My Building</a>
                        <small></small>
                    </div>
                    <a href="<?php echo base_url();?>management/building"><i class="fa fa-cogs"></i></a>
                    <span class="bottom-info bg-white">Manage your building</span>
                </li>
                <li class="bg-white">
                    <div class="top-info">
                        <a href="<?php echo base_url();?>management/offices">Manage Office</a>
                        <small></small>
                    </div>
                    <a href="<?php echo base_url();?>management/offices"><i class="fa fa-cogs"></i></a>
                    <span class="bottom-info bg-white">Manage your Office</span>
                </li>
<?php };?>
				
    <?php $group = array(1,2); if (!$this->ion_auth->in_group($group)){;?>
				<li class="bg-white">
					<div class="top-info">
						<a href="<?php echo base_url();?>members/myoffice">My Favorite Offices</a>
					</div>
					<a href="<?php echo base_url();?>members/myoffice"><i class="fa fa-building-o"></i></a>
					<span class="bottom-info bg-white">See your Favorite Offices</span>
				</li>
    <?php } ;?>
               
               	<li class="bg-white">
					<div class="top-info">
						<a href="messages.html">My Messages</a>
					</div>
					<a href="<?php echo base_url();?>members/messages"><i class="fa fa-envelope"></i></a>
					<span class="bottom-info bg-white">You have <b>3</b> new messages</span>
				</li>
                
				<li class="bg-white">
					<div class="top-info">
						<a href="<?php echo base_url();?>members/mysubscription">Manage Subscription</a>
					</div>
					<a href="<?php echo base_url();?>members/mysubscription"><i class="fa fa-file-text"></i></a>
					<span class="bottom-info bg-white">Manage your alert</span>
				</li>  
    </ul>
</div>
			
</section>
</div>
<!-- CONTENT END -->
