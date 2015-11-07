<div id="blist-header">
    <div class="search-adv">
      <div class="search-adv-inner col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-2 col-md-2 col-sm-2 button-blist hidden-xs">
        <a class="button-list" href="<?php echo base_url();?>building">LIST</a><a class="button-map" href="<?php echo base_url();?>building/map">MAP</a>
      </div>
      <?php echo form_open('search/keyword');
	   	echo form_hidden('tabs','building');
	   ?>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <center>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <input name="s_keywords" id="autocomplete" type="text"  class="search-query form-control formsearch" placeholder="Change keyword" />                 
                </div> 

                <div id="country" class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                  <?php
                    $misc = 'id="country_id" class="selectpicker floatleft" data-style="formsearch"';
                    echo form_dropdown("country_id",$option_country,"",$misc);
                  ?>
                </div>  
                <div id="province" class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                  <?php
                    $misc = 'id="province_id" class="selectpicker floatleft" data-style="formsearch" disabled';
                    echo form_dropdown("province_id",array('Select Sub-District'=>'Select City First'),'',$misc );?>
                </div>  
                <div id="city" class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                  <?php
                  $misc = 'class="selectpicker floatleft" data-style="formsearch" disabled';
                   echo form_dropdown("city_id",array('Select Area'=>'Select Sub-District First'),'',$misc );?>
                </div>
              </center>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 btn-search">
            <button type="submit" class="btn-search-adv">Search</button>
            <img class="showfacilities muter" src="<?php echo base_url();?>/assets/ipapa/images/more-search.png" alt="more" width="24" height="24"> 
        </div>

      </div>

  <div class="tabclear"></div>

  <div class="contentfacilities col-lg-9 col-md-9 col-sm-9 col-sm-offset-2 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mleft5">
          <label>
            <input type="checkbox" id="CheckAll"  class="minimal-blue checkfacilities"> Check All
        </label>
        </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_bank" value="1" /> Bank /ATM
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_mini_market" value="1" /> Mini Market
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_canteen" value="1" /> Canteen
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_musholla" value="1" /> Musholla
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_function_hall" value="1" /> Function Hall
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_food_court" value="1" /> Food Court
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_mall" value="1" /> Mall
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_health_clinic" value="1" /> Health Clinic
        </label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_money_changer" value="1" /> Money Changer
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_meeting_room" value="1" /> Meeting Room
        </label>
      </div>

      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_penthouse" value="1" /> Penthouse
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_apartement" value="1" /> Apartement
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_post_office" value="1" /> Post Office
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_business_center" value="1" /> Business Center
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_bar" value="1" /> Bar
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_bakery" value="1" /> Bakery
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_photo_gallery" value="1" /> Photo gallery
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_travel_agent" value="1" /> Travel Agent
        </label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_cafe" value="1" /> Restaurant/Cafe
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue checkfacilities" name="f_multi_function" value="1" /> Multi Function Room
        </label>
      </div>
  </div> 
  <?php echo form_close();?><!-- end search form -->
        
  <div class="container-building-top col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-xs">

      <div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-2">
        <h3 class="judul-grey">
          <center>
          <a href="<?php echo base_url();?>comparison">Compare</a>: (<font color="#0e7db3"><?php echo $this->cart->total_items();?></font>) Building
          </center>
        </h3>
      </div>

       <div class="col-lg-2 col-md-2 col-sm-2">
        <h3 class="judul-grey"><center>Base Rent</center></h3>
        </div>
         <div class="col-lg-2 col-md-2 col-sm-2">
          <h3 class="judul-grey"><center>Facilities</center></h3>
        </div>
         <div class="col-lg-2 col-md-2 col-sm-2">
         <h3 class="judul-grey left100"><center>Contact</center></h3>
        </div>
</div>
<div class="clearfix"></div>
  </div>
    </div>
