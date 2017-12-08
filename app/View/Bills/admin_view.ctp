<!--<h2 style="margin-left: 15px;">User</h2>


  <strong><?php //echo $this->Session->flash(); ?></strong>-->

<section class="content">
      <div class="row">
        <div class="col-xs-12">
		            <div class="box-header">
              <h3 class="box-title">Bill Details</h3>
            </div>
          <div class="box">

<table style="background: #fff;width: 97%;margin: 0 auto;" class="table table-bordered table-hover dataTable">
    <tr>
        <td>Id</td>
        <td><?php echo h($user['Bill']['id']); ?></td>
    </tr>
	<tr>
        <td>Title</td>
        <td><?php echo h($user['Bill']['title']); ?></td>
    </tr>
	    <tr>
        <td>Description</td>
        <td><?php echo h($user['Bill']['description']); ?></td>
    </tr>
    <tr>
        <td>Bill Type</td>
        <td><?php echo h($user['Bill']['bill_type']); ?></td>
    </tr>
    <tr>
        <td>Customer Status</td>
        <td><?php if($user['Bill']['status'] == 1){ echo 'Approved'; }elseif($user['Bill']['status'] == 2){ echo 'Rejected'; }else{ echo 'Pending'; } ?></td>
    </tr>

    <tr>
        <td>Payment Status</td>
        <td><?php if($user['Bill']['payment_status'] == 1){ echo 'Paid'; }else{ echo 'Unpaid'; } ?></td>
    </tr>

	<tr>
        <td>Amount</td>
        <td><?php echo h($user['Bill']['amount']); ?></td>
    </tr>
    <tr>
        <td>Created</td>
        <td><?php echo h($user['Bill']['created']); ?></td>
    </tr>
    <tr>
        <td>Modified</td>
        <td><?php echo h($user['Bill']['modified']); ?></td>
    </tr>
</table>
<br/>
<br/>

<div class="container">
<div class="col-sm-4 padding">
<div class="form_sec mg10">
<h3>Actions</h3>

<?php /* echo $this->Html->link('Edit User', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-success')); */ ?> 


<?php // echo $this->Form->postLink('Reset Password ', array('action' => 'resetbyadmin', $user['User']['id'],$user['User']['username']), array('class' => 'btn btn-info')); ?>

<?php echo $this->Form->postLink('Delete Bill', array('action' => 'delete', $user['Bill']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user['Bill']['title'])); ?>

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