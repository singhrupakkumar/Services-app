<div class="content">
    <div class="header">
         <div class="main-content">
<?php 
$x=$this->Session->flash();
if($x){
    echo $x;
}
?>
             <br/>  <br/>  <br/>  <br/>  <br/>
<form action="<?php echo $this->webroot; ?>/admin/products/proimportres" method="post" enctype='multipart/form-data'>
    <input type="file" name="file">
    <input type="submit" value="submit" name="file">
</form>
         </div>
    </div></div>