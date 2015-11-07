            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Office
                        <small><?php echo $title ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Manage Office</li>
                        <li class="active"><?php echo $title ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-9">
                            <div class="box">
                                <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active"><a data-toggle="tab" href="#en">English</a></li>
                                    <li class="pull-left header"><i class="fa fa-building-o"></i> <?php echo $title ?></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="en" class="tab-pane active">
             <?php echo form_open_multipart("admin/office/do_add");?>
             
<div class="block-inner ">
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-5">
                            <select name="o_bid" class="form-control">
                                <?php foreach($buildings as $building):?>
                                    <option value="<?php echo $building->pk_building_id;?>"><?php echo $building->s_building_name;?></option>
                                <?php endforeach;?>
                            </select>
                          </div> 

                      <div class="col-md-4">
                       <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                           <input name="o_available" type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                      </div> 
                      </div>
                      <div class="row">
                          <div class="form-group">
                                <div class="col-md-3">
                                    <input value="" type="text" name="o_floor" class="form-control" placeholder="Floor">
                                </div>  
                                <div class="col-md-2">
                                    <input value="" type="text" name="o_unit" class="form-control" placeholder="Unit">
                                </div>  

                                <div class="col-md-3">
                                    <div class="input-group col-sm-12">
                                      <input class="form-control" name="o_price" value="" placeholder="Price">   
                                    </div>
                                </div>
                                <div style="margin-left:-60px;" class="col-md-2">
                                    <select name="o_currecy" class="form-control">
                                            <option value="IDR">Rp.</option>
                                            <option value="USD" >US $</option>

                                        </select>
                                </div>
                        </div> 
                    </div>

            <div style="margin-top:10px;" class="box box-default">
                <!--
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                <input name="f_ac" value="1" type="checkbox"/> Air Conditioner
                            </label>
                        </div></div>
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                <input name="f_washing_room" value="1" type="checkbox"/> Washing Room
                            </label>
                        </div></div>
                        <div class="col-lg-3 col-md3">
                        <div class="checkbox">
                            <label>
                                <input name="f_parking_area" value="1" type="checkbox"/> Parking Area
                            </label>
                        </div></div>
                        <div class="col-lg-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                <input name="f_internet" value="1" type="checkbox"/> Internet
                            </label>
                        </div>
                        </div>
                        </div>
                    </div>
                    -->

                </div>
            </div>
        </div>

                 <div class="row">
                    <div class="form-group">
                        <div class='col-lg-12 col-md-12'>
                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Building Description<small> Input Building introduction</small></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus blue"></i></button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                    
                                        <textarea name="o_desc_en" class="textarea" placeholder="Place description text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                               
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
                  
                  <div class="row">
                    <div class="form-group">
                        <div class='col-lg-12 col-md-12'>
                            <div class='box'>
                                <div class='box-header'>
                                     <h3 class='box-title'>Deskripsi Gedung<small> Gambaran singkat mengenai gedung</small></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus blue"></i></button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                    <textarea name="o_desc_id" class="textarea" placeholder="Masukkan deskripsi disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>


        </div>
        <!--
        <div class="row">
            <div class="form-group">
                 <div class="col-md-4">
                    <label>Upload Picture File:</label>
                    <div class="uploader" id="uniform-report-screenshot"><input name="b_userpic[]" multiple type="file" id="report-screenshot" class="styled form-control"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div>
                            </div>                
            </div>
        </div>
    -->
     </div>
                <div class="text-right">
                  <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Save">
                </div>
              <?php form_close();?>
              
                                    </div> <!-- /.tab-pane -->
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
        <!-- Ipapa App -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        
        <!-- InputMask -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm-dd-yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#available').daterangepicker();
                $('#available_id').daterangepicker();
                //Date range picker with time picker
                $('#availabletime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
    </body>
</html>
