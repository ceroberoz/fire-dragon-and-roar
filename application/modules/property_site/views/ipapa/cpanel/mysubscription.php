<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-10 col-xs-12 user-details clearfix pull-right">
            <div style="padding-top:10px;" class="row">
              
                <section class="content">
                    <div class="col-xs-12">
                          <div class="alertmybuilding">Dashboard – Subscriptions &amp; newsletter menu</div>
                          <hr>
    <div class="col-1">
        <p>Newsletter :</p>
        <p>Property News Alert :</p>
        <p>Auto Email Alert :</p>
    </div>

    <?php echo form_open('management/mysubscription/do_edit'); ?>
    <?php foreach($newsletter as $news){ ?>
    <div class="col-2">
        <p><input type="radio" name="newsletter" value="<?php if($news->b_activate=='2'){echo'1';}else{echo'1';}?>" <?php if($news->b_activate == '1'){ echo 'checked';}?>> Active </p>
        <p><input type="radio" name="newsalert" value="1" checked> Active </p>
        <p><input type="radio" name="emailalert" value="1" checked> Active </p>

    </div>
    <div class="col-3">
        <p><input type="radio" name="newsletter" value="2" <?php if($news->b_activate == '2'){ echo 'checked';}?>> Non-Active</p>
        <p><input type="radio" name="newsalert" value="2"> Non-Active</p>
        <p><input type="radio" name="emailalert" value="2"> Non-Active</p>
        <p><button class="btn btn-primary" type="submit" name="submit">Save Changes</button></p>
    </div>
	<?php } ?>
	<?php echo form_close(); ?>

                    </div>


                </section><!-- /.content -->
            </div>
        </div>   
                 


</div>           
</section>