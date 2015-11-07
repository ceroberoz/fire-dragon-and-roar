            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Building
                        <small>Edit Building</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Manage Building</li>
                        <li class="active">Edit Building</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="nav-tabs-custom">
  
                            
                                  
            <!-- <form role="form" class="block" action="#"> -->
            <div class="tab-content">
            <?php echo form_open_multipart("admin/building/do_edit");?>
            <?php foreach($buildings as $building):

            echo form_hidden('b_id', $building->pk_building_id);
			echo form_hidden('b_code', $building->s_building_code);
            
            ?>
                <div class="block-inner ">
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-3">
                      <input type="hidden" name="b_id" value="<?php echo $building->pk_building_id;?>" />
                        <input type="text" class="form-control" name="b_name" value="<?php echo $building->s_building_name;?>">
                      </div>
					  </div>
                      </div>
                      
                    <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <select name="b_status" class="form-control">
                            <?php if($building->e_building_status){ ;?>
                                <option value="<?php echo $building->e_building_status;?>" selected><?php echo $building->e_building_status;?></option>
                            <?php } ;?>
                            
                            <option value="">Building Status</option>
                            <option value="Strata">Strata</option>
                            <option value="Lease">Lease</option>
                            <option value="Strata & Lease">Strata & Lease</option>
                        </select>
                      </div> 

                      <div class="col-md-3">
                        <select name="b_type" class="form-control">
                            <?php if($building->e_building_type){ ;?>
                                <option selected value="<?php echo $building->e_building_type;?>"><?php echo $building->e_building_type;?></option>
                            <?php } ;?>
                            <option value="">Building Type</option>
                            <option value="Building">Building</option>
                            <option value="Ruko">Ruko</option>
                            <option value="Land">Land</option>
                        </select>
                      </div>

                                <div id="propinsi" class="col-md-3">
                                   <?php echo form_dropdown("propinsi",$option_province,$building->s_province,"id='propinsi' class='form-control' "); ?>
                                </div>
                              
								
                               </div>
                           </div> 
                    <div class="form-group">         
                        <input type="text" value="<?php echo $building->s_location;?>" name="b_location" class="form-control" placeholder="Location">
                    </div>
                  
                  <div class="row">
                     <div class="form-group">
                        <!-- city_id -->
                        <div id="country" class="col-md-3">
						<?php
                             $misc = 'id="country_id" class="selectpicker form-control" data-style="btn-default"';
							 echo form_dropdown("country_id",$kota,$building->s_city,$misc);
                        ?>
                		</div>
                        <!-- kecamatan_id --> 
                        <div id="province" class="col-md-3">
						<?php
                        	if($building->s_kecamatan) {
								echo "<select name='province_id' id='province_id' class='selectpicker form-control' data-style='btn-default'>";
								echo "<option value='"; echo $building->s_kecamatan; echo "' selected='selected'>".$building->s_kecamatan."</option>";
								foreach($kecamatan as $camat):
									echo "<option value='".$camat->name."' >".$camat->name."</option>";
								endforeach;
								echo "</select>";
							 }else{
								 $misc = 'id="province_id" class="selectpicker form-control" data-style="btn-default" disabled';
								 echo form_dropdown("province_id",array('Select Sub-District'=>'Select City First'),'',$misc );
							 }
						?>
                        </div>
                     	<!-- kelurahan_id -->
                        <div id="city" class="col-md-3">
						<?php
							 if($building->s_kelurahan) {
								echo "<select name='city_id' class='selectpicker form-control' data-style='btn-default'>";
								echo "<option value='"; echo $building->s_kelurahan; echo "' selected='selected'>".$building->s_kelurahan."</option>";
								foreach($kelurahan as $lurah):
									echo "<option value='".$lurah->name."' >".$lurah->name."</option>";
								endforeach;
								echo "</select>";
							 }else{
								$misc = 'class="selectpicker form-control" data-style="btn-default" disabled';
								echo form_dropdown("city_id",array('Select Area'=>'Select Sub-District First'),'',$misc );
							 }
						?>
                		</div> 
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="kode_post" placeholder="Kode Pos" value="<?php echo $building->s_kodepos;?>">
                        </div> 
                      </div>
                  </div>
                  <br />

                  <div class="row">
                    <div class="form-group">
                        <div class='col-lg-12 col-md-12'>
                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Building Description<small> Input Building introduction</small></h3>
            
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                   
                                        <textarea name="b_description_en" class="textarea" placeholder="Place description text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $building->s_description_en;?></textarea>
                                   
                                </div>
                                <div class='box-body pad'>
                                    
                                        <textarea name="b_description_id" class="textarea" placeholder="Masukkan deskripsi disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $building->s_description_id;?></textarea>
                                    
                                </div>
                            </div>
                        </div>

			<div class="col-lg-12 col-md-12"> 
                    <div class="row">
                        <div class="form-group"> 
                        	<div class="col-md-4">
                                <label>Upload a PDF File:</label>
                                <div class="uploader" id="uniform-report-screenshot"><input name="b_userfile" type="file" id="report-screenshot" class="styled form-control"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div>
                                <a href="<?php echo base_url();?>uploads/building/file/<?php //echo $building->s_userfile;?>"><?php //echo $building->s_userfile;?></a>
                            </div>       
                            <div class="col-md-4">
                                    <label><small>Upload Picture:</small></label>
                                    <div class="uploader" id="uniform-report-screenshot"><input name="b_userpic[]" multiple type="file" id="report-screenshot" class="styled form-control"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div>
                                    <?php //echo $building->s_picture;?>
                                    <?php foreach($images as $image):?>
                                        <a href="<?php echo base_url();?>uploads/building/image/<?php echo $image->s_picture;?>"><?php echo $image->s_picture;?></a> | <a href="<?php echo base_url();?>index.php/editor/building/delete_image/<?php echo $image->pk_building_images_id;?>">[x]</a>
                                    <?php endforeach;?>
                                    
                            </div>
                        </div> 
                </div>
          		<br />
           				<div class="row">
        					 <div class="form-group"> 
									<div class="col-md-4">
                                    <label ><small>Latitude</small></label>
                                    <input value="<?php echo $building->s_lat;?>" type="text" name="b_lat" class="form-control" id="" placeholder="Lat">
                                    </div>
                                     <div class="col-md-4">
                                    <label ><small>Longitude</small></label>
                                   <input value="<?php echo $building->s_lng;?>" type="text" name="b_lng" class="form-control" id="" placeholder="Long">
                                	</div>
                     		</div>
                        </div>
                        <br />

                        <div class="form-group">
                                <div class="row">
                                    <div id="" class="col-md-4">
                                    <label ><small>SEO Title (EN)</small></label>
                                    <input value="<?php echo $building->s_seo_title_en;?>" type="text" name="b_seo_title_en" class="form-control" id="" placeholder="SEO Title">
                                    </div>
                                    <div id="" class="col-md-4">
                                    <label><small>Meta Description (EN) (max 260 characters)</small></label>
                                    <textarea rows="4" cols="53" placeholder="SEO Description" name="b_seo_meta_description_en" maxlength="260"><?php echo $building->s_seo_meta_description_en;?></textarea> 

                                    </div>
                                    <div id="" class="col-md-4">
                                    <label ><small>Meta Keywords (EN) (max 260 characters)</small></label>
                                    <input value="<?php echo $building->s_seo_meta_tags_en;?>" type="text" name="b_seo_meta_tags_en" class="form-control" id="" placeholder="SEO Keywords">
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div id="" class="col-md-4">
                                    <label ><small>SEO Title (ID)</small></label>
                                    <input value="<?php echo $building->s_seo_title_id;?>" type="text" name="b_seo_title_id" class="form-control" id="" placeholder="Judul SEO">
                                    </div>
                                    <div id="" class="col-md-4">
                                    <label ><small>Meta Description (ID) (max 260 characters)</small></label>
                                    <textarea rows="4" cols="53" placeholder="Deskripsi SEO" name="b_seo_meta_description_id" maxlength="260"><?php echo $building->s_seo_meta_description_id;?></textarea> 

                                    </div>
                                    <div id="" class="col-md-4">
                                    <label ><small>Meta Keywords (ID) (max 260 characters)</small></label>
                                    <input value="<?php echo $building->s_seo_meta_tags_id;?>" type="text" name="b_seo_meta_tags_id" class="form-control" id="" placeholder="SEO Keywords">
                                    </div>
                                </div>
                           </div>
           </div>
           

                 <div style="margin-top:20px" class="col-lg-12 col-md-12"> 
                    <div class="row">
                        
                        <div class="col-md-3">
                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Base Rental</h3>
                                </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <label for="term"><small>BR Currency</small></label>
                                        <select name="b_br_currency" class="form-control">
                                            <?php if($building->e_br_currency){ ;?>
                                                <option selected value="<?php echo $building->e_br_currency;?>"><?php echo $building->e_br_currency;?></option>
                                            <?php } ;?>
                                            <option value="">Currency</option>
                                            <option value="IDR">IDR</option>
                                            <option value="USD">USD</option> 
                                        </select>


                                        <label for="term"><small>BR Typical</small></label>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $building->f_br_typical;?>" name="b_br_typical" class="form-control">
                                        <span class="input-group-addon">/m<sup>2</sup> /Month</span>
                                        </div>
                                        <label for="term"><small>BR Ground Floor</small></label>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $building->s_br_ground_floor;?>" name="b_br_ground_floor" class="form-control" >
                                        <span class="input-group-addon">/m<sup>2</sup> /Month</span>
                                        </div>
                                        <label for="term"><small>BR Mezzanine</small></label>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $building->s_br_mezanine;?>" name="b_br_mezanine" class="form-control" >
                                        <span class="input-group-addon">/m<sup>2</sup> /Month</span>
                                        </div>
                                        
                                    </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>

                        <div class="col-md-3">
                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Service Charges</h3>
                                </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <label for="term"><small>SC Currency</small></label>
                                        <select name="b_sc_currency" class="form-control">
                                            <?php if($building->e_sc_currency){ ;?>
                                                <option selected value="<?php echo $building->e_sc_currency;?>"><?php echo $building->e_sc_currency;?></option>
                                            <?php } ;?>

                                            <option value="">Currency</option>
                                            <option value="IDR">IDR</option>
                                            <option value="USD">USD</option> 
                                        </select>


                                        <label for="term"><small>SC Typical</small></label>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $building->f_sc_typical;?>" name="b_sc_typical" class="form-control">
                                            <span class="input-group-addon">/m<sup>2</sup> /Month</span>
                                        </div>
                                        <label for="term"><small>SC Ground Floor</small></label>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $building->s_sc_ground_floor;?>" name="b_sc_ground_floor" class="form-control" >
                                            <span class="input-group-addon">/m<sup>2</sup> /Month</span>
                                        </div>
                                        <label for="term"><small>SC Mezzanine</small></label>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $building->s_sc_mezanine;?>" name="b_sc_mezanine" class="form-control" >
                                            <span class="input-group-addon">/m<sup>2</sup> /Month</span>
                                        </div>
                                        
                                    </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>

                        <div class="form-group">
                                <div class="col-md-5">
                                    <label for="term"><small>Service Charge Description</small></label>
                                    <!--
                                        <select name="b_service_charges_desc" class="form-control">
                                                <option value="AC is included in service charge">AC is included in service charge</option>
                                                <option value="AC, Lighting are included in service charges">AC, Lighting are included in service charges</option>
                                                <option value="AC, Lighting, and Power Outlet are included in service charges">AC, Lighting, and Power Outlet are included in service charges</option>
                                                <option value="Power Outlet is included in service charge">Power Outlet is included in service charge</option>
                                                <option value="Lighting is included in service charge">Lighting is included in service charge</option>
                                                <option value="AC, Lighting, Power Outlet are separately metered at cost">AC, Lighting, Power Outlet are separately metered at cost</option>
                                        </select>
                                    -->
                                    <input type="text" value="<?php echo $building->s_sc_description;?>" name="b_sc_description" class="form-control" >
                                </div>
                            </div>
                        

                                <div class="form-group">
                                <div class="col-md-3">
                                    <label for="term"><small>Term of Payment</small></label>
                                   <select name="b_term_of_payment" class="form-control">
                                    <option <?php if($building->s_term_of_payment == "Quaterly"){ echo "selected";}?> value="Quaterly">Quaterly in Advance</option>
                                    <option <?php if($building->s_term_of_payment == "Semi-Annually"){ echo "selected";}?> value="Semi-Annually">Semi-Annually in advance</option>
                                    <option <?php if($building->s_term_of_payment == "Anually"){ echo "selected";}?> value="Anually">Anually in Advance</option>
                                </select>
                                   </div>
                                   <div class="col-md-2">
                                    <label for="term"><small>Minimum Lease Term</small></label>
                                   <select name="b_minimum_lease_term" class="form-control">
                                    <?php if($building->b_minimum_lease_term){ ;?>
                                        <option selected value="<?php echo $building->b_minimum_lease_term;?>"><?php echo $building->b_minimum_lease_term;?></option>
                                    <?php } ;?>
                                    
                                    <option value="3 Months">3 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Years">2 Years</option>
                                    <option value="3 Years">3 Years</option>
                                    <option value="4 Years">4 Years</option>
                                    <option value="5 Years">5 Years</option>
                                    <option value="10 Years">10 Years</option>
                                </select>
                                   </div>
                                </div>
                            
                                <div class="form-group">
                                <div class="col-md-3">
                                    <label for="deposit"><small>Security Deposit</small></label>
                                    <input type="text" value="<?php echo $building->s_security_deposit;?>" name="b_security_deposit" class="form-control" placeholder="Security Deposit">
                                </div>

                                </div>
                                <div class="form-group">

                                <div class="col-md-2">
                                    <label for="term"><small>Overtime Currency</small></label>
                                    <select name="e_overtime_currency" class="form-control">
                                        <?php if($building->e_overtime_currency){ ;?>
                                            <option selected value="<?php echo $building->e_overtime_currency;?>"><?php echo $building->e_overtime_currency;?></option>
                                        <?php } ;?>

                                        <option value="">Currency</option>
                                        <option value="IDR">IDR</option>
                                        <option value="USD">USD</option> 
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="lease term"><small>Overtime AC</small></label>
                                    <input type="text" value="<?php echo $building->s_overtime_ac;?>" name="b_overtime_ac" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="lease term"><small>Overtime Lighting</small></label>
                                    <input type="text" value="<?php echo $building->s_overtime_lighting;?>" name="b_overtime_lighting" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="lease term"><small>Overtime Power Outlet</small></label>
                                    <input type="text" value="<?php echo $building->s_overtime_power_outlet;?>" name="b_overtime_power_outlet" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="lease term"><small>Overtime Description</small></label>
                                    <input type="text" value="<?php echo $building->s_overtime_description;?>" name="b_overtime_description" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="lease term"><small>Parking</small></label>
                                    <input type="text" value="<?php echo $building->s_parking;?>" name="b_parking" class="form-control">
                                </div>
                                </div>

                            </div>

                </div>
               
                    <div class="col-md-3">
                        <div class="box box-default">
                                <div class="box-header">
                                    <h3 class="box-title">Elevator</h3>
                                </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <label for="selectbasic"><small>Elevator:</small></label>
                                        <div class="input-group">
                                            <input type="number" name="b_elevator" min="0" max="20" step="1" value="<?php echo $building->s_elevator;?>">
                                        </div>
                                        <label for="selectbasic"><small>Low Zone:</small></label>
                                        <div class="input-group">
                                            <input type="number" name="b_low_zone" min="0" max="20" step="1" value="<?php echo $building->s_elevator_low_zone;?>">
                                        </div>
                                        <label for="selectbasic"><small>Mezzanine:</small></label>
                                        <div class="input-group">
                                           <input type="number" name="b_mezanine_zone" min="0" max="20" step="1" value="<?php echo $building->s_elevator_mezanine_zone;?>">
                                        </div>
                                        <label for="selectbasic"><small>High Zone:</small></label>
                                        <div class="input-group">
                                            <input type="number" name="b_high_zone" min="0" max="20" step="1" value="<?php echo $building->s_elevator_high_zone;?>">
                                        </div>
                                        <label for="selectbasic"><small>Executive:</small></label>
                                        <div class="input-group">
                                            <input type="number" name="b_executive_zone" min="0" max="20" step="1" value="<?php echo $building->s_elevator_executive;?>">
                                        </div>
                                        
                                    </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
            
         <div style="margin-top:0px;" class="col-lg-9 col-md-9"> 
                    <div class="box box-default">
                                <div class="box-header">
                                    <h4 class="box-title">Facilities</h4>
                                </div>
                    <div class="box-body">

        <div class="row">
            <div class="form-group">
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_bank == "1"){echo "checked='checked'";}; ?> name="f_bank" type="checkbox"/> BANK / ATM
                </label>
            </div></div>
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_canteen == "1"){ echo "checked='checked'";};?> value="1" name="f_canteen" type="checkbox"/> Canteen
                </label>
            </div></div>
            <div class="col-lg-3 col-md3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_musholla == "1"){echo "checked='checked'";}; ?> name="f_musholla" type="checkbox"/> Musholla
                </label>
            </div></div>
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_function_hall == "1"){echo "checked='checked'";}; ?> name="f_function_hall" type="checkbox"/> Function Hall
                </label>
            </div>
            </div>
            </div>
        </div>         


        <div class="row">
    <div class="form-group">
    <div class="col-lg-3 col-md-3">
    <div class="checkbox">
        <label>
            <input <?php if($building->b_food_court == "1"){echo "checked='checked'";}; ?> value="1" name="f_food_court" type="checkbox"/> Food Court
        </label>
    </div></div>
    <div class="col-lg-3 col-md-3">
    <div class="checkbox">
        <label>
            <input value="1" <?php if($building->b_cafe == "1"){echo "checked='checked'";}; ?> name="f_cafe" type="checkbox"/> Cafe/Restourant
        </label>
    </div></div>
    <div class="col-lg-3 col-md3">
    <div class="checkbox">
        <label>
            <input value="1" name="f_mini_market" <?php if($building->b_mini_market == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Mini Market
        </label>
    </div></div>
    <div class="col-lg-3 col-md-3">
    <div class="checkbox">
        <label>
            <input value="1" name="f_multi_function" <?php if($building->b_multi_function_room == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Multi Function Room
        </label>
    </div>
    </div>
    </div>
</div>

        <div class="row">
            <div class="form-group">
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_health_clinic" <?php if($building->b_health_clinic == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Health Clinic
                </label>
            </div></div>
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_post_office" <?php if($building->b_post_office == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Post Office
                </label>
            </div></div>
            <div class="col-lg-3 col-md3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_money_charger" <?php if($building->b_money_changer == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Money Changer
                </label>
            </div></div>
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_travel_agent == "1"){echo "checked='checked'";}; ?> name="f_travel_agent" type="checkbox"/> Travel Agent
                </label>
            </div>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_bar == "1"){echo "checked='checked'";}; ?> name="f_bar" type="checkbox"/> Bar
                </label>
            </div></div>
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_mall == "1"){echo "checked='checked'";}; ?> name="f_mall" type="checkbox"/> Mall
                </label>
            </div></div>

            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_restaurant == "1"){echo "checked='checked'";}; ?> name="f_restaurant" type="checkbox"/> Restaurant
                </label>
            </div></div>

            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" <?php if($building->b_photo_gallery == "1"){echo "checked='checked'";}; ?> name="f_photo_gallery" type="checkbox"/> Photo Gallery
                </label>
            </div></div>

            </div>
        </div>

        <div class="row">
            <div class="form-group">
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_bakery" <?php if($building->b_bakery == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Bakery
                </label>
            </div></div>
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_penthouse" <?php if($building->b_penthouse == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Penthouse
                </label>
            </div></div>
            <div class="col-lg-3 col-md3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_coffee_shop" <?php if($building->b_coffee_shop == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Coffee Shop
                </label>
            </div></div>
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_meeting_room" <?php if($building->b_meeting_room == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Meeting Room
                </label>
            </div>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_business_center" <?php if($building->b_business_center == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Business Center
                </label>
            </div></div>
            <div class="col-lg-3 col-md-3">
            <div class="checkbox">
                <label>
                    <input value="1" name="f_apartement" <?php if($building->b_apartement == "1"){echo "checked='checked'";}; ?> type="checkbox"/> Apartement
                </label>
            </div></div>

            </div>
        </div>
</div>                   
                    </div>
             </div>
        </div>



<?php endforeach;?>

                  </div>
                 </div>
                <div style="margin-top:5px;" class="text-right">
                  <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Save Changes">
                </div><br>
        
            

              <?php echo form_close();?>
            </div>  

            </aside><!-- /.right-side -->




        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- Ipapa App -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">

             $("#country_id").change(function(){
                var selectValues = $("#country_id").val();
                if (selectValues == 0){
                    var msg = "<select id=\"province_id\" class=\"selectpicker form-control\" data-style=\"btn-default\" name=\"province_id\" disabled><option value=\"Select Sub-District\">Select City First</option></select>";
                    $('#province').html(msg);
                }else{
                    var country_id = {country_id:$("#country_id").val()};
                    $('#province_id').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('index.php/admin/building/select_kecamatan')?>",
                            data: country_id,
                            success: function(msg){
                                $('#province').html(msg);
                            }
                    });
                }
        });
            $('body').delegate("#province_id","change", function() {
                var selectValues = $("#province_id").val();
                if (selectValues == 0){
                    var msg = "<select id=\"city_id\" class=\"selectpicker form-control\" data-style=\"btn-default\" name=\"city_id\" disabled><option value=\"Pilih Kota / Kabupaten\">Select Sub-District First</option></select>";
                    $('#city').html(msg);
                }else{
                    var province_id = {province_id:$("#province_id").val()};
                    $('#city_id').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('index.php/admin/building/select_kelurahan')?>",
                            data: province_id,
                            success: function(msg){
                                $('#city').html(msg);
                            }
                    });
                }
        });

            $(function() {
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
    </body>
</html>
