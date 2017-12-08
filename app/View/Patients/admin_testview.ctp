<!--<h2 style="margin-left: 15px;">Patient</h2>


  <strong><?php //echo $this->Session->flash(); ?></strong>-->

<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Patient</h3>
            </div>
<table style="background: #fff;width: 97%;margin: 0 auto;" class="table table-bordered table-hover dataTable">
    <tr>
        <td>Id</td>
        <td><?php echo h($test['Test']['id']); ?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?php echo h($test['Test']['test']); ?></td>
    </tr>
	<tr>
        <td>Created Date</td>
        <td><?php echo h($test['Test']['created_date']); ?></td>
    </tr>
</table>
<br/>
<br/>
<div class="container">
<div class="col-sm-4 padding">
<div class="form_sec mg10">
<h3>Actions</h3>

<?php echo $this->Form->postLink('Delete Test', array('action' => 'testdelete', $test['Test']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $test['Test']['id'])); ?>

</div>
</div>
</div>
          </div>
        </div>
    </div>
</section>
<style>
.btn.btn-success{
	margin-left:15px;
	}
	.content-wrapper{
		min-height:423px !important;
	}
</style>


<script type="text/javascript">
    $(document).ready(function(){
        $(".slide-toggle").click(function(e){
            e.preventDefault();
            //console.log($(this).text());
            if($(this).text()=='Show'){
                $(this).text('Hide');
            }
            else{
                $(this).text('Show');
            }
            $(".passwordshow").animate({
                width: "toggle"
            });
        });
    });
</script>