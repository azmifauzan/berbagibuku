<?php $this->load->view('header'); ?> 
	
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-user"></i>
		Akun		
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
				<i class="icon-edit"></i>
				<h3>Profil</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<?php echo form_open_multipart('ucp/profil/simpan','class="form-horizontal"'); ?>
				<fieldset>					
					<div class="control-group">											
						<label class="control-label" for="nama">Nama</label>
						<div class="controls">
							<input type="text" class="input-medium" id="nama" name="nama" value="<?php echo $user->nama; ?>" placeholder="Nama Lengkap">
							<?php echo form_error('nama','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="website">Website</label>
						<div class="controls">
							<input type="text" class="input-medium span3" id="website" name="website" value="<?php echo $user->website; ?>" placeholder="http://">
							<?php echo form_error('website','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="fb">Facebook</label>
						<div class="controls">
							<input type="text" class="input-medium span3" id="fb" name="fb" value="<?php echo $user->facebook; ?>" placeholder="https://www.facebook.com/Greatnesia">
							<?php echo form_error('fb','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="tw">Twitter</label>
						<div class="controls">
							<input type="text" class="input-medium span3" id="tw" name="tw" value="<?php echo $user->twitter; ?>" placeholder="https://twitter.com/greatnesia">
							<?php echo form_error('twitter','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="website">Biodata</label>
						<div class="controls">
							<textarea rows="4" name="biodata"><?php echo $user->biodata; ?></textarea>
							<?php echo form_error('biodata','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="avatar">Avatar</label>
						<div class="controls">
							<?php if(trim($user->avatar) != ""): ?>
								<img border="0" src="<?php echo base_url()."uploads/avatar/".$user->avatar; ?>" /><br/>
							<?php endif; ?>
							<input type="file" name="avatar" />
							<?php if(isset($error)) echo $error; ?>
						</div> <!-- /controls -->
					</div>
					<br/>
					<div class="control-group">											
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" class="input-medium" id="password" name="password" placeholder="Ganti Password">
							<p class="help-block">Biarkan kosong jika tidak ingin mengganti Password.</p>
							<?php echo form_error('nama','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					
					<div class="form-actions">	
						<input type="submit" id="simpan" name="simpan" value="Simpan" class="btn btn-primary">
					</div>
				</fieldset>
				<?php echo form_close(); ?>

			</div> <!-- /widget-header -->

					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('footer'); ?>