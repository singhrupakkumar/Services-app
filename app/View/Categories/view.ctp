<?php
//$catname  = $category['Category']['name'];
echo $this->set('title_for_layout', $category['Category']['name']);       
$this->Html->addCrumb('Categories', '/categories/');
//$this->Html->addCrumb('Categories'); 
  
/*foreach ($parents as $parent) {
    $this->Html->addCrumb($parent['Category']['name'], '/category/' . $parent['Category']['slug']);

}*/ 


if($category['Category']['name'] !='Shop Instagram'): ;

?>
<style>
.ftr_pagination .pagination > li.current {
    /* border: 1px solid #dadada; */
    padding: 8px 14px;
	    line-height: 20px !important;
    background-color: #000;
    color: #fff;
    float: left;
}
</style>
<div class="container">
	<div class="row">
    	<div class="col-sm-3 col-sm-12">
        <div class="lft-catagry">
            
<!--            <form method="post">
             
            <input name="r11" id="r1" class="form-control" value="10" type="hidden">
             <label>Filter By Price </label>  
	  <input name="r12" id="r2" class="form-control" value="150" type="hidden"> 
      <div class="clearfix fliter_rg ">
            <div class="input-group buscador-principal">   
        	<span class="input-group-btn">
			
			</span>
                               <div id="slider">
		                   
		                </div>  
                <script type="text/javascript" charset="utf-8">
							jQuery(document).ready(function ($) {
                                                                 var vLeft  = '<?php if(isset($_POST['r11'])) { echo $_POST['r11'] ;}else { echo "10" ;} ?>',
									vRight = '<?php if(isset($_POST['r12'])) { echo $_POST['r12']; }else { echo "150" ;} ?>';
								var slider = $("#slider").slider({
								range: true, 
								min: 0,
								max: 1000,
								step: 1,
									values: [vLeft, vRight],
								  slide: function(event, ui) {
										$(ui.handle).find('.tooltip').text(ui.value);
										 $( "#r1" ).val(ui.values[ 0 ]);
								$( "#r2" ).val(ui.values[ 1 ]);
									},
									create: function(event, ui) {
									  var tooltip = $('<div class="tooltip" />');
									  
									  $(event.target).find('.ui-slider-handle').append(tooltip);
									  var firstHandle  = $(event.target).find('.ui-slider-handle')[0];
										var secondHandle = $(event.target).find('.ui-slider-handle')[1];
										firstHandle.firstChild.innerText = vLeft;
										secondHandle.firstChild.innerText = vRight;
									},
									change: function(event, ui) {
											  $('#hidden').attr('value', ui.value);
											  }
							  });
							});
                </script>
						
	    </div>
        </div>
      
        <div class="clearfix filter-btn ">
        
          <button class="btn defult_btn btn-fllr "  type="submit">Filter</button>
          </div>
            </form>  -->
            
     
