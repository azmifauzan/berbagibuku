<?php $this->load->view('admin/header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-time"></i>
		Poin					
	</h1>
	
</div> <!-- /span9 -->

<div class="row">					
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-folder-open"></i>
				<h3>Verifikasi Penukaran</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
			<?php echo form_open("adminpanel/poin/proses","class='form-horizontal'"); ?>
				<div class="control-group">											
					<label class="control-label" for="barang">Barang :</label>
					<div class="controls">
						<input type="text" disabled value="<?php echo $tukar->barang; ?>">
					</div> <!-- /controls -->
				</div>
				<div class="control-group">											
					<label class="control-label" for="user">User :</label>
					<div class="controls">
						<input type="text" disabled value="<?php echo $tukar->username; ?>">
					</div> <!-- /controls -->
				</div>
				<div class="control-group">											
					<label class="control-label" for="tgl">Tgl Pengajuan :</label>
					<div class="controls">
						<input type="text" disabled value="<?php echo date('d M Y - H:i:s', strtotime($tukar->waktu_penukaran)); ?>">
					</div> <!-- /controls -->
				</div>
				<div class="control-group">											
					<label class="control-label" for="Validasi">Validasi :</label>
					<div class="controls">
						<textarea name="validasi" cols="50" rows="5"></textarea>
					</div> <!-- /controls -->
				</div>
				<div class="form-actions">
					<input type="submit" name="verify" value="Proses" class="btn btn-primary">
				</div>
				<?php echo form_hidden('pid',$tukar->pid); ?>
			<?php echo form_close(); ?>
			</div> <!-- /widget-content -->
				
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('admin/footer'); ?>