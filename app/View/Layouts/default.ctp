<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Services App</title>
        <?php echo $this->Html->css(array('bootstrap.min.css', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css', 'admin.css')); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

        <?php echo $this->Html->script(array('bootstrap.min.js', 'admin.js')); ?>

        <?php echo $this->App->js(); ?>

        <?php echo $this->fetch('css'); ?>
        <?php echo $this->fetch('script'); ?>
    </head>
    <body>


        <div id="wrapper">

            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                       
                       <a class="navbar-brand" href="<?php echo $this->webroot;?>admin/users/login">SERVICE ADMIN</a> 
                    </div>
                   
                </div>
            </div>




            <div class="overlay"></div>

            <!-- Sidebar -->
           
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
              
                <div class="main_admin_container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">

      <?php echo $this->Flash->render(); ?>
      <?php echo $this->fetch('content'); ?>
        </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> <?php echo 'Services App'; ?></p>
        </div>

    </body>
</html>