<!--            <div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">
			 <label>Filter By Type </label>  
			<form method="post" id="filterform">
                            
         <?php if($category['Category']['slug'] =='wooden-bracelets' || $category['Category']['slug'] =='man-bracelets' ||
                 $category['Category']['slug'] =='women-bracelets'): ?>                  
        
        <div class="panel"> 
        <div class="panel-heading" role="tab" id="headingOne">
          <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesty" aria-expanded="true" aria-controls="collapseOne">
        Style
        </a>
      </h2>
        </div>
        <div id="collapsesty" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
          <div class="prdct-list">
           <ul>
           
            <?php 
            foreach ($style as $val){
            
              ?>
    
               <li><?php echo $val['Style']['name']; ?>&nbsp;&nbsp;  
               <span><input type="checkbox" <?php  foreach($_POST['style'] as $post){ if( $post == $val['Style']['id']) { echo "checked" ; } }  ?>   name="style[]" value="<?php echo $val['Style']['id']; ?>"></span>
               </li>
            <?php } ?>  
     
           </ul> 
           </div>
          </div>
        </div>
      </div>
                            
             
              <div class="panel"> 
        <div class="panel-heading" role="tab" id="headingOne">
          <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsematerial" aria-expanded="true" aria-controls="collapseOne">
        Material
        </a>
      </h2>
        </div>
        <div id="collapsematerial" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
          <div class="prdct-list">
           <ul>
           
            <?php 
            foreach ($material as $val){
            
              ?>
    
               <li><?php echo $val['Material']['name']; ?>&nbsp;&nbsp;  
               <span><input type="checkbox" <?php  foreach($_POST['material'] as $post){ if( $post == $val['Material']['id']) { echo "checked" ; } }  ?>  name="material[]" value="<?php echo $val['Material']['id']; ?>"></span></li>
            <?php } ?>  
     
           </ul> 
           </div>
          </div>
        </div>
      </div>                    
                            
       end of panel 
      
      
                   
              <div class="panel"> 
        <div class="panel-heading" role="tab" id="headingOne">
          <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsegemstone" aria-expanded="true" aria-controls="collapseOne">
        Gemstone
        </a>
      </h2>
        </div>
        <div id="collapsegemstone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
          <div class="prdct-list">
           <ul>
           
            <?php 
            foreach ($gemstone as $val){ 
            
              ?>
    
               <li><?php echo $val['Gemstone']['name']; ?>&nbsp;&nbsp; 
                <span><input type="checkbox" <?php  foreach($_POST['gemstone'] as $post){ if( $post == $val['Gemstone']['id']) { echo "checked" ; } }  ?>  name="gemstone[]" value="<?php echo $val['Gemstone']['id']; ?>"></span>
                </li>
            <?php } ?>  
     
           </ul> 
           </div>
          </div>
        </div>
      </div>  
      
      
       <div class="panel"> 
        <div class="panel-heading" role="tab" id="headingOne">
          <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsecolor" aria-expanded="true" aria-controls="collapseOne">
        Colour
        </a>
      </h2>
        </div>
        <div id="collapsecolor" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
          <div class="prdct-list">
           <ul>
           
            <?php 
            foreach ($color as $val){
            
              ?>
    
               <li><?php echo $val['Colour']['name']; ?>&nbsp;&nbsp; 
                <span><input type="checkbox" <?php  foreach($_POST['colour'] as $post){ if( $post == $val['Colour']['id']) { echo "checked" ; } }  ?>  name="colour[]" value="<?php echo $val['Colour']['id']; ?>"></span>
                </li> 
            <?php } ?>  
     
           </ul> 
           </div>
          </div>
        </div>
      </div>
                            
       end of panel 
      
       <div class="panel"> 
        <div class="panel-heading" role="tab" id="headingOne">
          <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetheme" aria-expanded="true" aria-controls="collapseOne">
        Theme
        </a>
      </h2>
        </div>
        <div id="collapsetheme" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
          <div class="prdct-list">
           <ul>
           
            <?php 
            foreach ($theme as $val){
            
              ?>
    
               <li><?php echo $val['Theme']['name']; ?>&nbsp;&nbsp;  
              <span> <input type="checkbox" <?php  foreach($_POST['theme'] as $post){ if( $post == $val['Theme']['id']) { echo "checked" ; } }  ?>  name="theme[]" value="<?php echo $val['Theme']['id']; ?>"></span>
               </li>
            <?php } ?>  
     
           </ul> 
           </div> 
          </div>
        </div>
      </div>
                            
       end of panel 
      
       <?php endif ;?>                    
                            
                            
       <?php if($category['Category']['slug'] =='wooden-watches' || $category['Category']['slug'] =='men-watches'
               
               || $category['Category']['slug'] =='women-watches'): ?>                         
                           
                            
      
    
      
      
            <div class="panel"> 
        <div class="panel-heading" role="tab" id="headingOne">
          <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Wood
        </a>
      </h2>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
          <div class="prdct-list">
           <ul>
           
            <?php 
            foreach ($alltag as $val){
            
              ?> 
    
               <li><?php echo $val['Woodtype']['name']; ?>&nbsp;&nbsp;  
               
               <span><input type="checkbox" name="woodtype[]" <?php  foreach($_POST['woodtype'] as $post){ if( $post == $val['Woodtype']['id']) { echo "checked" ; } }  ?>   value="<?php echo $val['Woodtype']['id']; ?>"></span>
               
               </li>
            <?php } ?>  
     
           </ul> 
           </div>
          </div>
        </div>
      </div>
       end of panel 
	  
	          <div class="panel"> 
        <div class="panel-heading" role="tab" id="headingOne">
          <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseserise" aria-expanded="true" aria-controls="collapseOne">
         Series
        </a>
      </h2>
        </div>
        <div id="collapseserise" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
          <div class="prdct-list">
           <ul>
           
            <?php 
            foreach ($serise as $val){
            
              ?> 
    
               <li><?php echo $val['Series']['name']; ?>&nbsp;&nbsp;  
               
               <span><input type="checkbox" name="serise[]" <?php  foreach($_POST['serise'] as $post){ if( $post == $val['Series']['id']) { echo "checked" ; } }  ?>  value="<?php echo $val['Series']['id']; ?>"></span>
               
               </li>
            <?php } ?>  
     
           </ul> 
           </div>
          </div>
        </div>
      </div>
       end of panel 

   
       end of panel 

      <div class="panel">
        <div class="panel-heading" role="tab" id="headingThree">
          <h2 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMechanism" aria-expanded="false" aria-controls="collapseThree">
         Watch Mechanism
        </a>
      </h2>
        </div>
        <div id="collapseMechanism" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
           <div class="prdct-list">
           <ul>
		   <?php 
               foreach ($mechanism as $val):
               ?>
               <li><?php echo $val['Mechanism']['name']; ?>&nbsp;&nbsp;  
               <span><input type="checkbox" <?php  foreach($_POST['mechanism'] as $post){ if( $post == $val['Mechanism']['id']) { echo "checked" ; } }  ?>   name="mechanism[]" value="<?php echo $val['Mechanism']['id']; ?>"></span>
               </li>     
           	
                <?php endforeach; ?> 

           </ul>
           </div>
          </div>
        </div>
      </div>
       end of panel 

      <div class="panel">
        <div class="panel-heading" role="tab" id="headingFour">
          <h2 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Band
        </a>
      </h2>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
          <div class="panel-body">
          <div class="prdct-list">
           <ul>
         <?php 
               foreach ($brand as $val):
               ?>
            <li><?php echo $val['Brand']['name']; ?>&nbsp;&nbsp; 
             <span><input type="checkbox"  <?php  foreach($_POST['brand'] as $post){ if( $post == $val['Brand']['id']) { echo "checked" ; } }  ?>  name="brand[]" value="<?php echo $val['Brand']['id']; ?>"></span>
             </li>    
           	
                <?php endforeach; ?> 
           </ul>
           </div>
          </div>
        </div>
      </div>
       end of panel 
      
       <div class="panel">
        <div class="panel-heading" role="tab" id="headingFive">
          <h2 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Related Categories
        </a>
      </h2>
        </div>
        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
          <div class="panel-body">
           <div class="prdct-list">
           <ul>   
             <?php 
               foreach ($directChildren as $val): 
               ?>
            <li><?php echo $val['Category']['name']; ?>&nbsp;&nbsp;  
            <span><input type="checkbox" <?php  foreach($_POST['category'] as $post){ if( $post == $val['Category']['id']) { echo "checked" ; } }  ?>  name="category[]" value="<?php echo $val['Category']['id']; ?>"></span>
            </li>    
           	
                <?php endforeach; ?>    
       
           </ul>
           </div>
          </div>
        </div>
		
      </div>
      <?php endif ;?>
     <?php if($category['Category']['name'] !='Organic T-Shirts' && $category['Category']['name'] !='Women T-Shirts'
            && $category['Category']['name'] !='Man T-Shirt' ) { ?>
                 <div class="clearfix filter-btn ">
      <button type="submit" class="btn defult_btn  btn-fllr" name="filterbtn">Filter</button>
      </div>
          <?php } ?>
		</form>   
    </div>-->
            
            
        </div>    
        </div>
        
        <div class="col-sm-9 col-sm-12">
        
         <!---------common-head----------->
         <?php
         if(isset($this->params['url']['sort']) && isset($this->params['url']['order'])){
            if($this->params['url']['sort'] == 'name'){
                $sortby = $this->params['url']['sort'];
                $order = $this->params['url']['order'];
            }elseif($this->params['url']['sort'] == 'rating'){
                $sortby = $this->params['url']['sort'];
                $order = $this->params['url']['order'];
            }
         }else{
            $sortby = '';
            $order = '';
         }
         ?>
         <div class="facets row" id="facets">
  <div class="breadcrumb-container small-8 medium-5 columns">
   <h6 class="heading-metadata"><span style="font-size: 34px; font-weight: 500;"><?php echo ucwords($category['Category']['name']); ?></span></h6>
  	</div>
     <div id="facet-selection-container" class="small-4 medium-7 columns">
    <ul class="inline-list" id="filter-list">
      <li class="facet-list__wrapper">
     <h4> Sort by:</h4>
      <select id="filterby" style="width: 50%; float: left; margin-top: 6px; padding: 1px;">
                 <option>select</option>
                 <?php if($sortby == 'name' && $order == 'ASC'){?>
                 <option value="?sort=name&order=ASC" selected="selected">Name (A - Z)</option>
                 <?php }else{ ?>
                 <option value="?sort=name&order=ASC">Name (A - Z)</option>
                 <?php } ?>
                 <?php if($sortby == 'name' && $order == 'DESC'){?>
                 <option value="?sort=name&order=DESC" selected="selected">Name (Z - A)</option>
                 <?php }else{ ?>
                 <option value="?sort=name&order=DESC">Name (Z - A)</option>
                 <?php } ?>
                 <?php if($sortby == 'rating' && $order == 'ASC'){?>
                 <option value="?sort=rating&order=ASC" selected="selected">Lowest rating</option>
                 <?php }else{ ?>
                 <option value="?sort=rating&order=ASC">Lowest rating</option>
                 <?php } ?>
                 <?php if($sortby == 'rating' && $order == 'DESC'){?>
                 <option value="?sort=rating&order=DESC" selected="selected">Highest rating</option>
                 <?php }else{ ?>
                 <option value="?sort=rating&order=DESC">Highest rating</option>
                 <?php } ?>
             </select></li>
      </ul>
    </div>
         
         
         
 
            <div class=" pull-right ">
