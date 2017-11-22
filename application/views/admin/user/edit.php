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
				<i class="icon-minus"></i>
				<h3>Edit User</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">

<?php echo form_open('adminpanel/user/edit/'.$userd['username'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="password" class="col-md-4 control-label">Password</label>
		<div class="col-md-8">
			<input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $userd['password']); ?>" class="form-control" id="password" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $userd['email']); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="tgl_daftar" class="col-md-4 control-label">Tgl Daftar</label>
		<div class="col-md-8">
			<input type="text" name="tgl_daftar" value="<?php echo ($this->input->post('tgl_daftar') ? $this->input->post('tgl_daftar') : $userd['tgl_daftar']); ?>" class="form-control" id="tgl_daftar" />
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-md-4 control-label">Nama</label>
		<div class="col-md-8">
			<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $userd['nama']); ?>" class="form-control" id="nama" />
		</div>
	</div>
	<div class="form-group">
		<label for="website" class="col-md-4 control-label">Website</label>
		<div class="col-md-8">
			<input type="text" name="website" value="<?php echo ($this->input->post('website') ? $this->input->post('website') : $userd['website']); ?>" class="form-control" id="website" />
		</div>
	</div>
	<div class="form-group">
		<label for="biodata" class="col-md-4 control-label">Biodata</label>
		<div class="col-md-8">
			<textarea name="biodata"><?php echo ($this->input->post('biodata') ? $this->input->post('biodata') : $userd['biodata']); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_member" class="col-md-4 control-label">Jenis Member</label>
		<div class="col-md-8">
			<input type="text" name="jenis_member" value="<?php echo ($this->input->post('jenis_member') ? $this->input->post('jenis_member') : $userd['jenis_member']); ?>" class="form-control" id="jenis_member" />
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $userd['status']); ?>" class="form-control" id="status" />
		</div>
	</div>
	<div class="form-group">
		<label for="ip" class="col-md-4 control-label">Ip</label>
		<div class="col-md-8">
			<input type="text" name="ip" value="<?php echo ($this->input->post('ip') ? $this->input->post('ip') : $userd['ip']); ?>" class="form-control" id="ip" />
		</div>
	</div>
	<div class="form-group">
		<label for="avatar" class="col-md-4 control-label">Avatar</label>
		<div class="col-md-8">
			<input type="text" name="avatar" value="<?php echo ($this->input->post('avatar') ? $this->input->post('avatar') : $userd['avatar']); ?>" class="form-control" id="avatar" />
		</div>
	</div>
	<div class="form-group">
		<label for="newsletter" class="col-md-4 control-label">Newsletter</label>
		<div class="col-md-8">
			<input type="text" name="newsletter" value="<?php echo ($this->input->post('newsletter') ? $this->input->post('newsletter') : $userd['newsletter']); ?>" class="form-control" id="newsletter" />
		</div>
	</div>
	<div class="form-group">
		<label for="sent" class="col-md-4 control-label">Sent</label>
		<div class="col-md-8">
			<input type="text" name="sent" value="<?php echo ($this->input->post('sent') ? $this->input->post('sent') : $userd['sent']); ?>" class="form-control" id="sent" />
		</div>
	</div>
	<div class="form-group">
		<label for="poin" class="col-md-4 control-label">Poin</label>
		<div class="col-md-8">
			<input type="text" name="poin" value="<?php echo ($this->input->post('poin') ? $this->input->post('poin') : $userd['poin']); ?>" class="form-control" id="poin" />
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