<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-12 col-xs-12 user-details clearfix pull-right">
<div class="row">
  <?php $user = $this->ion_auth->user()->row();?>
            <div class="well well-sm">
              <?php
                  $ningga = 'members';
                  if($this->ion_auth->in_group($ningga)){
                    echo form_open_multipart('members/myprofile/update_user');
                  }else{
                    echo form_open_multipart('management/myprofile/update_user');
                  }

                  //echo form_hidden('u_avatar', $user->s_avatar);
                ?>
                <div class="media">

                    <a class="thumbnail pull-left" href="#">
                        <div class="thumb">
                        <img style="width:100px; height:100px;" id="media-avatar" class="media-object" src="<?php 
                          if($user->s_avatar){
                            echo base_url().'uploads/user/avatar/'.$user->s_avatar;
                          }else{
                            echo base_url().'assets/ipapa/images/default_user.png';
                          }
                        ?>">
                      <div class="thumb-options">
                          <div class="fileUpload"><font color="white"><i class="fa fa-camera" ></i><br> Change Picture</font>
                            <input name="u_avatar" type="file" class="upload" id="uploader">
                        </div>
                      </div>
                  </div>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $user->username;?></h4>
                        <p><?php echo $user->company;?><br>
                        <i class="fa fa-map-marker"></i> <small> <?php echo $user->address;?></small> </p>
                      <!-- <p><span class="label label-info">81 messages</span> <span class="label label-warning">150 offices visited</span></p> -->
                    
                        
                    </div>
                </div>
            </div>
            <div class="user-info-block">
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#edit_profile">
                            <span class="fa fa-user"></span> Profile Setting
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#edit_account">
                            <span class="fa fa-cog"></span> Account Setting
                        </a>
                    </li>
                </ul>
                <div "user-body">
                    <div class="tab-content">
                        <div  id="edit_profile" class="tab-pane active">
                
                 <?php form_hidden('id', $user->id);?>
                <div style="padding-right:5px" class="block-inner">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Your Name</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $user->username;?>">
                      </div>
                      <div class="col-md-6">
                        <label>Company Name</label>
                        <input type="text" class="form-control" name="company" value="<?php echo $user->company;?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $user->address;?>">
                      </div>
                      <div class="col-md-6">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $user->phone;?>">
                      </div>
                    </div>
                  </div>
                </div>
<div style="padding-right:5px;" class="text-right">
                  <button type="button" onclick="history.go(-1);" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Apply Changes</button>
                </div>
                <?php echo form_close();?>
                        </div>
                        <div id="edit_account" class="tab-pane">
                <div style="padding-right:5px" class="block-inner">
                  <div class="form-group">
                    <?php
                     $ningga = 'members';

                      if($this->ion_auth->in_group($ningga)){
                        echo form_open('members/myprofile/update_password');
                      }else{
                        echo form_open('management/myprofile/update_password');
                      }
                    ?>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Email Account</label>
                        <input disabled type="email" class="form-control" value="<?php echo $user->email;?>">
                      </div>
                      <!--
                      <div class="col-md-6">
                        <label>Current Password</label>
                        <input type="password" name="old_password" class="form-control" value="">
                      </div>
                    -->
                      
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <label>Set New Password</label>
                        <input  type="password" required name="password" class="form-control" value="">
                      </div>
                      <div class="col-md-6">
                        <label>Confirm Your Password</label>
                        <input  type="password" required class="form-control" name="password_confirm" value="">
                      </div>
                    </div>
                  </div>
                  
                </div>
<div style="padding-right:5px;" class="text-right">
                  <button type="button" onclick="history.go(-1);" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Apply Changes</button>
                </div>
                <?php form_hidden('id', $user->id);?>
              <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                 

</div>
			
</section>