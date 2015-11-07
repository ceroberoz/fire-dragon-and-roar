
<style type="text/css">body{background:#0e7db3}</style>

<div id="map-header" class="navbar">

  <div class="map-logo">
    <a href="<?php echo base_url();?>">
      <img class="hidden-md hidden-sm hidden-xs" src="<?php echo base_url();?>/assets/ipapa/images/logo_ipapa_white.png">
      <img class="hidden-lg" src="<?php echo base_url();?>/assets/ipapa/images/logo_ipapa_white_square.png"></a>
  </div>

<div class="map-search-advanced">
  <div style="padding-top:10px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  
                <?php echo form_open('search/map');?>
                
                <div id="country" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <?php
                    $misc = 'id="country_id" class="selectpicker" data-style="btn-default"';
                    echo form_dropdown("country_id",$option_country,"",$misc);
                  ?>
                </div>  
                <div id="province" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <?php
                    $misc = 'id="province_id" class="selectpicker" data-style="btn-default" disabled';
                    echo form_dropdown("province_id",array('Select Sub-District'=>'Select City First'),'',$misc );?> 
                </div>  
                <div id="city" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <?php
                    $misc = 'class="selectpicker" data-style="btn-default" disabled';
                    echo form_dropdown("city_id",array('Select Area'=>'Select Sub-District First'),'',$misc );?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <input name="s_keywords" id="autocomplete" type="text"  class="search-query form-control" placeholder="Change keyword" />                 
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 marleft25">
                  <button type="submit" class="btn-search-adv-map ipad-btnsearch">Search</button>
                     <img class="showfacilities muter" src="<?php echo base_url();?>/assets/ipapa/images/more-search.png" width="24" height="24"> 
                    <a class="backtolist hidden-sm hidden-xs" href="<?php echo base_url();?>building"><i class="fa fa-caret-left"></i> Back to List</a>
                </div> 
        </div>

</div>

<div class="contentfacilities onmap">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ipadcheckall">
          <label>
            <input type="checkbox" id="CheckAll"  class="minimal-green checkfacilities"> Check All
        </label>
        </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_bank" value="1" /> Bank /ATM
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_mini_market" value="1" /> Mini Market
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_canteen" value="1" /> Canteen
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_musholla" value="1" /> Musholla
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_function_hall" value="1" /> Function Hall
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_food_court" value="1" /> Food Court
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_mall" value="1" /> Mall
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_health_clinic" value="1" /> Health Clinic
        </label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_money_changer" value="1" /> Money Changer
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_meeting_room" value="1" /> Meeting Room
        </label>
      </div>

      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_penthouse" value="1" /> Penthouse
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_apartement" value="1" /> Apartement
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_post_office" value="1" /> Post Office
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_business_center" value="1" /> Business Center
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_bar" value="1" /> Bar
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_bakery" value="1" /> Bakery
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_photo_gallery" value="1" /> Photo gallery
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_travel_agent" value="1" /> Travel Agent
        </label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_cafe" value="1" /> Restaurant/Cafe
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green checkfacilities" name="f_multi_function" value="1" /> Multi Function Room
        </label>
      </div>
  </div>

		<?php echo form_close();?><!-- end search form -->

</div>
<div class="clearfix"> </div>