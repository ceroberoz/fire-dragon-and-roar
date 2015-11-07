            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Manage Buildings</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Manage Building</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="row pad">
                                    <div class="col-sm-6"> 
                                    <span class="btn btn-default btn-sm"><?php echo $totalB;?> List of Total</span>
<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add" ><i class="ion ion-plus"></i> Add New</button>
                                    </div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Building</h4>
      </div>
      <div class="modal-body">


<!-- <form role="form" class="block" action="<?php echo base_url();?>index.php/admin/building/add"> -->
<?php echo form_open("admin/building/add");?>
    <div class="block-inner">
      <div class="form-group">
        <div class="row">
          <div class="col-md-12">
            <label>Building Name</label>
            <input name="b_name" type="text" class="form-control" value="">
          </div>

        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label>Office Number</label>
            <input name="b_offices" type="text" class="form-control" value="">
          </div>
          <div class="col-md-6">
            <label>Location</label>
            <input name="b_location" type="text" class="form-control" value="">
          </div>
        </div>
      </div>
     </div>
    <div class="text-right">
      <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-success" value="Add New Building">
    </div>
  </form>
    
      </div>
    </div>
  </div>
</div>            

                                </div>

                                <div class="box-body table-responsive">
                                    <table id="buildinglist-view" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Type</th>
                                                <th>Building Name</th>
                                                <th>Location</th>
                                                <th>City</th>
                                                <th>Area</th>
                                                <th>Village</th>
                                                <th>Base Rent</th>
                                                <th>Service Charges</th>
                                                <th>Last Update</th>        
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                          
                                           <?php foreach($buildings as $building):?>
                                            <tr>
                                                <td><span class="label label-primary">&nbsp; <?php echo $building->e_building_status;?> &nbsp; </span></td>
                                                <td><?php echo $building->e_building_type;?></td>
                                                <td><?php echo $building->s_building_name;?></td>
                                                <td><?php echo $building->s_location;?></td>
                                                <td><?php echo $building->s_city;?></td>
                                                <td><?php echo $building->s_kecamatan;?></td>
                                                <td><?php echo $building->s_kelurahan;?></td>
                                                <td><?php echo $building->e_br_currency;?> <?php echo $building->f_br_typical;?></td>
                                                <td><?php echo $building->e_sc_currency;?> <?php echo $building->f_sc_typical;?></td>
                                                <td><?php echo $building->t_updated;?></td>
                                                <td width="65px"><a href="<?php echo base_url();?>index.php/admin/building/edit/<?php echo $building->pk_building_id;?>" class="btn-app"><i class="fa fa-edit"></i> Edit</a> &nbsp; <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url();?>index.php/admin/building/delete/<?php echo $building->pk_building_id;?>" class="btn-app"><i  class="fa fa-minus-square"></i> Delete</a></td>
                                            </tr>
                                            <?php endforeach;?>
                                        
                                        </tbody>
                                        <tfoot>
                                            
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Ipapa App -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#buildinglist-view").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>
