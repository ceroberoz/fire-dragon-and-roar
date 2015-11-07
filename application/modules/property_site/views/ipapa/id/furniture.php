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
                                          <div class="clearfix"></div>
                                      </div>
                                    </div>
                                </div> 
<div class="container"> 
           <header class="clearfix">
                <h1>Our Furniture Products<span>We deliver style, quality and value every day</span></h1> 
            </header> 
    <div class="main">

        <ul id="og-grid" class="og-grid">
            <?php foreach($furnitures as $furniture):?>              
        <li>
                <a href="" data-largesrc="<?php echo base_url();?>uploads/furniture/<?php echo $furniture->s_picture;?>"
                    data-title="Product ID: #<?php echo $furniture->s_furniture_name;?>" 
                    data-description="<?php echo $furniture->s_description;?> 
                    <br><br><br>
                    <button class='button' data-toggle='modal' data-target='#contact-modal'>Contact Us</button>
                    ">

                <img class="img-furniture" src="<?php echo base_url();?>uploads/furniture/<?php echo $furniture->s_picture;?>" alt="<?php echo $furniture->s_furniture_name;?>"/>
                </a>
            </li>
           <?php endforeach;?>     
        </ul>

    </div>
</div><!-- /container -->
<center> <?php echo $pagination;?> </center>
</div>