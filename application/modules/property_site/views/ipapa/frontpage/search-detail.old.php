<div class="fixed_width">
<div itemscope itemtype="http://data-vocabulary.org/Product"> <!-- start Rich Snippet -->  
<section class="clearfix">
    <div style="padding-top:10px; padding-bottom:5px;" class="container">
      <div class="row">
        <?php foreach($building as $detail):?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
               <h1 class="judul"><a href=""><span itemprop="name"><?php echo $detail->s_building_name;?></span></a> Office Space For Rent</h1>
               <span itemscope itemtype="http://schema.org/Organization">
                <small class="lokasi"><i class="fa fa-map-marker"></i> <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><?php echo $detail->s_location;?>,<?php echo $detail->s_kecamatan;?>,<?php echo $detail->s_kelurahan;?></span><br>
                  &nbsp; &nbsp; &nbsp;<?php echo $detail->s_province;?> - <?php echo $detail->s_city;?>
                </small>    
                </span>                              
        </div> 

<div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header login_modal_header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h2 class="modal-title" id="myModalLabel">Contact us</h2>
                                          </div>
                                          <div class="modal-body register-modal">
                                            <?php echo form_open('message/send');?>
                                            <?php echo form_hidden('bid', $detail->pk_building_id);?>
                                            <div class="clearfix"></div>
                                            <div id='social-icons-conatainer'>
                                              <div class='modal-body-left'>
                                                <div class="form-group">
                                                      <input name="m_subject" type="text" id="register-pass" placeholder="Subject" value="" class="form-control register-field" required>
                                                      <i class="fa fa-user fa-fw register-field-icon"></i>
                                                  </div>
                                                <div class="form-group">
                                                      <input name="m_email" type="email" id="email" placeholder="Your Email" value="" class="form-control register-field" required>
                                                      <i class="fa fa-envelope-o fa-fw register-field-icon"></i>
                                                  </div>
                                                  <button type="submit" class="btn btn-success modal-register-btn">Send Message</a>
                                              </div>

                                              <div class='modal-body-right'>
                                                <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <textarea name="m_content" style="resize:vertical;" class="form-control" placeholder="Message..." rows="5" name="comment" required></textarea>
                                                                </div>
                                                            </div>
                                              </div>  
                                              
                                            </div>                                                        
                                            <div class="clearfix"></div>
                                            <?php echo form_close();?>
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="modal-footer login_modal_footer"></div>
                                      </div>
                                    </div>
                                </div> 

      </div>
    </div>
</section><!-- end generalwrapper -->
    <section class="generalwrapper dm-shadow clearfix">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 clearfix">
                        <div id="tabbed_widget" class="tabbable clearfix"> 
                          <ul class="nav nav-tabs">
                            <li  class="active"><a href="#building" data-toggle="tab">Building</a></li>
                            <li><a href="#office" data-toggle="tab">Office</a></li>
                           <!-- <li><a href="#layout" data-toggle="tab">Layout</a></li>
                            <li><a href="#video" data-toggle="tab">Video</a></li> -->
                          </ul>
                          <div class="tab-content clearfix">
                            <div class="tab-pane active" id="building">
                                
                                  <div class="container">
                                    <div class="row">
                                        <div id="property-slider" class="clearfix">
                                            <div class="flexslider">
                                                <ul class="slides">
                                                <?php if($images){;?>

                                                <?php foreach($images as $image):?>
                                                  <?php
                                                    $img_src = 'uploads/building/image/'.$image->s_picture;
                                                    $width = 640;
                                                    $height = 480;

                                                   ?>
                                                  <li><img itemprop="image" alt="<?php echo $image->s_building_name;?>" src="<?php echo base_url('/uploads/building/image/'. thumb($img_src, $width, $height)); ?>"></li>
                                                <?php endforeach;?>

                                                <?php } else { ;?>
                                                  <li><img itemprop="image" alt="<?php echo $detail->s_building_name;?>" src="<?php echo base_url();?>/assets/ipapa/images/640x480.png"></li>
                                                <?php } ;?>
                                                </ul><!-- end slides -->
                                            </div><!-- end flexslider -->
                                            
                                        </div><!-- end property-slider -->
                                    </div><!-- end col-lg-8 -->
                                </div>
