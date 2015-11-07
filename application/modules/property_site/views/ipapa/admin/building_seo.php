            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Manage Buildings</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Manage Building</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="row pad">
                                    <div class="col-sm-6"> 
                                    <span class="btn btn-default btn-sm">210 List of Total</span>

                                </div>

                                <div class="box-body table-responsive">
                                    <table id="buildinglist-view" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Building Name</th>
                                                <th>Title SEO</th>
                                                <th>Meta Description</th>
                                                <th>Meta Tags</th> 
                                                <th>Last Update</th>                                                     
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                          
                                           <?php foreach($buildings as $building):?>
                                            <tr>
                                                <td><span class="label label-primary">&nbsp; <?php echo $building->pk_building_id;?> &nbsp; </span></td>
                                                <td><?php echo $building->s_building_name;?></td>
                                                <td>
                                                <?php

                                                    if($building->s_seo_title_en){
                                                        echo "EN : <span style='color:green' class='glyphicon glyphicon-ok-sign'></span>";
                                                    }else{
                                                        echo "EN : <span style='color:red' class='glyphicon glyphicon-minus-sign'></span>";
                                                    }

                                                    echo "<br />";

                                                    if($building->s_seo_title_id){
                                                        echo "ID : <span style='color:green' class='glyphicon glyphicon-ok-sign'></span>";
                                                    }else{
                                                        echo "ID : <span style='color:red' class='glyphicon glyphicon-minus-sign'></span>";
                                                    }

                                                 ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($building->s_seo_meta_description_en){
                                                            echo "EN : <span style='color:green' class='glyphicon glyphicon-ok-sign'></span>";
                                                        }else{
                                                            echo "EN : <span style='color:red' class='glyphicon glyphicon-minus-sign'></span>";
                                                        }

                                                        echo "<br />";

                                                        if($building->s_seo_meta_description_id){
                                                            echo "ID : <span style='color:green' class='glyphicon glyphicon-ok-sign'></span>";
                                                        }else{
                                                            echo "ID : <span style='color:red' class='glyphicon glyphicon-minus-sign'></span>";
                                                        }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($building->s_seo_meta_tags_en){
                                                            echo "EN : <span style='color:green' class='glyphicon glyphicon-ok-sign'></span>";
                                                        }else{
                                                            echo "EN : <span style='color:red' class='glyphicon glyphicon-minus-sign'></span>";
                                                        }

                                                        echo "<br />";

                                                        if($building->s_seo_meta_tags_id){
                                                            echo "ID : <span style='color:green' class='glyphicon glyphicon-ok-sign'></span>";
                                                        }else{
                                                            echo "ID : <span style='color:red' class='glyphicon glyphicon-minus-sign'></span>";
                                                        }

                                                    ?>
                                                </td>
                                                <td><?php echo $building->t_updated;?></td>
                                                <td width="55px"><a href="<?php echo base_url();?>index.php/seo/building/edit/<?php echo $building->pk_building_id;?>" class="btn-app"><i class="fa fa-edit"></i> Edit</a></td>
                                            </tr>
                                            <?php endforeach;?>
                                        
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
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Ipapa App -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#buildinglist-view").dataTable();
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
