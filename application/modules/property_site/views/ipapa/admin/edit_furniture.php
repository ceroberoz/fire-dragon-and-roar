            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Furniture
                        <small>Add Furniture Product</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Manage Furniture</li>
                        <li class="active">Add Furniture Product</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-9">
                            <div class="box">

            <?php
             $misc = array(
                'class' => "block"
                );

             echo form_open_multipart('admin/furniture/do_edit_furniture', $misc);
             foreach($furnitures as $furniture):

            echo form_hidden('fid',$furniture->pk_furniture_id);
             ?>
                <div class="block-inner ">
                  <div class="form-group box-body">
                    <div class="row">
                        <div id="province" class="col-md-3">
                        <?php echo form_dropdown("province_id",$categories,"","id='province_id' class='form-control' "); ?>
                        </div>
                        <div id="city" class="col-md-3">
                        <?php echo form_dropdown("city_id",array('Select category first'=>'Select category first'),'',"class='form-control' disabled' "); ?>
                        </div>
                      <div class="col-md-3">
                        <input value="<?php echo $furniture->s_furniture_name;?>" name="f_name" type="text" class="form-control" placeholder="Input Product ID">
                      </div> 
                      </div>
                    </div>
                      
            
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                        <div class="col-lg-3 col-md-3">
                                <div class="uploader" id="uniform-report-screenshot"><input name="picture" type="file" id="report-screenshot" class="styled form-control"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div>
                        </div>
                        </div>
                    </div>
                </div>
            
 
                        <div class='col-lg-12 col-md-12'>
                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Furniture Description<small> Input Furniture introduction</small></h3>
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                        <textarea name="f_description" class="textarea" placeholder="Place description text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            <?php echo $furniture->s_description;?>
                                        </textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                <div class="text-right">
                  <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" class="btn btn-success" value="Add New">
                </div><br>
              <?php 
              endforeach;
              echo form_close();?>
                                    
                                   
                           
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
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url();?>assets/ipapa/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">

$("#province_id").change(function(){
var selectValues = $("#province_id").val();
if (selectValues == 0){
var msg = "Select Sub Category :<br><select name=\"city_id\" disabled><option value=\"Select Category First\">Select Category First</option></select>";
$('#city').html(msg);
}else{
var province_id = {province_id:$("#province_id").val()};
$('#city_id').attr("disabled",true);
$.ajax({
type: "POST",
url : "<?php echo site_url('admin/furniture/select_subcat')?>",
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
