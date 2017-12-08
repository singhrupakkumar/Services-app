<?php echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>
<div class="">
    <div class="header">
        <h1 class="page-title">Edit Admin</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url('/admin/Restaurants/'); ?>">Restaurant Management</a> </li>
            <li class="active">Edit Admin</li>
        </ul>
    </div>
    <div class="main-content">  
        <p  class="add-author">Add table in restaurant</p>
        <table class="authors-list">
            <tr>
                <?php
                // print_r($rdata);
                $var = end($rdata);
                //echo  $cnt=end($rdata);
                //  echo $var['Restable']['tableno']+1;
                foreach ($rdata as $cartdatas) {
                    ?>
                    <td><a href="http://readyto.com/admin/splitpayments/menudetai/<?php echo $cartdatas['Restable']['res_id']; ?>/<?php echo $cartdatas['Restable']['tableno']; ?>"><?php echo $cartdatas['Restable']['tableno']; ?><span class="authors-booked"></span></a></td>
                <?php } ?>
            </tr>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var counter = '<?php echo $var['Restable']['tableno'] + 1; ?>';
        jQuery('p.add-author').click(function (event) {
            $.post('http://readyto.com/admin/restaurants/addtableresrv', {tno: counter, resid:<?php echo $restaurant['Restaurant']['id']; ?>}, function (d) {

                var newRow = jQuery('<td><a href="http://readyto.com/admin/splitpayments/menudetai/<?php echo $restaurant['Restaurant']['id']; ?>/' + counter + '">' + counter + '</a></td>');
                jQuery('table.authors-list tr').append(newRow);
                counter++;

            });
        });
    });
</script>      
<style>
    .authors-booked {
        width: 5px;
        height: 5px;
        background: #ff0000;
        float: left;
        border-radius: 50%;
    }
    .authors-unbooked {
        width: 5px;
        height: 5px;
        background: #fff;
        float: left;
        border-radius: 50%;
    }
</style>