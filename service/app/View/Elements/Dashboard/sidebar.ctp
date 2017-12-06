<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
			</br>
			<?php if($userimage){ ?>
                <img src="<?php echo $this->request->webroot ?>files/profile_pic/<?php echo $userimage ?>" class="img-circle" alt="User Image">
			<?php }else{?>
				 <img src="<?php echo $this->request->webroot ?>files/profile_pic/noimagefound.jpg<?php echo $userimage; ?>" class="img-circle" alt="User Image">
				
			<?php }?>
            </div>
            <div class="pull-left info">
                <p><br><?php echo $loggedusername; ?></p>
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">      

            <li><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action' => 'index', 'admin' => true), array('class' => 'orders_autorizemenu')); ?></li>


            <?php if($loggedUserRole=='admin'){ ?>  
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="active"><?php echo $this->Html->link('Service Providers', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Customers', array('controller' => 'users', 'action' => 'customerindex', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li>
					<li class="active"><?php echo $this->Html->link('Add User', array('controller' => 'users', 'action' => 'add', 'admin' => true), array('class' => '')); ?></li> 
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Pages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Pages', array('controller' => 'staticpages', 'action' => 'index', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li>
					<li class="active"><?php echo $this->Html->link('Add Pages', array('controller' => 'staticpages', 'action' => 'add', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li> 
						
                </ul>
            </li> 	

			
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Category List', array('controller' => 'categories', 'action' => 'index', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li>
					<li class="active"><?php echo $this->Html->link('Add Category', array('controller' => 'categories', 'action' => 'add', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li> 
					
                </ul>
            </li> 
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Sub Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     <li class="active"><?php echo $this->Html->link('Sub Categories List', array('controller' => 'subCategories', 'action' => 'index', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li>
					<li class="active"><?php echo $this->Html->link('Add Sub Categories', array('controller' => 'subCategories', 'action' => 'add', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li> 
					
                </ul>
            </li> 
	
			
            <?php }?>
    </section>
    <!-- /.sidebar -->
</aside>