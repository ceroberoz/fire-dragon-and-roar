
<style type="text/css">body{background:#0e7db3}</style>

<div id="map-header" class="navbar">

  <div class="map-logo">
    <a href="<?php echo base_url()."id";?>">
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
                    <!-- <img class="showfacilities muter" src="<?php echo base_url();?>/assets/ipapa/images/adv-icon.png" width="24" height="24"> -->
                    <a class="backtolist hidden-sm hidden-xs" href="<?php echo base_url();?>id/building"><i class="fa fa-caret-left"></i> Back to List</a>
                </div> 
        </div>

</div>
<!--
<div class="contentfacilities onmap">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ipadcheckall">
          <label>
            <input type="checkbox" class="minimal-green"> Check All
        </label>
        </div>
      <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green" checked/> Bank /ATM
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green" checked/> Mini Market
        </label>
      </div>
      <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green" checked/> Canteen
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green"/> Musholla
        </label>
      </div>
      <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green" checked/> Function Hall
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green" checked/> Food Court
        </label>
      </div>
      <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green" checked/> Mall
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green"/> Health Clinic
        </label>
      </div>
      <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green" /> Money Changer
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green"/> Meeting Room
        </label>
      </div>

      <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green"> Penthouse
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green"> Apartement
        </label>
      </div>
      <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green"> Post Office
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green"/> Business Center
        </label>
      </div>
      <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green"> Bar
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green" > Bakery
        </label>
      </div>
      <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green" > Photo gallery
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green"/> Travel Agent
        </label>
      </div>
      <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-green" /> Restaurant/Cafe
        </label><br>
        <label>
            <input type="checkbox" class="minimal-green"/> Multi Function Room
        </label>
      </div>
  </div>
-->

		<?php echo form_close();?><!-- end search form -->

</div>
<div class="clearfix"> </div>