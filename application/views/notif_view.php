<?php $this->load->view('header'); ?> 
	
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-comment"></i>
		Notifikasi		
	</h1>
	
	<?php if(isset($info)) : ?>
	    <div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Informasi : </strong><?php echo $info; ?>
	    </div>
	<?php endif; ?>
	
</div> <!-- /span9 -->

<div class="row">
	<?php if($notif->num_rows() > 0) : ?>
	<div class="span9">
		<div class="widget">
			
			<div class="widget-content">
			<?php foreach($notif->result() as $nt) : ?>
				<a href="<?php echo site_url('notif/view/'.$nt->nid); ?>" target="_blank"><b><?php echo $nt->judul; ?></b></a> : <?php echo $nt->isi; ?><hr/>
			<?php endforeach; ?>
			</div> <!-- /widget-header -->
					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->
	<?php endif; ?>
	
	<?php if($oldnotif->num_rows() > 0) : ?>
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-refresh"></i>
				<h3>Notifikasi Sebelumnya</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
			<?php foreach($oldnotif->result() as $ont) : ?>
				<a href="<?php echo site_url('notif/view/'.$ont->id); ?>" target="_blank"><?php echo $ont->judul; ?></a> : <?php echo $ont->isi; ?>
				<br/><div class="kecil"><?php echo date('d F Y',strtotime($ont->waktu)); ?></div><hr/>
			<?php endforeach; ?>
			</div> <!-- /widget-header -->
					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->
	<?php endif; ?>
</div> <!-- /row -->	
			
<?php $this->load->view('footer'); ?>