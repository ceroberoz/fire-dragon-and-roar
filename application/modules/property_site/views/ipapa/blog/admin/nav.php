        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                    <?php //foreach($user as $row){?>
                        <div class="pull-left image">
                            
                            <img src="<?php echo base_url();?>assets/uploads/files/default_user.png" class="img-circle" alt="User Image" />
                            <!--
                            <img src="<?php //echo base_url();?>assets/ipapa/admin/img/pp.jpg" class="img-circle" alt="User Image" />
                            -->
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo "Admin";//$row->first_name;?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> 
							<?php
								//if($row->active=="1"){
									echo "Online";
								//}else{
								//	echo "Offline";
								//}
							?>
							</a>
                        </div>
                    <?php //} ?>
                    </div>
                    <!-- search form 
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    /.search form -->

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li <?php if($this->uri->segment(1) == 'home'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>blog/admin">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <li <?php if($this->uri->segment(2) == 'account'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>blog/account">
                                <i class="fa fa-gear"></i> <span>Manage Account</span>
                            </a>
                        </li>
                        
                        <li <?php if($this->uri->segment(2) == 'article'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>blog/admin/article">
                                <i class="fa fa-pencil-square-o"></i> <span>Manage Article</span>
                            </a>
                        </li>
                        <!--
                        <li <?php if($this->uri->segment(2) == 'message'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>index.php/admin/message">
                                <i class="fa fa-envelope"></i> <span>Messages</span>
                                <small class="badge pull-right bg-yellow">12</small>
                            </a>
                        </li>
                        -->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
