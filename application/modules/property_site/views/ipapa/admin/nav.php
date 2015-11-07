        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                    <?php foreach($user as $row){?>
                        <div class="pull-left image">
                            
                            <img src="<?php echo base_url();?>uploads\user\avatar\<?php echo $row->s_avatar;?>" class="img-circle" alt="User Image" />
                            <!--
                            <img src="<?php //echo base_url();?>assets/ipapa/admin/img/pp.jpg" class="img-circle" alt="User Image" />
                            -->
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $row->first_name;?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> 
							<?php
								if($row->active=="1"){
									echo "Online";
								}else{
									echo "Offline";
								}
							?>
							</a>
                        </div>
                    <?php } ?>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li <?php if($this->uri->segment(1) == 'home'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>index.php/admin/home/index">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'account'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>index.php/admin/account">
                                <i class="fa fa-gear"></i> <span>Manage Account</span>
                            </a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'building'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>index.php/admin/building">
                                <i class="fa fa-building-o"></i> <span>Manage Building</span>
                            </a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'office'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>index.php/admin/office">
                                <i class="fa fa-home"></i> <span>Manage Office</span>
                            </a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'furniture'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>index.php/admin/furniture">
                                <i class="fa fa-list"></i> <span>Manage Furniture</span>
                            </a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'decoration'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>index.php/admin/decoration">
                                <i class="fa fa-list"></i> <span>Manage Decoration</span>
                            </a>
                        </li>
                         <li <?php if($this->uri->segment(2) == 'article'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>blog/admin/article">
                                <i class="fa fa-pencil-square-o"></i> <span>Manage Article Blog</span>
                            </a>
                        </li>
                         <li <?php if($this->uri->segment(2) == 'activity'){echo "class='active'";};?>>
                            <a href="<?php echo base_url();?>index.php/admin/activity">
                                <i class="fa fa-list"></i> <span>Manage Activity Log</span>
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
