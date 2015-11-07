<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-white">
                                <div class="orange">
                                    <h3>
                                        <?php echo $this->db->count_all('users');?>
                                    </h3>
                                    <p>
                                        New Users
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add orange"></i>
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-white">
                                <div class="green">
                                    <h3>
                                        1.211
                                    </h3>
                                    <p>
                                        Visitor
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars green"></i>
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-white">
                                <div class="blue">
                                    <h3>
                                        <?php echo $this->db->count_all('building');?>
                                    </h3>
                                    <p>
                                        Buildings
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-grid blue"></i>
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-white">
                                <div class="blue">
                                    <h3>
                                        <?php echo $this->db->count_all('office');?>
                                    </h3>
                                    <p>
                                        Offices
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-briefcase blue"></i>
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="box box">
                                <div class="box-header">
                                    <i class="fa fa-users"></i>
                                    <h3 class="box-title">Latest Register user <span class="label label-warning">4</span></h3>
                                    <div class="box-tools pull-right" data-toggle="tooltip" >
                                        <div class="btn-group" data-toggle="btn-toggle" >
                                            <button type="button" data-toggle="tooltip" title="Active" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                                            <button type="button" data-toggle="tooltip" title="Pending" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body chat" id="chat-box">
                                    <!-- chat item -->
                                    <div class="item">
                                        <img src="<?php echo base_url();?>assets/ipapa/admin/img/avatar.png" alt="user image" class="online"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-user"></i> <span class="badge bg-green">Active</span></small>
                                                Pak Bambang
                                            </a>
                                            bambang.s@yahoo.com
                                        </p>
                                    </div><!-- /.item -->
                                    <!-- chat item -->
                                    <div class="item">
                                        <img src="<?php echo base_url();?>assets/ipapa/admin/img/avatar2.png" alt="user image" class="offline"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-user"></i> <span class="badge bg-red">Pending</span></small>
                                                Bu Vidi
                                            </a>
                                            vidi.vini@gmail.com
                                    </div><!-- /.item -->
                                    <!-- chat item -->
                                    <div class="item">
                                        <img src="<?php echo base_url();?>assets/ipapa/admin/img/avatar3.png" alt="user image" class="offline"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-user"></i> <span class="badge bg-red">Pending</span></small>
                                                Bu Maya
                                            </a>
                                            maya.pus@gmail.com
                                    </div><!-- /.item -->
                                </div><!-- /.chat -->
                            </div><!-- /.box (chat box) -->     

                        </div>


                        <div class="col-lg-6 col-md-6 col-xs-12">
                          <!-- Chat box -->
                            <div class="box box">
                                <div class="box-header">
                                    <i class="fa fa-comments-o"></i>
                                    <h3 class="box-title">Latest Conversation <span class="label label-warning">8</span></h3>
                                </div>
                                <div class="box-body chat" id="chat-box">
                                    <!-- chat item -->
                                    <div class="item">
                                        <img src="<?php echo base_url();?>assets/ipapa/admin/img/avatar.png" alt="user image" class="online"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                                Pak Bambang
                                            </a>
                                            I would like to meet you to discuss about office space in Bellagio Mall...
                                        </p>
                                    </div><!-- /.item -->
                                    <!-- chat item -->
                                    <div class="item">
                                        <img src="<?php echo base_url();?>assets/ipapa/admin/img/avatar2.png" alt="user image" class="offline"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                                Bu Vidi
                                            </a>
                                            I would like to meet you to discuss about office space in Bellagio Mall...
                                    </div><!-- /.item -->
                                    <!-- chat item -->
                                    <div class="item">
                                        <img src="<?php echo base_url();?>assets/ipapa/admin/img/avatar3.png" alt="user image" class="offline"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                                                Bu Maya
                                            </a>
                                            I would like to meet you to discuss about office space in Bellagio Mall...
                                    </div><!-- /.item -->
                                </div><!-- /.chat -->
                            </div><!-- /.box (chat box) -->     

                        </div>

                        <div class="col-lg-12 col-md-12 col-xs-12">
                          
                        </div>

                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Ipapa App -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>


    </body>
</html>