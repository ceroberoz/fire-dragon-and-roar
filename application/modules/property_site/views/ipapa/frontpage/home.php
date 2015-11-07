 <section id="imade-header">  
    
    <div class="imade-box">
        <div id="find">
          <h1><img class="hidden-xs" style="margin-top:-15px;" src="<?php echo base_url();?>/assets/ipapa/images/mark_home.png" alt="brand"> 
          FIND OFFICE FOR LEASE</h1>
        </div>
		<?php echo form_open('search/keyword');?>
        <div class="radiotabs clearfix">
            <ul class="tabs">
              <li>
                <input type="radio" checked name="tabs" id="tab1" value="building">
                <label for="tab1">Building List</label>
              </li>
              <li class="hidden-xs">
                <input type="radio" name="tabs" id="tab2" value="map" onclick="window.location='/building/map';">
                <label for="tab2">Map</label>
              </li>
            </ul>
        </div>

        <div class="imade-box-inner col-lg-11 col-md-11">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 top10">
                    <input name="s_keywords" id="autocomplete" type="text"  class="search-query form-control" placeholder="Change keyword" />                 
                </div> 

                <div id="country" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 top10">
                  <?php
                    $misc = 'id="country_id" class="selectpicker" data-style="btn-default"';
                    echo form_dropdown("country_id",$option_country,"",$misc);
                  ?>
                </div>
                <div id="province" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <?php
                    $misc = 'id="province_id" class="selectpicker" data-style="btn-default" disabled';
                    echo form_dropdown("province_id",array('Select Sub-District'=>'Select City First'),'',$misc );?>
                </div>  
                <div id="city" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <?php
                  $misc = 'class="selectpicker" data-style="btn-default" disabled';
                   echo form_dropdown("city_id",array('Select Area'=>'Select Sub-District First'),'',$misc );?>
                </div>
        </div>

                <div style="margin-left:-12px;" class="col-lg-1 col-md-1 hidden-sm hidden-xs btn-search">
                    <button type="submit" style="border: 0; background: transparent;">
                        <img src="<?php echo base_url();?>/assets/ipapa/images/search_green.png" alt="btn-search"> 
                    </button>
                </div>
                <div style="text-align:center" class="hidden-lg hidden-md col-sm-12 col-xs-12">
                   <button class="button margtop10" type="submit">Search</button>
                </div>
		 <?php echo form_close();?><!-- end search form -->
         
        <div style="text-align:center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3 class="ava-office">OVER <?php echo $this->db->count_all('building');?> BUILDINGS AVAILABLE FOR YOU</h3>

      </div> <!-- class="imade-box"> -->
</section>

<div class="desc">
  <div class="ps-desc">
    <h3 > FEATURED BUILDING</h3>
        <div style="text-align:center" class="triangle"> <img src="<?php echo base_url();?>/assets/ipapa/images/triangle.png" alt="triangle"></div>
  </div>
</div>

<div id="container-feature" class="clearfix">
  <div class="feature-building">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
    <ul>
     <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/prima-1-59">Menara Prima</a></li>
     <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/dea-1-55">Menara Dea</a></li>
     <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/noble-house-52">Noble House</a></li>
     <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/artha-graha-106">Artha Graha</a></li>
     <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/plaza-oleos-147">Plaza Oleos</a></li>
   </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
      <ul>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/18-office-park-380">18 Office Park</a></li>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/chase-plaza-98">Chase Plaza</a></li>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/ad-premier-140">AD Premier</a></li>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/lippo-kuningan-35">Lippo Kuningan</a></li>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/antam-building-148">Antam Building</a></li>
    </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
      <ul>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/menara-rajawali-57">Menara Rajawali</a></li>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/mayapada-tower-2-162">Mayapada Tower 2</a></li>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/m-gold-tower">M Gold Tower</a></li>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/h-tower-249">H Tower</a></li>
      <li class="feature"><a class="feature" href="<?php echo base_url();?>building/detail/plaza-great-river-51">Plaza Great River</a></li>
    </ul>
    </div>

  </div>
</div>  
<div id="client-services">
  <div class="client">
    <div style="text-align:center"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <h3 class="yourbussiness">BUILD YOUR BUSSINESS</h3>
      <p class="intro">Ipapa is an E-Building Marketing and Consultancy, 
Ipapa aim to provide an online platform to cater your needs of finding office space to fit each individual requirements
essential to find the perfect space for your line of business</p>
    </div>

   <div style="text-align:center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
     <img class="citi" src="<?php echo base_url();?>/assets/ipapa/images/clients/citi.png" alt="citibank">
     <img class="kog" src="<?php echo base_url();?>/assets/ipapa/images/clients/kog.png" alt="kog">
     <img class="zte" src="<?php echo base_url();?>/assets/ipapa/images/clients/zte.png" alt="zte">
     <img class="smart" src="<?php echo base_url();?>/assets/ipapa/images/clients/smart.png" alt="smartfren">
   </div>
   <div style="text-align:center" id="padding-btn" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <a class="service-btn" href="<?php echo base_url();?>services"><small>OUR SERVICES</small></a>
   </div>

  </div>
</div> 

<div class="container-testi col-lg-12 col-md-12 col-sm-12 hidden-xs clearfix">
  <center><h3 class="customersay">WHAT OUR CUSTOMERS SAY ABOUT IPAPA</h3>
   <div id="testimonial-bottom" class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="testi">
        <p>" Thank you for your great effort to find me a new office space. We are so happy that we finally have a new office after seaching for the right space for months ! Keep up the good work."</p>
      </div>
      <center>
        <div class="imagetesti">
         <img class="img-circle " src="<?php echo base_url();?>/assets/ipapa/images/default_user.png" alt="img-default-user" width="60" height="60" >
        </div>
      </center>
    <p class="testi-author">Nurina A<br>
      <span>HR Manager of a Telecommunication Company</span></p>
    </div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <div class="testi">
    <p>" I was expecting the word “free” is just another marketing gimmick, but it wasn’t. I had a very pleaseful experience in finding a warehouse for my project."</p>
  </div>
  <center>
        <div class="imagetesti">
         <img class="img-circle " src="<?php echo base_url();?>/assets/ipapa/images/default_user.png" alt="img-default-user" width="60" height="60" >
      </div>
    </center>
    <p class="testi-author">Anggi A<br>
      <span>Project Manager of an Engineering Company</span></p>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="testi">
  <p>" Ipapa was very helpful when we were moving out to our new office & helping me through those process, and keeping me up date with information regarding my leasing matters."</p>
</div>
<center>
        <div class="imagetesti">
         <img class="img-circle " src="<?php echo base_url();?>/assets/ipapa/images/default_user.png" alt="img-default-user" width="60" height="60" >
      </div>
    </center>
<p class="testi-author">Lina L<br>
  <span>Head of Finance of a Media Company</span></p>
</div>
</div></center>
</div>


