            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Manage Offices</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Manage Offices</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="row pad">
                                    <div class="col-sm-6"> 
                                    <span class="btn btn-default btn-sm"><?php echo $this->db->count_all('office'); ?> List of Total</span>
                                   <a class="btn btn-info btn-sm" href="<?php echo base_url();?>index.php/admin/office/add" ><font color="#fff"><i class="ion ion-plus"></i> Add New</font></a>
                                    </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="officelist-view" class="table table-bordered table-striped">
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
    <?php foreach($offices as $office):?>
                                            <tr>
                                                <td><span class="label label-success">Available</span></td>
                                                <td><?php echo $office->s_building_name;?></td>
                                                <td><?php echo $office->s_office_floor;?></td>
                                                <td><?php echo $office->s_office_unit;?></td>
                                                <td><?php $t_avail = $office->t_available;?>
                                                    <?php $date        = new DateTime($t_avail);?>
                                                    <?php echo $date->format('d-m-Y');?>
                                                </td>
                                                <td><a href="<?php echo base_url();?>index.php/admin/office/edit/<?php echo $office->pk_office_id;?>" class="btn-app"><i class="fa fa-edit"></i> Edit</a> &nbsp; <a href="<?php echo base_url();?>index.php/admin/office/delete/<?php echo $office->pk_office_id;?>"><i class="fa fa-minus-square"></i> Delete</a></td>
                                            </tr>
    <?php endforeach;?>
                                                                                 
                                        </tbody>
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
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- Ipapa App -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#officelist-view").dataTable();
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
