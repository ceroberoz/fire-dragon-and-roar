            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Manage Accounts</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Manage Accounts</li>
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
        <h4 class="modal-title" id="myModalLabel">Add Account</h4>
      </div>
      <div class="modal-body">
<!-- <form role="form" class="block" action="<?php echo base_url();?>index.php/admin/home/add_account"> -->
<?php echo form_open("admin/account/add");?>
                <div class="block-inner">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>User Name</label>
                        <?php echo form_error('username'); ?>
                        <input placeholder="Full Name" name="username" type="text" class="form-control" value="<?php echo set_value('username');?>">
                      </div>

                      <div class="col-md-6">
                        <label>Email</label>
                        <?php echo form_error('email'); ?>
                        <input name="email" type="text" class="form-control" value="<?php echo set_value('email');?>">
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>New Password</label>
                        <?php echo form_error('password'); ?>
                        <input name="password" type="password" class="form-control" value="<?php echo set_value('password');?>">
                      </div>
                      <div class="col-md-6">
                        <label>Re-type New password</label>
                        <?php echo form_error('password_confirm'); ?>
                        <input name="password_confirm" type="password" class="form-control" value="<?php echo set_value('password_confirm');?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                  <label class="col-md-4 control-label" for="selectbasic">Select Group</label>
                  <div class="col-md-4">
                    <select id="selectbasic" name="level" class="form-control">
                      <option value="1">Administrator</option>
                      <!-- <option value="2">Registered User</option> -->
                      <option value="2">Building Management</option>
                      <option value="4">Marketing</option>
                      <option value="5">SEO</option>
                      <option value="6">Editor</option>
                      <option value="">FRU</option>
                    </select>
                  </div>
                </div>
                 </div>
                <div class="text-right">
                  <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Add Account">
                </div>
              <?php echo form_close();?>
    
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Account</h4>
      </div>
      <div class="modal-body">
    

      </div>
    </div>
  </div>
</div>


        </div><!-- /.box-header -->
                                    <div class="row pad col-sm-12 col-md-12">
                                                <div class="col-md-8 col-sm-8 pull-left">
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add" ><i class="ion ion-plus"></i> Add New</button>
                                                </div>
                                           <div class="col-md-4 col-sm-3 text-right">
                                                 <i class="fa fa-user-md blue"></i>  
                                                 <?php echo $descBM;?> BM
                                                 &nbsp; &nbsp; <i class="fa fa-user orange"></i>   
                                                 <?php echo $descFRU;?> FRU 
                                                 &nbsp; &nbsp; <i class="fa fa-lock green"></i> 
                                                 <?php echo $descADM;?> Admin
                                                 &nbsp; &nbsp; <i class="fa fa-users blue"></i>  
                                                 <?php echo $total;?> Total Users
                                             </div>

                                                
                                    </div><!-- /.row -->

                                    <div class="box-body table-responsive">
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th><input type="checkbox" /></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Last Login</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                          
                                           
                                        <?php foreach($users as $user):?>   
                                        <tr>
                                            <td><span class="label <?php if($user->active = '1'){echo "label-success";}else{echo "label-danger";}?>"> &nbsp;  <?php if($user->active = '1'){echo "Active";}else{echo "Inactive";}?>  &nbsp; </span></td>
                                            <td class="small-col"><input type="checkbox" /></td>
                                            <td><img class="circle-image" alt="user image" src="<?php echo base_url();?>/assets/ipapa/admin/img/default_user.png"> <?php echo $user->username;?></td>
                                            <td><?php echo $user->email;?></td>
                                            <td>
                                              <?php $epoch = $user->last_login;?>
                                              <?php $dt = new DateTime("@$epoch");?>
                                              <?php // echo $dt->format('Y-m-d H:i:s');?>
                                              <?php echo $dt->format('m-d-Y');?>
                                            </td>
                                            <td>
                                              <?php echo $user->description;?>
                                            </td>
                                            <td> <a href="<?php echo base_url();?>index.php/admin/account/edit/<?php echo $user->id;?>" class="btn-app"><i class="fa fa-edit"></i> Edit</a> &nbsp; <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url();?>index.php/admin/account/delete/<?php echo $user->id;?>" class="btn-app"><i class="fa fa-minus-square"></i> Delete</a></td>
                                        </tr>
                                        <?php endforeach;?>
                                     
                                         
                                            <tr>
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
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Ipapa App -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
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
    </body>
</html>
