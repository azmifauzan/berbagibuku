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
				<?php echo form_open("ucp/poin/proses","class='form-horizontal'"); ?>
				<div class="control-group">											
					<label class="control-label" for="barang">Penukaran Poin :</label>
					<div class="controls">
						<input type="text" disabled value="<?php echo $tukar->barang; ?>">
					</div> <!-- /controls -->
				</div>
				<div class="control-group">											
					<label class="control-label" for="deskripsi">Deskripsi :</label>
					<div class="controls">
						<textarea cols="50" rows="5" disabled><?php echo $tukar->deskripsi; ?></textarea>
					</div>
				</div>
				<div class="control-group">											
					<label class="control-label" for="poin">Jumlah Tukar Poin :</label>
					<div class="controls">
						<input type="text" disabled value="<?php echo $tukar->poin; ?>">
					</div> <!-- /controls -->
				</div>
				<div class="control-group">											
					<label class="control-label" for="ket">No HP / Alamat Pengiriman :</label>
					<div class="controls">
						<textarea name="keterangan" cols="70" rows="7"></textarea>
					</div> <!-- /controls -->
				</div>
				<div class="form-actions">
					<input type="submit" name="proses" value="Proses" class="btn btn-primary">
				</div>
				<?php echo form_hidden('tid',$tukar->tid); ?>
				<?php echo form_close(); ?>
			</div> <!-- /widget-content -->			
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('footer'); ?>