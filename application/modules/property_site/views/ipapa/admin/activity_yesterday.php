            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Manage Activity Log</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Manage Activity</li>
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
                                    <span class="btn btn-default btn-sm"><?php echo $this->db->count_all('activity');?> List of Total</span>
                                    <span class="btn btn-default btn-sm"><a href="<?php echo base_url();?>index.php/admin/activity/today"> Today</a></span>
                                    <span class="btn btn-default btn-sm"><a href="<?php echo base_url();?>index.php/admin/activity/yesterday"> Yesterday</a></span>
                                    <span class="btn btn-default btn-sm"><a href="<?php echo base_url();?>index.php/admin/activity/week"> Week</a></span>
                                    <span class="btn btn-default btn-sm"><a href="<?php echo base_url();?>index.php/admin/activity/month"> Month</a></span>
                                    </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="activitylist-view" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Ip Address</th>
                                                <th>Activity</th>
                                                <th>Building Log</th>
                                                <th>Client</th>
                                                <th>Log Date</th>
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
    <?php foreach($yesterday as $log):?>
                                            <tr>
                                                <td><?php echo $log->s_username;?></td>
                                                <td><?php echo $log->s_ip_address;?></td>
                                                <td><?php echo $log->s_activity;?></td>
                                                <td><?php echo $log->s_log;?></td>
                                                <td><?php echo $log->s_client;?></td>
                                                <td><?php echo $log->t_added;?></td>
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
                $('#activitylist-view').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>
