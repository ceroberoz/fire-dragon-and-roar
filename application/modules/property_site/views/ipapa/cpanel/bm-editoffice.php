<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-10 col-xs-12  clearfix">
<aside class="right-side">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="box">
                                <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="pull-left header"><i class="fa fa-building-o"></i> Edit Office</li>
                                </ul>
            <div class="tab-content">
            <?php echo form_open_multipart('management/offices/do_edit');?>
            <?php foreach($offices as $office):?>
            <input type="hidden" name="o_id" value="<?php echo $office->pk_office_id;?>" />

                <div class="block-inner ">
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-5 col-xs-6">
                        <select name="o_bid" class="form-control">
                            <?php foreach($buildings as $building):?>
                                <option value="<?php echo $building->pk_building_id;?>"><?php echo $building->s_building_name;?></option>
                            <?php endforeach;?>
                        </select>
                      </div> 

                      <div class="col-md-4 col-xs-6">
                       <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input value="<?php echo $office->t_available;?>" type="text" name="o_available" class="form-control pull-right" placeholder="Available date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                      </div> 
                      </div>
                      <div class="row">
                      <div class="form-group">
                                    <div class="col-md-3 col-xs-6">
                                        <input name="o_floor" value="<?php echo $office->s_office_floor;?>" type="text" class="form-control">
                                    </div>  
                                    <div class="col-md-2 col-xs-6">
                                        <input type="text" class="form-control" name="o_unit" value="<?php echo $office->s_office_unit;?>">
                                    </div>  

                                    <div  class="col-md-2 col-xs-12">
                                        
                                          <input class="form-control" name="o_price" value="<?php echo $office->f_office_price;?>">   
                                       
                                    </div>
                                    <div class="col-md-3 col-xs-4">
                                        <select name="o_currecy" value="<?php echo $office->o_currecy;?>" class="form-control">
                                                <option value="IDR">Rp.</option>
                                                <option value="USD">US $</option>

                                            </select>
                                    </div>
                    </div> 
                    </div> 
                </div> 
                  
                  <div class="row">
                    <div class="form-group">
                        <div class='col-lg-6 col-md-6'>
                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Office Description</h3>

                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                        <textarea class="textarea" name="o_desc_en" placeholder="Office Description English" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $office->s_office_desc_en;?></textarea>
                                </div>
                            </div>
                        </div>
                
                        <div class='col-lg-6 col-md-6'>
                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Deskripsi Office</h3>

                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                        <textarea class="textarea" name="o_desc_id" placeholder="Deskripsi office bahasa" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $office->s_office_desc_id;?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-default col-lg-12 col-md-12">
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                               <input <?php if($office->b_ac == "1"){ echo "checked='checked'";};?> name="f_ac" value="1" type="checkbox"/> Air Conditioner
                             </label>
                        </div></div>
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                 <input <?php if($office->b_washing_room == "1"){ echo "checked='checked'";};?> name="f_washing_room" value="1" type="checkbox"/> Washing Room
                            </label>
                        </div></div>
                        <div class="col-lg-3 col-md3">
                        <div class="checkbox">
                            <label>
                                 <input <?php if($office->b_parking_area == "1"){ echo "checked='checked'";};?> name="f_parking_area" value="1" type="checkbox"/> Parking Area
                            </label>
                        </div></div>
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                 <input <?php if($office->b_internet == "1"){ echo "checked='checked'";};?> name="f_internet" value="1" type="checkbox"/> Internet
                           </label>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label>Upload Picture:</label>
                            <div class="uploader" id="uniform-report-screenshot"><input name="b_userpic[]" multiple type="file" id="report-screenshot" class="styled form-control"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div>
                          <p>       <?php foreach($images as $image):?>
                                        <a href="<?php echo base_url();?>uploads/office/image/<?php echo $image->s_picture;?>"><?php echo $image->s_picture;?></a> | <a href="<?php echo base_url();?>index.php/management/offices/delete_image/<?php echo $image->pk_office_images_id;?>">[x]</a>
                                    <?php endforeach;?>
                            </p>
                    </div>                
                </div>
                </div>

            
     </div>
 <?php endforeach;?>
                <div class="text-right">
                  <input type="button" class="btn btn-default" onclick="history.go(-1);" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Add Office">
                </div>
              </form>
                                    
                                    </div>
                                    
                                </div><!-- /.tab-content -->
                            </div>

                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
                 	
</section>