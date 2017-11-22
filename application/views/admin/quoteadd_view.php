<?php $this->load->view('admin/header'); ?> 

<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-user"></i>
		User
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
				<i class="icon-plus"></i>
				<h3>Tambah Quote</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">

			<?php echo form_open_multipart('adminpanel/quote/addp',array("class"=>"form-horizontal")); ?>
	<fieldset>
	<div class="control-group">
		<label for="penulis" class="control-label">Penulis</label>
		<div class="controls">
			<input type="text" name="penulis" value="<?php echo set_value('penulis'); ?>" class="form-control" id="penulis" />
		</div>
	</div>

	<div class="control-group">
		<label for="isi" class="col-md-4 control-label">Isi</label>
		<div class="controls">
			<textarea name="isi" cols="50" rows="5"><?php echo set_value('isi'); ?></textarea>
		</div>
	</div>
	<div class="control-group">
		<label for="email" class="col-md-4 control-label">Gambar</label>
		<div class="controls">
			<input type="file" name="gambar" class="form-control" id="gambar" />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" name="simpan" class="btn btn-success" value="Save">
        </div>
	</div>
	</fieldset>
	<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>
<?php $this->load->view('admin/footer'); ?> 