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
            <?php echo form_open("seo/building/do_edit");?>
            <?php foreach($buildings as $building):?>
                <div class="block-inner ">
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-3">
                        <input type="hidden" name="b_id" value="<?php echo $building->pk_building_id;?>" />
                        <input disabled type="text" class="form-control" name="b_name" value="<?php echo $building->s_building_name;?>">
                      </div> 

                               </div>
                           </div> 

                  
                  <div class="row">
 
                 <div style="margin-top:20px" class="col-lg-12 col-md-12"> 

                             <div class="form-group">
                                <div class="row">
                                    <div id="" class="col-md-4">
                                    <label ><small>SEO Title (EN)</small></label>
                                    <input value="<?php echo $building->s_seo_title_en;?>" type="text" name="b_seo_title_en" class="form-control" id="" placeholder="SEO Title">
                                    </div>
                                    <div id="" class="col-md-4">
                                    <label><small>Meta Description (EN) (max 260 characters)</small></label>
                                    <textarea rows="4" placeholder="SEO Description" name="b_seo_meta_description_en" maxlength="260"><?php echo $building->s_seo_meta_description_en;?></textarea> 

                                    </div>
                                    <div id="" class="col-md-4">
                                    <label ><small>Meta Keywords (EN) (max 260 characters)</small></label>
                                    <input value="<?php echo $building->s_seo_meta_tags_en;?>" type="text" name="b_seo_meta_tags_en" class="form-control" id="" placeholder="SEO Keywords">
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div id="" class="col-md-4">
                                    <label ><small>SEO Title (ID)</small></label>
                                    <input value="<?php echo $building->s_seo_title_id;?>" type="text" name="b_seo_title_id" class="form-control" id="" placeholder="Judul SEO">
                                    </div>
                                    <div id="" class="col-md-4">
                                    <label ><small>Meta Description (ID) (max 260 characters)</small></label>
                                    <textarea rows="4" placeholder="Deskripsi SEO" name="b_seo_meta_description_id" maxlength="260"><?php echo $building->s_seo_meta_description_id;?></textarea> 

                                    </div>
                                    <div id="" class="col-md-4">
                                    <label ><small>Meta Keywords (ID) (max 260 characters)</small></label>
                                    <input value="<?php echo $building->s_seo_meta_tags_id;?>" type="text" name="b_seo_meta_tags_id" class="form-control" id="" placeholder="SEO Keywords">
                                    </div>
                                </div>
                           </div>
                </div> 
            
         

</div>                   
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
