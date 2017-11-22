<?php $this->load->view('admin/header'); ?>

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
		<i class="icon-book"></i>
		Artikel
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
				<h3>Penolakan Artikel</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<?php echo form_open('adminpanel/artikel/doreject','class="form-horizontal"'); ?>
				<fieldset>
					
					<div class="control-group">											
						<label class="control-label" for="judul">Judul</label>
						<div class="controls">
							<input type="text" class="input-medium span5" value="<?php echo $artikel->judul; ?>" disabled>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="kategori">Kategori</label>
						<div class="controls">
							<input type="text" class="input-medium span2" value="<?php echo $artikel->nama; ?>" disabled>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="gambar">Gambar</label>
						<div class="controls">
							<? if(trim($artikel->image) != "") :?>
							<img border="0" src="<? echo base_url()."uploads/thumb/".substr($artikel->image,0,-4)."_thumb".substr($artikel->image,-4); ?>" />
							<? endif; ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="artikel">Artikel</label>
						<div class="controls">
							<textarea class="tinymce" name="artikel" rows="10" cols="50"><?php echo $artikel->isi; ?></textarea>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="alasan">Alasan Penolakan</label>
						<div class="controls">
							<textarea name="alasan" rows="5" cols="50"></textarea>
						</div> <!-- /controls -->
					</div>
					<div class="form-actions">	
						<input type="submit" name="tolak" value="Tolak Artikel" class="btn btn-primary">
					</div>
				</fieldset>
				<?php echo form_hidden('id',$artikel->artikel_id); ?>
				<?php echo form_hidden('red',$red); ?>
				<?php echo form_close(); ?>

			</div> <!-- /widget-header -->

					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('admin/footer'); ?>