<!--                <div class="populr_metd"> 
  <form method="post" id="filterform1">                    
                <select name="producct_popular" class="form-control" onchange="this.form.submit()">
                     <option value="">--Select Popular--</option>
                     <option value="DESC">Popular</option>
                 </select>
    </form>       
            <span class="poplr_bg"></span>
         	</div>-->
        
     
            </div>
         
         <div class="row">

 <div class="wide_bottle" >
<?php if (!empty($products)): ?>

<?php echo $this->element('products'); ?>

<?php endif; ?>
             
         
           
 
             
             
             
             

       </div>
    </div>
    </div>
</div>
</div>
<?php 
else:
 ?>

  <div class="container">
    <div class="row">
    <div class="instargm">
<div class="col-sm-12">
        <div class="fancy02">
          <h2><?php  echo $category['Category']['name'];?></h2>
        </div>
  </div>
        
<div class="shop-insta">      
  <div class="col-sm-12">    
       <?php 
			if(!empty($products)):
			
			foreach ($products  as $val):?> 
            <div class="col-md-3 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo $this->webroot."product/".$val['Product']['slug'];?>">
                 <div class="insta-portfo">
                 <div class="overlay-portfl"></div>
                   <?php echo $this->Html->Image('/images/large/' . $val['Product']['image'], array('alt' => $val['Product']['name'], 'class' => 'img-responsive')); ?>
                   </div>
                </a>
            </div>
            
       <?php endforeach;
       endif;
       ?>
        </div>
