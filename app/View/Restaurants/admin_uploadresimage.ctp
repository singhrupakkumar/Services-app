<link href="<?php echo $this->webroot; ?>/home/css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo $this->webroot; ?>/home/js/dropzone.js"></script>

<form action="<?php echo $this->webroot; ?>/admin/restaurants/uploadresimage/<?php echo $resid; ?>" method="post" enctype='multipart/form-data' class="dropzone">

</form>
 <h5>Drop Files Here</h5>
<br/>
<br/>
<div class="show-image">
    <?php foreach($gallery as $gal) { ?>
    <form method="post" action="<?php echo $this->webroot ?>admin/restaurants/getresimage" name="frm-<?php echo $gal['Gallery']['id']; ?>">
   <img src="<?php echo $this->webroot; ?>files/restaurants/<?php echo $gal['Gallery']['image']; ?>"/>
   <input type="hidden"  name="id" value="<?php echo $gal['Gallery']['id']; ?>" />
   <input type="hidden"  name="resid" value="<?php echo $resid; ?>" />
   <input class="delete btn btn-danger" type="submit" value="Delete" />
    </form>
    
    <?php } ?>
    
</div>
<style type="text/css">
    div.show-image {
    position: relative;
    float:left;
    margin:5px;
}


div.show-image form img{
    width: 100px;
    height: 100px;
}

.show-image form{
	margin-bottom:10px;
	}

div.show-image form input.delete {
    top:0;
    left:79%;
}
</style>
<script type="text/javascript">
    var id='<?php echo $resid; ?>';
    $(document).ready(function(){
        $.post("http://readyto.com/admin/restaurants/getresimage",{id:id},function(d){
             var data=JSON.parse(d);
             var html='';
               for(var k in data){
                   console.log(data[k].Gallery.image);
                   html+='<img src="<?php echo $this->webroot?>files/restaurants/'+data[k].Gallery.image+'"/>';
                   html+= '<input class="delete" type="button" value="Delete" />';
               }
               console.log(html);
                     //  $('.show-image').html(html);
        });        
    });

</script>
<?php 
//print_r($gallery);
?>


