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


<div class="container-comp"> 
<div class="comp-kiri">
  <div class="comp-kiri-box">
    <div class="comp-queue">Comparison Queue</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class="isi-comp-queue">
        <div class="img-building with-remove">
          <?php
          	$img1 = base_url().'uploads/building/image/'.$items['s_picture'];
			$img2 = base_url().'assets/ipapa/images/100x75.png';
		   ?>
			<img class="img-thumb" src="<?php if(isset($items['s_picture'])){echo $img1;}else{echo $img2;}?>">
  <div class="remove-queue">
    <a href="<?php echo base_url();?>comparison/remove_compare/<?php echo $items['rowid'];?>">
      <img alt="unchecked" class="x-remove" src="<?php echo base_url().'assets/ipapa/images/uncheck.png';?>">
    </a>
  </div> 
		</div>
        <div class="nama-building">
          <?php echo $items['name'];?> 
        </div>
      </div>
      <hr>
	<?php endforeach;?>
</div>

  <div class="divbtn">
  	  <a href="<?php echo base_url();?>comparison/cart_destroy">
      <button class="btn-reset" type="">Reset</button>
      </a>
  </div> 
  <div class="title-baserent">Base Rental</div>

</div> <!-- End Div comp kiri -->

<div class="compare2building">


  <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class="comp-b1">
    <div class="comp-b1-box">
    <div class="b1-name">
     <?php echo $items['name'];?>
    </div>
    <div class="b1-img">
     <?php
	 	$img1 = base_url().'uploads/building/image/'.$items['s_picture'];
		$img2 = base_url().'assets/ipapa/images/320x240.png'; 
		if(isset($items['s_picture'])){
			echo "<img class='b1-img' src='".$img1."'>";
		}else{
			echo "<img class='b1-img' src='".$img2."'>";			
		}
     ?>
	</div>
    <div class="b1-location">
      <i class="fa fa-map-marker"></i> <small><?php echo $items['s_location'];?> - <?php echo $items['s_city'];?></small>                
    </div>

  </div>
  </div>
    <?php $i++; ?>
	<?php endforeach;?>
<!--
<div class="saveandprint">
      <div class="btn-print">
        <a href="" onClick="window.print() "><img alt="btn-print" src="<?php echo base_url();?>assets/ipapa/images/btn-print.png"></a>
      </div>
      <div class="btn-save">
        <a href=""><img class="img-save" alt="btn-save" src="<?php echo base_url();?>assets/ipapa/images/btn-save.png"></a>
      </div>
</div>
-->

</div>
</div><!-- End container -->

<div class="kolom-compare">
  <!-- <div class="title-baserent">Base Rental</div> -->
  <div class="baris1">
    <div class="kolom-kiri">Typical</div>
    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class='kolom-tengah'><?php if(!empty($items['f_br_typical'])){echo $items['e_br_currency']." ".number_format($items['f_br_typical'])." ".$items['s_br_info'];}else{echo"-";}?></div>
    <?php $i++; ?>
	<?php endforeach;?>
  </div>

<div class="title-comp">Service Charge</div>
  <div class="baris1">
    <div class="kolom-kiri">Typical</div>
    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class='kolom-tengah'><?php if(!empty($items['f_sc_typical'])){echo $items['e_sc_currency']." ".number_format($items['f_sc_typical'])." ".$items['s_sc_info'];}else{echo"-";}?></div>
    <?php $i++; ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Service Charge Description</div>
    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class='kolom-tengah'><?php 
	if(!empty($items['s_sc_description'])){if(strlen($items['s_sc_description'])>=88){echo "<small>".$items['s_sc_description']."</small>";}else{echo $items['s_sc_description'];}}else{echo"-";}?></div>
    <?php $i++; ?>
	<?php endforeach;?>
  </div>

  <div class="title-comp">Overtime Charge</div>
  <div class="baris1">
    <div class="kolom-kiri">Overtime AC</div>
	<?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class='kolom-tengah'><?php if(!empty($items['s_overtime_ac'])){echo $items['e_overtime_currency']." ".number_format($items['s_overtime_ac']);}else{echo"-";}?></div>
    <?php $i++; ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Term of Payment</div>
    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class='kolom-tengah'><?php echo $items['s_term_of_payment'];?></div>
    <?php $i++; ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Security Deposit</div>
    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class='kolom-tengah'><?php echo $items['s_security_deposit'];?></div>
    <?php $i++; ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Minimum Lease Term</div>
    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class='kolom-tengah'><?php echo $items['s_minimum_lease_term'];?></div>
    <?php $i++; ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Overtime Descrption</div>
    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items):?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <div class='kolom-tengah'><?php if(!empty($items['s_overtime_description'])){echo $items['s_overtime_description'];}else{echo"-";}?></div>
    <?php $i++; ?>
	<?php endforeach;?>
  </div>

  <div class="title-comp">Facilities</div>
  <div class="baris1">
    <div class="kolom-kiri">Bank / ATM</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_bank']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Canteen</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_canteen']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Musholla</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_musholla']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Function Hall</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_function_hall']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Food Court</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_food_court']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Mini Market</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_mini_market']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Health Clinic</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_health_clinic']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Coffee Shop</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_coffee_shop']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Business Center</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_business_center']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
    <?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Meeting Room</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_meeting_room']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Apartment</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_apartement']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Post Office</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_post_office']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>
  <div class="baris2">
    <div class="kolom-kiri">Money Changer</div>
    <?php foreach ($this->cart->contents() as $items):?>
    <div class='kolom-tengah'>
	<?php 
		$img1 = base_url().'assets/ipapa/images/check-list.png';
		$img2 = base_url().'assets/ipapa/images/uncheck.png';
		if($items['b_money_changer']==1){
			echo "<img alt='checked' src='".$img1."'></div>";
		}else{
			echo "<img alt='unchecked' src='".$img2."'></div>";	
		}
    ?>
	<?php endforeach;?>
  </div>


