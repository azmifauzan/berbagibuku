<?php $this->load->view('header'); ?> 

<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "specific_textareas",
		editor_selector : "tinymce",
		width : "500",
		theme : "simple",
	});
</script>
	
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-picture"></i>
		Gambar		
	</h1>
	
</div> <!-- /span9 -->

<div class="row">					
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-pencil"></i>
				<h3>Upload Gambar</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
			
				<?php $ra = MD5(date('Y-m-d H:i:s')); ?>
				<?php echo form_open_multipart('ucp/gambar/upload','class="dropzone"'); ?>
				<?php echo form_hidden('ts',$ra); ?>
				<?php echo form_close(); ?>

				<?php echo form_open_multipart('ucp/gambar/proses','class="form-horizontal"'); ?>
				<?php echo form_hidden('ts',$ra); ?>
				<fieldset>					
					<div class="control-group">											
						<label class="control-label" for="judul">Judul</label>
						<div class="controls">
							<input type="text" class="input-medium span5" id="judul" name="judul" value="<?php echo set_value("judul"); ?>" placeholder="Judul Gambar">
							<?php echo form_error('judul','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>					
					<div class="control-group">											
						<label class="control-label" for="artikel">Keterangan</label>
						<div class="controls">
							<textarea placeholder="Keterangan Gambar" name="artikel" class="tinymce" rows="10" cols="500"><?php echo set_value('artikel'); ?></textarea>
							<?php echo form_error('artikel','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="form-actions">	
						<input type="submit" id="publish" name="publish" value="Publish Gambar" class="btn btn-primary"> <input type="submit" id="draft" name="publish" value="Simpan Draft" class="btn">
					</div>
				</fieldset>
				<?php echo form_close(); ?>

			</div> <!-- /widget-header -->

					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('footer'); ?>