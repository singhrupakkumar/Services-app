<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box form_sec">
                <div class="box-header">
                    <!--<h3 class="box-title">Client Details</h3>-->
                </div>
                <div class="main-content">
                    <?php $x = $this->Session->flash(); ?>
                    <?php if ($x) { ?>
                    <div class="alert success">
                        <span class="icon"></span>
                        <strong></strong><?php echo $x; ?>
                    </div>
                    <?php }  
 ?>
<div class="container"><h2>Client All Details</h2></div>

<div id="exTab2">	
    <ul class="nav nav-tabs">
	<li class="active">
            <a  href="#1" data-toggle="tab">Patients</a>    
	</li>
    </ul>
    <div class="tab-content ">
        <div class="tab-pane active" id="1">
            <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><?php echo 'Id'; ?></th>
                        <th><?php echo 'Name'; ?></th>
                        <th><?php echo 'Address'; ?></th>
                        <th><?php echo 'Phone number'; ?></th>
                        <th><?php echo 'D. O. B.'; ?></th> 
                        <th><?php echo 'Insurance name'; ?></th>
                         <th><?php echo 'Insurance number'; ?></th>
                        <th><?php echo 'Diagnosis'; ?></th>
                        <th><?php echo 'Doctor name'; ?></th>
                        <th><?php echo 'Doctor number'; ?></th>
                        <th><?php echo 'Doctor fax number'; ?></th>
                        <th><?php echo 'Created date'; ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                foreach ($patients as $patient): 
                ?>	 	
                    <tr>
                        <td><?php echo $patient['Patient']['id']; ?></td>
                        <td><?php echo $patient['Patient']['name']; ?></td>
                        <td><?php echo $patient['Patient']['address']; ?></td>
                        <td><?php echo $patient['Patient']['phonenumber']; ?></td>
                        <td><?php echo $patient['Patient']['dob']; ?></td>
                        <td><?php echo $patient['Patient']['insurancename']; ?></td>
                        <td><?php echo $patient['Patient']['insurancenumber']; ?></td>
                        <td><?php echo $patient['Patient']['diagnosis']; ?></td>
                        <td><?php echo $patient['Patient']['doctorname']; ?></td>
                        <td><?php echo $patient['Patient']['doctornumber']; ?></td>
                        <td><?php echo $patient['Patient']['doctorfaxnumber']; ?></td>
                        <td><?php echo $patient['Patient']['created_date']; ?></td>
                    </tr> 
                <?php
                endforeach; ?>
                </tbody>
            </table> 
        </div>
    </div>
</div>



</div>
</div>
</div></div>
</section>
<style>
.checkbox input[type=checkbox] { margin-left: 0px !important;margin-top:2px;}
.checkbox label{color:#000 !important;}
input, textarea{color:#000 !important;}
</style>

<style>
    #exTab2 table tr td {
        color:#000;        
    }
#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab2 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab2 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab2 .tab-content {
  color : white;
  padding :10px 0;
}
.table{
margin-bottom:0px !important;
}
.select label {
    color: #000;
    float: left;
    margin-right: 10px;
    margin-bottom: 0;
    width: auto;
    margin: 10px 15px 10px 0;
}

.form-control {
    width: 60%;
    margin: 0;
}

.right_number {
    width: auto;
    float: left;
    position: absolute;
    right: -3px;
    top: 11px;
    background-color: green;
    border-radius: 50px;
    padding: 0px 6px;
    color: #fff;
}


</style>
