<?php $this->load->view('header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-time"></i>
		Poin			
		<div style="float: right;">
			<a href="<?php echo site_url('ucp/poin'); ?>"><i class="icon-list"></i></a>
			<a href="<?php echo site_url('ucp/poin'); ?>">Tukar Poin</a>
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
				<i class="icon-search"></i>
				<h3>Riwayat Penukaran Poin</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Waktu Penukaran</th>
							<th>Penukaran Poin</th>
							<th>Status</th>
							<th width="20%">Keterangan</th>
							<th width="25%">Validasi</th>
						</tr>
					</thead>
					
					<tbody>
					<?php if($tupoin->num_rows() > 0) : ?>
					<?php foreach($tupoin->result() as $tp) : ?>
					<?php 
						switch($tp->status)
						{
							case 1 : $st = '<span class="label label-warning">Menunggu Verifikasi</span>';
								break;
							case 2 : $st = '<span class="label label-success">Berhasil</span>';
								break;
						}
					?>
						<tr>
							<td><?php echo date('d F Y H:i',strtotime($tp->waktu_penukaran)); ?></td>
							<td><?php echo $tp->barang; ?></td>
							<td><?php echo $st; ?></td>
							<td><?php echo $tp->keterangan_penukaran; ?></td>
							<td><?php echo $tp->keterangan_konfirmasi; ?></td>
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