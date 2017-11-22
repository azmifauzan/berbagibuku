<?php $this->load->view('admin/header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-time"></i>
		Poin
	</h1>
	
	<?php if(isset($info)) : ?>
	    <div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Informasi : </strong><?php echo $info; ?>
	    </div>
	<?php endif; ?>

</div> <!-- /span9 -->

<div class="row">					
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-folder-open"></i>
				<h3>Barang Poin</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<?php echo anchor('adminpanel/barangpoin/create','Tambah','class="btn btn-primary"'); ?><br/><br/>
				
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th width="40%">Barang</th>
							<th>Poin</th>
							<th>Stock</th>
							<th width="20%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
					<?php if($barang->num_rows() > 0) : ?>
					<?php foreach($barang->result() as $br) : ?>
					<tr>
						<td><?php echo $br->barang; ?></td>
						<td><?php echo $br->poin; ?></td>
						<td><?php echo $br->stock; ?></td>
						<td class="action-td">
							<a title="edit" href="<?php echo site_url('adminpanel/barangpoin/update/'.$br->tid); ?>" class="btn btn-small"><i class="icon-edit"></i></a>
							<a title="delete" href="<?php echo site_url('adminpanel/barangpoin/delete/'.$br->tid); ?>" class="btn btn-small btn-warning"><i class="icon-remove" onclick="javasciprt: return confirm('Are You Sure ?')"></i></a>
						</td>
					</tr>
					<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<p align="center"><?php echo $this->pagination->create_links(); ?></p>
			</div> <!-- /widget-header -->

					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('admin/footer'); ?>