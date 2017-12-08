<style>
	table{
		width:100%;
		margin:0px;
	}
</style>
<section class="content-header marginbtm">
      <h1>
       Sub Category
      </h1>
    </section>

    <div class="content">
<div class="row">
	<div class="col-sm-12">
		<div class="form_outer box">
			<table class="table table-bordered table-hover">
				<tr>
					<td>Id</td>
					<td><?php echo h($subcat['SubCategory']['id']); ?></td>
				</tr>

				<tr>
					<td>Name</td>
					<td><?php echo h($subcat['SubCategory']['name']); ?></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><?php echo h($subcat['SubCategory']['description']); ?></td>
				</tr>
				<tr>
					<td>Created</td>
					<td><?php echo h($subcat['SubCategory']['created']); ?></td>  
				</tr>
		
			</table>
		</div>
	</div>
</div>

</div>
