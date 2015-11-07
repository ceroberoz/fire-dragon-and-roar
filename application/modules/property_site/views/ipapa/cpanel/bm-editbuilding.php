<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-right clearfix">
<aside class="right-side">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="">
                                <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="pull-left header"><i class="fa fa-building-o"></i> Update Building facilities</li>
                                </ul>
            <div class="tab-content">
                <div class="block-inner ">
             

                <div class="box box-default col-lg-12 col-md-12">

                </div>
				<?php echo form_open('management/building/do_edit');?>
                <?php foreach($buildings as $building):

				echo form_hidden('b_id', $building->pk_building_id);
				?> 
                <div class="row">
                  <div class="col-md-3">
                        <input type="hidden" name="b_id" value="<?php echo $building->pk_building_id;?>" />
                        <input type="text" class="form-control" name="b_name" value="<?php echo $building->s_building_name;?>" disabled="disabled">
                  </div>
                </div>
                <br />
                <div class="row">
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_bank == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_bank" value="1" /> Bank /ATM
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_mini_market == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_mini_market" value="1" /> Mini Market
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_canteen == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_canteen" value="1" /> Canteen
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_musholla == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_musholla" value="1" /> Musholla
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_function_hall == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_function_hall" value="1" /> Function Hall
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_food_court == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_food_court" value="1" /> Food Court
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_mall == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_mall" value="1" /> Mall
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_health_clinic == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_health_clinic" value="1" /> Health Clinic
        </label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_money_changer == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_money_changer" value="1" /> Money Changer
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_meeting_room == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_meeting_room" value="1" /> Meeting Room
        </label>
      </div>

      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_penthouse == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_penthouse" value="1" /> Penthouse
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_apartement == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_apartement" value="1" /> Apartement
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_post_office == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_post_office" value="1" /> Post Office
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_business_center == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_business_center" value="1" /> Business Center
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_bar == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_bar" value="1" /> Bar
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_bakery == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_bakery" value="1" /> Bakery
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_photo_gallery == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_photo_gallery" value="1" /> Photo gallery
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_travel_agent == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_travel_agent" value="1" /> Travel Agent
        </label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <label>
            <input type="checkbox" <?php if($building->b_restaurant == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_cafe" value="1" /> Restaurant/Cafe
        </label><br>
        <label>
            <input type="checkbox" <?php if($building->b_multi_function_room == "1"){echo "checked='checked'";}; ?> class="minimal-blue checkfacilities" name="f_multi_function" value="1" /> Multi Function Room
        </label>
      </div>
                </div>

            
     </div>
<?php endforeach;?>
                <div class="text-right">
                  <input type="button" class="btn btn-default" onclick="history.go(-1);" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Update">
                </div>
                <?php echo form_close();?>
              <!-- form close-->
                                    
                                    </div>
                                    
                                </div><!-- /.tab-content -->
                            </div>

                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
                 	
</section>