<div class="shareon">
  <span>Share On:</span>
    <a href="javascript:fbShare('<?php echo base_url();?>building/detail/<?php $title = $detail->s_building_name; $lowcaps = strtolower($title); $underscr = str_replace(' ', '-', $lowcaps); echo $underscr;?>-<?php echo $detail->pk_building_id;?>', '<?php echo $detail->s_building_name;?>', '<?php echo strip_tags(substr($detail->s_description_en,0,180));?>', '', 520, 350)"><img src="<?php echo base_url();?>assets/ipapa/images/facebook.png" width="26" height="26"></a>
    <a href="javascript:twShare('<?php echo 'Ipapa - Rent Office Space '.$detail->s_building_name;?>', '<?php echo base_url();?>building/detail/<?php $title = $detail->s_building_name; $lowcaps = strtolower($title); $underscr = str_replace(' ', '-', $lowcaps); echo $underscr;?>-<?php echo $detail->pk_building_id;?>', '<?php echo strip_tags(substr($detail->s_description_en,0,180));?>', '', 520, 350)"><img src="<?php echo base_url();?>assets/ipapa/images/twitter.png" width="26" height="26"></a>
    <a href="javascript:gogShare('<?php echo base_url();?>building/detail/<?php $title = $detail->s_building_name; $lowcaps = strtolower($title); $underscr = str_replace(' ', '-', $lowcaps); echo $underscr;?>-<?php echo $detail->pk_building_id;?>', '<?php echo $detail->s_building_name;?>', '<?php echo strip_tags(substr($detail->s_description_en,0,180));?>', '', 520, 350)"><img src="<?php echo base_url();?>assets/ipapa/images/googleplus.png" width="26" height="26"></a>
  <div class="pull-right">
    <span class="hidden-lg hidden-md hidden-xs" itemprop="review" itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
    <span itemprop="rating">4.4</span> stars, based on <span itemprop="count">89
      </span> reviews
  </span>
    <a class="addas" href=""><?php
$pocky = array(1,2);
if(!$this->ion_auth->in_group($pocky)){
  if($this->ion_auth->logged_in()){
    $uid = $this->ion_auth->user()->row()->id;
    if($detail->fk_users_id == $uid){
      if($detail->b_fav == "1"){
?>
  <?php echo form_open('favorite/remove');?>
  <?php
      echo form_hidden('bid', $detail->pk_building_id);
      echo form_hidden('uid', $uid);
    ?>
    <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class="fa fa-star"></i> Add as favorite</i></button>
  <?php echo form_close();?>
      <?php }else{ ;?>
        <?php echo form_open('favorite/add');?>
        <?php echo form_hidden('bid', $detail->pk_building_id);?>
          <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class="fa fa-star"></i> Add as favorite</button>
        <?php echo form_close();?>
      <?php } ?>
    <?php }else{ ;?>
    <?php echo form_open('favorite/add');?>
    <?php echo form_hidden('bid', $detail->pk_building_id);?>
      <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class="fa fa-star"></i> Add as favorite</button>
    <?php echo form_close();?>
    <?php } 
  }else{ ;?>
    <?php echo form_open('auth/login');?>
      <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class="fa fa-star"></i> Add as favorite</button>
    <?php echo form_close();?>
 <?php }}
?></a>
<!-- <a href="" onClick="window.print();"><i class="fa fa-print"></i> Print a page</a> -->
  </div> 
</div>

                              <div style="padding-top:20px;">
                               <hr>
                                    <h3 class="judul">Building Description</h3>
          
                                    <span itemprop="description"><?php
                                            if($detail->s_description_en){
                                                echo $detail->s_description_en;
                                            }else{
                                                echo "<i>No building information on this building.</i>";
                                            }
                                        ?>
                                    </span>

                          </div>

                              
                                 <hr>
<?php if($detail->s_lng && $detail->s_lat){ ;?>
<h3 class="judul">Map Location</h3>

    <!-- maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKZ1EcVo38Fo0z30SXmtaNLBTV70kblCI"></script>

    <script>


function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $detail->s_lat;?>,<?php echo $detail->s_lng;?>);
  var mapOptions = {
    zoom: 16,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var image = '<?php echo base_url();?>assets/ipapa/images/mapc.png';
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: image,
      title: '<?php echo $detail->s_building_name;?>'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);


    </script>

