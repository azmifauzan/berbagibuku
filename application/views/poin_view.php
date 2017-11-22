<?php $this->load->view('header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-time"></i>
		Poin			
		<div style="float: right;">
			<a href="<?php echo site_url('ucp/poin/history'); ?>"><i class="icon-search"></i></a>
			<a href="<?php echo site_url('ucp/poin/history'); ?>">Riwayat Penukaran Poin</a>
		</div>		
	</h1>
	
	<div class="stat-container">
		
		<div class="stat-holder">						
			<div class="stat">							
				<span><?php echo $user->poin; ?></span>							
				Jumlah Poin	Anda						
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
	</div> <!-- /stat-container -->

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
				<h3>Tukar Poin</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th width="30%">Pilihan penukaran poin</th>
							<th>Deskripsi</th>
							<th>Poin yang diperlukan</th>
							<th width="20%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
					<?php if($tupoin->num_rows() > 0) : ?>
					<?php foreach($tupoin->result() as $tp) : ?>
						<tr>
							<td><?php echo $tp->barang; ?></td>
							<td><?php echo $tp->deskripsi; ?></td>
							<td><?php echo $tp->poin; ?></td>
							<td align="center"><a title="tukar poin" href="<?php echo site_url('ucp/poin/tukar/'.$tp->tid); ?>" class="btn btn-small btn-success" onclick="javasciprt: return confirm('Tukar Poin Anda dengan pilihan ini?')">Tukar Poin</a></td>
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