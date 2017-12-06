 <link href="<?php echo $this->webroot; ?>home/css/style.css" rel="stylesheet">
 
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Dashboard</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Dashboard</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                        
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                             
                                <?php if($userimage){?>
                                 <img src="<?php echo $this->request->webroot ?>files/profile_pic/<?php echo $userimage ?>" class="user-image" alt="User Image">
                                 <?php }else{
									 ?>
									  <img src="<?php echo $this->request->webroot ?>files/profile_pic/noimagefound.jpg " class="user-image" alt="User Image">
									
								<?php }?>
                                <span class="hidden-xs"><?php echo $loggedusername; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                <?php if($userimage){?>
                                 <img src="<?php echo $this->request->webroot ?>files/profile_pic/<?php echo $userimage; ?>" class="img-circle" alt="User Image">
                                 <?php }else{
									 ?>
									  <img src="<?php echo $this->request->webroot ?>files/profile_pic/noimagefound.jpg " class="img-circle" alt="User Image">
									
								<?php }?>
                                
                                   

                                    <p>
                                        <?php echo $loggedusername; ?> - Administrator
                                        <small>Member since<!-- <?php echo $userdata['created']; ?>--></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
<!--                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                     /.row 
                                </li>-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?php echo $this->Html->link('My Profile', array('controller' => 'orders', 'action' => 'myaccount', 'admin' => true), array('class' => 'users_autorizemenu1 btn btn-default btn-flat')); ?>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= $this->request->webroot ?>admin/Users/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li> 
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>