</div>

</div>
    </div>
  </div>

<?php
endif;
?>


<script>
  jQuery(document).ready(function ($) {
	  $(".tooltip").eq(0).addClass("slid1");
	  $(".tooltip").eq(1).addClass("slid2");
	  var k1 = $(".slid1").text();
	  var k2 = $(".slid2").text();
	   $("#r1").val(k1);
	   $("#r2").val(k2);
  });
  </script>
  
 
<style>

.tooltip {
	
	 color: #fff;
    display: block;
    font: 10px Arial,sans-serif;
    height: 15px;
    opacity: 1;
    position: absolute;
    text-align: center;
    top: -21px;
    width: auto;
	background-color:#626262;
	padding:1px 2px;
}
.ui-slider-handle {
/*	position: absolute;
	z-index: 2;
	width: 29px;
	height: 31px;
	cursor: pointer;
	/*background: url('./img/range_arrow.png') no-repeat 50% 50%;*/
	outline: none;
	top: -7px;
	margin-left: -12px;*/
}
.ui-slider-range {
	background:#eecb19;
	position: absolute;
	border: 0;
	top: 1px;
	height: 7px;
	border-radius: 25px;
}
#textarea_one{
	margin-left: 0;
    margin-top: -18px;
}
#textarea_two {
	margin-left: 192px;
	margin-top: -25px;
}
#textarea_one, #textarea_two {
	font-weight: 700;
	font-family: Arial;
	font-size: 11px;
	color: #959595;
}
  </style>
   <script src="<?php echo $this->webroot; ?>frontend/js/slick.js" type="text/javascript" charset="utf-8"></script>
   <script>
  jQuery(document).ready(function ($) {
	  $(".tooltip").eq(2).addClass("slid11");
	  $(".tooltip").eq(3).addClass("slid21");
	  var k11 = $(".slid11").text();
	  var k22 = $(".slid21").text();
	   $("#r11").val(k11);
	   $("#r21").val(k22);
	   

	   
  });
  </script>
