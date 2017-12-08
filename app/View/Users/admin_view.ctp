<!--<h2 style="margin-left: 15px;">User</h2>


  <strong><?php //echo $this->Session->flash(); ?></strong>-->

<section class="content">
      <div class="row">
        <div class="col-xs-12">
		            <div class="box-header">
              <h3 class="box-title">User Details</h3>
            </div>
          <div class="box">

<table style="background: #fff;width: 97%;margin: 0 auto;" class="table table-bordered table-hover dataTable">
    <tr>
        <td>Id</td>
        <td><?php echo h($user['User']['id']); ?></td>
    </tr>
	<tr>
        <td>Image</td>
        <td><img id="blah" height="100" width="100" src="<?php if($user['User']['image'] != ''){ echo $this->webroot.'files/profile_pic/'.$user['User']['image']; }else{ echo $this->webroot.'files/profile_pic/avatar.png';} ?>">	</td>
    </tr>
    <tr>
        <td>Role</td>
        <td><?php echo h($user['User']['role']); ?></td>
    </tr>
	    <tr>
        <td>First Name</td>
        <td><?php echo h($user['User']['firstname']); ?></td>
    </tr>
	    <tr>
        <td>Last Name</td>
        <td><?php echo h($user['User']['lastname']); ?></td>
    </tr>
    <tr>
        <td>User Email</td>
        <td><?php echo h($user['User']['email']); ?></td>
    </tr>
	<tr>
        <td>Phone No.</td>
        <td><?php echo h($user['User']['phonenumber']); ?></td>
    </tr>
	<tr>
        <td>Address</td>
        <td><?php echo h($user['User']['address']); ?></td>
    </tr>
    <tr>
        <td>Active</td>
        <td><?php if($user['User']['active'] == 1){ echo 'Active'; }else{ echo 'Inactive'; } ?></td>
    </tr>
    <tr>
        <td>Created</td>
        <td><?php 
         $created = explode(' ', $user['User']['created']);
         $date1 = str_replace('-', '/', $created[0]);
         echo date('m-d-Y',strtotime($date1)); ?></td>
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

<?php echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>

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