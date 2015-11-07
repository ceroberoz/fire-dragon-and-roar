<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <?php foreach($building as $list):?>
  <div class="container-building">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
          <a href="<?php echo base_url();?>id/building/detail/<?php $name = $list->s_building_name;
                 $lowcaps = strtolower($name);
                 $underscr = str_replace(' ', '-', $lowcaps);
                  echo $underscr;?>-<?php echo $list->pk_building_id;?>" ><img class="mthumb" src="<?php
                    if($list->s_picture){
                      $img_src = 'uploads/building/image/'.$list->s_picture;
                      $width = 225;
                      $height = 150;
                      echo base_url('/uploads/building/image/'. thumb($img_src, $width, $height));
                    }else{
                      echo base_url().'/assets/ipapa/images/200x150.png';

                    }
                    ?>" alt="<?php echo $list->s_building_name;?>"></a>  
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
        <h1 class="judul"><a href="<?php echo base_url();?>id/building/detail/<?php $name = $list->s_building_name;
                            $lowcaps = strtolower($name);
                            $underscr = str_replace(' ', '-', $lowcaps);

                            echo $underscr;?>-<?php echo $list->pk_building_id;?>"><?php echo $list->s_building_name;?></a></h1>
        <div class="left15">
        <small class="location"><i class="fa fa-map-marker"></i> <?php echo $list->s_location;?></small>
        </div>
      </div>
      <div class="mclear"> </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padtop30">
        <center>
      <?php if($list->f_br_typical) { ;?>
        <small class="harga"><?php echo $list->e_br_currency;?> <?php echo number_format($list->f_br_typical);?></small><br>
        <small class="sqm"><?php if($list->s_br_info){ echo $list->s_br_info; } else { echo "/sqm /month"; } ?></small><br>
        <small class="exclude">(Belum Termasuk <i>Service Charge</i>)</small><br>
        <a class"matthew" href="<?php echo base_url();?>building/detail/<?php $name = $list->s_building_name;
                            $lowcaps = strtolower($name);
                            $underscr = str_replace(' ', '-', $lowcaps);

                            echo $underscr;?>-<?php echo $list->pk_building_id;?>">Lihat Detail</a>
      <?php }else{ ;?>
        <small class="harga">TBA</small><br>
        <small class="sqm">hubungi kami</small>
     <?php } ;?>
      </center>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 padtop30">
        <div class="left50 col-xs-12">
        <?php

if($list->b_cafe){
  echo "<i class='fa fa-check-square-o'>";
}else{
  echo "<i class='fa fa-square-o'>";
}

;?></i><small class="facilities"> Restoran/Kafe</small><br>
        <?php

if($list->b_food_court){
  echo "<i class='fa fa-check-square-o'>";
}else{
  echo "<i class='fa fa-square-o'>";
}

;?>
</i><small class="facilities"> <i>Foodcourt</i></small><br>
        <?php

if($list->b_bank){
  echo "<i class='fa fa-check-square-o'>";
}else{
  echo "<i class='fa fa-square-o'>";
}

;?></i><small class="facilities"> Bank/ATM</small><br>
        <?php

if($list->b_musholla){
  echo "<i class='fa fa-check-square-o'>";
}else{
  echo "<i class='fa fa-square-o'>";
}

;?></i><small class="facilities"> Musholla</small>
      </div>
      </div>
      <div class="col-lg-3 col-md-2 col-sm-2 hidden-xs padtop30">
        <center>
        <a class="matthew" data-toggle="modal" data-target="#contact-modal">Hubungi BM</a>
        </center>
      </div>
    
    </div>

  </div>
  <?php endforeach;?>
</div>
<div class="clearfix"></div> <br>
<center> <?php echo $pagination;?> </center>

    <div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel">Contact us</h2>
              </div>
                      <div class="modal-body register-modal">
                         <?php echo form_open('message/send');?>
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
            </div>
        </div>
      </div> 
