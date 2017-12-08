<h2>Dashboard</h2>

<table class="table-striped table-bordered table-condensed table-hover">

    <tr>
        <td>Location</td>
        <td><?php echo h($data[0]['Dashboard']['location']); ?></td>
    </tr>
    <tr>
        <td>Change by</td>
       <td><?php echo h($data[0]['Dashboard']['uname']); ?></td>
    </tr>
    <tr>
        <td>Changes controller</td>
        <td><?php echo h($data[0]['Dashboard']['location']); ?></td>
    </tr>
     <tr>
        <td>IP</td>
        <td><?php echo h($data[0]['Dashboard']['ip']); ?></td>
    </tr>
     <tr>
        <td>Changed data</td>
        <td><?php  $d=unserialize($data[0]['Dashboard']['data']); print_r($d); ?></td>
    </tr>
    <tr>
        <td>Param</td>
        <td><?php  $da= unserialize($data[0]['Dashboard']['param']); print_r($da); 
//        foreach ($da as $key => $value) {
//            if ($key > 0) echo ',';
//            echo '"'.$value.'"';
//}
        
        ?></td>
    </tr>
    <tr>
        <td>Created</td>
       <td><?php echo h($data[0]['Dashboard']['created']); ?></td>
    </tr>
    <tr>
        <td>Modified</td>
       <td><?php echo h($data[0]['Dashboard']['modified']); ?></td>
    </tr>
</table>