<div id="map-canvas" style="height:280px; width:100%;"></div>
<div style="padding-bottom: 15px;"></div>
<?php } ;?>
                            </div><!-- tab pane-->

                            <div style="padding-top:-5px;" class="tab-pane" id="office">     
          
                              <div class="box-body table-responsive">
                                    <table class="table table-noborder">
                                        <tbody>                                          
                                               
                                </div>
                                <?php
                                if($this->ion_auth->logged_in()){
  if($offices){

 foreach($offices as $office):?>

                                          <tr>
<span itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer">
                                    
                                            <td class="col-md-4">
                                              <div class="ImageWrapper boxes_img">
                                                <a class="officegallery" rel="gallery1" href="<?php 
                                                  if($office->s_picture){
                                                  $img_src  = 'uploads/office/image/'.$office->s_picture;
                                                  $width    = 640;
                                                  $height   = 480;
                                                  echo base_url('/uploads/office/image/'. thumb($img_src, $width, $height));
                                                }else{
                                                  echo base_url().'/assets/ipapa/images/250x175.png';
                                                }?>">
                                                  <img class="img-responsive" src="<?php
                                                        if($office->s_picture){
                                                        $img_src = 'uploads/office/image/'.$office->s_picture;
                                                                  $width = 250;
                                                                  $height = 175;

                                                  echo base_url('/uploads/office/image/'. thumb($img_src, $width, $height));
                                                        }else{
                                                  echo base_url().'/assets/ipapa/images/250x175.png';}?>" alt="<?php echo $office->s_office_floor;?> <?php echo $office->s_office_unit;?>"></a>
                                            
                                             <div style="display:none;">
                                              <a class="officegallery" rel="gallery1" href="<?php 
                                              if($office->s_picture){
                                                  $img_src  = 'uploads/office/image/'.$office->s_picture;
                                                  $width    = 640;
                                                  $height   = 480;
                                                  echo base_url('/uploads/office/image/'. thumb($img_src, $width, $height));
                                                }else{
                                                  echo base_url().'/assets/ipapa/images/250x175.png';
                                                }?>"></a>
                                             </div>

                                            </div>
                                              
                                              
                                                                                                
                                              
                                            </td>
                                              <td>
                                                <div class="pull-left"><strong class="text-info"> <?php echo $office->s_office_floor;?> <?php echo $office->s_office_unit;?></strong> </div> 
                                                <div class="text-right"><strong class="text-success"> <span itemprop="availability" content="in_stock">Available</span></strong> </div>

                                                <div style="margin-top:5px; padding-top:5px; border-bottom:1px solid #ddd; border-top:1px solid #ddd">
                                                <div class="pull-left">
                                                  <i style="padding-right:15px;" class="fa fa-key"></i> 
                                                  <i style="padding-right:15px;" class="fa fa-file-text"></i> 
                                                  <i class="fa fa-calendar"></i>
                                                </div> 
                                                
                                                <div style="padding-bottom:5px;" class="text-right"><small><strong class="text-info"> <?php echo $office->e_currency;?> <?php echo number_format($office->f_office_price);?> /m<sup>2</sup> /Month</strong></small> </div>
                                                </div>

                                                <small><p style="margin-top:5px; text-align:justify;"><?php echo $office->s_office_desc_en;?></p></small>

                                               <!-- <div class="text-right"><a href="#" class="btn btn-primary btn-sm"> Rent Now</a> </div> -->
                                              </td>
                                  
                                            </tr>
                                          <?php endforeach;
          } else {  
          ?>

    <?php echo "<div class='alert alert-warning' role='alert'>Currently  there is no office available yet, please inform the Building Management to upload some.</div>";
  }}else{
    echo "<div class='alert alert-warning' role='alert'>You must <a class='pointer' data-toggle='modal' data-target='#modal-login'>login</a> to see this section</div>";
  }
 ?>
                                          
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                              
                            
                            </div><!-- tab pane -->
           
             </span> <!-- end span product offer -->               
              </div><!-- tab-content -->
                        </div> <!-- widget -->  
                        
                               
          </div><!-- end col-lg-12-->

          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">
            <div class="agents_widget">
               <div class="title"><h3 class="bm">&nbsp; </h3></div>
                <div data-effect="slide-right" class="agent boxes clearfix effect-slide-right in" style="transition: all 0.7s ease-in-out 0s;">
                      <!-- image <div class="image">
                        <img alt="Matthew Krueger" src="<?php echo base_url();?>assets/ipapa/demos/m.png" class="img-circle img-responsive img-thumbnail">
                      </div>-->
                <div class="agent_desc">
                      <h3 class="title"><?php echo $detail->s_building_name;?></h3>
                    <p><span> Building Management</span></p>
                    <p><span><a href="#"  id='modal-launcher'  data-toggle="modal" data-target="#contact-modal"><i class="fa fa-envelope"></i> Send Message</a></span></p>
                </div><!-- agento desc -->
                </div>
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header login_modal_header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h2 class="modal-title" id="myModalLabel">Create Account</h2>
          </div>
          <div class="modal-body register-modal">
            <p>Once you’re registered, you can: Buy, sell, and interact with other members. Save your favorite searches and get notified whenever items you’re looking for appear.</p>
            <br/>
            <div class="clearfix"></div>
            <div id='social-icons-conatainer'>
              <div class='modal-body-left'>
                <div class="form-group">
                      <input type="text" id="email" placeholder="Enter your Email" value="" class="form-control register-field">
                      <i class="fa fa-envelope-o fa-fw register-field-icon"></i>
                  </div>

                  <div class="form-group">
                      <input type="password" id="register-pass" placeholder="Password" value="" class="form-control register-field">
                      <i class="fa fa-key fa-fw register-field-icon"></i>
                  </div>

                  <a href="#" class="btn btn-success modal-register-btn">Sign Up</a>
              </div>

              <div class='modal-body-right'>
                <div class="modal-social-icons">
                     <div class="btn-group" style="padding-bottom:15px;">
                      <a class='btn btn-darkblue disabled'><i class="fa fa-facebook" style="width:16px; height:16px"></i></a>
                      <a class='btn btn-darkblue ' href='' style="width:12em"> Connect with Facebook</a>
                    </div>
                    <div class="btn-group" style="padding-bottom:15px;">
                      <a class='btn btn-info disabled'><i class="fa fa-twitter" style="width:16px; height:16px"></i></a>
                      <a class='btn btn-info ' href='' style="width:12em"> Connect with Twitter</a>
                    </div>
                    <div class="btn-group">
                          <a class='btn btn-danger disabled'><i class="fa fa-google-plus" style="width:16px; height:16px"></i></a>
                          <a class='btn btn-danger' href='' style="width:12em;"> Connect with Google+</a>
                    </div>
                </div> 
              </div>  
              <div id='center-line'> OR </div>
            </div>                                                        
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
          <div class="modal-footer login_modal_footer"></div>
      </div>
    </div>
