            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Building
                        <small>Edit Building</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Manage Building</li>
                        <li class="active">Edit Building</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="nav-tabs-custom">
  
                            
                                  
            <!-- <form role="form" class="block" action="#"> -->
            <div class="tab-content">
            <?php echo form_open_multipart("editor/building/do_edit");?>
            <?php foreach($buildings as $building):

            echo form_hidden('b_id', $building->pk_building_id);
            ?> 
            <div class="row">
                  <div class="col-md-3">
                        <input type="hidden" name="b_id" value="<?php echo $building->pk_building_id;?>" />
                        <input type="text" class="form-control" name="b_name" value="<?php echo $building->s_building_name;?>" disabled="disabled">
                      </div>
                     </div><br />
                <div class="block-inner ">
          			
                  <div class="row">
                  
                    <div class="form-group">
                    
                        <div class='col-lg-12 col-md-12'>
                        
                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Building Description<small> Input Building introduction</small></h3>
            
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                   
                                        <textarea name="b_description_en" class="textarea" placeholder="Place description text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $building->s_description_en;?></textarea>
                                   
                                </div>
                                <div class='box-body pad'>
                                    
                                        <textarea name="b_description_id" class="textarea" placeholder="Masukkan deskripsi disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $building->s_description_id;?></textarea>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                             

                 <div style="margin-top:10px" class="col-lg-12 col-md-12"> 
                    <div class="row">
                        <div class="form-group"> 
                        <div class="col-md-4">
                                <label>Upload a PDF File:</label>
                                <div class="uploader" id="uniform-report-screenshot"><input name="b_userfile" type="file" id="report-screenshot" class="styled form-control"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div>
                                <a href="<?php echo base_url();?>uploads/building/file/<?php //echo $building->s_userfile;?>"><?php //echo $building->s_userfile;?></a>
                            </div>       
                            <div class="col-md-4">
                                    <label><small>Upload Picture:</small></label>
                                    <div class="uploader" id="uniform-report-screenshot"><input name="b_userpic[]" multiple type="file" id="report-screenshot" class="styled form-control"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div>
                                    <?php //echo $building->s_picture;?>
                                    <?php foreach($images as $image):?>
                                        <a href="<?php echo base_url();?>uploads/building/image/<?php echo $image->s_picture;?>"><?php echo $image->s_picture;?></a> | <a href="<?php echo base_url();?>index.php/editor/building/delete_image/<?php echo $image->pk_building_images_id;?>">[x]</a>
                                    <?php endforeach;?>
                                    
                            </div>
                </div> 
        </div>
        							<div class="row">
        					 <div class="form-group"> 
									<div class="col-md-4">
                                    <label ><small>Latitude</small></label>
                                    <input value="<?php echo $building->s_lat;?>" type="text" name="b_lat" class="form-control" id="" placeholder="Lat">
                                    </div>
                                     <div class="col-md-4">
                                    <label ><small>Longitude</small></label>
                                   <input value="<?php echo $building->s_lng;?>" type="text" name="b_lng" class="form-control" id="" placeholder="Long">
                                	</div>
                     		</div>
                        </div>
<?php endforeach;?>


                  </div>
                 </div>
                <div style="margin-top:5px;" class="text-right">
                  <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Save Changes">
                </div><br>
        
            

              <?php echo form_close();?>
            </div>  

            </aside><!-- /.right-side -->




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

             $("#province_id").change(function(){
                var selectValues = $("#province_id").val();
                if (selectValues == 0){
                    var msg = "Kota / Kabupaten :<br><select name=\"city_id\" disabled><option value=\"Pilih Kota / Kabupaten\">Pilih Kota Dahulu</option></select>";
                    $('#city').html(msg);
                }else{
                    var province_id = {province_id:$("#province_id").val()};
                    $('#city_id').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('admin/building/select_city')?>",
                            data: province_id,
                            success: function(msg){
                                $('#city').html(msg);
                            }
                    });
                }
        });

            $(function() {
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
    </body>
</html>