<style>
#slider1 {
	width: 64%;
	position: absolute;
	height: 7px;
	background: #e1e1e1 ;
       border-radius:5px;
top:13px;
margin-left:10px;
}
.tooltip {
	
	/* color: #000;
    display: block;
    font: 10px Arial,sans-serif;
    height: 15px;
    opacity: 1;
    position: absolute;
    text-align: center;
    top: -8px;
    width: 31px;*/
}
.ui-slider-handle {
	  border-color: transparent transparent #eecb19;
    border-style: solid;
    border-width: 0 0 11px;
    cursor: pointer;
    height: 16px;
    margin-left: -12px;
    outline: medium none;
    position: absolute;
    top: -7px;
    width: 12px;
    z-index: 2;
	/*background: url('./img/range_arrow.png') no-repeat 50% 50%;*/

}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default { background:#eecb19; border:1px solid #eecb19;}

.ui-slider-handle:after {     border-color: #eecb19 transparent transparent;
    border-style: solid;
    border-width: 9px 9px 0;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    top: 16px;
    width: 0;}
	
.ui-slider-range {
	background:#d2b728;
	position: absolute;
	border: 0;
	top: 1px;
	height: 7px;
	border-radius: 25px;
}
#textarea_one{
	margin-left: 0;
    margin-top: -18px;
}
#textarea_two {
	margin-left: 192px;
	margin-top: -25px;
}
#textarea_one, #textarea_two {
	font-weight: 700;
	font-family: Arial;
	font-size: 11px;
	color: #959595;
}
  </style>
  <?php $url = $this->webroot; ?>
<script>
$("#filterby").change(function(){
    
    var value = $(this).val();
    var url = '<?php echo $url.'category/'.$category['Category']['slug'] ?>';
    //alert(url);
    if (value) {
            url += value;
    }
    window.location.href = url;
});
</script>
