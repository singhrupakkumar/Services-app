<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'Services App';
?>
<!DOCTYPE html>
<html>
    <head>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css(array('../dashboard/bootstrap/css/bootstrap.min.css', '../dashboard/dist/css/AdminLTE.min.css',
            '../dashboard/dist/css/skins/_all-skins.min.css', '../dashboard/plugins/iCheck/flat/blue.css', '../dashboard/plugins/morris/morris.css',
            '../dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.css'
            , '../dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')) ?>
        <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') ?>
        <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') ?>      
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
    <?= $this->element('Dashboard/header') ?>
    <?= $this->element('Dashboard/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php echo $this->fetch('content') ?>
</div>
<?= $this->element('Dashboard/footer') ?>
<?php //echo $this->Html->script(array('../dashboard/plugins/jQuery/jquery-2.2.3.min.js', 'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js')); ?>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <?php
    echo $this->Html->script(array('../dashboard/bootstrap/js/bootstrap.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js', '../dashboard/plugins/morris/morris.min.js', '../dashboard/plugins/sparkline/jquery.sparkline.min.js',
        '../dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js', '../dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        '../dashboard/plugins/knob/jquery.knob.js', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
        '../dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.j', '../dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        '../dashboard/plugins/slimScroll/jquery.slimscroll.min.js', '../dashboard/plugins/fastclick/fastclick.js',
        '../dashboard/dist/js/app.min.js'));
    ?>
        <script src="<?php echo $this->webroot; ?>home/js/customcheckall.js"></script>
        <script src="<?php echo $this->webroot; ?>home/js/addtocart.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.js"></script>
		<script>
		$('.selectpicker').selectpicker({});
		
		$('.msgflash span').click(function(){
			$(this).parent().remove();
		});
		
		</script>
<style>
.table-hover tbody tr:hover {
    color: #3C8DBC !important;
}
.msgflash{
	width:100%;
	display:table;
	position:relative;
}
#flashMessage{
	background-color: rgba(0, 0, 0, 0.6);
    border: 1px solid #ddd;
    border-radius: 5px;
    color: #fff;
    display: table;
    margin-bottom: 15px;
    padding: 15px;
    width: 100%;
	position:relative;
}
.msgflash span{
	position:absolute;
	right:10px;
	cursor: pointer;
	top:5px;
	color:#ff0000;
	font-size:16px;
}
</style>
</body>
</html>