</div>  
            </div>

            <div class="agents_widget">
                <div data-effect="slide-right" class="agent boxes clearfix effect-slide-right in">

                <div class="agent_desc">
                    <h3 class="title">Building Information</h3>
                   
                      <div class="box-body table-responsive">
                        <span itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer">
                                    <table id="buildinglist-view" class="table no-border">
                                        <thead>
                                          <tr>
                                            <th colspan="2"><strong class="text-info">Base Rental</strong></th>
                                          </tr>
                                        </thead>
                                    <tbody>


                                      <?php if($detail->f_br_typical OR $detail->s_br_ground_floor OR $detail->s_br_mezanine){ ;?>


    <?php if($detail->f_br_typical){ ;?>
      <tr>
      </div>
      <td class="col-md-5 col-xs-2"><small>Typical</small></td>
      <td><small>: <span itemprop="price"><?php echo $detail->e_br_currency;?> <?php echo number_format($detail->f_br_typical);?> <?php if($detail->s_br_info){ echo $detail->s_br_info; } else { echo "/sqm /month"; } ?></span></small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_br_ground_floor){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Ground Floor</small></td>
      <td><small>: <?php echo $detail->e_br_currency;?> <?php echo number_format($detail->s_br_ground_floor);?> <?php if($detail->s_br_info){ echo $detail->s_br_info; } else { echo "/sqm /month"; } ?></small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_br_mezanine){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Mezzanine</small></td>
      <td><small>: <?php echo $detail->e_br_currency;?> <?php echo number_format($detail->s_br_mezanine);?> <?php if($detail->s_br_info){ echo $detail->s_br_info; } else { echo "/sqm /month"; } ?></small></td>
      </tr>
    <?php } ;?>


<?php  }else{ ;?>
<tr><td><small>contact us</small></td></tr>
<?php } ;?>


                                    
                                <thead>
                                          <tr>
                                            <th colspan="2"><strong class="text-info">Service Charges</strong></th>
                                          </tr>
                                        </thead>
                                    <tbody>                                          
                                     <?php if($detail->f_sc_typical OR $detail->s_sc_ground_floor OR $detail->s_sc_mezanine OR $detail->s_sc_description){ ;?>


    <?php if($detail->f_sc_typical){ ;?>
      <tr>
      </div>
      </div>
      <td class="col-md-5 col-xs-2"><small>Typical</small></td><td><small>: <?php echo $detail->e_sc_currency;?> <?php echo number_format($detail->f_sc_typical);?> /m<sup>2</sup> /month</small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_sc_ground_floor){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Ground Floor</small></td>
      <td><small>: <?php echo $detail->e_sc_currency;?> <?php echo number_format($detail->s_sc_ground_floor);?> /m<sup>2</sup> /month</small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_sc_mezanine){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Mezzanine</small></td>
      <td><small>: <?php echo $detail->e_sc_currency;?> <?php echo number_format($detail->s_sc_mezanine);?></small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_sc_description){ ;?>
      <tr>
      </div>
      </div>
      <td class="col-md-5"><small>Service Charges Description</small></td>
      <td><small>: <?php echo $detail->s_sc_description;?></small></td>
      </tr>
    <?php } ;?>


<?php  }else{ ;?>
    <td><small>contact us</small></td>
<?php } ;?>






                                  <thead>
                                          <tr>
                                            <th colspan="2"><strong class="text-info"><!--Overtime Charges--></strong></th>
                                          </tr>
                                        </thead>



                                  <?php if($detail->s_overtime_ac OR $detail->s_overtime_lighting OR $detail->s_overtime_power_outlet OR $detail->s_term_of_payment OR $detail->s_security_deposit OR $detail->s_minimum_lease_term){ ;?>

    <?php if($detail->s_overtime_ac){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Overtime AC</small></td>
      <td><small>: <?php echo $detail->e_overtime_currency;?> <?php echo number_format($detail->s_overtime_ac);?> </small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_overtime_lighting){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Overtime Lighting</small></td>
      <td><small>: <?php echo $detail->e_overtime_currency;?> <?php echo number_format($detail->s_overtime_lighting);?> </small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_overtime_power_outlet){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Overtime Power Outlet</small></td>
      <td><small>: <?php echo $detail->e_overtime_currency;?> <?php echo number_format($detail->s_overtime_power_outlet);?> </small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_term_of_payment){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Term of Payment</small></td>
      <td><small>: <?php echo $detail->s_term_of_payment;?></small></td>
      </tr> 
    <?php } ;?>

    <?php if($detail->s_security_deposit){ ;?>
      <tr>
      </div>
      </div>
      <td ><small>Security Deposit</small></td>
      <td><small>: <?php echo $detail->s_security_deposit;?></small></td>
      </tr>   
    <?php } ;?>

    <?php if($detail->s_minimum_lease_term){ ;?>
      <tr>
      </div>
      </div>
      <td ><small>Minimum Lease Term</small></td>
      <td><small>: <?php echo $detail->s_minimum_lease_term;?></small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_overtime_description != "0"){ ;?>
      <tr>
      </div>
      </div>
      <td><small>Overtime Description</small></td>
      <td><small>: <?php echo $detail->s_overtime_description;?> </small></td>
      </tr>
    <?php } ;?>


<?php  }else{ ;?>
    <td><small>contact us</small></td>
<?php } ;?>

  
                              <tr>
                                </div>
                                </div>
                                <thead>
                                    <tr>
                                      <th colspan="2"><strong class="text-info">Elevator</strong></th> 
                                    </tr>
                                </thead>
                                <?php if($detail->s_elevator OR $detail->s_elevator_low_zone OR $detail->s_elevator_mezanine_zone OR $detail->s_elevator_high_zone OR $detail->s_elevator_executive){ ;?>


    <?php if($detail->s_elevator){ ;?>
      <tr>
      <td><small>Elevator</small></td>

      <td><small>: <?php echo $detail->s_elevator;?></small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_elevator_low_zone){ ;?>
      <tr>
      <td><small>Elevator Low Zone</small></td>

      <td><small>: <?php echo $detail->s_elevator_low_zone;?></small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_elevator_mezanine_zone){ ;?>
      <tr>
      <td><small>Elevator Mezzanine Zone</small></td>

      <td><small>: <?php echo $detail->s_elevator_mezanine_zone;?></small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_elevator_high_zone){ ;?>
      <tr>
      <td><small>Elevator High Zone</small></td>

      <td><small>: <?php echo $detail->s_elevator_high_zone;?></small></td>
      </tr>
    <?php } ;?>

    <?php if($detail->s_elevator_executive){ ;?>
      <tr>
      <td><small>Elevator Executive</small></td>
      <td><small>: <?php echo $detail->s_elevator_executive;?></small></td>
      </tr>
    <?php } ;?>


<?php  }else{ ;?>
    <td><small>contact us</small></td>
<?php } ;?>


                              </tr> 
                              <tr>
                                </div>
                                </div>
                                 <thead>
                                    <tr>
                                      <th colspan="2"><strong class="text-info">Parking</strong></th> 
                                    </tr>
                                </thead>
                                <?php if($detail->s_parking){ ;?>
    <td><small>Parking</small></td>
    <td><small>: <?php echo $detail->s_parking;?></small></td>
<?php  }else{ ;?>
    <td><small>contact us</small></td>
<?php } ;?>


                              </tr> 

                               
                                <thead>
                                    <tr>
                                      <th colspan="2"><strong class="text-info">Facilities</strong></th> 
                                    </tr>
                                </thead>
                                    <tbody>                                    
                                <tr>
                                  <td>



                                   <img alt="Bank / ATM" src="<?php
