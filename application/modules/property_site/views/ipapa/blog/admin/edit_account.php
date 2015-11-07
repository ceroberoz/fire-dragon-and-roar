        <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Account
                        <small>Edit Account</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Manage Account</li>
                        <li class="active">Edit Account</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-9">
                            <div class="box">
                                <div class="nav-tabs-custom">

                                <div class="tab-content">


                <?php $pocky = array(
                                'role' => 'form',
                                'class' => 'block'
                                );
                        echo form_open_multipart('snipp/do_edit',$pocky);
//$uid 	 = $this->ion_auth->user()->row()->id;
$uid = $this->uri->segment(4);
echo form_hidden('id',$uid);

    foreach($users as $user):
    echo form_hidden('email',$user->email);
        ?>

                <div class="block-inner ">
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-4">
                        <input name="username" type="text" class="form-control" value="<?php echo $user->username;?>">
                      </div>

                      <div class="col-md-4">
                        <select name="level" class="form-control">
                                                <option value="3">Registered User</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">Building Management</option>
                                                
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                             <div class="form-group">
                                    <div class="col-md-4">
                                        <input name="email" type="email" class="form-control" disabled="" value="<?php echo $user->email;?>">
                                    </div>
                                    <div class="col-md-4">
                                        <input placeholder="Phone Number" name="phone" type="text" class="form-control" value="<?php echo $user->phone;?>">
                                    </div>

                                     <div style="margin-top:20px" class="col-lg-12 col-md-12">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <label>Upload Profile Picture :</label>
                                                <div class="uploader" id="uniform-report-screenshot"><input value="<?php echo $user->s_avatar;?>" name="u_avatar" type="file" id="report-screenshot" class="styled form-control"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div>
                                        </div>
                                     </div>
                                     </div>
                 <div style="margin-top:20px" class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                 <input placeholder="Address" name="address" type="text" class="form-control" value="<?php echo $user->address;?>">
                            </div>
                        <div class="col-md-4">
                                 <input name="company" placeholder="Company"  type="text" class="form-control" value="<?php echo $user->company;?>">
                        </div>
                        </div>
                     </div>
                </div>

                <div style="margin-top:20px" class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                 <input name="password" type="password" class="form-control" placeholder="New Password" required>
                            </div>
                        <div class="col-md-4">
                                 <input name="password_confirm" type="password" class="form-control" placeholder="Retype New Passwprd" required>
                        </div>
                        </div>
                     </div>
                </div>


                  </div>
                 </div>
                <div style="margin-top:50px;" class="text-right">
                  <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Save Changes">
                </div>
              <?php endforeach; echo form_close();?>


                                </div><!-- /.tab-content -->
                            </div>

                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



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
            $(function() {
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
    </body>
</html>
