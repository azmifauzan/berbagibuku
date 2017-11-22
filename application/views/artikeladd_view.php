<?php $this->load->view('header'); ?> 

<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
		height : 300,
		width : 500,
		cleanup_on_startup : true,
		cleanup : true,
		paste_auto_cleanup_on_paste : true,
		paste_remove_styles: true,
		paste_remove_styles_if_webkit: true,
		paste_strip_class_attributes: true,

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,cleanup,code,|,preview",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "<?php echo base_url(); ?>css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
	
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-book"></i>
		Artikel
		<div style="float: right;">
			<a href="<?php echo site_url('ucp/artikel/tambah'); ?>"><i class="icon-plus"></i></a>
			<a href="<?php echo site_url('ucp/rtikel/tambah'); ?>">Tulis Artikel</a>
		</div>
	</h1>
	
</div> <!-- /span9 -->

<div class="row">					
	<div class="span9">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-pencil"></i>
				<h3>Tambah Artikel</h3>
			</div> <!-- /widget-header -->

			<div class="widget-content">
				<?php echo form_open_multipart('ucp/artikel/proses','class="form-horizontal"'); ?>
				<fieldset>
					
					<div class="control-group">											
						<label class="control-label" for="judul">Judul</label>
						<div class="controls">
							<input type="text" class="input-medium span5" id="judul" name="judul" value="<?php echo set_value("judul"); ?>" placeholder="Judul Artikel">
							<?php echo form_error('judul','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="kategori">Kategori</label>
						<div class="controls">
							<select name="kategori"><option value="0">Pilih Kategori ...</option>		
							<?php $gr = "rip"; $cc = 1; ?>							
							<?php foreach($kategori->result() as $kat) : ?>
							<?php if($kat->group != $gr) : ?>
								<?php if($cc > 1) : ?>
								</optgroup>
								<?php endif; ?>
								<optgroup id="<?php echo $kat->group; ?>" label="<?php echo $kat->group; ?>">
							<?php $gr = $kat->group; endif; ?>
							
							<option value="<?php echo $kat->kategori_id; ?>" title="<?php echo htmlentities($kat->keterangan); ?>" <?php echo set_select('kategori', $kat->kategori_id); ?>><?=$kat->nama?></option>
							
							<?php $cc++; endforeach; ?>
							</select>
							<?php echo form_error('kategori','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="gambar">Gambar</label>
						<div class="controls">
							<input type="file" id="gambar" name="fileimage">
							<?php if(isset($error)) echo $error; ?>
						</div> <!-- /controls -->
					</div>
					<div class="control-group">											
						<label class="control-label" for="artikel">Artikel</label>
						<div class="controls">
							<textarea name="artikel" rows="10" cols="50"><?php echo set_value('artikel'); ?></textarea>
							<?php echo form_error('artikel','<p class="help-block" style="color:red;">','</p>'); ?>
						</div> <!-- /controls -->
					</div>
					<div class="form-actions">	
						<input type="submit" id="publish" name="publish" value="Publish Artikel" class="btn btn-primary"> <input type="submit" id="draft" name="publish" value="Simpan Draft" class="btn">
					</div>
				</fieldset>
				<?php echo form_close(); ?>

			</div> <!-- /widget-header -->

					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('footer'); ?>