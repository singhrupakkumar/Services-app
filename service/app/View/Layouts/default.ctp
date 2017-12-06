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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Omega Market Project</title>

<!-- Bootstrap -->
<link href="<?php echo $this->webroot; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>
     <script src="<?php// echo $this->webroot; ?>js/assets/html5shiv.min.js"></script>
       <script src="<?php// echo $this->webroot; ?>js/jquery.min.js"></script>
    <![endif]-->
</head>
<body>
  
    <!------Header------>
<?php //echo "<pre>"; print_r($loggeduser); die;  ?>
<div class="top_header">
  <div class="container">
    <div class="row">
    
      <div class="col-md-6 col-sm-6">
        <div class="left_list">
          <ul>
            <li><span><i class="fa fa-sort-up"></i>USD 1052.10</span></li>
            <li><span><i class="fa fa-sort-up"></i>CAD 1412.55</span></li>
            <li><span><i class="fa fa-sort-up"></i>EUR 1010.69</span></li>
            <li><span><i class="fa fa-sort-up"></i>AUD 1456.97</span></li>
            <li><span><i class="fa fa-sort-up"></i>GBP 859.56</span></li>
          </ul>
        </div>
      </div>
           
      <div class="col-md-6 col-sm-6">
        <div class="right_list">
        <?php if(isset($loggeduser)){ ?>
          <ul>
            <li><span><i class="fa fa-user"></i></span></li>
            <li><span style="color: #7f9919;">Balance</span><span>: BTC</span></li>
            <li><span><a>Autoshop</a></span></li>
            
            <li><span><a href="<?php echo $this->webroot?>users/logout">Logout</a></span></li>
          </ul>
          <?php } ?>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-------------logo------------------------>
<div class="logo_section">
  <div class="container">
     <div class="pic_log">
     <a href="<?php echo $this->webroot; ?>products/index"><img src="<?php echo $this->webroot; ?>img/logo.png"></a>
      </div>
      </div>
  </div>
<!---------------navbar-------------------->
<div class="nav_section">
  <div class="container">
      <div class="row">
          
          </div>
      </div>
  
    
    <nav class="navbar navbar-default ">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php if(isset($loggeduser)){ ?>
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo $this->webroot; ?>products/index">HOME <span class="sr-only">(current)</span></a></li>
        <li><a href="#">SALES</a></li>
        <li><a href="#">MESSAGES</a></li> 
        <li><a href="#">ORDERS</a></li>
        <li><a href="#">LISTINGS</a></li>
        <li><a href="#">BALANCE</a></li>
        <li><a href="#">FEEDBACK</a></li>
        <li><a href="#">FORUMS</a></li>
        <li><a href="#">API</a></li>
        <li><a href="#">SUPPORT</a></li>
        </ul>
        
      <ul class="nav navbar-nav navbar-right">
       <li><i class="fa fa-bell" aria-hidden="true"></i></li>
  
      </ul>
      <?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<div class="categories_section">
  <div class="container">
      <div class="row">
<?php if(isset($loggeduser)){
$id = $loggeduser;
 ?>
<div class="col-sm-4">

                       <div class="auto_shop">
                         <h2><i class="fa fa-briefcase" aria-hidden="true"></i><span>Profile Actions</span></h2>      
                            <div class="list_auto">
                              <ul>
                  <li><a href="<?php echo $this->webroot?>users/profile/<?php echo $id?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Edit Profile </a></li>
                    <li><a href="<?php echo $this->webroot?>users/changepassword"><i class="fa fa-angle-right" aria-hidden="true"></i>Change Password  </a></li>
					<?php if($loggedUserRole != 'buyer') {?>
                      <li><a href="<?php echo $this->webroot?>products/myproducts"><i class="fa fa-angle-right" aria-hidden="true"></i>My Products</a></li>
					  
                      <li><a href="<?php echo $this->webroot?>products/vendoradd_product"><i class="fa fa-angle-right" aria-hidden="true"></i>Add Products</a>
					  </li>
                     <?php }else{ ?>
					      <li><a href="<?php echo $this->webroot?>products/index"><i class="fa fa-angle-right" aria-hidden="true"></i>Products</a></li>
					 <?php } ?>
                        
                                </ul>                          
                            </div>  
                       </div>
                       
                         
                       
                       
                           <div class="exchange_section">
                            <h2><i class="fa fa-money" aria-hidden="true"></i><span>EXCHANGE RATES</span></h2>
                              <div class="exchange_list">
                                  <ul>
                                    <li class="back_grnd">BitCoin (BTC)<span>(1)</span></a></li>
                                    <?php 
                                    foreach($aaaaaa as $gsdgdgd){
                                    $head = $gsdgdgd['ExchangeRate']['exchange_heading']; 
                                    $val = $gsdgdgd['ExchangeRate']['exchange_money'];

                                    ?>
                                    <li><a href="#"><?php echo $head; ?><span><?php echo $val; ?></span></a></li>
                                    <?php } ?>
                                    </ul>
                                  </div> 
                                    <div class="draws_link">
                                    <a href="#">Deposits &amp; Withdrawals</a>
                                      </div>
                                  </div>
                                    
                                 
                        
                     </div>
<?php } ?>                     
    <div id="content">

      <?php echo $this->Flash->render(); ?>
<?php //echo $this->Session->flash(); ?>
      <?php echo $this->fetch('content'); ?>
    </div>
</div>
</div>
</div>
      <!----------------------footer------------------------------>
 <div class="footer_section">
  <div class="container">
      <div class="row">
      <?php if(isset($loggeduser)){ ?>
         <div class="footer_desc">
          <ul>
            <li><a href="#">pwoah7foa6au2pul.onion </a></li>
            <li><a href="#">pwoah7foa6au2pul.onion </a></li>
            <li><a href="#">pwoah7foa6au2pul.onion </a></li>
            <li><a href="#">pwoah7foa6au2pul.onion </a></li>
            <li><a href="#">pwoah7foa6au2pul.onion </a></li>
            <li><a href="#">pwoah7foa6au2pul.onion </a></li>
            <li><a href="#">pwoah7foa6au2pul.onion </a></li>
            <li><a href="#">pwoah7foa6au2pul.onion </a></li>
            </ul>
          </div>
            <div class="footer_bottom">
          <ul>
            <li><a href="#">Site Map </a></li>
            <li><a href="<?php echo $this->webroot."staticpages/searchterm"; ?>">Search Terms </a></li>
            <li><a href="<?php echo $this->webroot."staticpages/advancesearch"; ?>">Advanced Search</a></li>
            <li><a href="<?php echo $this->webroot."staticpages/orderreturn"; ?>">Orders and Returns </a></li>
            <li><a href="<?php echo $this->webroot."staticpages/contact"; ?>">Contact Us </a></li> 
            </ul>
            <?php } ?>
            <p class="market_down">© 2016 OMEGA MARKET All Rights Reserved.</p>
          </div>
          </div>
      </div>
  </div>   
    
    </div>
  </div>
  <?php //echo $this->element('sql_dump'); ?>
</body>
</html>
<!--script>
window.location.href="<?php //echo $this->webroot;?>admin";
</script-->
