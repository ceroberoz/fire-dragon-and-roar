
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Manage Decoration Products</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Manage Decoration</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Category</h4>
      </div>
      <div class="modal-body">
        <?php
        $extra = array(
            'class' => 'block'
            );

         echo form_open('admin/decoration/add_category',$extra);?>
        <div class="block-inner">
          <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                
                <input name="f_category_name" type="text" class="form-control" placeholder="Category Name">
              </div>
            <div class="col-md-6">
          <input type="submit" class="btn btn-success" value="Add New"> <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
            
            </div>
            </div>
        </div>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>


        </div><!-- /.box-header -->
                                    <div class="row pad col-sm-12 col-md-12">
                                                <div class="col-md-12 col-sm-12 pull-left">
                                                <span class="btn btn-default btn-sm"><?php echo $countD;?> List of Total</span>
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add" ><i class="ion ion-plus"></i> Add Category</button>
                                                
                                                <!-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#sub" ><i class="ion ion-plus"></i> Add Sub Category</button> -->
                                              
                                                 <a href="<?php echo base_url();?>admin/decoration/add_decoration" class="btn btn-info btn-sm"><font color="#fff"><i class="ion ion-plus"></i> Add Decoration</font></a>
                                             </div>

                                                
                                    </div><!-- /.row -->

                                    <div class="box-body table-responsive">
                                    <table id="accountlist-view" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> </th>
                                                <th>Product ID</th>
                                                <th>Category</th>
                                                <th>Picture</th>
                                                <th>Publish Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                          
                                        <!-- start loop -->
                                        <?php foreach($decorations as $decoration):?>
                                        <tr>
                                            <td class="small-col"><input type="checkbox" /></td>
                                            <td><?php echo $decoration->s_decoration_name;?></td>
                                            <td><?php echo $decoration->s_decoration_category_name;?></td>
                                            <td><img src="<?php echo base_url();?>uploads/decoration/<?php echo $decoration->s_picture;?>" width="48" height="48"></td>
                                            <td><?php echo $decoration->t_added;?></td>
                                            <td><a href="<?php echo base_url();?>admin/decoration/edit/<?php echo $decoration->pk_decoration_id;?>" class="btn-app"><i class="fa fa-edit"></i> Edit</a> &nbsp; <a  data-href="" data-toggle="modal" data-target="#confirm-delete-<?php echo $decoration->pk_decoration_id;?>" href="#" class="btn-app"><i class="fa fa-minus-square"></i> Delete</a></td>
                                        </tr>

                                        <div class="modal fade" id="confirm-delete-<?php echo $decoration->pk_decoration_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <a href="<?php echo base_url();?>admin/decoration/delete_decoration/<?php echo $decoration->pk_decoration_id;?>" class="btn btn-danger danger">Yes, Delete!</a>
                </div>
            </div>
        </div>
    </div>

                                        <?php endforeach;?>
                                        <!-- end loop -->
                                    </div>
 

        

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
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Ipapa App -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#accountlist-view").dataTable();
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
        <script>
                $('#confirm-delete').on('show.bs.modal', function(e) {
                    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
                    
                    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
                })
        </script>
    </body>
</html>