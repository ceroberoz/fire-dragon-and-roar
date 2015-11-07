 
<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-10 col-xs-12 user-details clearfix">
<aside class="right-side">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="box">
                                <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="pull-left header"><i class="fa fa-building-o"></i> Add Office</li>
                                </ul>
            <div class="tab-content">

            <?php echo form_open('management/offices/do_add');?>
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
                                            <input type="text" name="o_available" class="form-control pull-right" placeholder="Available date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                      </div> 
                      </div>
                      <div class="row">
                      <div class="form-group">
                                    <div class="col-md-3 col-xs-6">
                                        <input type="text" class="form-control" name="o_floor" placeholder="Floor">
                                    </div>  
                                    <div class="col-md-2 col-xs-6">
                                        <input type="text" class="form-control" name="o_unit" placeholder="Unit">
                                    </div>  

                                    <div style="margin-left:-15px;" class="col-md-3 col-xs-12">
                                        <div class="input-group col-sm-6 col-xs-9">
                                          <input class="form-control" value="" name="o_price" placeholder="Price">   
                                        </div>
                                    </div>
                                    <div style="margin-left:-55px;" class="col-md-2 col-xs-4">
                                        <select name="o_currecy"  class="form-control">
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
                                        <textarea class="textarea" name="o_desc_en" placeholder="Office Description English" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                
                        <div class='col-lg-6 col-md-6'>
                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Deskripsi Office</h3>

                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                        <textarea class="textarea" name="o_desc_id" placeholder="Deskripsi office bahasa" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--
                <div class="box box-default col-lg-12 col-md-12">
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"/> Air Conditioner
                            </label>
                        </div></div>
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"/> Washing Room
                            </label>
                        </div></div>
                        <div class="col-lg-3 col-md3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"/> Parking Area
                            </label>
                        </div></div>
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"/> Internet
                            </label>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        -->
     </div>
                <div class="text-right">
                  <input type="button" class="btn btn-default" onclick="history.go(-1);" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Add Office">
                </div>
              </form>
              <?php form_close();?>
                                    
                                    </div>
                                    
                                </div><!-- /.tab-content -->
                            </div>

                            </div><!-- /.box -->
                        </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
                 

</div>
			
</section>