          
                              <div class="box-body table-responsive">
                                    <table class="table table-noborder">
                                        <tbody>                                          
                                               
                                </div>
                                 <?php foreach($building as $list):?>


                                 <div class="modal fade" id="contact-modal-<?php echo $list->pk_building_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header login_modal_header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h2 class="modal-title" id="myModalLabel">Contact us</h2>
                                          </div>
                                          <div class="modal-body register-modal">
                                            <?php echo form_open('message/send');?>
                                            <?php echo form_hidden('bid', $list->pk_building_id);?>
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
                                         <?php
                                            $data_building_desc = $list->s_building_desc_en;
                      
                      
                      $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $data_building_desc);
                      $string = str_replace("\n", " ", $string);
                      $array = explode(" ", $string);
                      array_splice($array, 26);
                      
                      $building_description_trim = implode(" ", $array)." ...";
                      
                                          ?>
                                      <tr>

                                        <td align="center" valign="middle" width="30">
<div class="social">
<?php
$pocky = array(1,2);
if(!$this->ion_auth->in_group($pocky)){
  if($this->ion_auth->logged_in()){
    $uid = $this->ion_auth->user()->row()->id;
    if($list->fk_users_id == $uid){
      if($list->b_fav == "1"){
?>
  <?php echo form_open('favorite/remove');?>
  <?php echo form_hidden('bid', $list->pk_building_id);?>
    <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class='fa fa-star fa-lg text-warning'></i></button>
  <?php echo form_close();?>
      <?php }else{ ;?>
        <?php echo form_open('favorite/add');?>
        <?php echo form_hidden('bid', $list->pk_building_id);?>
          <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class='fa fa-star-o fa-lg'></i></button>
        <?php echo form_close();?>
      <?php } ?>
    <?php }else{ ;?>
    <?php echo form_open('favorite/add');?>
    <?php echo form_hidden('bid', $list->pk_building_id);?>
      <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class='fa fa-star-o fa-lg'></i></button>
    <?php echo form_close();?>
    <?php } 
  }else{ ;?>
    <?php echo form_open('auth/login');?>
      <button type='submit'  style='background:transparent; border:none;' data-placement='top' data-toggle='tooltip' data-original-title='Add as favorite'><i class='fa fa-star-o fa-lg'></i></button>
    <?php echo form_close();?>
 <?php }}
?>
</div>
                                        </td>

                                        <td>
                                           <div class="pull-left">
                                            <strong><a href="<?php echo base_url();?>building/detail/<?php echo $list->pk_building_id;?>"> <?php echo $list->s_building_name;?></a></strong>
                                              <div class="clearfix"></div>
                                                  <small><b>Availability:</b> <i>Contact us</i></small></br>
                                                  <small><b>Typical:</b> <i><?php 
                                            if($list->f_price){
                                              echo $list->e_currency.' '.$list->f_price.' /m<sup>2</sup>/Month';
                                            }else{
                                              echo "CALL US";
                                            }
                                          ?></i></small></br>
                                                  <small><b>Service Charges:</b> <i>Contact us</i></small></br>
                                                  <small><i><?php echo $list->s_location;?></i></small>
                                            </div>
                                            <div class="agents_widget pull-right hidden-xs">
                                                <div class="agent bminfo clearfix">
                                                      <div class="image">
                                                        <img alt="" src="<?php echo base_url();?>assets/ipapa/images/default_user.png" class="img-circle img-responsive img-thumbnail">
                                                      </div>
                                                <div class="agent_desc">
                                                    <h3 class="title">Building Management</h3>
                                                    <small><i class="fa fa-envelope"></i><a href="#"  id='modal-launcher'  data-toggle="modal" data-target="#contact-modal-<?php echo $list->pk_building_id;?>"> Send Message</a></small>
                                                </div>
                                                </div>
                                            </div>
                                        </td> 
                                      </tr>
                                    
                                            <?php endforeach;?>
                                            
                                    </tbody> 
                                    </table>
                                
                    
       
                     </div>
                   </div>
                   <center><?php echo $pagination;?></center>
                
      </div><!-- end dm_container -->  
    </section><!-- end generalwrapper --> 

</div> <!-- end Fixed_width --><br>
