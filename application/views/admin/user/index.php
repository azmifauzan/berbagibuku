
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
				<i class="icon-folder-open"></i>
				<h3>Semua User</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">

			<div class="pull-right">
				<a href="<?php echo site_url('adminpanel/user/add'); ?>" class="btn btn-success">Add</a> 
			</div><br/><br/>

			<table class="table table-striped table-bordered">
			    <tr>
					<td>Username</td>
					<td>Email</td>
					<td>Tgl Daftar</td>
					<td>Nama</td>
					<td>Poin</td>
					<td>Actions</td>
			    </tr>
				<?php foreach($listuser as $u): ?>
			    <tr>
					<td><?php echo $u['username']; ?></td>
					<td><?php echo $u['email']; ?></td>
					<td><?php echo $u['tgl_daftar']; ?></td>
					<td><?php echo $u['nama']; ?></td>
					<td><?php echo $u['poin']; ?></td>
					<td>
			            <a href="<?php echo site_url('adminpanel/user/edit/'.$u['username']); ?>" class="btn btn-info">Edit</a> 
			            <a href="<?php echo site_url('adminpanel/user/remove/'.$u['username']); ?>" class="btn btn-danger">Delete</a>
			        </td>
			    </tr>
				<?php endforeach; ?>
			</table>

			</div>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?> 