<div class="compare-with">Compare with simillar building</div>
</div> <!-- end kolom compare -->


  <div id="container-comp-with">
    <div class="similliar-by-price">Simillar by Price</div>

    <div class="byprice">
      <?php foreach($simillarprice as $price):?>
      <div class="similliar-box">
          <div class='img-similliar'>  
            <a href="<?php echo base_url();?>building/detail/<?php $name = $price->s_building_name;
                 $lowcaps = strtolower($name);
                 $underscr = str_replace(' ', '-', $lowcaps);
                  echo $underscr;?>-<?php echo $price->pk_building_id;?>" >
             <?php
			 	$img1 = base_url().'uploads/building/image/'.$price->s_picture;
				$img2 = base_url().'assets/ipapa/images/640x480.png';
			 ?>
              <img class="img-responsive" src="<?php if(isset($price->s_picture)){echo $img1;}else{echo $img2;}?>">
              <div class='bname-similliar'>  
                  <p class='bname-similliar'><?php echo $price->s_building_name;?></p>  
              </div>  
            </a>
          </div> 
      </div>
      <?php endforeach;?>
      <!--
      <div class="similliar-box">
        <div class='img-similliar'> 
          <a href=""> 
              <img class="img-responsive" src="http://ipapa.co.id/uploads/building/image/0a1ed60e7ba8cffbcb25cf6d4c3f91bd_480_640.jpg">
              <div class='bname-similliar'>  
                  <p class='bname-similliar'>Adhi Graha</p>  
              </div> 
            </a> 
          </div> 
      </div>
      <div class="similliar-box">
        <div class='img-similliar'>  
              <img class="img-responsive" src="http://ipapa.co.id/uploads/building/image/0a1ed60e7ba8cffbcb25cf6d4c3f91bd_480_640.jpg">
              <div class='bname-similliar'>  
                  <p class='bname-similliar'>Adhi Graha</p>  
              </div>  
          </div> 
      </div>
      -->
    </div>

<div class="similliar-by-location">Simillar by Location</div>
  <div class="more-similliar"><a href="<?php echo base_url();?>building/price">More »</a></div>
    <div class="byprice">
    <?php foreach($simillarlocation as $location):?>
      <div class="similliar-box">
          <div class='img-similliar'>
          <a href="<?php echo base_url();?>building/detail/<?php $name = $location->s_building_name;
                 $lowcaps = strtolower($name);
                 $underscr = str_replace(' ', '-', $lowcaps);
                 echo $underscr;?>-<?php echo $location->pk_building_id;?>" >
          	<?php
			 	$img1 = base_url().'uploads/building/image/'.$location->s_picture;
				$img2 = base_url().'assets/ipapa/images/640x480.png';
			 ?>  
              <img class="img-responsive" src="<?php if(isset($location->s_picture)){echo $img1;}else{echo $img2;}?>">
              <div class='bname-similliar'>  
                  <p class='bname-similliar'><?php echo $location->s_building_name;?></p>  
              </div>
           </a>
          </div>
      </div>
      <?php endforeach;?>
      <!--
      <div class="similliar-box">
        <div class='img-similliar'>  
              <img class="img-responsive" src="http://ipapa.co.id/uploads/building/image/0a1ed60e7ba8cffbcb25cf6d4c3f91bd_480_640.jpg">
              <div class='bname-similliar'>  
                  <p class='bname-similliar'>Adhi Graha</p>  
              </div>  
          </div> 
      </div>
      <div class="similliar-box">
        <div class='img-similliar'>  
              <img class="img-responsive" src="http://ipapa.co.id/uploads/building/image/0a1ed60e7ba8cffbcb25cf6d4c3f91bd_480_640.jpg">
              <div class='bname-similliar'>  
                  <p class='bname-similliar'>Adhi Graha</p>  
              </div>  
          </div> 
      </div>
      -->
    </div>
    <div class="similliar-by-location"> </div><div class="more-similliar"><a href="<?php echo base_url();?>building/location">More »<?php //if($numrows>=3){echo "More »";}else{echo"";}?></a></div>

  </div> <!-- end Container compare with -->




<div class="clearfix"> </div>
