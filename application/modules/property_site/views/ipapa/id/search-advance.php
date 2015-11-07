<div id="blist-header">
    <div class="search-adv">
      <div class="search-adv-inner col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-2 col-md-2 col-sm-2 button-blist hidden-xs">
        <a class="button-list" href="<?php echo base_url();?>id/building">GEDUNG</a><a class="button-map" href="<?php echo base_url();?>id/building/map">PETA</a>
      </div>
      <?php echo form_open('id/search/keyword');
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
            <button type="submit" class="btn-search-adv">Cari</button>
            <!-- <img class="showfacilities muter" src="<?php echo base_url();?>/assets/ipapa/images/adv-icon.png" width="24" height="24"> -->
        </div>

      </div>
  <?php echo form_close();?><!-- end search form -->
  <div class="tabclear"></div>
  <!--
  <div class="contentfacilities col-lg-9 col-md-9 col-sm-9 col-sm-offset-2 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mleft5">
          <label>
            <input type="checkbox" class="minimal-blue "> Check All
        </label>
        </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue" checked/> Bank /ATM
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue" checked/> Mini Market
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue" checked/> Canteen
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue"/> Musholla
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue" checked/> Function Hall
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue" checked/> Food Court
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue" checked/> Mall
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue"/> Health Clinic
        </label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue" /> Money Changer
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue"/> Meeting Room
        </label>
      </div>

      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue"> Penthouse
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue"> Apartement
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue"> Post Office
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue"/> Business Center
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue"> Bar
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue" > Bakery
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue" > Photo gallery
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue"/> Travel Agent
        </label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <label>
            <input type="checkbox" class="minimal-blue" /> Restaurant/Cafe
        </label><br>
        <label>
            <input type="checkbox" class="minimal-blue"/> Multi Function Room
        </label>
      </div>
  </div> -->

        
  <div class="container-building-top col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-xs">

      <div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-2">
        <!-- <h1 class="total-result"> Total Results: <?php if($this->uri->segment(1) == "building"){
          echo $this->db->count_all('building');
        }else{
          echo $result;
        } ?> Buildings</h1> -->
      </div>

       <div class="col-lg-2 col-md-2 col-sm-2">
        <h3 class="judul-grey"><center>Sewa Dasar</center></h3>
        </div>
         <div class="col-lg-2 col-md-2 col-sm-2">
          <h3 class="judul-grey"><center>Fasilitas</center></h3>
        </div>
         <div class="col-lg-2 col-md-2 col-sm-2">
         <h3 class="judul-grey left100"><center>Kontak</center></h3>
        </div>
</div>
<div class="clearfix"></div>
  </div>
    </div>
