
<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-10 col-xs-12 clearfix">
<div class="chat-member-heading clearfix">
                <h6 class="pull-left col-md-4"><i class="fa fa-building-o"></i> My Favorite Office</small></h6>
                <div class="pull-right col-md-8">
<!--
                    <div class="input-group">
        <div class="search-control">
          <input type="text" placeholder="Search Offices..." class="form-control">
        </div>
        <span class="input-group-btn">
        <button type="button" class="btn btn-primary">Search</button>
        </span></div>
 -->
        </div>

              </div>
            <div class="threewrapper">
                    
                        <div class="row">
                            <?php foreach($favorites as $fav):?>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                                    <div class="boxes first">
                                        
                                        <div class="ImageWrapper boxes_img">
                                         <a href="<?php echo base_url();?>building/detail/<?php $name = $fav->s_building_name;
                                                                                                                                                $lowcaps = strtolower($name);
                                                                                                                                                $underscr = str_replace(' ', '-', $lowcaps);

                                                                                                                                                echo $underscr;?>">
                                            <img class="img-responsive" src="
                                            <?php if($fav->s_picture){
                                                
                                                $img_src = 'uploads/building/image/'.$fav->s_picture;
                                                $width = 400;
                                                $height = 400;

                                                echo base_url('/uploads/building/image/'. thumb($img_src, $width, $height));
                                            }else{
                                                echo base_url().'/assets/ipapa/images/400x300.png';
                                            }

                                            ?>
                                            " alt="<?php echo $fav->s_building_name;?>">
                                            </a>
                                        </div>
                                    
                                        <h2 class="title"><center><a href="<?php echo base_url();?>building/detail/<?php $name = $fav->s_building_name;
                                                                                                                                                $lowcaps = strtolower($name);
                                                                                                                                                $underscr = str_replace(' ', '-', $lowcaps);

                                                                                                                                                echo $underscr;?>"> <?php echo $fav->s_building_name;?></a> <!--<div class="pull-right"><?php
$pocky = array(1,2);
if(!$this->ion_auth->in_group($pocky)){
  if($this->ion_auth->logged_in()){
    $uid = $this->ion_auth->user()->row()->id;
    if($fav->fk_users_id == $uid){
      if($fav->b_fav == "1"){
?>
  <?php echo form_open('favorite/remove');?>
  <?php echo form_hidden('bid', $fav->pk_building_id);?>
    <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class='fa fa-star fa-lg text-warning'></i></button>
  <?php echo form_close();?>
      <?php }else{ ;?>
        <?php echo form_open('favorite/add');?>
        <?php echo form_hidden('bid', $fav->pk_building_id);?>
          <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class='fa fa-star-o fa-lg'></i></button>
        <?php echo form_close();?>
      <?php } ?>
    <?php }else{ ;?>
    <?php echo form_open('favorite/add');?>
    <?php echo form_hidden('bid', $fav->pk_building_id);?>
      <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class='fa fa-star-o fa-lg'></i></button>
    <?php echo form_close();?>
    <?php } 
  }else{ ;?>
    <?php echo form_open('auth/login');?>
      <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class='fa fa-star-o fa-lg'></i></button>
    <?php echo form_close();?>
 <?php }}
?></div> -->
</center>

                                        </h2> 
                                        <!--<small><i class="fa fa-map-marker"></i> <?php echo $fav->s_location;?></small> -->
                                       
                                    </div>
                                </div>     

                            <?php endforeach;?>                  
                        </div>

<!--
                        <div class="pagination_wrapper pull-right clearfix">
                                 
                                  <ul class="pagination">
                                    <li><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li class="disabled"><a href="#">»</a></li>
                                  </ul>
                              </div>
                          -->

                    </div>
                     </div> 
                 

</div>
			
    </section>