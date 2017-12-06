
<br>
<br>
<br>
<br>

<div style="clear:both">
<?php $i=1;
foreach($IndexDetail as $value){
echo '<h4><strong>['.$i.']. '.$value['description'].'</strong></h4>';
echo $value['url'].'<br>';
echo '<i><b>Parameters</b><br>'.$value['parameters'].'</i><br><br>';
$i++;
}
?>
</div>
<br>
<br>
<br>
<br>
