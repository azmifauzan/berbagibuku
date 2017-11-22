<?php $this->load->view('header'); ?>
<link href="<?php echo base_url(); ?>css/pages/faq.css" rel="stylesheet">
	
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-pushpin"></i>
		Pertanyaan yang sering ditanyakan		
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

			<div class="widget-content">
						
				<ol class="faq-list">					
					<li>
						<h4>Apa itu Ripiu.info ?</h4>
						<p>Ripiu.info adalah kumpulan pengetahuan yang dikumpulkan dari para anggota Ripiu, pengetahuan yang dimaksud berupa tulisan-tulisan yang dikumpulkan dan dikelompokan dalam beberapa kelompok (kategori). Kategori yang tersedia di Ripiu.com bersifat dinamik artinya bisa mengalami penambahan kategori dan perubahan kategori-kategori yang ada.</p>						
					</li>
					<li>
						<h4>Bagaimanakah cara untuk berkontribusi di Ripiu ?</h4>
						<p>Anda tinggal mendaftar melalui halaman pendaftaran. setelah aktivasi berhasil, Anda langsung dapat berkontribusi di Ripiu, tanpa memerlukan biaya sedikitpun alias gratis.</p>						
					</li>
					<li>
						<h4>Bagaimana cara mendapatkan poin di Ripiu ?</h4>
						<p>Setiap Kontribusi artikel (setelah diapprove) dan diterbitkan di Ripiu.info akan mendapatkan 10 poin.</p>						
					</li>
					<li>
						<h4>Kenapa ada beberapa artikel yang saya tulis tiba-tiba dihapus ?</h4>
						<p>Untuk artikel yang tidak sesuai topik atau meskipun ada hubungannya dengan topik tetapi cenderung berbau sara, promosi, pornografi, atau hal-hal yang tidak patut akan kami hapus dan ada pengurangan point dan banned user jika terus mem"bandel".</p>						
					</li>
					<li>
						<h4>Kenapa artikel saya ditolak di Ripiu ?</h4>
						<p>Artikel yang berhak untuk diterbitkan di Ripiu.info minimal terdiri dari 300 kata, dan merupakan tulisan asli dari penulis sendiri. Pengutipan artikel dari sumber lain diperbolehkan dengan syarat mencantumkan sumber dari penulis asli. Artikel yang isinya 100% berisi kutipan tanpa ada tulisan dari penulis sendiri tidak akan diterima.</p>						
					</li>
					<li>
						<h4>Apa yang harus saya lakukan ketika artikel saya ditolak ?</h4>
						<p>Artikel yang telah ditolak oleh reviewer kami dapat di ubah dan diajukan kembali untuk peninjauan ulang.</p>						
					</li>
				</ol>
								
			</div> <!-- /widget-content -->
					
		</div> <!-- /widget -->		
	</div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('footer'); ?>
