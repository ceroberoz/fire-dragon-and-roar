<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <?php if($building){ ;?>

  <?php foreach($building as $list):?>
                                        
                                        
  <div class="container-building">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
          <a href="<?php echo base_url();?>id/building/detail/<?php $name = $list->s_building_name;
                 $lowcaps = strtolower($name);
                 $underscr = str_replace(' ', '-', $lowcaps);
                  echo $underscr;?>-<?php echo $list->pk_building_id;?>" ><img class="img-responsive" src="<?php
                    if($list->s_picture){
                      $img_src = 'uploads/building/image/'.$list->s_picture;
                      $width = 225;
                      $height = 150;
                      echo base_url('/uploads/building/image/'. thumb($img_src, $width, $height));
                    }else{
                      echo base_url().'assets/ipapa/images/200x150.png';

                    }
                    ?>" alt="<?php echo $list->s_building_name;?>"></a>  
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <h3 class="judul"><a href="<?php echo base_url();?>id/building/detail/<?php $name = $list->s_building_name;
                 $lowcaps = strtolower($name);
                 $underscr = str_replace(' ', '-', $lowcaps);
                  echo $underscr;?>-<?php echo $list->pk_building_id;?>"><?php echo $list->s_building_name;?></a></h3>
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

;?></i><small class="facilities"> Restaurant/Cafe</small><br>
        <?php

if($list->b_food_court){
  echo "<i class='fa fa-check-square-o'>";
}else{
  echo "<i class='fa fa-square-o'>";
}

;?>
</i><small class="facilities"> Foodcourt</small><br>
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
        <a class="matthew" data-toggle="modal" data-target="#modal-login">Hubungi pengelola gedung</a>
        </center>
      </div>
    
    </div>

  </div>
  <?php endforeach;?>
  <?php } else { ;?>
    <div class="container-building">
    <div class="row">
      <center><p>tidak ada gedung.</p></center>
  </div>
</div>
  <?php } ;?>
</div>
<div class="clearfix"></div> <br>
<center> <?php //echo $pagination;?> </center>