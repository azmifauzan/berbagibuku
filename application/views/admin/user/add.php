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
				<h3>Tambah User</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">

<?php echo form_open('adminpanel/user/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="username" class="col-md-4 control-label">Username</label>
		<div class="col-md-8">
			<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
		</div>
	</div>

	<div class="form-group">
		<label for="password" class="col-md-4 control-label">Password</label>
		<div class="col-md-8">
			<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="tgl_daftar" class="col-md-4 control-label">Tgl Daftar</label>
		<div class="col-md-8">
			<input type="text" name="tgl_daftar" value="<?php echo $this->input->post('tgl_daftar'); ?>" class="form-control" id="tgl_daftar" />
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-md-4 control-label">Nama</label>
		<div class="col-md-8">
			<input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
		</div>
	</div>
	<div class="form-group">
		<label for="website" class="col-md-4 control-label">Website</label>
		<div class="col-md-8">
			<input type="text" name="website" value="<?php echo $this->input->post('website'); ?>" class="form-control" id="website" />
		</div>
	</div>
	<div class="form-group">
		<label for="biodata" class="col-md-4 control-label">Biodata</label>
		<div class="col-md-8">
			<textarea name="biodata" class="form-control" id="biodata"><?php echo $this->input->post('biodata'); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_member" class="col-md-4 control-label">Jenis Member</label>
		<div class="col-md-8">
			<input type="text" name="jenis_member" value="<?php echo $this->input->post('jenis_member'); ?>" class="form-control" id="jenis_member" />
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
		</div>
	</div>
	<div class="form-group">
		<label for="ip" class="col-md-4 control-label">Ip</label>
		<div class="col-md-8">
			<input type="text" name="ip" value="<?php echo $this->input->post('ip'); ?>" class="form-control" id="ip" />
		</div>
	</div>
	<div class="form-group">
		<label for="avatar" class="col-md-4 control-label">Avatar</label>
		<div class="col-md-8">
			<input type="text" name="avatar" value="<?php echo $this->input->post('avatar'); ?>" class="form-control" id="avatar" />
		</div>
	</div>
	<div class="form-group">
		<label for="newsletter" class="col-md-4 control-label">Newsletter</label>
		<div class="col-md-8">
			<input type="text" name="newsletter" value="<?php echo $this->input->post('newsletter'); ?>" class="form-control" id="newsletter" />
		</div>
	</div>
	<div class="form-group">
		<label for="sent" class="col-md-4 control-label">Sent</label>
		<div class="col-md-8">
			<input type="text" name="sent" value="<?php echo $this->input->post('sent'); ?>" class="form-control" id="sent" />
		</div>
	</div>
	<div class="form-group">
		<label for="poin" class="col-md-4 control-label">Poin</label>
		<div class="col-md-8">
			<input type="text" name="poin" value="<?php echo $this->input->post('poin'); ?>" class="form-control" id="poin" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>
<?php $this->load->view('admin/footer'); ?> 