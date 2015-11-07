<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-10 col-xs-12 user-details clearfix pull-right">
            <div style="padding-top:10px;" class="row">
              
                <section class="content">
                        <div class="col-xs-12">
                          <div class="alertmybuilding">*Please update your building facilities</div>
                                <div class="box-body table-responsive">
                                    <table id="buildinglist-view" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Building Name</th>
                                                <th>Facilities</th>
                                                <th>Date Updated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($buildings as $building):?>                                          
                                          <tr>
                                                <td><span class="label label-success">Published</span></td>
                                                <td><?php echo $building->s_building_name;?></td>
                                                <td>
<img alt="" src="<?php echo base_url();?>assets/ipapa/images/<?php if($building->b_bank == "1"){ echo"check.png"; } else { echo "uncheck.png"; } ;?>" width="12px" height="12px"> <small>Bank/ATM</small><br>
<img alt="" src="<?php echo base_url();?>assets/ipapa/images/<?php if($building->b_restaurant == "1"){ echo"check.png"; } else { echo "uncheck.png"; } ;?>" width="12px" height="12px"> <small>Restaurant/Cafe</small><br>
<img alt="" src="<?php echo base_url();?>assets/ipapa/images/<?php if($building->b_canteen == "1"){ echo"check.png"; } else { echo "uncheck.png"; } ;?>" width="12px" height="12px"> <small>Canteen</small><br>
<img alt="" src="<?php echo base_url();?>assets/ipapa/images/<?php if($building->b_bar == "1"){ echo"check.png"; } else { echo "uncheck.png"; } ;?>" width="12px" height="12px"> <small>Bar</small>

                                                </td>
                                                <td><?php if($building->t_updated=='0000-00-00 00:00:00'){echo "0000-00-00 00:00:00";}else{echo date('F j, Y',strtotime($building->t_updated));}?>
                                                           </td>
                                                <td><a href="<?php echo base_url();?>management/building/edit/<?php echo $building->pk_building_id;?>" class="btn-app"><i class="fa fa-edit"></i> Edit</a></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                        </div>
                    </div>


                </section><!-- /.content -->
            </div>
        </div>   
                 

</div>
            
</section>