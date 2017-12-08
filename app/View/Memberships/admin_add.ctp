<h2>Add Membership Plan</h2>
<br />
<div class="row">
    <div class="col-sm-5">
    <div class="add_dish">
        <?php echo $this->Form->create('Membership', array('type' => 'file', 'id' => 'addpro')); ?>
        <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>                
        <br />
        <?php echo $this->Form->input('description', array('class' => 'form-control', 'type'=>'textarea')); ?>
        <br />
        <?php echo $this->Form->input('cycle', array('class' => 'form-control', 'label' => 'Cycle:')); ?>
        <br />
        <?php echo $this->Form->input('frequency', array( 'class' => 'form-control', 'label' => 'Frequency:')); ?>
        <br />
        <?php echo $this->Form->input('price', array('class' => 'form-control')); ?>
        <br />
        
         <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.tokenize.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>/js/jquery.tokenize.css" />
        Associate Themes:
        <select id="tokenize" multiple="multiple" class="tokenize-sample">
        </select><br />
        <input type="hidden" name="data[Membership][assocthemes]"  value="" id="assocthemes"/>
        <div id="sbtn">Click to Associate sub items</div><br />
        <div class="check_box">
        <?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
        </div>
        <br />
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>
        <br />
        <br />
    </div>
</div>
</div>
<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('Lsit of Membership Plans', array('action' => 'index'), array('class' => 'btn btn-default')); ?>

<br />

<style type="text/css">
    #sbtn,#sbtna {
    background: #fff !important;
    border: 1px solid #ddd;
    border-radius: 5px;
    height: auto !important;
    margin: 14px 0 0 !important;
    padding: 5px;
    width: 42% !important;
    white-space: nowrap;
    font-weight: 700;
    box-shadow: 0 2px 0 #ccc;
    cursor: pointer;
}
#sbtn:hover,#sbtna:hover{
    box-shadow: none !important;
}

</style>
<script type="text/javascript">
     $.get("http://rajdeep.crystalbiltech.com/8bring_akshay/admin/themes/fetchthemes.json", function(d) {
        console.log(d);
        var html = '';
        for (var key in d) {
            html += '<option value="' + key + '">' + d[key] + '</option>';
        }
        //console.log(html);
        jQuery('#tokenize').html('');
        jQuery('#tokenize').html(html);
    });
     
    $('#sbtn').off("click").on("click", function() {
       $('#assocthemes').val('');
       $('#assocthemes').val($('#tokenize').tokenize().toArray());
   });

    $('#tokenize').tokenize();
</script>