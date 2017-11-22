<?php $this->load->view('admin/header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-comment"></i>
		Quote
	</h1>
	
	<?php if(isset($info)) : ?>
	    <div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Informasi : </strong><?php echo $info; ?>
	    </div>
	<?php endif; ?>
	
</div> <!-- /span9 -->

<div class="row">	
	<div>				
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-folder-open"></i>
				<h3>Quote of The Day</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
			<div class="pull-right">
				<a href="<?php echo site_url('adminpanel/quote/add'); ?>" class="btn btn-success">Add</a> 
			</div><br/><br/>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Penulis</th>
							<th width="50%">Isi</th>
							<th>Gambar</th>
							<th width="20%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
					<?php if($quote->num_rows() > 0) : ?>
					<?php foreach($quote->result() as $qt) : ?>
					<tr>
						<td><?php echo $qt->penulis; ?></td>
						<td><?php echo $qt->isi; ?></td>						
						<td><?php echo $qt->image; ?></td>
						<td class="action-td">
							<a title="edit" href="<?php echo site_url('adminpanel/quote/edit/'.$qt->qid); ?>" class="btn btn-small"><i class="icon-edit"></i></a>
							<a title="delete" href="<?php echo site_url('adminpanel/quote/delete/'.$qt->qid); ?>" class="btn btn-small btn-warning"><i class="icon-remove"></i></a>
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