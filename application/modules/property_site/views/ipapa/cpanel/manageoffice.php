<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-10 col-xs-12 user-details clearfix">
<a href="<?php echo base_url();?>management/offices/add" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i> Add New Office</a>                         

            <div style="padding-top:10px;" class="row">
                <section class="content">
                        <div class="col-xs-12">
                                <div class="box-body table-responsive">
                                    <table id="buildinglist-view" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Building</th>
                                                <th>Floor</th>
                                                <th>Office Unit Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                          
                                           <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
            
                <div class="modal-body">
                    <p>Are you sure you want to permanently delete from the Database?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger danger">Yes, Delete!</a>
                </div>
            </div>
        </div>
    </div>
    <?php foreach($myoffice as $office):?>
        <tr>
            <td><span class="label label-success">Available</span></td>
            <td><?php echo $office->s_building_name;?></td>
            <td><?php echo $office->s_office_floor;?></td>
            <td><?php echo $office->s_office_unit;?></td>
            <td><?php echo $office->t_available;?></td>
            <td><a href="<?php echo base_url();?>management/offices/edit/<?php echo $office->pk_office_id;?>" class="btn-app"><i class="fa fa-edit"></i> Edit</a> &nbsp; <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url();?>management/offices/delete/<?php echo $office->pk_office_id;?>" class="btn-app"><i class="fa fa-minus-square"></i> Delete</a></td>
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