
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="container">
        <div style="padding-top:20px;" class="row">
          <center>
                            <?php foreach($building as $list):?>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="boxes" >
                                        <div class="ImageWrapper boxes_img">
                                            <a href="<?php echo base_url();?>building/detail/<?php echo $list->pk_building_id;?>">
                                            <img src="<?php
if($list->s_picture){
  $img_src = 'uploads/building/image/'.$list->s_picture;
  $width = 320;
  $height = 240;

  echo base_url('/uploads/building/image/'. thumb($img_src, $width, $height));

}else{
  echo base_url(). '/assets/ipapa/images/320x240.png';
}
?>" alt="<?php echo $list->s_building_name;?>">
                                        <div class="thumb-desc">
                                          <div class="col-md-6 pull-left">
                                            <h2 class="building-name"><a class="white" href="<?php echo base_url();?>building/detail/<?php echo $list->pk_building_id;?>"> <?php echo $list->s_building_name;?></a></h2>

                                          </div>  
                                          <div class="col-md-6 pull-right">
                                             <h2 class="building-price">
                                              <a class="white" href="<?php echo base_url();?>building/detail/<?php echo $list->pk_building_id;?>">
                                            <?php 
                                            if($list->f_price){
                                              echo $list->e_currency.' '.$list->f_price;
                                            }else{
                                              echo "CALL US";
                                            }
                                          ?></a></h2>
                                          </div>  
                                           
                                            
                                          </a>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <?php echo $pagination;?>
                            </center>               
      
       </div>
  </div>
</div>

