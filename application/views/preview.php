<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $artikel->judul; ?> - Preview Ripiu.info</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="your site description here">
<meta name="author" content="website author name here">
<!-- Le styles -->
<link href="<?php echo $url ?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $url ?>assets/css/extra.css" rel="stylesheet">

<!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="<?php echo $url ?>assets/css/ie.css" />
<![endif]-->
<link href="<?php echo $url ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lobster|Oswald|Yesteryear|Kaushan+Script' rel='stylesheet' type='text/css'>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="<?php echo $url ?>assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $url ?>assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $url ?>assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $url ?>assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo $url ?>assets/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>

<div class="container">
	<div class="row">
		
		<div class="span12">	
			<h3 class="blogtitle"><?php echo $artikel->judul; ?></h3>
			<p>
				<span class="author">Ditulis oleh <?php echo $artikel->creator; ?>, pada</span>
				<span class="date"><?php echo date('d M Y',strtotime($artikel->tgl_dibuat)); ?></span>
			</p><hr/>
			
			<?php if($artikel->image != '' && $artikel->status_thumb == 1): ?>
			<img src="http://localdev/ripiu.me/<?php echo 'uploads/crop/'.$artikel->image; ?>" alt="<?php echo $artikel->judul; ?>" class="sidebar img-polaroid gambar">
			<?php endif; ?>
			<?php echo $artikel->isi; ?>
			<div class="pauseline" style="clear: both"></div>
			<hr/>
		</div>			
	</div>
</div>
<!-- /container-->

<div class="shadowfooter">
</div>
	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo $url ?>assets/js/jquery.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-transition.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-alert.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-modal.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-scrollspy.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-tab.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-tooltip.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-popover.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-button.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-collapse.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-carousel.js"></script>
	<script src="<?php echo $url ?>assets/js/bootstrap-typeahead.js"></script>
	<script src="<?php echo $url ?>assets/js/scrolltotop.js"></script>
    </body>
</html>