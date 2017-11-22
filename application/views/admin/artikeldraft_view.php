<?php $this->load->view('admin/header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-book"></i>
		Artikel
	</h1>
	
	<div class="stat-container">
							
		<div class="stat-holder">						
			<div class="stat">
				<span><?php echo $jaraktif; ?></span>							
				<a href="<?php echo site_url('adminpanel/artikel/terbit'); ?>">Artikel diterbitkan</a>
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
		<div class="stat-holder">						
			<div class="stat">							
				<span><?php echo $jarpending; ?></span>							
				<a href="<?php echo site_url('adminpanel/artikel/pending'); ?>">Menunggu Persetujuan</a>							
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
		<div class="stat-holder">						
			<div class="stat">							
				<span><?php echo $jartolak; ?></span>							
				<a href="<?php echo site_url('adminpanel/artikel/tolak'); ?>">Artikel ditolak</a>							
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
		<div class="stat-holder">						
			<div class="stat" style="background-color: #E9E9E9;">							
				<span><?php echo $jardraft; ?></span>							
				<a href="<?php echo site_url('adminpanel/artikel/draft'); ?>">Draft Artikel</a>							
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
	</div> <!-- /stat-container -->
	
</div> <!-- /span9 -->

<div class="row">					
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-folder-open"></i>
				<h3>Draft Artikel</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th width="60%">Judul</th>
							<th>Kategori</th>
							<th>Creator</th>
							<th width="10%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
					<?php if($artikel->num_rows() > 0) : ?>
					<?php foreach($artikel->result() as $ar) : ?>
					<tr>
						<td><?php echo $ar->judul; ?></td>
						<td><?php echo $ar->nama; ?></td>
						<td><?php echo $ar->creator; ?></td>
						<td class="action-td2">
							<a title="view artikel" href="#" onclick="clview('<?php echo $ar->artikel_id; ?>')" class="btn btn-small btn-info"><i class="icon-share-alt"></i></a>
						</td>
					</tr>
					<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<p align="center"><?php echo $this->pagination->create_links(); ?></p>
			</div> <!-- /widget-header -->

					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url(); ?>js/jquery.popupwindow.js"></script>
<script type="text/javascript">
    function clview(id)
    {
	var url = '<?php echo site_url("adminpanel/artikel/preview/"); ?>'+'/'+id;
	$.popupWindow(url, {
	    height: 500,
	    width: 700,
	    toolbar: false,
	    scrollbars: true, // safari always adds scrollbars
	    status: false,
	    resizable: false,
	    center: true, // auto-center
	    createNew: true, // open a new window, or re-use existing popup
	    name: 'Cetak Struk', // specify custom name for window (overrides createNew option)
	    location: false,
	    menubar: false,
	});
    }
</script>