if($detail->b_bank == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Bank / ATM</small><br>
<img alt="Canteen" src="<?php
if($detail->b_canteen == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Canteen</small><br>
<img alt="Musholla" src="<?php
if($detail->b_musholla == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Musholla</small><br>
<img alt="Function Hall" src="<?php
if($detail->b_function_hall == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Function Hall</small><br>
<img alt="Food Court" src="<?php
if($detail->b_food_court == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Food Court</small><br>
<img alt="Mini Market" src="<?php
if($detail->b_mini_market == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Mini Market</small><br>
<img alt="Health Clinic" src="<?php
if($detail->b_health_clinic == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Health Clinic</small><br>

<img alt="Coffee Shop" src="<?php
if($detail->b_coffee_shop == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Coffe Shop</small>

<br>

<img alt="Meeting Room" src="<?php
if($detail->b_meeting_room == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Meeting Room</small>

<br>

<img alt="Business Center" src="<?php
if($detail->b_business_center == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Business Center</small>

<br>

<img alt="Apartement" src="<?php
if($detail->b_apartement == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Apartement</small>

                                  </td>
                                  <td>
                                    <img alt="Cafe / Restaurant" src="<?php
if($detail->b_cafe == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Cafe / Restaurant</small><br>
                                    <img src="<?php
if($detail->b_post_office == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Post Office</small><br>
<img alt="Money Changer" src="<?php
if($detail->b_money_changer == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Money Changer</small><br>
<img alt="Travel Agent" src="<?php
if($detail->b_travel_agent == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Travel Agent</small><br>
<img alt="Bar" src="<?php
if($detail->b_bar == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Bar</small><br>
<img tag="Mall" src="<?php
if($detail->b_mall == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Mall</small><br>

<img alt="Multi Function Room" src="<?php
if($detail->b_multi_function_room == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Multi Function Room</small>

<br>

<img alt="Restaurant" src="<?php
if($detail->b_restaurant == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Restaurant</small>

<br>

<img alt="Photo Gallery" src="<?php
if($detail->b_photo_gallery == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Photo Gallery</small>

<br>

<img alt="Bakery" src="<?php
if($detail->b_bakery == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Bakery</small>

<br>

<img alt="Penthouse" src="<?php
if($detail->b_penthouse == "1"){
  echo base_url()."assets/ipapa/images/check.png";
}else{
  echo base_url()."assets/ipapa/images/uncheck.png";
}
?>" width="12px" height="12px"> <small>Penthouse</small>
                                </tr>

            
                              
                            </table>


                                </div>
                  </div>
                   </div>
                    </div>
               <!-- <div class="agent boxes clearfix">
                <div class="agent_desc">
                    <h3 class="title">Near Building Location</h3>
                

                  <?php foreach($nearest as $near):?>

                  <div class="agent_desc">
                      <h3 class="title"><a href=""><?php echo $near->s_building_name;?></a></h3>
                    <p style="text-align:justify;">
                        <small>Bellagio Boutique Mall is conveniently located in the business district of Mega Kuningan, South Jakarta...
                    </small> 
                    </P>
                  </div>
                  <hr>
                <?php endforeach;?>
               



            </div>
          </div> -->

        </div><!-- end row -->
      </div><!-- end dm_container -->  
    </section><!-- end generalwrapper -->
<?php endforeach;?>
              

</div> 
</div> <!-- end Rich Snippet -->
</div><!-- end Fixed_width -->
</div></div>
<br>
