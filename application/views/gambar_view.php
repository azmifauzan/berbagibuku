<?php $this->load->view('header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-picture"></i>
		Gambar			
		<div style="float: right;">
			<a href="<?php echo site_url('ucp/gambar/add'); ?>"><i class="icon-plus"></i></a>
			<a href="<?php echo site_url('ucp/gambar/add'); ?>">Upload Gambar</a>
		</div>		
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
				<i class="icon-list"></i>
				<h3>Gambar Terupload</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th width="30%">Judul</th>
							<th>Keterangan</th>
							<th>Gambar</th>
							<th width="20%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
					<?php if($gambar->num_rows() > 0) : ?>
					<?php foreach($gambar->result() as $gb) : ?>
						<tr>
							<td><?php echo $gb->judul; ?></td>
							<td><?php echo $tp->Keterangan; ?></td>
							<td></td>
							<a title="edit" href="<?php echo site_url('ucp/gambar/edit/'.$gb->gid); ?>" class="btn btn-small"><i class="icon-edit"></i></a>
							<a title="delete" href="<?php echo site_url('ucp/gambar/delete/'.$gb->gid); ?>" class="btn btn-small btn-warning"><i class="icon-remove"></i></a>
						</tr>
					<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
			</div> <!-- /widget-content -->			
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('footer'); ?>