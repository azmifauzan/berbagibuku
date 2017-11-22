<?php $this->load->view('header'); ?> 
			
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-home"></i>
		Dashboard					
	</h1>
	
	<div class="stat-container">
		
		<div class="stat-holder">						
			<div class="stat">							
				<span><?php //echo $jartikel; ?></span>							
				Total Artikel							
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
		<div class="stat-holder">						
			<div class="stat">							
				<span><?php //echo $user->poin; ?></span>							
				Jumlah Poin							
			</div> <!-- /stat -->						
		</div> <!-- /stat-holder -->
		
	</div> <!-- /stat-container -->
	
</div> <!-- /span9 -->

<div class="row">					
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-list"></i>
				<h3>Artikel Terbaru</h3>
			</div> <!-- /widget-header -->	
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('footer'); ?>