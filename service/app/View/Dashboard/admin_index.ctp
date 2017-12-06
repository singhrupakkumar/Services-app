<style>
.easyPieChart {
    position: relative;
    text-align: center;
}

.easyPieChart canvas {
    position: absolute;
    top: 0;
    left: 0;
}
</style>
<!-- Content Header (Page header) -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      
    </section>


     <!-- Main content -->
    <section class="content">
       <!-- Info boxes -->
    <div class="row">
		
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user" aria-hidden="true"></i></span>
<!---->
            <div class="info-box-content">
              <span class="info-box-text">Total Admin</span>
              <span class="info-box-number"><?php  echo count($user); ?></span>
            </div>
           
          </div>
        
        </div>


        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user-md" aria-hidden="true"></i></span>
<!---->
            <div class="info-box-content">
                <span class="info-box-text">Total Customers</span>
              <span class="info-box-number"><?php  echo count($client); ?></span>
              <!--<span class="info-box-text">Total Quantity - <strong><?php  echo $quantity ; ?></strong></span>-->
            </div>
           
          </div>
        
        </div>
        
        <!-- /.col -->
      </div>



      <div class="row">
      		
      	<div class="col-md-12">

      	<div id="piechart" style="width: 100%; height: 400px;"></div>
          

          </div>
          <!-- /.box -->
        </div>
      	

    </section>


<script type="text/javascript">
  countUp(<?php echo count($paying); ?>);
  countUp2(<?php echo count($users); ?>);
</script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
          ['PAYING MEMBERS', 'TOTAL Members'],
          ['PAYING MEMBERS',<?php echo count($paying); ?>],['TOTAL Members',<?php echo count($users); ?>]]);
    var options = {
          title: 'Dashboard Details',
          is3D: true,
          slices: {
            0: { color: '#BF5700' },            
            1: { color: '#DCDCDC' }
          }
        };
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script> 

<script src="https://rakesh.crystalbiltech.com/freedrink/dashboard/plugins/jquery.easy-pie-chart.js"></script>