<?php $this->load->view('admin/header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-time"></i>
		Poin					
	</h1>
	
	<div class="stat-container">
		
		<div class="stat-holder">						
			<div class="stat">							
				<span><?php echo $totpengajuan; ?></span>							
				<?php echo anchor('adminpanel/poin/all','Total Penukaran Poin'); ?>						
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
		<div class="stat-holder">						
			<div class="stat">							
				<span><?php echo $jumpengajuan; ?></span>							
				<?php echo anchor('adminpanel/poin','Pengajuan Penukaran poin'); ?>							
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->

		<div class="stat-holder">						
			<div class="stat">							
				<span><?php echo $jumbarpoin; ?></span>							
				<?php echo anchor('adminpanel/barangpoin','Barang Tukar Poin'); ?>							
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
	</div> <!-- /stat-container -->
	
</div> <!-- /span9 -->

<div class="row">					
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-folder-open"></i>
				<h3>Pengajuan Penukaran</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th width="30%">Barang</th>
							<th>User</th>
							<th>tgl pengajuan</th>
							<th>Status</th>
							<th width="20%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
					<?php if($penukaran->num_rows() > 0) : ?>
					<?php foreach($penukaran->result() as $pn) : ?>
					<?php
						switch($pn->status)
						{
							case 1 : $st = '<span class="label label-important">Menunggu Verifikasi</span>';
								break;
							case 2 : $st = '<span class="label label-success">Berhasil</span>';
								break;
						}
					?>
					<tr>
						<td><?php echo $pn->barang; ?></td>
						<td><?php echo $pn->username; ?></td>
						<td><?php echo date('d M Y - H:i', strtotime($pn->waktu_penukaran)) ?></td>
						<td><?php echo $st; ?></td>
						<td class="action-td">
							<?php if($pn->status == 1): ?><a title="Tinjau Penukaran" href="<?php echo site_url('adminpanel/poin/verify/'.$pn->pid); ?>" class="btn btn-info">Verify</a><?php endif; ?>
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