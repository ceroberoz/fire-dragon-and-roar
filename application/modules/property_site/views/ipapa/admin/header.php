    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a target="_blank" href="<?php echo base_url();?>" class="logo">
                <img src="<?php echo base_url();?>assets/ipapa/admin/img/ipapalogo.png" width="" height="35"> Admin Dashboard
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                           
                        </li>
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <?php foreach($user as $row){?>
                                <span><?php echo $row->first_name."".$row->last_name?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue"> 
                                	                     	
                                    <img src="<?php echo base_url();?>uploads\user\avatar\<?php echo $row->s_avatar;?>" class="img-circle" alt="User Image" />
                                    <!--
                                    <img src="<?php //echo base_url();?>assets/ipapa/admin/img/pp.jpg" class="img-circle" alt="User Image" />
                                    -->
                                    <p>
                                    <?php
                                    		$epoch = $row->created_on;
											$dt = new DateTime("@".$epoch);  //convert UNIX timestamp to PHP DateTime
											//echo date('r', $dt);
											echo $row->first_name."".$row->last_name." - ".$row->description;
											echo "<small>Member since ".$dt->format('d/m/y')."</small>";
                                    	}
									?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a onClick="return confirm('Are you sure you want to logout?');" href="<?php echo base_url();?>index.php/admin/building/logout/" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
  